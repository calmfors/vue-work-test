<template>
  <article>
    <h2>{{ title }}</h2>
    <p :class="{ 'half-width': img && !mobile }">
      {{ text }}
    </p>
    <section v-if="img">
      <img :src="img" :alt="title" />
      <read-more v-if="!mobile" />
    </section>
    <read-more v-if="mobile && img" />
  </article>
</template>

<script>
import ReadMore from "./ReadMore.vue";

export default {
  name: "BaseInfoCard",
  components: { ReadMore },
  data() {
    return {
      windowWidth: window.innerWidth,
    };
  },
  created() {
    window.addEventListener("resize", this.myEventHandler);
  },
  destroyed() {
    window.removeEventListener("resize", this.myEventHandler);
  },
  computed: {
    mobile() {
      return this.windowWidth < "640";
    },
  },
  methods: {
    myEventHandler(e) {
      this.windowWidth = e.target.innerWidth;
    },
  },
  props: ["text", "title", "img"],
};
</script>

<style scoped>
article {
  display: flex;
  flex-wrap: wrap;
  align-items: stretch;
}
h2 {
  flex: 1 1 100%;
  font-weight: 600;
  font-size: 24px;
  line-height: 28px;
  margin: 10px 0 10px 0;
}
img {
  max-width: calc(100% - 20px);
  margin: 5px 0 0 20px;
}
section {
  max-width: 50%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: flex-end;
}
.half-width {
  width: 50%;
}
@media screen and (max-width: 640px) {
  article {
    justify-content: center;
  }
  img {
    margin: 0 0 10px 0;
    max-width: 100%;
  }
  section {
    max-width: 100%;
    order: -1;
  }
}
</style>

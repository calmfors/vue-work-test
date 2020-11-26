<template>
  <article>
    <h2>{{ title }}</h2>
    <p :style="img && pWidth">
      {{ text }}
    </p>
    <div id="arrowcontainer" v-if="img">
      <img id="boximg" :src="img" :alt="title" />
      <read-more v-if="!mobile" />
    </div>
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
    pWidth() {
      return { width: this.mobile ? "100%" : "50%" };
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
#boximg {
  max-width: calc(100% - 20px);
  margin: 5px 0 0 20px;
}
#arrowcontainer {
  max-width: 50%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: flex-end;
}
@media screen and (max-width: 640px) {
  article {
    justify-content: center;
  }
  #boximg {
    margin: 0 0 10px 0;
    max-width: 100%;
  }
  #arrowcontainer {
    max-width: 100%;
    order: -1;
  }
}
</style>

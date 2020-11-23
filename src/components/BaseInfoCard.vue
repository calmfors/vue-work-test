<template>
  <article>
    <img
      id="boximg"
      v-if="img && windowWidth < '640'"
      :style="{ width: '100%' }"
      :src="img"
      :alt="title"
    />
    <h2>{{ title }}</h2>
    <div id="box">
      <p :style="img && { width: windowWidth < '640' ? '100%' : '50%' }">
        {{ text }}
      </p>
      <div v-if="img" id="arrowcontainer">
        <img id="boximg" v-if="windowWidth > '640'" :src="img" :alt="title" />
        <read-more />
      </div>
    </div>
  </article>
</template>

<script>
import BaseReadMore from "./BaseReadMore.vue";

export default {
  components: { "read-more": BaseReadMore },
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
  methods: {
    myEventHandler(e) {
      this.windowWidth = e.target.innerWidth;
    },
  },
  props: ["text", "title", "img"],
};
</script>

<style scoped>
h2 {
  font-weight: 600;
  font-size: 24px;
  line-height: 28px;
  margin: 10px 0 10px 0;
}
#box {
  display: flex;
  align-items: stretch;
}
#box p {
  padding: 0;
  margin: 0;
}
#boximg {
  max-width: 90%;
  margin: 5px 0 0 20px;
}
#arrowcontainer {
  width: 50%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: flex-end;
}
@media screen and (max-width: 640px) {
  #box {
    flex-direction: column;
    align-items: flex-end;
  }
  #boximg {
    max-width: 100%;
    margin: 0;
  }
  #box p {
    width: 100%;
  }
  #arrowcontainer {
    width: 100%;
    align-items: center;
  }
}
</style>

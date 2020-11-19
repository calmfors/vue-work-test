<template>
  <div>
    <img
      v-if="img && windowWidth < '640'"
      :style="{ width: '100%' }"
      :src="img"
    />
    <h2>{{ title }}</h2>
    <div id="box">
      <p :style="img && { width: windowWidth < '640' ? '100%' : '50%' }">
        {{ text }}
      </p>
      <div v-if="img" id="arrowcontainer">
        <img v-if="windowWidth > '640'" :src="img" />
        <button id="arrow">
          <h2>Läs mer</h2>
          <img src="../assets/arrow.svg" />
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
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

<style>
h2 {
  font-weight: 600;
  font-size: 24px;
}
#box {
  display: flex;
  align-items: stretch;
}
#box p {
  padding: 0;
  margin: 0;
}
#box img {
  max-width: 90%;
  margin: 0 0 5px 20px;
}
#arrowcontainer {
  width: 50%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: flex-end;
}
#arrow {
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #4a4a4a;
  color: #fff;
  width: 150px;
  height: 48px;
  padding: 0;
  margin: 0;
}
#arrow h2 {
  margin: 0;
}
#arrow img {
  width: 15px;
  margin: 0 0 0 10px;
}
#smallbox {
  padding: 1rem;
  background-color: #eee;
  margin: 10px;
  width: calc((100% - 40px) / 4);
}
#largebox {
  padding: 1rem;
  background-color: #eee;
  width: calc((100% - 40px) / 2);
  margin: 10px;
}
@media screen and (max-width: 840px) {
  #largebox {
    flex: 1 1 100%;
  }
  #smallbox {
    flex: 1 1 25%;
  }
}
@media screen and (max-width: 640px) {
  #largebox {
    flex: 1 1 100%;
    margin: 0 0 20px 0;
  }
  #smallbox {
    flex: 1 1 100%;
    margin: 0 0 20px 0;
  }
  #box {
    flex-direction: column;
    align-items: flex-end;
  }
  #box img {
    width: 100%;
  }
  #box p {
    width: 100%;
  }
  #arrow img {
    width: 15px;
  }
}
</style>

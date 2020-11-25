<template>
  <section id="infowrapper">
    <h1 v-if="location.name">
      Info om <span>{{ location.name }}</span>
    </h1>

    <div id="infocontainer">
      <div
        v-for="info in location.info"
        :key="info.title"
        :id="info.img ? 'largebox' : 'smallbox'"
        :style="info.blue && { backgroundColor: '#1377B5', color: '#fff' }"
      >
        <info-card :title="info.title" :text="info.text" :img="info.img" />
      </div>
    </div>
  </section>
</template>

<script>
import BaseInfoCard from "./BaseInfoCard.vue";

export default {
  name: "BaseInfoContainer",
  components: {
    "info-card": BaseInfoCard,
  },
  props: ["location"],
};
</script>

<style scoped>
h1 {
  font-size: 48px;
  font-weight: 300;
}
h1 span {
  font-weight: 600;
}
#infowrapper {
  width: 1100px;
  text-align: center;
}
#infocontainer {
  display: flex;
  justify-content: space-between;
  width: 100%;
  text-align: left;
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
@media screen and (max-width: 1140px) {
  #infowrapper {
    width: calc(100% - 40px);
  }
}
@media screen and (max-width: 840px) {
  #infocontainer {
    flex-wrap: wrap;
  }
  #largebox {
    flex: 1 1 100%;
  }
  #smallbox {
    flex: 1 1 25%;
  }
  #infowrapper {
    width: 100%;
  }
  h1 {
    line-height: 50px;
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
}
</style>

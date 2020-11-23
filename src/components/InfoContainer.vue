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
        <info-box
          :title="info.title"
          :text="info.text"
          :img="info.img"
        ></info-box>
      </div>
    </div>
  </section>
</template>

<script>
import InfoBox from "./InfoBox.vue";

export default {
  components: {
    "info-box": InfoBox,
  },
  props: ["location"],
};
</script>

<style>
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
@media screen and (max-width: 1140px) {
  #infowrapper {
    width: calc(100% - 40px);
  }
}
@media screen and (max-width: 840px) {
  #infocontainer {
    flex-wrap: wrap;
  }
  #infowrapper {
    width: 100%;
  }
  h1 {
    line-height: 50px;
  }
}
</style>

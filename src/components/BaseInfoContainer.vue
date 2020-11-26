<template>
  <section>
    <h1>
      Info om <span>{{ location.name }}</span>
    </h1>

    <div class="infocontainer">
      <div
        v-for="info in location.info"
        :key="info.title"
        class="box"
        :class="{ large: info.img, blue: info.blue }"
      >
        <base-info-card :title="info.title" :text="info.text" :img="info.img" />
      </div>
    </div>
  </section>
</template>

<script>
import BaseInfoCard from "./BaseInfoCard.vue";

export default {
  name: "BaseInfoContainer",
  components: {
    BaseInfoCard,
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
section {
  width: 1100px;
  text-align: center;
}
.infocontainer {
  display: flex;
  justify-content: space-between;
  width: 100%;
  text-align: left;
}
.box {
  padding: 1rem;
  background-color: #eee;
  margin: 10px;
  width: calc((50% - 60px) / 2);
}
.large {
  min-width: calc(50% - 60px);
}
.blue {
  background-color: #1377b5;
  color: #fff;
}
@media screen and (max-width: 1140px) {
  section {
    width: calc(100% - 40px);
  }
}
@media screen and (max-width: 840px) {
  .infocontainer {
    flex-wrap: wrap;
  }
  .box {
    flex: 1 1 25%;
  }
  .large {
    flex: 1 1 100%;
  }
  section {
    width: 100%;
  }
  h1 {
    line-height: 50px;
  }
}
@media screen and (max-width: 640px) {
  .box {
    flex: 1 1 100%;
    margin: 0 0 20px 0;
  }
}
</style>

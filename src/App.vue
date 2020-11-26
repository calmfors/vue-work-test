<template>
  <div>
    <main>
      <the-search @get-location="getLocation" />
      <base-info-container v-if="choosenLocation" :location="choosenLocation" />
      <p>{{ errorMessage }}</p>
    </main>
    <the-footer />
  </div>
</template>

<script>
import TheSearch from "./components/TheSearch.vue";
import BaseInfoContainer from "./components/BaseInfoContainer.vue";
import locations from "../locations.json";
import TheFooter from "./components/TheFooter.vue";

export default {
  name: "App",
  data() {
    return {
      errorMessage: "",
      choosenLocation: "",
      locationInfo: locations,
    };
  },
  components: {
    TheSearch,
    BaseInfoContainer,
    TheFooter,
  },
  methods: {
    getLocation(searchWord) {
      this.errorMessage = "";
      if (
        searchWord.length > 2 &&
        this.locationInfo.find((location) =>
          location.name.toLowerCase().includes(searchWord)
        )
      ) {
        this.choosenLocation = this.locationInfo.filter((location) =>
          location.name.toLowerCase().includes(searchWord)
        )[0];
      } else {
        this.choosenLocation = "";
        this.errorMessage =
          "Ingen träff. Sök efter 'London' eller 'Stockholm'.";
      }
    },
  },
};
</script>

<style>
body {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  font-family: "Poppins", sans-serif;
  font-weight: 300;
  font-size: 18px;
  color: #4a4a4a;
}
main {
  padding-top: 40px;
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
}
p {
  font-size: 18px;
  max-width: 600px;
  margin: 0;
  padding: 0;
}
footer {
  height: auto;
  text-align: center;
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-bottom: 30px;
}
@media screen and (max-width: 640px) {
  main {
    width: calc(100% - 20px);
    padding: 10px;
    text-align: center;
  }
}
</style>

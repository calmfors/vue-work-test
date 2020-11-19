<template>
  <div id="container">
    <search-location @get-location="getLocation"></search-location>
    <info-container :location="choosenLocation"></info-container>
    {{ errorMessage }}
  </div>
</template>

<script>
import SearchLocation from "./components/SearchLocation.vue";
import InfoContainer from "./components/InfoContainer.vue";
import locations from "../locations.json";

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
    "search-location": SearchLocation,
    "info-container": InfoContainer,
  },
  methods: {
    getLocation(searchWord) {
      this.errorMessage = "";
      if (
        this.locationInfo.find(
          (location) => location.name.toLowerCase() === searchWord.toLowerCase()
        )
      ) {
        this.choosenLocation = this.locationInfo.filter(
          (location) => location.name.toLowerCase() === searchWord.toLowerCase()
        )[0];
      } else {
        this.choosenLocation = "";
        this.errorMessage =
          "Inget sökresultat, testa 'London' eller 'Stockholm'.";
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
#container {
  padding-top: 40px;
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
}
@media screen and (max-width: 640px) {
  #container {
    padding-top: 20px;
  }
}
</style>

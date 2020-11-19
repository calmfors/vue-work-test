<template>
  <div>
    <main id="container">
      <search-location @get-location="getLocation"></search-location>
      <info-container :location="choosenLocation"></info-container>
      <p id="error">{{ errorMessage }}</p>
    </main>
    <footer>
      <button @click="showInfo = !showInfo">Om tjänsten</button>
      <p :style="{ maxHeight: showInfo ? '100px' : '0' }">
        All information om städerna är hämtad från Wikipedia. Duis augue dolor,
        tempus sit amet nunc eget, aliquet porttitor eros. Cras porta ac odio
        lacinia tristique.
      </p>
    </footer>
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
      showInfo: false,
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
#error {
  font-size: 18px;
  max-width: 600px;
  margin: 0;
}
footer {
  height: auto;
  text-align: center;
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-bottom: 30px;
}
footer button {
  font-family: "Poppins", sans-serif;
  font-size: 18px;
  background-color: transparent;
  border: none;
  text-decoration: underline;
  margin-top: 20px;
  cursor: pointer;
}
footer p {
  font-size: 14px;
  max-width: 600px;
  padding: 0 15px 0 15px;
  overflow: hidden;
  transition-duration: 0.3s;
}
@media screen and (max-width: 640px) {
  #container {
    padding-top: 20px;
  }
}
</style>

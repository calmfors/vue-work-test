<template>
  <footer>
    <button @click="showInfo = !showInfo">Om tjänsten</button>
    <p :class="{ show: showInfo }">
      All information om städerna är hämtad från Wikipedia. Duis augue dolor,
      tempus sit amet nunc eget, aliquet porttitor eros. Cras porta ac odio
      lacinia tristique.
    </p>
  </footer>
</template>

<script>
export default {
  data() {
    return {
      showInfo: false,
    };
  },
};
</script>

<style scoped>
button {
  font-family: "Poppins", sans-serif;
  font-size: 18px;
  background-color: transparent;
  border: none;
  text-decoration: underline;
  margin: 5px;
  cursor: pointer;
}
p {
  font-size: 14px;
  max-width: 600px;
  padding: 0 15px 0 15px;
  overflow: hidden;
  transition-duration: 0.2s;
  max-height: 0;
  height: auto;
}
.show {
  max-height: 100px;
}
</style>

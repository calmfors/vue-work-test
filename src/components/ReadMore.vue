<template>
  <button>
    <h2>Läs mer</h2>
    <img src="../assets/arrow.svg" />
  </button>
</template>

<style scoped>
button {
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #4a4a4a;
  color: #fff;
  width: 150px;
  height: 48px;
  padding: 0 10px 0 10px;
  margin: 10px 0 0 0;
  border: none;
  cursor: pointer;
  margin-left: auto;
}
button h2 {
  margin: 0;
}
img {
  width: 15px;
  margin: 0 0 0 10px;
}
@media screen and (max-width: 640px) {
  button {
    margin-left: 0;
  }
}
</style>

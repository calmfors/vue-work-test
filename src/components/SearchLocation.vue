<template>
  <form @submit.prevent="postSearchWord">
    <label for="location"></label>
    <input
      type="text"
      v-model="searchWord"
      placeholder="Ange stad eller land"
    />
    <button><img src="../assets/search.svg" /></button>
  </form>
</template>

<script>
export default {
  data() {
    return {
      searchWord: "",
    };
  },
  emits: ["searchWord"],
  methods: {
    postSearchWord() {
      this.$emit("get-location", this.searchWord);
      this.searchWord = "";
    },
  },
};
</script>

<style>
form {
  display: flex;
  justify-content: center;
  margin-bottom: 20px;
  width: 50%;
}
input {
  font-family: "Poppins", sans-serif;
  font-size: 20px;
  background-color: #eee;
  padding: 15px;
  border: none;
  flex-grow: 1;
}
input:placeholder-shown {
  font-style: italic;
  font-size: 20px;
}
form button {
  padding: 0;
  width: 60px;
  border: 0;
  background-color: #ff591d;
  flex-grow: 0;
  cursor: pointer;
}
button img {
  width: 60%;
}
@media screen and (max-width: 640px) {
  form {
    width: calc(100% - 40px);
    margin-bottom: 10px;
  }
}
</style>

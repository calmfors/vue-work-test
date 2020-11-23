<template>
  <form @submit.prevent="postSearchWord">
    <label for="searchLocation" class="hidden">Sök efter stad eller land</label>
    <input
      ref="searchField"
      type="text"
      v-model="searchWord"
      name="searchLocation"
      id="searchLocation"
      placeholder="Ange stad eller land"
    />
    <button ref="searchButton">
      <img src="../assets/search.svg" alt="Sök" />
    </button>
  </form>
</template>

<script>
export default {
  data() {
    return {
      searchWord: "",
    };
  },
  mounted() {
    console.log("created");
    this.$refs.searchField.focus();
  },
  emits: ["searchWord"],
  methods: {
    postSearchWord() {
      this.$emit("get-location", this.searchWord.trim().toLowerCase());
      this.searchWord = "";
      this.$refs.searchField.blur();
      this.$refs.searchButton.blur();
    },
  },
};
</script>

<style>
form {
  display: flex;
  justify-content: center;
  margin-bottom: 20px;
  width: 100%;
  max-width: 620px;
}
input {
  font-family: "Poppins", sans-serif;
  font-size: 20px;
  background-color: #eee;
  padding: 15px;
  border: none;
  width: calc(100% - 60px);
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
  flex-shrink: 0;
  cursor: pointer;
}
button img {
  width: 60%;
}
.hidden {
  border: 0;
  clip: rect(0 0 0 0);
  height: 1px;
  margin: -1px;
  overflow: hidden;
  padding: 0;
  position: absolute;
  width: 1px;
}
@media screen and (max-width: 640px) {
  form {
    margin-bottom: 10px;
  }
}
</style>

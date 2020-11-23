<template>
  <button id="arrow">
    <h2>Läs mer</h2>
    <img id="imgarrow" src="../assets/arrow.svg" />
  </button>
</template>

<script>
export default {};
</script>

<style>
#arrow {
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
}
#arrow h2 {
  margin: 0;
}
#imgarrow {
  width: 15px;
  margin: 0 0 0 10px;
}
</style>

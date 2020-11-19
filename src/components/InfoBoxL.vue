<template>
  <div>{{ text }}</div>
</template>

<script>
export default {
  props: ["text", "img"],
};
</script>

<style>
#largebox {
  padding: 1rem;
  background-color: #eee;
  margin-right: 20px;
  width: calc(100% / 2);
}
</style>

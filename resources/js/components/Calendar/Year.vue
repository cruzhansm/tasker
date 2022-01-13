<template>
  <div>{{ year }}</div>
</template>

<script>
export default {
  name: "Year",
  props: {
    year: Number,
  },
};
</script>

<style scoped>
div {
  width: max-content;
  margin: auto;
  font-size: 36px;
}
</style>
<template>
  <span>{{ day }}</span>
</template>

<script>
export default {
  name: "Day",
  props: {
    day: String,
  },
};
</script>

<style scoped>
span {
  font-size: 36px;
}
</style>
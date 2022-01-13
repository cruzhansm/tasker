<template>
  <button
    :type="type"
    :style="{
      backgroundColor: color,
      width: `${width ? width.toString() + 'px' : '100%'}`,
      height: `${height}px`,
    }"
  >
    {{ text }}
  </button>
</template>

<script>
export default {
  name: "Button",
  props: {
    text: String,
    color: String,
    width: Number,
    height: Number,
    type: String,
  },
};
</script>

<style scoped>
button {
  border: 0;
  border-radius: 6px;
  outline: 0;
  color: white;
  font-size: 20px;
  font-family: "Poppins", sans-serif;
}

button:hover {
  cursor: pointer;
}
</style>
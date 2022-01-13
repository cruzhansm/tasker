<template>
  <router-link :to="target">{{ text }}</router-link>
</template>

<script>
export default {
  name: "Navlinks",
  props: {
    text: String,
    target: Object,
  },
};
</script>

<style scoped>
a:hover {
  color: var(--tph-text-highlight);
}
</style>
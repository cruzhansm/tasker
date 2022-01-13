<template>
  <div>
    <Navlinks
      :key="index"
      v-for="(link, index) in links"
      :text="link.text"
      :target="link.target"
    ></Navlinks>
  </div>
</template>

<script>
import Navlinks from "./Navlinks.vue";

export default {
  name: "Navbar",
  data() {
    return {
      links: [
        {
          text: "Home",
          target: { name: "Home" },
        },
        {
          text: "My Tasks",
          target: { name: "My Tasks" },
        },
        {
          text: "About",
          target: { name: "About" },
        },
      ],
    };
  },
  components: {
    Navlinks,
  },
};
</script>

<style scoped>
div {
  background-color: var(--tph-secondary);
  border-radius: 73px;
  display: flex;
  gap: 40px;
  width: max-content;
  padding: 10px 30px;
}
</style>
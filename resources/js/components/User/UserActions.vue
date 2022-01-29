<template>
  <div>
    <!-- <Settings></Settings> -->
    <UserIcon></UserIcon>
  </div>
</template>

<script>
import Settings from "./Settings.vue";
import UserIcon from "./UserIcon.vue";

export default {
  name: "UserActions",
  components: {
    Settings,
    UserIcon,
  },
};
</script>

<style scoped>
div {
  display: inline-flex;
  align-items: center;
  gap: 20px;
}
</style>
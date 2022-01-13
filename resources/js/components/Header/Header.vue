<template>
  <div class="header">
    <Trademark></Trademark>
    <Navbar></Navbar>
    <UserActions></UserActions>
  </div>
</template>

<script>
import Navbar from "../Nav/Navbar.vue";
import UserActions from "../User/UserActions.vue";
import Trademark from "../Trademark.vue";

export default {
  name: "Header",
  components: {
    Navbar,
    UserActions,
    Trademark,
  },
};
</script>

<style scoped>
.header {
  display: flex;
  gap: 100px;
  margin-left: auto;
  width: max-content;
  margin-right: 128px;
}
</style>
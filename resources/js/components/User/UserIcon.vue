<template>
  <div class="container" @click="toggleActions">
    <div v-if="isClicked" class="user-actions">
      <div>
        <i class="fa-solid fa-user"></i>
        First Last Name
      </div>
      <div class="logout" @click="logout">
        <i class="fa-solid fa-right-from-bracket"></i>
        LOG OUT
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "UserIcon",
  data() {
    return {
      isClicked: false,
    };
  },
  methods: {
    toggleActions() {
      this.isClicked = !this.isClicked;
    },
    logout() {
      this.$router.push({ name: "Login" });
    },
  },
};
</script>

<style scoped>
.container {
  position: relative;
  background-color: var(--placeholder);
  border-radius: 50%;
  height: 41px;
  width: 41px;
  cursor: pointer;
}

.container > div > div {
  display: inline-flex;
  align-items: center;
  gap: 20px;
}

.user-actions {
  background-color: var(--tph-tertiary);
  border-radius: 6px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  gap: 10px;
  position: absolute;
  bottom: -120px;
  right: 0;
  width: max-content;
  height: max-content;
  padding: 20px 30px;
}

.logout:hover,
.logout:hover > i {
  color: var(--tph-text-highlight);
  cursor: pointer;
}
</style>s
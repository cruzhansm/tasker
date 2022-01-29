<template>
  <div class="task">
    <span class="title">{{ title }}</span>
    <span class="location">{{ location }}</span>
    <p class="desc">{{ description }}</p>
    <span class="status">STATUS: {{ upper }}</span>
  </div>
</template>

<script>
export default {
  name: "TaskOverview",
  props: {
    title: String,
    location: String,
    description: String,
    status: String,
  },
  computed: {
    upper() {
      return this.status.toUpperCase();
    },
  },
};
</script>

<style scoped>
.task {
  background-color: var(--tph-tertiary);
  border-radius: 12px;
  padding: 20px;
  display: flex;
  flex-direction: column;
  gap: 5px;
  width: 96%;
}

.title {
  color: var(--tph-text-highlight);
  font-size: 24px;
}

.location {
  color: var(--tph-text-secondary);
  font-size: 18px;
}

.desc {
  font-size: 18px;
  margin: 0;
}

.status {
  font-size: 12px;
  color: var(--tph-text-secondary);
}
</style>
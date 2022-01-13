<template>
  <div class="task">
    <div class="details">
      <span class="task-title">{{ title }}</span>
      <div style="display: flex; gap: 5px">
        <span class="task-from">{{ start }}</span>
        <span>until</span>
        <span class="task-until">{{ end }}</span>
      </div>
    </div>
    <span class="date">{{ date }}</span>
  </div>
</template>

<script>
export default {
  name: "TaskListItem",
  props: {
    title: String,
    start: String,
    end: String,
    date: String,
  },
};
</script>

<style scoped>
.task {
  border-bottom: 1px solid var(--tph-text-secondary);
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 95%;
  height: 60px;
  padding: 20px 0;
}
</style>s
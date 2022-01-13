<template>
  <div class="task">
    <div class="task-info">
      <div class="task-details">
        <span class="task-title">{{ task.title }}</span>
        <span class="task-location">{{ task.location }}</span>
      </div>
      <div class="task-start">{{ task.start }}</div>
      <div class="task-end">{{ task.end }}</div>
    </div>
    <div class="task-actions">
      <Button
        type="button"
        :height="45"
        color="var(--tph-tertiary)"
        text="MARK DONE"
      ></Button>
      <Button
        type="button"
        :height="45"
        color="var(--tph-tertiary)"
        text="EDIT TASK"
      ></Button>
      <Button
        type="button"
        :height="45"
        color="var(--tph-tertiary)"
        text="DELETE TASK"
      ></Button>
    </div>
  </div>
</template>

<script>
import Button from "../Button.vue";

export default {
  name: "Task",
  components: {
    Button,
  },
  props: {
    task: Object,
  },
};
</script>

<style scoped>
.task {
  background-color: var(--tph-secondary);
  border-radius: 12px;
  display: flex;
  min-height: 90px;
  width: 100%;
  padding: 33px;
}

.task-info,
.task-actions {
  display: flex;
  align-items: center;
}

.task-info {
  width: 60%;
  gap: 50px;
}

.task-details {
  display: flex;
  flex-direction: column;
  color: var(--tph-text-highlight);
  width: 60%;
}

.task-title,
.task-location {
  width: 100%;
  overflow: hidden;
  word-wrap: nowrap;
  white-space: nowrap;
  text-overflow: ellipsis;
}

.task-title {
  color: var(--tph-text-highlight);
}

.task-location {
  color: var(--tph-text-secondary);
}

.task-start,
.task-end {
  width: 10%;
}

.task-actions {
  width: 40%;
  gap: 30px;
}
</style>
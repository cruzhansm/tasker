<template>
  <div :class="['container', date.active ? 'active' : '']" @click="taskView">
    <span
      v-if="date.active"
      :class="['date', isCurrentDate ? 'current' : '']"
      >{{ date.day }}</span
    >
    <div class="tasks" v-if="date.active">
      <div class="task" :key="index" v-for="(task, index) in taskList">
        {{ task.title }}
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "IDate",
  data() {
    return {
      taskList: Array,
    };
  },
  props: {
    date: Object,
    fullDate: Object,
    tasks: Array,
  },
  watch: {
    fullDate: {
      handler() {
        this.getAllSpecificTasks();
      },
      deep: true,
    },
  },
  computed: {
    isCurrentDate() {
      const day = new Date(Date.now()).toLocaleDateString("en-us", {
        day: "numeric",
      });
      return this.date.day == day ? true : false;
    },
  },
  methods: {
    taskView() {
      const formatted =
        this.fullDate.month.toString() +
        "-" +
        this.date.day.toString() +
        "-" +
        this.fullDate.year.toString();

      this.$emit("task-view", formatted);
    },
    getAllSpecificTasks() {
      const date =
        this.fullDate["month"].toString() +
        "/" +
        this.date["day"].toString() +
        "/" +
        this.fullDate["year"].toString();

      this.taskList = this.tasks.filter((x) => x.date == date);
    },
  },
  created() {
    this.getAllSpecificTasks();
  },
};
</script>

<style scoped>
.container {
  background-color: var(--tph-tertiary);
  border: 1px solid var(--tph-text-secondary);
  height: 100px;
  position: relative;
}

.date {
  font-weight: 700;
  position: absolute;
  top: 5px;
  right: 10px;
}

.active:hover {
  background-color: rgba(33, 55, 74, 0.25);
  cursor: pointer;
}

.current {
  color: var(--tph-text-highlight);
}

.tasks {
  display: flex;
  flex-direction: column;
  gap: 5px;
  margin: 36px 12px 12px 12px;
}

.task {
  background-color: var(--tph-primary);
  border-radius: 73px;
  font-size: 10px;
  height: max-content;
  width: 85px;
  padding: 0 10px;
  overflow: hidden;
  white-space: nowrap;
  word-wrap: nowrap;
  text-overflow: ellipsis;
}
</style>
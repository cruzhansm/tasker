<template>
  <div class="container">
    <div class="unfinished">
      <span class="title">Unfinished Tasks</span>
      <div class="task-list">
        <div class="tasks">
          <TaskListItem
            :key="task.id"
            v-for="task in unfinished"
            :title="task.title"
            :start="task.start"
            :end="task.end"
            :date="task.date"
          ></TaskListItem>
        </div>
      </div>
    </div>
    <div class="finished">
      <span class="title">Finished Tasks</span>
      <div class="task-list">
        <div class="tasks">
          <TaskListItem
            :key="task.id"
            v-for="task in finished"
            :title="task.title"
            :start="task.start"
            :end="task.end"
            :date="task.date"
          ></TaskListItem>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import TaskListItem from "../components/Tasks/TaskListItem.vue";

export default {
  name: "Tasks",
  data() {
    return {
      unfinished: Array,
      finished: Array,
    };
  },
  components: {
    TaskListItem,
  },
  methods: {
    getAllTasks() {
      axios.post("/mytasks/all-tasks").then((response) => {
        this.unfinished = response.data.tasks.filter(
          (task) => task.status == "pending"
        );
        this.finished = response.data.tasks.filter(
          (task) => task.status == "done"
        );
        console.log(this.unfinished);
        console.log(this.finished);
      });
    },
  },
  created() {
    this.getAllTasks();
  },
};
</script>

<style scoped>
.container {
  display: flex;
  justify-content: space-between;
  margin: 48px 128px;
  margin-bottom: 67px;
  flex-grow: 1;
}

.title {
  color: var(--tph-text-highlight);
  font-size: 24px;
  font-weight: 700;
  margin-bottom: 20px;
}

.unfinished,
.finished {
  display: flex;
  flex-direction: column;
  gap: 10px;
  width: 45%;
}

.task-list {
  background-color: var(--tph-secondary);
  box-shadow: -4px -4px 47px rgba(0, 0, 0, 0.15);
  border-radius: 12px;
  width: 95%;
  padding: 55px;
  margin-left: auto;
}

.tasks {
  width: 100%;
  height: 750px;
  display: flex;
  overflow-y: auto;
  flex-direction: column;
}
</style>
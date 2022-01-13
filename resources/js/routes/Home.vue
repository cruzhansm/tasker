<template>
  <div class="container">
    <div class="calendar">
      <Calendar @init="init" @task-view="taskView"></Calendar>
    </div>
    <div class="right">
      <div class="header">
        <span class="title">Day: {{ formatted }}</span>
        <Button
          type="button"
          color="var(--tph-highlight)"
          :height="36"
          :width="150"
          text="View Day"
          @click="goToTaskView"
        ></Button>
      </div>
      <div class="day-tasks" v-if="finishedLoading">
        <TaskOverview
          :key="task.id"
          v-for="task in selectedTasks"
          :title="task.title"
          :location="task.location"
          :description="task.description"
        ></TaskOverview>
      </div>
    </div>
  </div>
</template>

<script>
import Calendar from "../components/Calendar/Calendar.vue";
import TaskOverview from "../components/Tasks/TaskOverview.vue";
import Button from "../components/Button.vue";

export default {
  name: "Home",
  data() {
    return {
      formatted: String,
      selectedTasks: Array,
      finishedLoading: false,
    };
  },
  components: {
    Calendar,
    TaskOverview,
    Button,
  },
  methods: {
    init(formatted) {
      formatted = formatted.split("/").join("-");
      this.formatted = formatted;
      this.taskView(this.formatted);
    },
    taskView(formatted) {
      this.formatted = formatted;
      this.getAllSpecificTasks();
    },
    goToTaskView() {
      this.$router.push({
        name: "Task View",
        params: { date: this.formatted },
      });
    },
    getAllSpecificTasks() {
      let date = this.formatted;
      date = date.split("-").join("/");

      axios.post("/day/get-tasks", { date: date }).then((response) => {
        this.selectedTasks = response.data.tasks;
        this.finishedLoading = true;
      });
    },
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

.calendar {
  background-color: var(--tph-secondary);
  border-radius: 12px;
  box-shadow: -2px -2px 47px -3px rgba(0, 0, 0, 0.25);
  width: 60%;
  padding: 48px 78px;
}

.right {
  background-color: var(--tph-secondary);
  border-radius: 12px;
  box-shadow: -2px -2px 47px -3px rgba(0, 0, 0, 0.25);
  width: 32%;
}

.title {
  font-size: 36px;
  font-weight: 700;
}

.day-tasks {
  display: flex;
  flex-direction: column;
  width: 85%;
  height: 750px;
  gap: 20px;
  margin: auto;
  overflow-y: auto;
}

.header {
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px 36px;
}
</style>
<template>
  <div class="container">
    <div class="top">
      <span class="date">{{ date }}</span>
      <Button
        type="button"
        :height="45"
        :width="192"
        color="var(--tph-highlight)"
        text="ADD NEW TASK"
        @click="addNewTask"
      ></Button>
    </div>
    <div class="headers">
      <div style="display: flex; gap: 50px; width: 60%">
        <div style="font-weight: 700; text-align: center; width: 60%">
          Task Title
        </div>
        <div style="font-weight: 700; width: 10%">Task Start</div>
        <div style="font-weight: 700; width: 10%">Task End</div>
      </div>
      <div style="width: 40%"></div>
    </div>
    <div class="tasks">
      <Task :key="task.id" v-for="task in tasks" :task="task"></Task>
    </div>
    <TaskModal
      v-if="addTask"
      @close-modal="addTask = false"
      @updated-tasks="getAllTasks"
    ></TaskModal>
  </div>
</template>

<script>
import Task from "../components/Tasks/Task.vue";
import TaskModal from "../components/Tasks/TaskModal.vue";
import Button from "../components/Button.vue";

export default {
  name: "TaskView",
  data() {
    return {
      date: String,
      addTask: false,
      tasks: Array,
    };
  },
  created() {
    this.date = new Date(this.$route.params.date).toLocaleDateString("en-us", {
      month: "long",
      day: "numeric",
      year: "numeric",
    });

    this.getAllTasks();
  },
  methods: {
    addNewTask() {
      this.addTask = true;
    },
    getAllTasks() {
      let date = this.$route.params.date;
      date = date.split("-").join("/");

      axios.post("/day/get-tasks", { date: date }).then((response) => {
        this.tasks = response.data.tasks;
        console.log(this.tasks);
      });
    },
  },
  components: {
    Task,
    TaskModal,
    Button,
  },
};
</script>

<style scoped>
.container {
  display: flex;
  flex-direction: column;
  margin: 48px 128px;
  margin-bottom: 67px;
  flex-grow: 1;
}

.top {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 40px;
}

.date {
  color: var(--tph-text-highlight);
  font-size: 36px;
  font-weight: 600;
}

.tasks {
  display: flex;
  flex-direction: column;
  gap: 20px;
  width: 100%;
}

.headers {
  display: flex;
  width: 100%;
  margin-bottom: 10px;
}
</style>s
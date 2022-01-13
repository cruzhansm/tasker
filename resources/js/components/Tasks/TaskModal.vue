<template>
  <div class="modal">
    <div class="modal-container">
      <form class="modal-body" @submit="createTask">
        <span class="title">Add New Task</span>
        <Input type="text" :width="515" placeholder="Task Title" icon="none" />
        <Textarea
          :width="515"
          :height="150"
          :max="100"
          placeholder="Task description"
        ></Textarea>
        <Input
          type="text"
          :width="515"
          placeholder="Task Location"
          icon="none"
        />
        <div class="timepicker">
          <span class="from">FROM</span>
          <span class="until">UNTIL</span>
          <Input type="time" :width="250" icon="none" />
          <Input type="time" :width="250" icon="none" />
        </div>
        <div class="actions">
          <Button
            type="submit"
            :width="150"
            :height="49"
            color="var(--tph-highlight)"
            text="Save"
          ></Button>
          <Button
            type="button"
            :width="150"
            :height="49"
            color="var(--tph-tertiary)"
            text="Discard"
            @click="this.$emit('close-modal')"
          ></Button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import Input from "../Input.vue";
import Textarea from "../Textarea.vue";
import Button from "../Button.vue";

export default {
  name: "TaskModal",
  components: {
    Input,
    Textarea,
    Button,
  },
  methods: {
    createTask(e) {
      e.preventDefault();

      const data = Array.from(e.target.elements);

      const start = new Date(
        "1970-01-01T" + data[3].value + "Z"
      ).toLocaleTimeString("en-US", {
        timeZone: "UTC",
        hour12: true,
        hour: "numeric",
        minute: "numeric",
      });

      const end = new Date(
        "1970-01-01T" + data[4].value + "Z"
      ).toLocaleTimeString("en-US", {
        timeZone: "UTC",
        hour12: true,
        hour: "numeric",
        minute: "numeric",
      });

      let date = this.$route.params.date;

      date = date.split("-").join("/");

      const task = {
        title: data[0].value,
        description: data[1].value,
        location: data[2].value,
        start: start,
        end: end,
        date: date,
      };

      axios.post("/day/new-task", { task: task }).then((response) => {
        if (response.data.success) {
          alert("Task created");
          this.$emit('updated-tasks');
          this.$emit("close-modal");
        }
      });
    },
  },
};
</script>

<style scoped>
.modal {
  z-index: 99;
  height: 100vh;
  width: 100vw;
  position: absolute;
  top: 0;
  left: 0;
}

.modal-container {
  background-color: rgba(35, 50, 65, 0.75);
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
}

.modal-body {
  background-color: var(--tph-secondary);
  border-radius: 12px;
  display: flex;
  flex-direction: column;
  gap: 20px;
  width: max-content;
  height: max-content;
  padding: 36px 52px;
  position: relative;
}

.title {
  font-size: 36px;
  font-weight: 700;
}

.timepicker {
  display: flex;
  justify-content: space-between;
  position: relative;
}

.from {
  position: absolute;
  left: 150px;
  top: 12px;
  font-size: 14px;
  z-index: 99;
}

.until {
  position: absolute;
  right: 60px;
  top: 12px;
  font-size: 14px;
  z-index: 99;
}

.actions {
  margin-top: 20px;
  display: flex;
  gap: 20px;
}
</style>s
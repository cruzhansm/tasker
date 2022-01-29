<template>
  <div class="modal">
    <div class="modal-container">
      <form class="modal-body" @submit="execute">
        <span class="title">{{ title }}</span>
        <Input
          type="text"
          :width="515"
          placeholder="Task Title"
          icon="none"
          :value="task != null ? task.title : ''"
        />
        <Textarea
          :width="515"
          :height="150"
          :max="100"
          :value="text"
          placeholder="Task description"
          @update="updateText"
        ></Textarea>
        <Input
          type="text"
          :width="515"
          placeholder="Task Location"
          icon="none"
          :value="task != null ? task.location : ''"
        />
        <div class="timepicker">
          <span class="from">FROM</span>
          <span class="until">UNTIL</span>
          <Input
            type="time"
            :width="250"
            icon="none"
            :value="task != null ? convertStart : ''"
          />
          <Input
            type="time"
            :width="250"
            icon="none"
            :value="task != null ? convertEnd : ''"
          />
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
  data() {
    return {
      text: "",
    };
  },
  props: {
    title: String,
    task: null,
  },
  components: {
    Input,
    Textarea,
    Button,
  },
  methods: {
    updateDescription() {
      this.text = task.description;
    },
    updateText(text) {
      this.text = text;
      console.log(this.text);
    },
    execute(e) {
      e.preventDefault();

      this.task != null ? this.updateTask(e) : this.createTask(e);
    },
    createTask(e) {
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
          this.$emit("updated-tasks");
          this.$emit("close-modal");
        }
      });
    },
    updateTask(e) {
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
        id: this.task.id,
        title: data[0].value,
        description: data[1].value,
        location: data[2].value,
        start: start,
        end: end,
        date: date,
      };

      axios.post("/day/update-task", { task: task }).then((response) => {
        if (response.data.success) {
          alert("Task updated successfully!");
          this.$emit("updated-tasks");
          this.$emit("close-modal");
        } else {
          alert("Failed to update task. Please try again.");
        }
      });
    },
  },
  computed: {
    convertStart() {
      const raw = this.task.start.slice(0, this.task.start.length - 3);
      let time = new String();

      if (this.task.start[this.task.start.length - 2] == "A") {
        time = "0" + raw;
      } else {
        time = (parseInt(raw[0]) + 12).toString() + raw.slice(raw.length - 3);
      }

      return time;
    },
    convertEnd() {
      const raw = this.task.end.slice(0, this.task.end.length - 3);
      let time = new String();

      if (this.task.end[this.task.end.length - 2] == "A") {
        time = "0" + raw;
      } else {
        time = (parseInt(raw[0]) + 12).toString() + raw.slice(raw.length - 3);
      }

      return time;
    },
  },
  created() {
    if (this.task != null) {
      this.text = this.task.description;
    }
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
<template>
  <div>
    <Year :year="currentDate.year"></Year>
    <Month
      :date="formattedDate"
      @prev-month="prevMonth"
      @next-month="nextMonth"
    ></Month>
    <Dates :date="currentDate" @task-view="taskView"></Dates>
  </div>
</template>

<script>
import Dates from "./Dates.vue";
import Month from "./Month.vue";
import Year from "./Year.vue";

export default {
  name: "Calendar",
  components: {
    Dates,
    Month,
    Year,
  },
  data() {
    return {
      currentDate: Object,
      formattedDate: String,
    };
  },
  methods: {
    simplifiedDate() {
      const date = this.formattedDate.split("/").map((n) => parseInt(n));
      this.currentDate = {
        month: date[0],
        day: date[1],
        year: date[2],
      };
    },
    prevMonth() {
      let remain = this.formattedDate.split("/");
      const month =
        this.currentDate.month > 1
          ? parseInt(remain[0]) - 1
          : parseInt(remain[0]) + 11;
      const year =
        this.currentDate.month > 1 ? remain[2] : parseInt(remain[2]) - 1;

      remain = remain[1] + "/" + year.toString();
      this.formattedDate = month.toString() + "/" + remain;
      this.simplifiedDate();
    },
    nextMonth() {
      let remain = this.formattedDate.split("/");
      const month =
        this.currentDate.month < 12
          ? parseInt(remain[0]) + 1
          : parseInt(remain[0]) - 11;
      const year =
        this.currentDate.month < 12 ? remain[2] : parseInt(remain[2]) + 1;

      remain = remain[1] + "/" + year.toString();
      this.formattedDate = month.toString() + "/" + remain;
      this.simplifiedDate();
    },
    taskView(formatted) {
      this.$emit("task-view", formatted);
    },
  },
  created() {
    this.formattedDate = new Date(Date.now())
      .toLocaleDateString("en-us", {
        month: "numeric",
        day: "numeric",
        year: "numeric",
      })
      .toString();
    this.simplifiedDate();
    this.$emit("init", this.formattedDate);
  },
};
</script>

<style scoped>
</style>s
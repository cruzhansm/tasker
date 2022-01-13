<template>
  <div>
    <div class="days">
      <Day :key="index" v-for="(day, index) in days" :day="day"></Day>
    </div>
    <div class="dates" v-if="finishedLoading">
      <IDate
        :key="index"
        v-for="(df, index) in dates"
        :date="df"
        :fullDate="date"
        :tasks="tasks"
        @task-view="taskView"
      ></IDate>
    </div>
  </div>
</template>

<script>
import Day from "./Day.vue";
import IDate from "./Date.vue";

export default {
  name: "Dates",
  data() {
    return {
      days: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
      dates: Array,
      zellers: Number,
      tasks: Array,
      finishedLoading: false,
    };
  },
  props: {
    date: Object,
  },
  watch: {
    date: {
      handler() {
        this.zellersRule();
        this.createCalendar();
      },
      deep: true,
    },
  },
  methods: {
    zellersRule() {
      let m, year;

      if (this.date.month > 2) {
        m = this.date.month - 2;
        year = this.date.year;
      } else {
        m = this.date.month + 10;
        year = this.date.year - 1;
      }

      const k = 1;
      const d = year % 100;
      const c = parseInt(year.toString().slice(0, 2));

      let z = Math.floor(
        k +
          Math.floor((13 * m - 1) / 5) +
          d +
          Math.floor(d / 4) +
          Math.floor(c / 4) -
          Math.floor(2 * c)
      );

      z = z <= -1 ? (z % 7) + 7 : z % 7;
      this.zellers = z;
    },
    createCalendar() {
      const max =
        this.date.month == 2 ? 28 : 31 - (((this.date.month - 1) % 7) % 2);
      const limit = max + this.zellers;
      let days = new Array();

      for (let x = 1; x <= limit; x++) {
        x > this.zellers
          ? days.push({ active: true, day: x - this.zellers })
          : days.push({ active: false, day: x });
      }

      this.dates = days;
    },
    taskView(formatted) {
      this.$emit("task-view", formatted);
    },
    getAllTasks() {
      axios.post("/home/all-tasks").then((response) => {
        this.tasks = response.data.tasks;
        console.log(this.tasks);
        this.finishedLoading = true;
      });
    },
  },
  created() {
    this.zellersRule();
    this.createCalendar();
    this.getAllTasks();
  },
  components: {
    Day,
    IDate,
  },
};
</script>

<style scoped>
.days,
.dates {
  display: grid;
  grid-template-columns: repeat(7, 1fr);
  grid-template-rows: min-content 1fr min-content;
}

.days {
  text-align: center;
}
</style>
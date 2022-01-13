<template>
  <div>
    <i class="fa-solid fa-chevron-left" @click="this.$emit('prev-month')"></i>
    <span>{{ month }}</span>
    <i class="fa-solid fa-chevron-right" @click="this.$emit('next-month')"></i>
  </div>
</template>

<script>
export default {
  name: "Month",
  props: {
    date: String,
  },
  data() {
    return {
      month: String,
    };
  },
  watch: {
    date: {
      handler() {
        this.updateMonth();
      },
      deep: true,
    },
  },
  methods: {
    updateMonth() {
      this.month = new Date(this.date).toLocaleDateString("en-us", {
        month: "long",
      });
    },
  },
  created() {
    this.updateMonth();
  },
};
</script>

<style scoped>
div {
  display: flex;
  width: 100%;
  justify-content: space-evenly;
  align-items: center;
  margin-bottom: 48px;
}

span {
  font-size: 72px;
  font-weight: 700;
  line-height: 36px;
}

i {
  font-size: 36px;
  cursor: pointer;
}
</style>
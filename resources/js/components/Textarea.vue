<template>
  <div>
    <textarea
      cols="30"
      rows="10"
      id="addTaskText"
      :style="{ width: width + 'px', height: height + 'px' }"
      :placeholder="placeholder"
      :maxlength="max"
      :value="value != null ? value : ''"
      @input="updateCount"
    ></textarea>
    <div class="count">
      <span>{{ charCount }}</span>
      <span> / </span>
      <span>{{ max }}</span>
    </div>
  </div>
</template>

<script>
export default {
  name: "Textarea",
  props: {
    max: Number,
    width: Number,
    height: Number,
    placeholder: String,
    value: null,
  },
  data() {
    return {
      charCount: 0,
    };
  },
  methods: {
    updateCount() {
      const text = document.querySelector("#addTaskText").value;
      const length = text.length;
      this.charCount = length;
      this.$emit("update", text);
    },
  },
};
</script>

<style scoped>
div {
  position: relative;
}

textarea,
textarea:focus-visible {
  background-color: var(--tph-tertiary);
  border-radius: 12px;
  border: 0;
  outline: 0;
  resize: none;
  font-family: "Poppins", sans-serif;
  padding: 10px 20px;
}

.count {
  position: absolute;
  font-size: 14px;
  bottom: 15px;
  right: 15px;
}
</style>
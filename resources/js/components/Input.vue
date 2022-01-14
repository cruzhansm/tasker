<template>
  <div class="input">
    <i :class="icon" :style="{ top: '12.5px' }"></i>
    <input
      :type="type"
      :class="icon == 'none' ? 'no-icon' : ''"
      :style="getStyle"
      :placeholder="placeholder"
      :value="value != null ? value : ''"
    />
  </div>
</template>

<script>
export default {
  name: "Input",
  props: {
    icon: String,
    type: String,
    width: Number,
    placeholder: String,
    value: null,
  },
  computed: {
    getStyle() {
      return `width: ${this.width}px; height: 45px;`;
    },
  },
};
</script>

<style scoped>
.input {
  position: relative;
}

.no-icon,
.no-icon:focus,
.no-icon:active,
.no-icon:focus-visible {
  padding-left: 20px;
}

i {
  color: var(--tph-text-primary);
  position: absolute;
  left: 20px;
  font-size: 20px;
}

input,
input:focus,
input:active,
input:focus-visible {
  background-color: var(--tph-tertiary);
  border: 0;
  border-radius: 73px;
  color: var(--tph-text-primary);
  padding: 10px 20px;
  padding-left: 48px;
  font-size: 18px;
  outline: 0;
  font-family: "Poppins", sans-serif;
}
</style>
<template>
  <div class="main" :style="isThrough ? { paddingTop: '67px' } : ''">
    <Header v-if="determinePage"></Header>
    <router-view></router-view>
    <!-- <router-link :to="{ name: 'Login' }">Terst</router-link> -->
  </div>
</template>

<script>
import Header from "./components/Header/Header.vue";

export default {
  name: "App",
  data() {
    return {
      isThrough: {
        type: Boolean,
        default: true,
      },
    };
  },
  components: {
    Header,
  },
  computed: {
    determinePage() {
      if (this.$route.name == "Login" || this.$route.name == "Signup") {
        this.isThrough = false;
        return false;
      } else {
        this.isThrough = true;
        return true;
      }
    },
  },
};
</script>

<style>
* {
  box-sizing: border-box;
  color: var(--tph-text-primary);
  font-size: 18px;
}

a,
a:visited {
  text-decoration: none;
}

.main {
  min-height: 100vh;
  width: 100%;
  display: flex;
  flex-direction: column;
}

:root {
  --tph-primary: #122333 !important;
  --tph-text-primary: #ffffff !important;
  --tph-secondary: #162738 !important;
  --tph-text-secondary: #64798b;
  --tph-tertiary: #21374a !important;
  --tph-highlight: #2eac68 !important;
  --tph-text-highlight: #2cad69 !important;
  --tph-button-hover: #2dd67b !important;
  --placeholder: #c4c4c4 !important;
  --input: #b9c8d3 !important;
}

::-webkit-scrollbar {
  width: 10px;
}

::-webkit-scrollbar-thumb {
  background-color: var(--tph-tertiary);
  border-radius: 12px;
}

::-webkit-scrollbar-thumb:hover {
  background-color: var(--tph-highlight);
}
</style>
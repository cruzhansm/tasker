<template>
  <div class="container">
    <div class="login">
      <h1>Login to Tasker</h1>
      <Input
        icon="fa-solid fa-user"
        type="text"
        :width="324"
        placeholder="username"
        v-on:input="updateUsername"
      ></Input>
      <Input
        icon="fa-solid fa-lock"
        type="password"
        :width="324"
        placeholder="password"
        v-on:input="updatePassword"
      ></Input>
      <Button
        type="submit"
        text="LOG IN"
        color="var(--tph-highlight)"
        :width="324"
        :height="48"
        :onclick="login"
      ></Button>
      <span style="margin-top: 24px"
        >Don't have an account?
        <router-link :to="{ name: 'Signup' }" class="sign-up"
          >Sign up</router-link
        ></span
      >
    </div>
  </div>
</template>

<script>
import Input from "../components/Input.vue";
import Button from "../components/Button.vue";

export default {
  name: "Home",
  components: {
    Input,
    Button,
  },
  data() {
    return {
      username: String,
      password: String,
    };
  },
  methods: {
    updateUsername(e) {
      this.username = e.target.value;
    },
    updatePassword(e) {
      this.password = e.target.value;
    },
    login(e) {
      e.preventDefault();

      const user = {
        username: this.username,
        password: this.password,
      };

      axios.post("/login/auth", { user: user }).then((response) => {
        if (response.data.success) {
          alert("Logging in...");
          this.$router.push({ name: "Home" });
        } else {
          alert(response.data.error);
        }
      });
    },
  },
};
</script>

<style scoped>
h1 {
  margin: 0;
  font-size: 32px;
  color: var(--tph-text-primary);
  font-weight: 700;
  margin-bottom: 24px;
}

.sign-up {
  color: var(--tph-text-highlight);
  text-decoration: none;
}

.container {
  height: 100%;
  display: flex;
  align-items: center;
  flex-grow: 1;
}

.login {
  background-color: var(--tph-secondary);
  border-radius: 12px;
  box-shadow: -2px -2px 47px -3px rgba(0, 0, 0, 0.25);
  display: flex;
  flex-direction: column;
  align-items: center;
  padding-top: 256px;
  gap: 24px;
  width: 460px;
  padding: 67px 24px;
  margin-left: auto;
  margin-right: 230px;
  height: 500px;
}
</style>
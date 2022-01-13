<template>
  <div class="container">
    <form class="signup" @submit="createUser">
      <h1>Create Account</h1>
      <Input
        icon="fa-solid fa-user"
        type="text"
        :width="324"
        placeholder="username"
        v-on:input="updateUsername"
      ></Input>
      <Input
        icon="fa-solid fa-user"
        type="text"
        :width="324"
        placeholder="first name"
        v-on:input="updateFname"
      ></Input>
      <Input
        icon="fa-solid fa-user"
        type="text"
        :width="324"
        placeholder="last name"
        v-on:input="updateLname"
      ></Input>
      <Input
        icon="fa-solid fa-lock"
        type="password"
        :width="324"
        placeholder="password"
        v-on:input="updatePass"
      ></Input>
      <Input
        icon="fa-solid fa-lock"
        type="password"
        :width="324"
        placeholder="confirm password"
        v-on:input="updateCPass"
      ></Input>
      <Button
        type="submit"
        text="SIGN UP"
        color="var(--tph-highlight)"
        :width="324"
        :height="48"
      ></Button>
      <span style="font-size: 14px; text-align: center; width: 80%"
        >By signing up, you agree to Tasker's Terms of Service and Privacy
        Policy</span
      >
      <span style="margin-top: 24px"
        >Already have an account?
        <router-link :to="{ name: 'Login' }" class="login"
          >Log in</router-link
        ></span
      >
    </form>
  </div>
</template>

<script>
import Input from "../components/Input.vue";
import Button from "../components/Button.vue";

export default {
  name: "Signup",
  data() {
    return {
      username: String,
      fname: String,
      lname: String,
      password: String,
      cpassword: String,
    };
  },
  components: {
    Input,
    Button,
  },
  methods: {
    createUser(event) {
      event.preventDefault();

      const user = {
        username: this.username,
        fname: this.fname,
        lname: this.lname,
        password: this.password,
        cpassword: this.cpassword,
      };

      console.log(user);

      axios.post("/signup/register", { user: user }).then((response) => {
        if (response.data.success) {
          alert("Account successfully created!");
          this.$router.push({ name: "Login" });
        } else {
          alert("Account already exists! Try again.");
        }
      });
    },
    updateUsername(e) {
      this.username = e.target.value;
    },
    updateFname(e) {
      this.fname = e.target.value;
    },
    updateLname(e) {
      this.lname = e.target.value;
    },
    updatePass(e) {
      this.password = e.target.value;
    },
    updateCPass(e) {
      this.cpassword = e.target.value;
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

.login {
  color: var(--tph-text-highlight);
  text-decoration: none;
}

.container {
  height: 100%;
  display: flex;
  align-items: center;
  flex-grow: 1;
}

.signup {
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
}
</style>
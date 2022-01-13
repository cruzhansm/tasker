require("./bootstrap");

import * as Vue from "vue";
import { router } from "./router.js";

import App from "./App.vue";

const app = Vue.createApp(App);

app.use(router);
app.mount("#app");

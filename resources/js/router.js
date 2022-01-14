import { createRouter, createWebHistory } from "vue-router";

import Home from "./routes/Home.vue";
import Login from "./routes/Login.vue";
import Signup from "./routes/Signup.vue";
import Tasks from "./routes/Tasks.vue";
import Schedule from "./routes/Schedule.vue";
import About from "./routes/About.vue";
import Task from "./routes/TaskView.vue";

const routes = [
    {
        path: "/",
        name: "Home",
        component: Home,
    },
    {
        path: "/login",
        name: "Login",
        component: Login,
    },
    {
        path: "/signup",
        name: "Signup",
        component: Signup,
    },
    {
        path: "/mytasks",
        name: "My Tasks",
        component: Tasks,
    },
    {
        path: "/schedule",
        name: "My Schedule",
        component: Schedule,
    },
    {
        path: "/about",
        name: "About",
        component: About,
    },
    {
        path: "/day/:date",
        name: "Task View",
        component: Task,
    },
];

export const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

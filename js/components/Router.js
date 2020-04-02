import TheSplashComponent from "./TheSplashComponent.js";
import TheAddUserForm from "./TheAddUserForm.js";

const routes = [
    { path: "/", name: "home", component: TheSplashComponent },
    { path: "/addUser", name: "add_user", component: TheAddUserForm }
]

const router = new VueRouter({
    routes
})

export default router;
import {createRouter, createWebHistory} from 'vue-router'
import routes from "./routes";
import store from "../store";

const router = createRouter({
    history: createWebHistory(), routes: routes
})

router.beforeEach((to, from, next) => {
    const token = store.state.token

    if (!token) {
        // if (to.name === 'user.login' || to.name === 'user.register') {
        //     return next()
        // } else {
        //     return next({
        //         name: 'user.login'
        //     })
        // }
    }

    if ((to.name === 'user.login' || to.name === 'user.register') && token) {
        return next({
            name: 'pages.home'
        })
    }
    next()
})

export default router

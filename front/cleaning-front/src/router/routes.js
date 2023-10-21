const routes = [
    {
        path: '/home',
        name: 'pages.home',
        component: () => import("../components/pages/Home.vue")
    },
    {
        path: '/services',
        name: 'pages.services',
        component: () => import("../components/pages/Services.vue")
    },
    {
        path: '/join',
        name: 'pages.join',
        component: () => import("../components/pages/Join.vue")
    },
    {
        path: '/contact',
        name: 'pages.contact',
        component: () => import("../components/pages/Contact.vue")
    },
    {
        path: '/login',
        component: () => import("../Components/auth/Login.vue"),
        name: 'user.login'
    },
    {
        path: '/register',
        component: () => import("../Components/auth/Register.vue"),
        name: 'user.register'
    },
]

export default routes
export default [
    {
        path: '/',
        name: 'Home',
        component: () => import('./Home'),
        meta: {
            title: 'Login'
        }
    },
    {
        path: '/login',
        name: 'Login',
        component: () => import('./pages/Login'),
        meta: {
            title: 'Login'
        }
    },
    {
        path: '/register',
        name: 'Register',
        component: () => import('./pages/Register'),
        meta: {
            title: 'Register'
        }
    },
];

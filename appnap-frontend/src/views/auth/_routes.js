export default [
    {
        path: '/',
        name: 'Home',
        component: () => import('./pages/Home'),
        meta: {
            title: 'Home'
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
    {
        path: '/single-product',
        name: 'SingleProduct',
        component: () => import('./pages/SingleProduct'),
        meta: {
            title: 'Single Product'
        }
    },
];

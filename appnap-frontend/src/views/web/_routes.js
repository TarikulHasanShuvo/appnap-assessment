
const webRoutes = [
    {
        path: '/products',
        name: 'Products',
        component: () => import('./pages/products/Products'),
        meta: {
            title: 'Products'
        }
    },
];

export default webRoutes;

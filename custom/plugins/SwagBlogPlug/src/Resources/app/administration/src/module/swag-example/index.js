Shopware.Module.register('swag-blog-plug', {
    type: 'plugin',
    name: 'swag-blog-plug',

    routes: {
        index: {
            component: 'sw-dashboard-index', // existing core component
            path: 'index'
        }
    },

    navigation: [{
        parent: 'sw-content',      // show under Content
        label: 'Blog Plug',
        path: 'swag-blog-plug.index',  // MUST match module name
        icon: 'regular-shopping-bag',
        position: 100
    }]
});

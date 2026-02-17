Shopware.Module.register('blog', {
    type: 'plugin',
    name: 'swag-blog-plug',
    title: 'yexample title', 

    // routes: {
    //     index: {
    //         component: 'sw-dashboard-index',
    //         path: 'index'
    //     }
    // },

    navigation: [{
        parent: 'sw-content',     
        label: 'Blog Plug',
        path: 'swag-blog-plug.index',  
        icon: 'regular-shopping-bag',
        position: 100
    }]
});

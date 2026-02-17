console.log("Blog module initialization started");

import './page/blog-list';

console.log("blog-list page imported");

Shopware.Module.register('blog', {
    type: 'plugin',
    name: 'swag-blog-plug',
    title: 'example title', 
    description: 'example description',

    routes: {
        list: {
            component: 'blog-list',
            path: 'list'
        },
    },

    navigation: [{
        parent: 'sw-content',     
        label: 'Blog',
        path: 'blog.list',  
        icon: 'regular-shopping-bag',
        position: 100
    }]
});

alert("Blog module registered successfully");

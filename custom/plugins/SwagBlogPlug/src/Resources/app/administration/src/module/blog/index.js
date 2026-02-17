// console.log("Blog module initialization started");
import './page/blog-list';
import './page/blog-detail';
import './page/blog-create';

// console.log("blog-list page imported");

Shopware.Module.register('sw-blog', {
    type: 'plugin',

    name: 'Blog',
    title: 'Blog',
    description: 'Blog module',

    color: '#57D9A3',
    icon: 'default-documentation-file',

    routes: {
        list: {
            component: 'blog-list',
            path: 'list',
        },

        detail: {
            component: 'blog-detail',
            path: 'detail/:id',
            meta: {
                parentPath: 'sw.blog.list'
            }
        },

        create: {
            component: 'blog-create',
            path: 'create',
            meta: {
                parentPath: 'sw.blog.list'
            }
        }
    },

        navigation: [{
            id: 'blog',
            label: 'Blog',
            color: '#57D9A3',
            path: 'sw.blog.list',
            icon: 'default-documentation-file',
            parent: 'sw-content',
            position: 100
        }]
});



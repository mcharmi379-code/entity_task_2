// alert("Blog category module registered successfully");
import './page/blog-category-list';
import './page/blog-category-detail';
import './page/blog-category-create';

console.log("Blog category module initialization started");

Shopware.Module.register('sw-blogcategory', {
   type: 'plugin',

    name: 'Blog category',
    title: 'Blog category',
    description: 'Blog category module',

    color: '#57D9A3',
    icon: 'default-documentation-file',

    routes: {
        list: {
            component: 'blog-category-list',    
            path: 'list',
            },

            detail: {
                component: 'blog-category-detail',
                path: 'detail/:id',
                meta: {
                    parentPath: 'sw.blogcategory.list'
                }
            },

            create: {
                component: 'blog-category-create',
                path: 'create',
                meta: {
                    parentPath: 'sw.blogcategory.list'
                }
            }
    },

        navigation: [{
            id: 'blog-category',
            label: 'Blog category',
            color: '#57D9A3',
            path: 'sw.blogcategory.list',
            icon: 'default-documentation-file',
            parent: 'sw-content',
            position: 100
        }]

});
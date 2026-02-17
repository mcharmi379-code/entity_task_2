// import template from './blog-create.html.twig';
// console.log("blog-create page initialization started");
// Shopware.Component.register('blog-create', {
//     template
// });
import template from './blog-create.html.twig';

const { Component } = Shopware;

Component.register('blog-create', {
    template,

    inject: ['repositoryFactory'],

    data() {
        return {
            blog: null,
            repository: null,
            categoryRepository: null,
            isLoading: false
        };
    },

    created() {
        this.repository = this.repositoryFactory.create('swag_blog');
        this.categoryRepository = this.repositoryFactory.create('swag_blog_category');

        this.blog = this.repository.create(Shopware.Context.api);
    },

    methods: {
        onSave() {
            console.log('Saving entity payload:', this.blog);
            this.isLoading = true;

            this.repository.save(this.blog, Shopware.Context.api).then(() => {
                this.$router.push({ name: 'swag.blog.list' });
            });
        }
    }
});

// import template from './blog-category-detail.html.twig';
// Shopware.Component.register('blog-category-detail', {
//     template 
// });
import template from './blog-category-detail.html.twig';

const { Component, Mixin } = Shopware;

Component.register('blog-category-detail', {
    template,
    inject: ['repositoryFactory'],

    mixins: [
        Mixin.getByName('notification')
    ],

    data() {
        return {
            repository: null,
            blogCategory: null,
            isLoading: false
        };
    },

    created() {
        this.repository = this.repositoryFactory.create('swag_blog_category');
        this.loadEntity();
    },
    methods: {
        loadEntity() {
            this.isLoading = true;

            this.repository.get(
                this.$route.params.id,
                Shopware.Context.api
            ).then((entity) => {
                this.blogCategory = entity;
                this.isLoading = false;
            });
        },

        onSave() {
            this.isLoading = true;

            this.repository.save(this.blogCategory, Shopware.Context.api)
                .then(() => {
                    this.createNotificationSuccess({
                        message: 'Category updated successfully'
                    });
                    this.isLoading = false;
                })
                .catch(() => {
                    this.isLoading = false;
                });
        }
    }
});

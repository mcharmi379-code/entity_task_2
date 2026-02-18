import template from './blog-create.html.twig';

const { Component, Mixin } = Shopware;
const { Criteria } = Shopware.Data;

Component.register('blog-create', {
    template,

    inject: ['repositoryFactory'],

    mixins: [
        Mixin.getByName('notification')
    ],

    data() {
        return {
            blog: null,
            repository: null,
            isLoading: false
        };
    },

    created() {
        this.repository = this.repositoryFactory.create('swag_blog');

        if (this.$route.params.id) {
            this.loadEntity();
        } else {
            this.blog = this.repository.create(Shopware.Context.api);
            this.blog.active = true;
        }
    },

    methods: {
        loadEntity() {
            this.isLoading = true;

            this.repository
                .get(this.$route.params.id, Shopware.Context.api)
                .then((entity) => {
                    this.blog = entity;
                    this.isLoading = false;
                });
        },

        onSave() {
              if (!this.blog.name || this.blog.name.trim() === '') {
                this.createNotificationError({
                    message: 'Name is required'
                });
                return;
            }
            if (!this.blog.description || this.blog.description.trim() === '') {
                this.createNotificationError({
                    message: 'Description is required'
                });
                return;
            }
            if (!this.blog.releaseDate || this.blog.releaseDate.trim() === '') {
                this.createNotificationError({
                    message: 'Release Date is required'
                });
                return;
            }
            if (!this.blog.swagBlogCategoryId) {
                this.createNotificationError({
                    message: 'Category is required'
                });
                return;
            }
            if (!this.blog.products || this.blog.products.length === 0) {
                this.createNotificationError({
                    message: 'At least one product must be selected'
                });
                return;
            }
            this.isLoading = true;

            this.repository
                .save(this.blog, Shopware.Context.api)
                .then(() => {
                    this.createNotificationSuccess({
                        message: 'Blog saved successfully'
                    });

                    this.$router.push({ name: 'sw.blog.list' });
                })
                .catch(() => {
                    this.createNotificationError({
                        message: 'Error while saving blog'
                    });
                })
                .finally(() => {
                    this.isLoading = false;
                });
        }
    }
});

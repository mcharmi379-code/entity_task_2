import template from './blog-category-create.html.twig';

const { Component, Mixin } = Shopware;

Component.register('blog-category-create', {
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

        if (this.$route.params.id) {
            this.loadEntity();
        } else {
            this.blogCategory = this.repository.create(Shopware.Context.api);
        }
    },

    methods: {
        loadEntity() {
            this.isLoading = true;

            this.repository
                .get(this.$route.params.id, Shopware.Context.api)
                .then((entity) => {
                    this.blogCategory = entity;
                    this.isLoading = false;
                });
        },
        onSave() {
            if (!this.blogCategory.name || this.blogCategory.name.trim() === '') {
                this.createNotificationError({
                    message: 'Name is required'
                });
                return;
            }
            this.isLoading = true;

            this.repository
                .save(this.blogCategory, Shopware.Context.api)
                .then(() => {
                    this.createNotificationSuccess({
                        message: 'Category saved successfully'
                    });

                    this.$router.push({
                        name: 'sw.blogcategory.list'
                    });
                })
                .catch(() => {
                    this.createNotificationError({
                        message: 'Error while saving category'
                    });
                })
                .finally(() => {
                    this.isLoading = false;
                });
        }
    }
});

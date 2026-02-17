import template from './blog-category-list.html.twig';
// Shopware.Component.register('blog-category-list', {
//     template 
// });
const { Component, Mixin } = Shopware;
const { Criteria } = Shopware.Data;

Component.register('blog-category-list', {
    template,

    inject: ['repositoryFactory'],

    mixins: [
        Mixin.getByName('listing')
    ],

    data() {
        return {
            repository: null,
            blogCategories: null,
            isLoading: false,
        };
    },

    created() {
        this.repository = this.repositoryFactory.create('swag_blog_category');
        this.getList();
    },

    methods: {
        getList() {
            this.isLoading = true;

            const criteria = new Criteria();
            criteria.addAssociation('translations');

            this.repository.search(criteria, Shopware.Context.api)
                .then((result) => {
                    this.blogCategories = result;
                    this.isLoading = false;
                });
        },

        onDelete(id) {
            this.repository.delete(id, Shopware.Context.api)
                .then(() => {
                    this.getList();
                });
        }
    }
});
import template from './blog-category-list.html.twig';

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
            total: 0,
            isLoading: false
        };
    },

    metaInfo() {
        return {
            title: 'Blog Category Listing'
        };
    },

    created() {
        this.repository = this.repositoryFactory.create('swag_blog_category');
        this.getList();
    },

    methods: {
        getList() {
            this.isLoading = true;

            const criteria = new Criteria(this.page, this.limit);

            criteria.addAssociation('translations');

            criteria.addSorting(
                Criteria.sort(this.sortBy || 'createdAt', this.sortDirection || 'DESC')
            );

            this.repository.search(criteria, Shopware.Context.api)
                .then((result) => {
                    this.blogCategories = result;
                    this.total = result.total;
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
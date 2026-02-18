import template from './blog-list.html.twig';

const { Component, Mixin } = Shopware;
const { Criteria } = Shopware.Data;

Component.register('blog-list', {
    template,

    inject: ['repositoryFactory'],

    mixins: [
        Mixin.getByName('listing')
    ],

    data() {
        return {
            repository: null,
            blogs: null,
            total: 0,
            isLoading: false
        };
    },

    metaInfo() {
        return {
            title: 'Blog Listing'
        };
    },

    created() {
        this.repository = this.repositoryFactory.create('swag_blog');
        this.getList();
    },

    methods: {
        getList() {
            this.isLoading = true;

            const criteria = new Criteria(this.page, this.limit);
            criteria.addAssociation('swagBlogCategory');

            this.repository.search(criteria, Shopware.Context.api).then((result) => {
                this.blogs = result;
                this.total = result.total;
                this.isLoading = false;
            });
        },

        onDelete(id) {
            this.repository.delete(id, Shopware.Context.api).then(() => {
                this.getList();
            });
        }
    }
});

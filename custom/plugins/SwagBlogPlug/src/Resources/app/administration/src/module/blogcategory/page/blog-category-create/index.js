// import template from './blog-category-create.html.twig';
// Shopware.Component.register('blog-category-create', {
//     template 
// });
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

        // this.repository = this.repositoryFactory.create('swag_blog_category');

        const context = { ...Shopware.Context.api };
        context.languageId = Shopware.State.get('context').api.languageId;

        this.blogCategory = this.blogCategoryRepository.create(context);

        console.log('LanguageId used:', context.languageId);
        console.log('Created entity:', this.blogCategory);
    },

    mounted() {
        console.log('blog-category-create component loaded', this.blogCategory);
    },
    methods: {
       onSave() {
            this.isLoading = true;

            console.log('Saving entity payload:', this.blogCategory);

            this.blogCategoryRepository.save(this.blogCategory, Shopware.Context.api)
                .then(() => {
                    this.createNotificationSuccess({
                        message: 'Category created successfully'
                    });

                    this.$router.push({
                        name: 'sw.blogcategory.list'
                    });
                })
                .catch((error) => {
                    console.error('Save failed:', error);
                })
                .finally(() => {
                    this.isLoading = false;
                });
        }

    },
    computed : {
        blogCategoryRepository() {
            return this.repositoryFactory.create('swag_blog_category');
        },
    }
});

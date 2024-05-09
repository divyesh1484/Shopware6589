import template from './ict-blog-create.html.twig';

/**
 * @package checkout
 */

const { mapPropertyErrors } = Shopware.Component.getComponentHelper();
const { ShopwareError } = Shopware.Classes;
const { Mixin } = Shopware;
const { Criteria } = Shopware.Data;

export default {
    template,

    inject: [
        'repositoryFactory',
    ],

    mixins: [
        Mixin.getByName('notification'),
    ],

    data() {
        return {
            blog: null,
            isSaveSuccessful: false,
            isLoading: false,
        };
    },

    computed: {
        blogRepository() {
            return this.repositoryFactory.create('ict_blog');
        },
        productRepository() {
            return this.repositoryFactory.create('product');
        },
    },

    created() {
        this.createdComponent();
    },

    methods: {
        async createdComponent() {;

            this.blog = this.blogRepository.create(Shopware.Context.api);
        },

        saveFinish() {
            this.isSaveSuccessful = false;
            this.$router.push({ name: 'ict.blog.detail', params: { id: this.blog.id } });
        },

        onSave() {
            this.isLoading = true;
            this.isSaveSuccessful = false;
            console.log(this.blog);
            return this.blogRepository.save(this.blog, Shopware.Context.api).then((response) => {

                this.isLoading = false;
                this.isSaveSuccessful = true;
                return response;
            }).catch(() => {
                this.createNotificationError({
                    message: this.$tc('Customer could not be saved.'),
                });
                this.isLoading = false;
            });
        },

    },
};

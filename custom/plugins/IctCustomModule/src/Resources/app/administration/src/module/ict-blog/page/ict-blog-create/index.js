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
            errorClass:null,
        };
    },

    computed: {
        blogRepository() {
            return this.repositoryFactory.create('ict_blog');
        },
        productRepository() {
            return this.repositoryFactory.create('product');
        },
        isTitleRequired() {
            return Shopware.State.getters['context/isSystemDefaultLanguage'];
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
        onInputRemoveClass(){
            if (this.blog.name){
                this.errorClass = "";
            }
        },
        onSave() {
            this.isLoading = true;
            this.isSaveSuccessful = false;
            if (!this.blog.name){
                this.createNotificationError({
                    message: this.$tc('Please fill in all required fields.'),
                });
                this.isLoading = false;
                this.errorClass = "has--error";
                return new Promise((resolve) => {
                    resolve();
                });
            }

            return this.blogRepository.save(this.blog, Shopware.Context.api).then((response) => {
                this.isLoading = false;
                this.isSaveSuccessful = true;
                this.createNotificationSuccess({
                    message: this.$tc('Blog has been saved.'),
                });
            }).catch(() => {
                this.createNotificationError({
                    message: this.$tc('Blog could not be saved.'),
                });
                this.isLoading = false;
            });
        },

    },
};

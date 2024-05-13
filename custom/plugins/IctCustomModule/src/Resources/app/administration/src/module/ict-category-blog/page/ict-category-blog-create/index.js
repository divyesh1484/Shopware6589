import template from './ict-category-blog-create.html.twig';

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
            category: null,
            isSaveSuccessful: false,
            isLoading: false,
            errorClass:null,
        };
    },

    computed: {
        categoryRepository() {
            return this.repositoryFactory.create('ict_category');
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
            this.category = this.categoryRepository.create(Shopware.Context.api);
        },

        saveFinish() {
            this.isSaveSuccessful = false;
            this.$router.push({ name: 'ict.category.blog.detail', params: { id: this.category.id } });
        },
        onInputRemoveClass(){
            if (this.category.name){
                this.errorClass = "";
            }
        },
        onSave() {
            this.isLoading = true;
            this.isSaveSuccessful = false;
            if (!this.category.name){
                this.createNotificationError({
                    message: this.$tc('Please fill in all required fields.'),
                });
                this.isLoading = false;
                this.errorClass = "has--error";
                return new Promise((resolve) => {
                    resolve();
                });
            }

            return this.categoryRepository.save(this.category, Shopware.Context.api).then((response) => {
                this.isLoading = false;
                this.isSaveSuccessful = true;
                this.createNotificationSuccess({
                    message: this.$tc('Category has been saved.'),
                })
            }).catch((exception) => {
                this.createNotificationError({
                    message: this.$tc('Category could not be saved.'),
                });
                this.isLoading = false;
                throw exception;
            });
        },

    },
};

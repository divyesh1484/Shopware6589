import template from './ict-category-blog-detail.html.twig';

const { Context, Mixin } = Shopware;
const { Criteria, ChangesetGenerator } = Shopware.Data;

export default{
    template,

    inject: [
        'repositoryFactory',
    ],

    mixins: [
        Mixin.getByName('notification'),
        Mixin.getByName('placeholder'),
    ],
    props: {
        categoryId: {
            type: String,
            required: true,
        },
    },
    data() {
        return {
            isLoading: false,
            isSaveSuccessful: false,
            category: null,
            sortDirection: 'DESC',
        };
    },
    computed: {
        categoryRepository() {
            return this.repositoryFactory.create('ict_category');
        },
        editMode: {
            get() {
                if (typeof this.$route.query.edit === 'boolean') {
                    return this.$route.query.edit;
                }

                return this.$route.query.edit === 'true';
            },
            set(editMode) {
                this.$router.push({ name: this.$route.name, query: { edit: editMode } });
            },
        },

        generalRoute() {
            return {
                name: 'ict.category.blog.detail.base',
                params: { id: this.categoryId },
                query: { edit: this.editMode },
            };
        },
    },
    watch: {
        categoryId() {
            this.createdComponent();
        },
    },
    created() {
        this.createdComponent();
    },
    methods:{
        async loadCategory() {

            Shopware.ExtensionAPI.publishData({
                id: 'ict-category-blog-detail__blog',
                path: 'category',
                scope: this,
            });
            this.isLoading = true;

            this.categoryRepository.get(
                this.categoryId,
                Shopware.Context.api,
                this.defaultCriteria,
            ).then((category) => {
                this.category = category;
                this.isLoading = false;
            });
        },

        async createdComponent() {
            await this.loadCategory();
        },

        saveFinish() {
            this.isSaveSuccessful = false;
            this.editMode = false;
            this.createdComponent();
            this.isLoading = false;
        },

        async onSave() {
            this.isLoading = true;
            this.isSaveSuccessful = false;

            return this.categoryRepository.save(this.category).then(() => {
                this.isSaveSuccessful = true;
                this.createNotificationSuccess({
                    message: this.$tc('Category has been saved.'),
                });
            }).catch((exception) => {
                this.createNotificationError({
                    message: this.$tc('Category could not be saved.'),
                });
                this.isLoading = false;
                throw exception;
            });
        },
    }
};
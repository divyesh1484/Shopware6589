import template from './ict-blog-detail.html.twig';

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
        blogId: {
            type: String,
            required: true,
        },
    },
    data() {
        return {
            isLoading: false,
            isSaveSuccessful: false,
            blog: null,
            errorClass:null,
        };
    },
    computed: {
        blogRepository() {
            return this.repositoryFactory.create('ict_blog');
        },
        productRepository() {
            return this.repositoryFactory.create('products');
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
    },
    watch: {
        blogId() {
            this.createdComponent();
        },
    },
    created() {
        this.createdComponent();
    },
    methods:{
        onInputRemoveClass(){
            if (this.blog.name){
                this.errorClass = "";
            }
        },
        async loadBlog() {
            // Shopware.ExtensionAPI.publishData({
            //     id: 'ict-blog-detail__blog',
            //     path: 'blog',
            //     scope: this,
            // });
            this.isLoading = true;
            const criteria = new Criteria();
            criteria.addAssociation('products');
            this.blogRepository.get(
                this.blogId,
                Shopware.Context.api,
                criteria,
            ).then((blog) => {
                this.blog = blog;
                this.isLoading = false;
            });
        },

        async createdComponent() {
            await this.loadBlog();
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

            return this.blogRepository.save(this.blog).then(() => {
                this.isSaveSuccessful = true;
                this.createNotificationSuccess({
                    message: this.$tc('Blog has been saved.'),
                });
            }).catch((exception) => {
                this.createNotificationError({
                    message: this.$tc('Blog could not be saved.'),
                });
                this.isLoading = false;
                throw exception;
            });
        },
    }
};
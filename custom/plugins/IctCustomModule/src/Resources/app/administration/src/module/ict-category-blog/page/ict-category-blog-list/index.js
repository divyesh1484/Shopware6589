import template from './ict-category-blog-list.html.twig';

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
            total: 0,
            categories:null,
            repository: null,
        }
    },

    created() {
        this.getCategories()
    },

    computed: {
        CategoryColumns(){
            return [
                {
                    property: 'id',  // column property
                    dataIndex: 'categoryId',
                    label: 'Id', // column label (snippets used for labels)
                    allowResize: true,
                    sortable: false,
                },
                {
                    property: 'name',  // column property
                    dataIndex: 'categoryName',
                    label: 'Name', // column label (snippets used for labels)
                    routerLink: 'ict.category.blog.detail',
                    inlineEdit: 'string',
                    allowResize: true,
                    sortable: false,
                },
            ]
        }
    },
    methods: {
        getCategories : function () {
            const criteria = new Criteria();
            this.repository = this.repositoryFactory.create('ict_category');
            this.repository.search(criteria, Shopware.Context.api).then((result) =>{
                this.categories = result;
                this.total = result.total;
            })
        }
    }
};
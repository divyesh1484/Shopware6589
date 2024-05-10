import template from './ict-blog-list.html.twig';

const { Mixin } = Shopware;
const { Criteria } = Shopware.Data;

export default{
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
            blogs:null,
            repository: null,

        }
    },
    created() {
        this.getBlogs()
    },
    computed: {
        BlogColumns(){
            return [
                {
                    property: 'name',  // column property
                    dataIndex: 'blogName',
                    label: 'Name', // column label (snippets used for labels)
                    routerLink: 'ict.blog.detail',
                    inlineEdit: 'string',
                    allowResize: true,
                    sortable: false,
                },
                {
                    property: 'description',
                    dataIndex: 'description',
                    label: 'Description',
                    allowResize: true,
                    sortable: false
                },
                {
                    property: 'releaseDate',
                    dataIndex: 'releaseDate',
                    label: 'Release Date',
                    allowResize: true,
                    sortable: false
                },
                {
                    property: 'active',
                    dataIndex: 'active',
                    label: 'Active',
                    inlineEdit: 'boolean',
                    allowResize: true,
                    sortable: false
                },
                {
                    property: 'author',
                    dataIndex: 'author',
                    label: 'Author',
                    inlineEdit: 'string',
                    allowResize: true,
                    sortable: false
                }
            ]
        }
    },
    methods: {
        getBlogs : function () {
            const criteria = new Criteria();
            this.repository = this.repositoryFactory.create('ict_blog');
            criteria.addAssociation('products');
            this.repository.search(criteria, Shopware.Context.api).then((result) =>{
                this.blogs = result;
                this.total = result.total;
                console.log(this.blogs);
            })
        }
    }
};
import enGB from './snippet/en-GB.json'

const { Module } = Shopware;

Shopware.Component.register('ict-category-blog-list', () => import('./page/ict-category-blog-list'));
Shopware.Component.register('ict-category-blog-detail', () => import('./page/ict-category-blog-detail'));
Shopware.Component.register('ict-category-blog-create', () => import('./page/ict-category-blog-create'));

Module.register('ict-category-blog', {

    type:'plugin',
    name:'ictCategoryBlog',
    title:'ict-category-blog.general.mainMenuItemGeneral',
    description:'ict-category-blog.general.descriptionTextModule',
    color:'#ff3d58',
    icon: 'default-shopping-paper-bag-product',
    entity: 'ict_category',

    snippets:{
        'en-GB': enGB
    },

    routes: {
        index: {
            components: {
                default: 'ict-category-blog-list',
            },
            path: 'index',
            meta: {
                appSystem: {
                    view: 'list',
                },
            },
        },
        create: {
            component: 'ict-category-blog-create',
            path: 'create',
            meta: {
                parentPath: 'ict.category.blog.index',
            },
        },
        detail: {
            component: 'ict-category-blog-detail',
            path: 'detail/:id',
            meta: {
                parentPath: 'ict.category.blog.index',
                appSystem: {
                    view: 'detail',
                },
            },
            props: {
                default(route) {
                    return {
                        categoryId: route.params.id,
                    };
                },
            },
        }
    },
    navigation: [{
        id:'ict-category-blog',
        label: 'ict-category-blog.general.mainMenuItemGeneral',
        color: '#ff3d58',
        path: 'ict.category.blog.index',
        parent: 'sw-catalogue',
        icon: 'default-shopping-paper-bag-product',
        position: 100
    }]

});
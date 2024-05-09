import enGB from './snippet/en-GB.json'

const { Module } = Shopware;

Shopware.Component.register('ict-blog-list', () => import('./page/ict-blog-list'));
Shopware.Component.register('ict-blog-detail', () => import('./page/ict-blog-detail'));
Shopware.Component.register('ict-blog-create', () => import('./page/ict-blog-create'));

Module.register('ict-blog', {

	type:'plugin',
	name:'ictBlog',
	title:'ict-blog.general.mainMenuItemGeneral',
	description:'ict-blog.general.descriptionTextModule',
	color:'#ff3d58',
	icon: 'default-shopping-paper-bag-product',
	entity: 'ict_blog',

	snippets:{
		'en-GB': enGB
	},

	routes: {
		index: {
			components: {
				default: 'ict-blog-list',
			},
			path: 'index',
			meta: {
				privilege: 'blog.viewer',
				appSystem: {
					view: 'list',
				},
			},
		},
		create: {
			component: 'ict-blog-create',
			path: 'create',
			meta: {
				parentPath: 'ict.blog.index',
			},
		},
		detail: {
			component: 'ict-blog-detail',
			path: 'detail/:id',
			meta: {
				parentPath: 'ict.blog.index',
				appSystem: {
					view: 'detail',
				},
			},
			props: {
				default(route) {
					return {
						blogId: route.params.id,
					};
				},
			},
		}
	},
	settingsItem: [{
		group: 'system',
		to: 'ict-module.list',
		icon: 'regular-rocket',
		name: 'ict-module.general.mainMenuItemGeneral'
	}],
	navigation: [{
		id:'ict-blog',
		label: 'ict-blog.general.mainMenuItemGeneral',
		color: '#ff3d58',
		path: 'ict.blog.index',
		parent: 'sw-catalogue',
		icon: 'default-shopping-paper-bag-product',
		position: 100
	}]

});
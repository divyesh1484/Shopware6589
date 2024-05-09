import enGB from './snippet/en-GB.json'

const { Module } = Shopware;
Module.register('ict-blog', {

	type:'plugin',
	name:'ictBlog',
	title:'ict-module.general.mainMenuItemGeneral',
	description:'ict-module.general.descriptionTextModule',
	color:'#ff3d58',
	icon: 'default-shopping-paper-bag-product',

	snippets:{
		'en-GB': enGB
	},

	routes: {
		index: {
			components: {
				default: 'ict-blog-list',
			},
			path: 'index',
		},
		detail: {
			component: 'ict-blog-detail',
			path: 'detail/:id',
		},
		create: {
			component: 'ict-blog-detail',
			path: 'create',
			meta: {
				parentPath:'ict.blog.index'
			}
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
		label: 'ict-module.general.mainMenuItemGeneral',
		color: '#ff3d58',
		path: 'ict.module.index',
		parent: 'sw-catalogue',
		icon: 'default-shopping-paper-bag-product',
		position: 100
	}]

});
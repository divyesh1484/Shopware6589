import enGB from './snippet/en-GB.json'

const { Module } = Shopware;
Module.register('ict-module', {

	type:'plugin',
	name:'ictModule',
	title:'ict-module.general.mainMenuItemGeneral',
	description:'ict-module.general.descriptionTextModule',
	color:'#ff3d58',
	icon: 'default-shopping-paper-bag-product',

	snippets:{
		'en-GB': enGB
	},

	routes: {
		list: {
			component: '',
			path: 'list'
		},
		detail: {
			component: '',
			path: 'detail/:id',
			meta:{
				parentPath:'ict.list'
			}
		},
		create: {
			component: '',
			path: 'create',
			meta: {
				parentPath:'ict.list'
			}
		}
	},

	navigation: [{
		id:'ict-module',
		label: 'ict-module.general.mainMenuItemGeneral',
		color: '#ff3d58',
		path: 'ict.module',
		parent: 'sw-catalogue',
		icon: 'default-shopping-paper-bag-product',
		position: 100
	}]

});
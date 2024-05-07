alert("abc11");
const { Module } = Shopware;

Module.register('ict-module', {

	type:'plugin',
	name:'ictModule',
	title:'ict-module.general.mainMenuItemGeneral',
	description:'ict-property.general.descriptionTextModule',
	color:'#ff3d58',
	icon: 'default-shopping-paper-bag-product',

	// routes: {
	// 	list: {
	// 		component: '',
	// 		path: 'list'
	// 	},
	// 	detail: {
	// 		component: '',
	// 		path: 'detail/:id',
	// 		meta:{
	// 			parentPath:'ict.list'
	// 		}
	// 	},
	// 	create: {
	// 		component: '',
	// 		path: 'create',
	// 		meta: {
	// 			parentPath:'ict.list'
	// 		}
	// 	}
	// },

	navigation: [{
		label: 'ict-module.general.mainMenuItemGeneral',
		color: '#ff3d58',
		path: '',
		parent: 'sw-catalogue',
		icon: 'default-shopping-paper-bag-product',
		position: 100
	}]

});
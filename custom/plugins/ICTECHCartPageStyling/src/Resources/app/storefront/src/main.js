import CartStylePage from './script/cart-style/cart-style-page';

// Register your plugin via the existing PluginManager
const PluginManager = window.PluginManager;
PluginManager.register('CartStylePage', CartStylePage);

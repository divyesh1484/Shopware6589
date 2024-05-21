import ExamplePlugin from './example-plugin/example-plugin.plugin';

// Register your plugin via the existing PluginManager
const PluginManager = window.PluginManager;
PluginManager.register('ExamplePlugin', ExamplePlugin, '[data-ajax-helper]');
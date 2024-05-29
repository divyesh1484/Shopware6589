import QuantitySelectorPlugin from 'src/plugin/quantity-selector/quantity-selector.plugin';
export default class CartStyleQuantitySelectorPlugin extends QuantitySelectorPlugin {
    init() {

        console.log(this.el);
        // Call the original init method
        super.init();

        // Add your custom code here
        console.log('My custom Quantity Selector plugin has been initialized!');
    }
   // Override other methods if needed
}

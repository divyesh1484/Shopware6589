import Plugin from 'src/plugin-system/plugin.class';

export default class CartStylePage extends Plugin {

    init() {
        this._registerEvents();
    }

    _registerEvents() {

        var currentRoutes = document.getElementById('routes').value;
        var cartStyle = document.getElementById('cartStyleType').value;
        var styleStatus = document.getElementById('styleStatus').value;
        if (styleStatus){
            if (currentRoutes === 'frontend.checkout.cart.page') {
                window.addEventListener('load', function() {
                    document.body.classList.add(cartStyle);
                });
            }
        }
    }
}
// <plugin root>/src/Resources/app/storefront/src/example-plugin/example-plugin.plugin.js
import HttpClient from 'src/service/http-client.service';
import Plugin from 'src/plugin-system/plugin.class';

export default class ExamplePlugin extends Plugin {
    init() {
        // initialize the HttpClient
        this._client = new HttpClient();
        // get references to the dom elements
        this.button = this.el.children['ajax-button'];
        this.textdiv = this.el.children['ajax-display'];
        

        // register the events
        this._registerEvents();
    }

    _registerEvents() {
        // fetch the timestamp, when the button is clicked
        this.button.addEventListener('click', event => {
            this._fetch();
        });
    }

    _fetch() {
        // make the network request and call the `_setContent` function as a callback
        this._client.get('/shopware6589/public/example', this._setContent.bind(this), 'application/json', true)
    }

    _setContent(data) {
        // parse the response and set the `textdiv.innerHTML` to the timestamp
        this.textdiv.innerHTML = JSON.parse(data).timestamp;
    }
}
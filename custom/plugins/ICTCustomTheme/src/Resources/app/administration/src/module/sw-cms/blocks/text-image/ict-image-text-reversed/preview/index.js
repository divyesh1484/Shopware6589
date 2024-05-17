import template from './sw-cms-preview-ict-image-text-reversed.html.twig';
import './sw-cms-preview-ict-image-text-reversed.scss';

Shopware.Component.register('sw-cms-preview-ict-image-text-reversed', {
    template,
    computed: {
        assetFilter() {
            return Shopware.Filter.getByName('asset');
        },
    },
});
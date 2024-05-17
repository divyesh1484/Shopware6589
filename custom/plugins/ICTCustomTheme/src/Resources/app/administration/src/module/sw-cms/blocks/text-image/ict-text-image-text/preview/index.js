import template from './sw-cms-preview-ict-text-image-text.html.twig';
import './sw-cms-preview-ict-text-image-text.scss';

Shopware.Component.register('sw-cms-preview-ict-text-image-text', {
    template,
    computed: {
        assetFilter() {
            return Shopware.Filter.getByName('asset');
        },
    },
});
import template from './sw-cms-preview-ict-image-text-row.html.twig';
import './sw-cms-preview-ict-image-text-row.scss';

/**
 * @private
 * @package buyers-experience
 */
Shopware.Component.register('sw-cms-preview-ict-image-text-row', {
    template,

    computed: {
        assetFilter() {
            return Shopware.Filter.getByName('asset');
        },
    },
});

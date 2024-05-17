import template from './sw-cms-el-preview-ict-image.html.twig';
import './sw-cms-el-preview-ict-image.scss';


/**
 * @private
 * @package buyers-experience
 */
Shopware.Component.register('sw-cms-el-preview-ict-image', {
    template,

    computed: {
        assetFilter() {
            return Shopware.Filter.getByName('asset');
        },
    },
});

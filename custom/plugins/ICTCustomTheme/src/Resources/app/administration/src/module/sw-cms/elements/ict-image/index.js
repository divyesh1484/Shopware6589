/**
 * @private
 * @package buyers-experience
 */
import './preview';
import './config';
import './component';

/**
 * @private
 * @package buyers-experience
 */
Shopware.Service('cmsService').registerCmsElement({
    name: 'ict-image',
    label: 'ICT Image',
    component: 'sw-cms-el-ict-image',
    configComponent: 'sw-cms-el-config-ict-image',
    previewComponent: 'sw-cms-el-preview-ict-image',
    defaultConfig: {
        buttonField: {
            source: 'static',
            value: null,
        },
        buttonLink: {
            source: 'static',
            value: null,
        },
        media: {
            source: 'static',
            value: null,
            required: true,
            entity: {
                name: 'media',
            },
        },
        displayMode: {
            source: 'static',
            value: 'standard',
        },
        url: {
            source: 'static',
            value: null,
        },
        newTab: {
            source: 'static',
            value: false,
        },
        minHeight: {
            source: 'static',
            value: '340px',
        },
        verticalAlign: {
            source: 'static',
            value: null,
        },
        horizontalAlign: {
            source: 'static',
            value: null,
        },
    },
});

import './component';
import './preview';

Shopware.Service('cmsService').registerCmsBlock({
    name: 'ict-image-text-reversed',
    label: 'ICT Image Text Block!',
    category: 'text-image',
    component: 'sw-cms-block-ict-image-text-reversed',
    previewComponent: 'sw-cms-preview-ict-image-text-reversed',
    defaultConfig: {
        marginBottom: '20px',
        marginTop: '20px',
        marginLeft: '20px',
        marginRight: '20px',
        sizingMode: 'boxed'
    },
    slots: {
        left: 'text',
        right: {
            type: 'image',
            default: {
                config: {
                    displayMode: { source: 'static', value: 'standard' },
                },
                data: {
                    media: {
                        value: 'framework/assets/default/cms/preview_mountain_large.jpg',
                        source: 'default',
                    },
                },
            },
        },
    },
});
import CMS from '../../../constant/sw-cms.constant';

import template from './sw-cms-el-ict-image.html.twig';
import './sw-cms-el-ict-image.scss';

const { Mixin, Filter } = Shopware;

/**
 * @private
 * @package buyers-experience
 */
Shopware.Component.register('sw-cms-el-ict-image', {
    template,

    inject: ['feature'],

    mixins: [
        Mixin.getByName('cms-element'),
    ],

    computed: {
        displayModeClass() {
            if (this.element.config.displayMode.value === 'standard') {
                return null;
            }

            return `is--${this.element.config.displayMode.value}`;
        },

        styles() {
            return {
                'min-height': this.element.config.displayMode.value === 'cover' &&
                this.element.config.minHeight.value &&
                this.element.config.minHeight.value !== 0 ? this.element.config.minHeight.value : '340px',
            };
        },

        imgStyles() {
            return {
                'align-self': this.element.config.verticalAlign.value || null,
            };
        },

        horizontalAlign() {
            return {
                'justify-content': this.element.config.horizontalAlign?.value || null,
            };
        },


        mediaUrl() {
            const fallBackImageFileName = CMS.MEDIA.previewMountain.slice(CMS.MEDIA.previewMountain.lastIndexOf('/') + 1);
            const staticFallBackImage = this.assetFilter(`administration/static/img/cms/${fallBackImageFileName}`);
            const elemData = this.element.data.media;
            const elemConfig = this.element.config.media;

            if (elemConfig.source === 'mapped') {
                const demoMedia = this.getDemoValue(elemConfig.value);

                if (demoMedia?.url) {
                    return demoMedia.url;
                }

                return staticFallBackImage;
            }

            if (elemConfig.source === 'default') {
                // use only the filename
                const fileName = elemConfig.value?.slice(elemConfig.value.lastIndexOf('/') + 1) ?? '';
                return this.assetFilter(`/administration/static/img/cms/${fileName}`);
            }

            if (elemData?.id) {
                if (this.feature.isActive('MEDIA_PATH') || this.feature.isActive('v6.6.0.0')) {
                    return this.element.data.media.url;
                }

                return `${this.element.data.media.url}?${Shopware.Utils.createId()}`;
            }

            if (elemData?.url) {
                return this.assetFilter(elemConfig.url);
            }
            console.log(staticFallBackImage);
            return staticFallBackImage;
        },

        assetFilter() {
            return Filter.getByName('asset');
        },
    },


    created() {
        this.createdComponent();
    },

    methods: {
        createdComponent() {
            this.initElementConfig('image');
            this.initElementData('image');
        },
    },
});

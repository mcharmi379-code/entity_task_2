import CMS from '../constant/sw-cms.constant'
import template from './sw-cms-el-image-button.html.twig';
import './sw-cms-el-image-button.scss';

const { Mixin, Filter } = Shopware;

/**
 * @private
 * @sw-package discovery
 */
export default {
    template,

    compatConfig: Shopware.compatConfig,

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
                'min-height':
                    this.element.config.displayMode.value === 'cover' &&
                    this.element.config.minHeight.value &&
                    this.element.config.minHeight.value !== 0
                        ? this.element.config.minHeight.value
                        : '340px',
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
            const elemConfig = this.element.config.media;
            const elemData = this.element.data?.media;

            const fallback = this.assetFilter('administration/static/img/cms/preview_mountain_small.jpg');

            // DEFAULT (static asset)
            if (elemConfig.source === 'default') {
                const fileName = elemConfig.value?.slice(elemConfig.value.lastIndexOf('/') + 1);
                return this.assetFilter(`administration/static/img/cms/${fileName}`);
            }

            // STATIC (real media entity)
            if (elemData?.url) {
                return elemData.url;
            }

            return fallback;
        },
        assetFilter() {
            return Filter.getByName('asset');
        },

        mediaConfigValue() {
            return this.element?.config?.media?.value;
        },
    },

    watch: {
        'cmsPageState.currentDemoEntity': {
            handler() {
                this.updateDemoValue(this.mediaConfigValue);
            },
        },

        mediaConfigValue(value) {
            this.updateDemoValue(value);
        },
    },

    created() {
        this.createdComponent();
    },

    methods: {
        createdComponent() {
            this.initElementConfig('image-button');
            this.initElementData('image-button');
        },

        updateDemoValue(value) {
            const mediaId = this.element?.data?.media?.id;
            const isSourceStatic = this.element?.config?.media?.source === 'static';

            if (isSourceStatic && mediaId && value !== mediaId) {
                this.element.config.media.value = mediaId;
            }
        },
    },
};

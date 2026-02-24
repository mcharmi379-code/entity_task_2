import template from './sw-cms-el-preview-image-button.html.twig';
import './sw-cms-el-preview-image-button.scss';

/**
 * @private
 * @sw-package discovery
 */
export default {
    template,

    compatConfig: Shopware.compatConfig,

    computed: {
        assetFilter() {
            return Shopware.Filter.getByName('asset');
        },
    },
};

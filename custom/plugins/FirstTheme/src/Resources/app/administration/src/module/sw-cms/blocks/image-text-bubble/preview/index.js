import template from './sw-cms-preview-my-image-text-bubble.html.twig';
import './sw-cms-preview-my-image-text-bubble.scss';

Shopware.Component.register('sw-cms-preview-my-image-text-bubble', {
    template,
      computed: {
        assetFilter() {
            return Shopware.Filter.getByName('asset');
        },
    },
});

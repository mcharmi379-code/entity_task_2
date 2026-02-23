import template from './sw-cms-block-my-image-text-bubble.html.twig';
import './sw-cms-block-my-image-text-bubble.scss';

Shopware.Component.register('sw-cms-block-my-image-text-bubble', {
    template,
     computed: {
        assetFilter() {
            return Shopware.Filter.getByName('asset');
        },
    },
});
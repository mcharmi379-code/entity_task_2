// import CMS from '../../../constant/sw-cms.constant';
import CMS from './constant/sw-cms.constant'

/**
 * @private
 * @sw-package discovery
 */
Shopware.Component.register('sw-cms-preview-my-image-text-row', () => import('./preview'));
/**
 * @private
 * @sw-package discovery
 */
Shopware.Component.register('sw-cms-block-my-image-text-row', () => import('./component'));

/**
 * @private
 * @sw-package discovery
 */
Shopware.Service('cmsService').registerCmsBlock({
    name: 'my-image-text-row',
    label: 'My Image Text Row',
    category: 'text-image',
    component: 'sw-cms-block-my-image-text-row',
    previewComponent: 'sw-cms-preview-my-image-text-row',
    defaultConfig: {
        marginBottom: '20px',
        marginTop: '20px',
        marginLeft: '20px',
        marginRight: '20px',
        sizingMode: 'boxed',
    },
    slots: {
         first: {
            type: 'image-button'
        },
        second: {
            type: 'image-button'
        },
        third: {
            type: 'image-button'
        },
        fourth: {
            type: 'image-button'
        }
    },
});

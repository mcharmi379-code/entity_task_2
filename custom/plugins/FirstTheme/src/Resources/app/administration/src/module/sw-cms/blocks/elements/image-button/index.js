/**
 * @private
 * @sw-package discovery
 */
Shopware.Component.register('sw-cms-el-preview-image-button', () => import('./preview'));
/**
 * @private
 * @sw-package discovery
 */
Shopware.Component.register('sw-cms-el-config-image-button', () => import('./config'));
/**
 * @private
 * @sw-package discovery
 */
Shopware.Component.register('sw-cms-el-image-button', () => import('./component'));

/**
 * @private
 * @sw-package discovery
 */
import './preview';
import './config';
import './component';

Shopware.Service('cmsService').registerCmsElement({
    name: 'image-button',
    label: 'Image Button with text',
    component: 'sw-cms-el-image-button',
    configComponent: 'sw-cms-el-config-image-button',
    previewComponent: 'sw-cms-el-preview-image-button',

    defaultConfig: {
        media: {
            source: 'static',
            value: null,
            required: false,
            entity: {
                name: 'media'
            }
        },

        buttonText: {
            source: 'static',
            value: 'Click here'
        },

        buttonUrl: {
            source: 'static',
            value: null
        },

        contentText: {
            source: 'static',
            value: '<p>Lorem ipsum dolor sit amet</p>'
        }
    }
});
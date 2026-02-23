// alert('Hello Worldknlmklmlmlmk2');
import './component';
import './preview';
import CMS from './constant/sw-cms.constant'


/**
 * @private
 * @sw-package discovery
 */
// Shopware.Component.register('sw-cms-preview-my-image-text-bubble', () => import('./preview'));
/**
 * @private
 * @sw-package discovery
 */
// Shopware.Component.register('sw-cms-block-my-image-text-bubble', () => import('./component'));

/**
 * @private
 * @sw-package discovery
 */

Shopware.Service('cmsService').registerCmsBlock({
    name: 'my-image-text-bubble',
    label: 'My Image Text Bubble',
    category: 'text-image',
    component: 'sw-cms-block-my-image-text-bubble',
    previewComponent: 'sw-cms-preview-my-image-text-bubble',
    defaultConfig: {
        marginBottom: '20px',
        marginTop: '20px',
        marginLeft: '20px',
        marginRight: '20px',
        sizingMode: 'boxed',
    },
    slots: {
        left: {
            type: 'text',
            default: {
                config: {
                    content: {
                        source: 'static',
                        value: `
                            <h5 style="text-align:center;">Lorem</h5>
                            <p style="text-align:center;">
                                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt.
                            </p>
                        `.trim()
                    }
                }
            }
        },
        center: {
            type: 'image',
            default: {
                config: {
                    displayMode: { source: 'static', value: 'standard' },
                },
                data: {
                    media: {
                        value: CMS.MEDIA.previewCamera,
                        source: 'default',
                    },
                },
            }
        },

        right: {
            type: 'text',
            default: {
                config: {
                    content: {
                        source: 'static',
                        value: `
                            <h5 style="text-align:center;">Dolor</h5>
                            <p style="text-align:center;">
                                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt.
                            </p>
                        `.trim()
                    }
                }
            }
        }
    }
});

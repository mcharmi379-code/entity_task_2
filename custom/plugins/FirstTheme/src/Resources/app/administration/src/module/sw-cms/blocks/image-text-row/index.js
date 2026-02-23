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
        'left-image': {
            type: 'image',
            default: {
                config: {
                    displayMode: { source: 'static', value: 'cover' },
                },
                data: {
                    media: {
                        value: CMS.MEDIA.previewCamera,
                        source: 'default',
                    },
                },
            },
        },
        'left-text': {
            type: 'text',
            default: {
                config: {
                    content: {
                        source: 'static',
                        value: `
                        <p>Lorem ipsum dolor sit amet elitr.</p>
                        `.trim(),
                    },
                },
            },
        },
        'center-image': {
            type: 'image',
            default: {
                config: {
                    displayMode: { source: 'static', value: 'cover' },
                },
                data: {
                    media: {
                        value: CMS.MEDIA.previewPlant,
                        source: 'default',
                    },
                },
            },
        },
        'center-text': {
            type: 'text',
            default: {
                config: {
                    content: {
                        source: 'static',
                        value: `
                        <p>Lorem ipsum dolor sit amet elitr.</p>
                        `.trim(),
                    },
                },
            },
        },
        'right-image': {
            type: 'image',
            default: {
                config: {
                    displayMode: { source: 'static', value: 'cover' },
                },
                data: {
                    media: {
                        value: CMS.MEDIA.previewGlasses,
                        source: 'default',
                    },
                },
            },
        },
        'right-text': {
            type: 'text',
            default: {
                config: {
                    content: {
                        source: 'static',
                        value: `
                        <p>Lorem ipsum dolor sit amet elitr.</p>
                        `.trim(),
                    },
                },
            },
        },
        'bottom-image': {
            type: 'image',
            default: {
                config: {
                    displayMode: { source: 'static', value: 'cover' },
                },
                data: {
                    media: {
                        value: CMS.MEDIA.previewGlasses,
                        source: 'default',
                    },
                },
            },
        },
        'bottom-text': {
            type: 'text',
            default: {
                config: {
                    content: {
                        source: 'static',
                        value: `
                        <p>Lorem ipsum dolor sit amet elitr.</p>
                        `.trim(),
                    },
                },
            },
        },
    },
});

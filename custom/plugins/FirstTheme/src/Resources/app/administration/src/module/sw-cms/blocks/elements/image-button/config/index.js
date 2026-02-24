import template from './sw-cms-el-config-image-button.html.twig';

const { Mixin } = Shopware;

export default {
    template,

    inject: ['repositoryFactory'],

    emits: ['element-update'],

    mixins: [
        Mixin.getByName('cms-element'),
    ],

    computed: {
        mediaRepository() {
            return this.repositoryFactory.create('media');
        },

        uploadTag() {
            return `cms-element-media-config-${this.element.id}`;
        },

        previewSource() {
            if (this.element?.data?.media) {
                return this.element.data.media;
            }

            if (this.element?.config?.media?.value) {
                return this.element.config.media.value;
            }

            return null;
        },
    },

  async created() {
    this.initElementConfig('image-button');
    this.initElementData('image-button');

    if (this.element.config.media.value) {
        const media = await this.mediaRepository.get(
            this.element.config.media.value,
            Shopware.Context.api
        );

        this.updateElementData(media);
    }
},

    methods: {
        async onImageUpload({ targetId }) {
            const mediaEntity = await this.mediaRepository.get(targetId);

            this.element.config.media.value = mediaEntity.id;
            this.element.config.media.source = 'static';

            this.updateElementData(mediaEntity);

            this.$emit('element-update', this.element);
        },

        onImageRemove() {
            this.element.config.media.value = null;
            this.updateElementData();

            this.$emit('element-update', this.element);
        },

        updateElementData(media = null) {
            const mediaId = media === null ? null : media.id;

            if (!this.element.data) {
                this.$set(this.element, 'data', { mediaId, media });
                return;
            }

            this.$set(this.element.data, 'mediaId', mediaId);
            this.$set(this.element.data, 'media', media);
        },

        onFieldChange() {
            this.$emit('element-update', this.element);
        }
    },
};
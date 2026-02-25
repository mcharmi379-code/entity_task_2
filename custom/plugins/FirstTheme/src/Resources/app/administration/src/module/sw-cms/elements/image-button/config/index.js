import template from './sw-cms-el-config-image-button.html.twig';

const { Mixin } = Shopware;

export default {
    template,

    inject: ['repositoryFactory'],

    mixins: [
        Mixin.getByName('cms-element')
    ],

    data() {
        return {
            mediaModalIsOpen: false
        };
    },

    computed: {
        mediaRepository() {
            return this.repositoryFactory.create('media');
        },

        uploadTag() {
            return `cms-element-media-config-${this.element.id}`;
        },

        previewSource() {
            if (this.element?.data?.media?.id) {
                return this.element.data.media;
            }

            return this.element.config.media.value;
        }
    },

    created() {
        this.initElementConfig('image-button');
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

        onSelectionChanges(mediaEntity) {
            const media = mediaEntity[0];

            this.element.config.media.value = media.id;
            this.element.config.media.source = 'static';

            this.updateElementData(media);
            this.$emit('element-update', this.element);
        },

        onCloseModal() {
            this.mediaModalIsOpen = false;
        },

        onOpenMediaModal() {
            this.mediaModalIsOpen = true;
        },

        updateElementData(media = null) {
            const mediaId = media ? media.id : null;

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
    }
};
<?php declare(strict_types=1);

namespace FirstTheme\Core\Content\Cms;

use Shopware\Core\Content\Cms\DataResolver\Element\AbstractCmsElementResolver;
use Shopware\Core\Content\Cms\DataResolver\CriteriaCollection;
use Shopware\Core\Content\Cms\DataResolver\ResolverContext\ResolverContext;
use Shopware\Core\Content\Cms\DataResolver\Element\ElementDataCollection;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Content\Media\MediaDefinition;
use Shopware\Core\Framework\Struct\ArrayStruct;
use Shopware\Core\Content\Media\MediaEntity;
use Shopware\Core\Content\Cms\Aggregate\CmsSlot\CmsSlotEntity;

class ImageButtonCmsElementResolver extends AbstractCmsElementResolver
{
    public function getType(): string
    {
        return 'image-button';
    }

    public function collect(CmsSlotEntity $slot, ResolverContext $resolverContext): ?CriteriaCollection
    {
        $config = $slot->getFieldConfig();
        $mediaField = $config->get('media');

        if (!$mediaField || !$mediaField->getValue()) {
            return null;
        }

        $criteria = new Criteria([$mediaField->getValue()]);
        $criteriaCollection = new CriteriaCollection();

        $criteriaCollection->add(
            'media_' . $slot->getUniqueIdentifier(),
            MediaDefinition::class,
            $criteria
        );

        return $criteriaCollection;
    }

public function enrich(
    CmsSlotEntity $slot,
    ResolverContext $resolverContext,
    ElementDataCollection $result
): void {
    $mediaSearchResult = $result->get('media_' . $slot->getUniqueIdentifier());

    if (!$mediaSearchResult) {
        return;
    }

    /** @var MediaEntity|null $media */
    $media = $mediaSearchResult->getEntities()->first();

    if (!$media) {
        return;
    }

    $slot->setData(
        new ArrayStruct([
            'mediaId' => $media->getId(),
            'media'   => $media,
        ], 'image_button')
    );
}
}
<?php declare(strict_types=1);

namespace SwagBlogPlug\Core\Content\BlogCategory\Aggregate;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @package framework
 * @method void                add(SwagBlogCategoryTranslationEntity $entity)
 * @method void                set(string $key, SwagBlogCategoryTranslationEntity $entity)
 * @method SwagBlogCategoryTranslationEntity[]    getIterator()
 * @method SwagBlogCategoryTranslationEntity[]    getElements()
 * @method SwagBlogCategoryTranslationEntity|null get(string $key)
 * @method SwagBlogCategoryTranslationEntity|null first()
 * @method SwagBlogCategoryTranslationEntity|null last()
 */
class SwagBlogCategoryTranslationCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return SwagBlogCategoryTranslationEntity::class;
    }
}
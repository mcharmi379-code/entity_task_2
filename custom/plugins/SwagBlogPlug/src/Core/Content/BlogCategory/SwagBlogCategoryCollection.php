<?php declare(strict_types=1);

namespace SwagBlogPlug\Core\Content\BlogCategory;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @package framework
 * @method void                add(SwagBlogCategoryEntity $entity)
 * @method void                set(string $key, SwagBlogCategoryEntity $entity)
 * @method SwagBlogCategoryEntity[]    getIterator()
 * @method SwagBlogCategoryEntity[]    getElements()
 * @method SwagBlogCategoryEntity|null get(string $key)
 * @method SwagBlogCategoryEntity|null first()
 * @method SwagBlogCategoryEntity|null last()
 */
class SwagBlogCategoryCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return SwagBlogCategoryEntity::class;
    }
}
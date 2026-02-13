<?php declare(strict_types=1);

namespace SwagBlogPlug\Core\Content\Blog;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @package framework
 * @method void                add(SwagBlogEntity $entity)
 * @method void                set(string $key, SwagBlogEntity $entity)
 * @method SwagBlogEntity[]    getIterator()
 * @method SwagBlogEntity[]    getElements()
 * @method SwagBlogEntity|null get(string $key)
 * @method SwagBlogEntity|null first()
 * @method SwagBlogEntity|null last()
 */
class SwagBlogCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return SwagBlogEntity::class;
    }
}
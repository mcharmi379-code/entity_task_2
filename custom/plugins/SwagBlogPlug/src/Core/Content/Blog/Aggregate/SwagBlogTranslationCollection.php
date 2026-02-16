<?php declare(strict_types=1);

namespace SwagBlogPlug\Core\Content\Blog\Aggregate;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @package framework
 * @method void                add(SwagBlogTranslationEntity $entity)
 * @method void                set(string $key, SwagBlogTranslationEntity $entity)
 * @method SwagBlogTranslationEntity[]    getIterator()
 * @method SwagBlogTranslationEntity[]    getElements()
 * @method SwagBlogTranslationEntity|null get(string $key)
 * @method SwagBlogTranslationEntity|null first()
 * @method SwagBlogTranslationEntity|null last()
 */
class SwagBlogTranslationCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return SwagBlogTranslationEntity::class;
    }
}
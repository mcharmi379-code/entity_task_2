<?php

declare(strict_types=1);

namespace SwagBlogPlug\Core\Content\Extension;

use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use SwagBlogPlug\Core\Content\Blog\Aggregate\SwagBlogProduct\SwagBlogProductDefinition;
use SwagBlogPlug\Core\Content\Blog\SwagBlogDefination;

class ProductExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
    $collection->add(
        new ManyToManyAssociationField(
            'blogs',
            SwagBlogDefination::class,
            SwagBlogProductDefinition::class,
            'product_id',
            'blog_id'
        )
    );
    }
    public function getDefinitionClass(): string
    {
        return ProductDefinition::class;    
    }
    public function getEntityName(): string
    {
        return SwagBlogDefination::ENTITY_NAME;
    }
}

<?php declare(strict_types=1);

namespace SwagBlogPlug\Core\Content\Blog\Aggregate\SwagBlogProduct;

use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\MappingEntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ReferenceVersionField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use SwagBlogPlug\Core\Content\Blog\SwagBlogDefination;

class SwagBlogProductDefinition extends MappingEntityDefinition
{
    public const ENTITY_NAME = 'swag_blog_product';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([

            (new FkField(
                'blog_id',
                'blogId',
                SwagBlogDefination::class
            ))->addFlags(new Required(), new PrimaryKey()),

            (new FkField(
                'product_id',
                'productId',
                ProductDefinition::class
            ))->addFlags(new Required(), new PrimaryKey()),

            (new ReferenceVersionField(
                ProductDefinition::class
            ))->addFlags(new Required()),

        ]);
    }
}

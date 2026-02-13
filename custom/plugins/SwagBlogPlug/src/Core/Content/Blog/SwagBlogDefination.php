<?php declare(strict_types=1);

namespace SwagBlogPlug\Core\Content\Blog;

use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\Framework\DataAbstractionLayer\Field\BoolField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\DateField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use SwagBlogPlug\Core\Content\BlogCategory\SwagBlogCategoryDefination;

class SwagBlogDefination extends EntityDefinition
{
    public const ENTITY_NAME = 'swag_blog';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    public function getEntityClass(): string
    {
        return SwagBlogEntity::class;
    }

    public function getCollectionClass(): string
    {
        return SwagBlogCollection::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id', 'id'))->addFlags(new Required(), new PrimaryKey()),
            (new StringField('name', 'name')),
            (new StringField('description', 'description')),
            (new BoolField('active', 'active')),
            (new StringField('author', 'author')),
            (new DateField('release_date', 'releaseDate')),
            (new FkField('product_id', 'productId', ProductDefinition::class)),
            new ManyToManyAssociationField('products', ProductDefinition::class, SwagBlogDefination::class, 'id', 'product_id'),
            
            (new FkField('category_id', 'categoryId', SwagBlogCategoryDefination::class)),
            new ManyToOneAssociationField('categories', 'category_id', SwagBlogCategoryDefination::class, 'id', false),


        ]);
    }
}

<?php

declare(strict_types=1);

namespace SwagBlogPlug\Core\Content\Blog;

use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\Framework\DataAbstractionLayer\Field\BoolField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\CreatedAtField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\DateField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslatedField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslationsAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\UpdatedAtField;
use SwagBlogPlug\Core\Content\Blog\Aggregate\SwagBlogProduct\SwagBlogProductDefinition;
use SwagBlogPlug\Core\Content\Blog\Aggregate\SwagBlogTranslationDefinition;
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
            (new TranslatedField('name'))->addFlags(new Required()),
            (new StringField('description', 'description'))->addFlags(new Required()),
            (new BoolField('active', 'active'))->addFlags(new Required()),
            new TranslatedField('author'),
            (new DateField('release_date', 'releaseDate'))->addFlags(new Required()),
            (new FkField('swag_blog_category_id', 'swagBlogCategoryId', SwagBlogCategoryDefination::class))->addFlags(new Required()),
            new CreatedAtField(),
            new UpdatedAtField(),
            new ManyToManyAssociationField('products', ProductDefinition::class, SwagBlogProductDefinition::class, 'blog_id', 'product_id'),
            new ManyToOneAssociationField('swagBlogCategory', 'swag_blog_category_id', SwagBlogCategoryDefination::class, 'id', false),
            new TranslationsAssociationField(SwagBlogTranslationDefinition::class, 'swag_blog_id'),
        ]);
    }
}

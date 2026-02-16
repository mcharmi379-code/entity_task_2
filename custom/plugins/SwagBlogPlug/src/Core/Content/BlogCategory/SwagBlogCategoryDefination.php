<?php declare(strict_types=1);

namespace SwagBlogPlug\Core\Content\BlogCategory;

use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\BoolField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslatedField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslationsAssociationField;
use SwagBlogPlug\Core\Content\Blog\SwagBlogDefination;
use SwagBlogPlug\Core\Content\BlogCategory\Aggregate\SwagBlogCategoryTranslationDefinition;

class SwagBlogCategoryDefination extends EntityDefinition
{
    public const ENTITY_NAME = 'swag_blog_category';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    public function getEntityClass(): string
    {
        return SwagBlogCategoryEntity::class;
    }

    public function getCollectionClass(): string
    {
        return SwagBlogCategoryCollection::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id', 'id'))->addFlags(new Required(), new PrimaryKey()),
            (new TranslatedField('name'))->addFlags(new Required()),
            
        new OneToManyAssociationField(
            'blogs',
            SwagBlogDefination::class,
            'swag_blog_category_id',
            'id'
        ),

        new TranslationsAssociationField(
            SwagBlogCategoryTranslationDefinition::class,
            'swag_blog_category_id'
        ),
        ]);
    }
}

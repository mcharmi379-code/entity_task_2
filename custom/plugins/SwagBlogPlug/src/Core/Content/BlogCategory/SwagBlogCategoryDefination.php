<?php declare(strict_types=1);

namespace SwagBlogPlug\Core\Content\BlogCategory;

use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\BoolField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use SwagBlogPlug\Core\Content\Blog\SwagBlogDefination;

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
            (new BoolField('id', 'id'))->addFlags(new Required(), new PrimaryKey()),
            (new StringField('name', 'name')),
            (new OneToManyAssociationField('blogs',SwagBlogDefination::class,'category_id','id'))
        ]);
    }
}

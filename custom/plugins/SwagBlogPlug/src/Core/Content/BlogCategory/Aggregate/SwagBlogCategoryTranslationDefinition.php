<?php declare(strict_types=1);

namespace SwagBlogPlug\Core\Content\BlogCategory\Aggregate;

use Shopware\Core\Framework\DataAbstractionLayer\EntityTranslationDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use SwagBlogPlug\Core\Content\Blog\SwagBlogDefination;
use SwagBlogPlug\Core\Content\BlogCategory\SwagBlogCategoryDefination;

class SwagBlogCategoryTranslationDefinition extends EntityTranslationDefinition
{
    public const ENTITY_NAME = 'swag_blog_category_translation';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    protected function getParentDefinitionClass(): string
    {
        return SwagBlogCategoryDefination::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([

            new StringField('name', 'name'),

        ]);
    }
}

<?php declare(strict_types=1);

namespace SwagBlogPlug\Core\Content\Blog\Aggregate;

use Shopware\Core\Framework\DataAbstractionLayer\EntityTranslationDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use SwagBlogPlug\Core\Content\Blog\SwagBlogDefination;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;

class SwagBlogTranslationDefinition extends EntityTranslationDefinition
{
    public const ENTITY_NAME = 'swag_blog_translation';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    protected function getParentDefinitionClass(): string
    {
        return SwagBlogDefination::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([

            (new StringField('name', 'name'))->addFlags(new Required()),

            new StringField('author', 'author'),
            
            (new StringField('description', 'description'))->addFlags(new Required()),
        ]);
    }
}

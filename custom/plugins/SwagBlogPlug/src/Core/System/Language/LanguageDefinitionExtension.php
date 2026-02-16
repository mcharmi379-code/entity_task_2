<?php declare(strict_types=1);

namespace SwagBlogPlug\Core\System\Language;

use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\System\Language\LanguageDefinition;
use SwagBlogPlug\Core\Content\Blog\Aggregate\SwagBlogTranslationDefinition;
use SwagBlogPlug\Core\Content\BlogCategory\Aggregate\SwagBlogCategoryTranslationDefinition;

class LanguageDefinitionExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            new OneToManyAssociationField(
                'swagBlogTranslations',
                SwagBlogTranslationDefinition::class,
                'language_id'
            )
        );
         $collection->add(
            new OneToManyAssociationField(
                'swagBlogCategoryTranslations',
                SwagBlogCategoryTranslationDefinition::class,
                'language_id'
            )
        );
    }

    public function getDefinitionClass(): string
    {
        return LanguageDefinition::class;
    }
}
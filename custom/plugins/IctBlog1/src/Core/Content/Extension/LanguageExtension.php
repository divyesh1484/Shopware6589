<?php declare(strict_types=1);

namespace IctBlog1\Core\Content\Extension;

use IctBlog1\Core\Content\IctBlog1\Aggregate\IctBlogTranslation\IctBlogTranslationDefinition;
use IctBlog1\Core\Content\IctCategory\Aggregate\IctCategoryTranslation\IctCategoryTranslationDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\ReverseInherited;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToManyAssociationField;
use Shopware\Core\System\Language\LanguageDefinition;

class LanguageExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            (new OneToManyAssociationField(
                'ictBlogTranslation',
                IctBlogTranslationDefinition::class,
                'language_id' // Assuming this is the foreign key field in IctGeneralInfoTranslationDefinition
            ))->addFlags(new ReverseInherited('language'))

        );
        $collection->add(
            (new OneToManyAssociationField(
                'ictCategoryTranslation',
                IctCategoryTranslationDefinition::class,
                'language_id' // Assuming this is the foreign key field in IctGeneralInfoTranslationDefinition
            ))->addFlags(new ReverseInherited('language'))

        );
    }

    public function getDefinitionClass(): string
    {
        return LanguageDefinition::class;
    }
}
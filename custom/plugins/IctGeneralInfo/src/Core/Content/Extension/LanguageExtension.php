<?php declare(strict_types=1);

namespace IctGeneralInfo\Core\Content\Extension;

use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\ReverseInherited;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToManyAssociationField;
use IctGeneralInfo\Core\Content\IctGeneralInfo\Aggregate\IctGeneralInfoTranslation\IctGeneralInfoTranslationDefinition;
use Shopware\Core\System\Language\LanguageDefinition;

class LanguageExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            (new OneToManyAssociationField(
                'ictGeneralInfoTranslations',
                IctGeneralInfoTranslationDefinition::class,
                'language_id' // Assuming this is the foreign key field in IctGeneralInfoTranslationDefinition
            ))->addFlags(new ReverseInherited('language'))

        );
    }

    public function getDefinitionClass(): string
    {
        return LanguageDefinition::class;
    }
}
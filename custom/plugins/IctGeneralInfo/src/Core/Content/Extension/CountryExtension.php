<?php declare(strict_types=1);

namespace IctGeneralInfo\Core\Content\Extension;

use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use IctGeneralInfo\Core\Content\IctGeneralInfo\IctGeneralInfoDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToOneAssociationField;
use Shopware\Core\System\Country\CountryDefinition;

class CountryExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            (new OneToOneAssociationField('ictGeneralInfo','id','country_id',IctGeneralInfoDefinition::class,false))

        );
    }

    public function getDefinitionClass(): string
    {
        return CountryDefinition::class;
    }
}
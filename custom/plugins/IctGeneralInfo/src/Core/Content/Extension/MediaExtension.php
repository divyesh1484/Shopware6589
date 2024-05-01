<?php declare(strict_types=1);

namespace IctGeneralInfo\Core\Content\Extension;

use IctGeneralInfo\Core\Content\IctGeneralInfo\IctGeneralInfoDefinition;
use Shopware\Core\Content\Media\MediaDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToOneAssociationField;

class MediaExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            (new OneToOneAssociationField('ictGeneralInfo','id','media',IctGeneralInfoDefinition::class,false))

        );
    }

    public function getDefinitionClass(): string
    {
        return MediaDefinition::class;
    }
}
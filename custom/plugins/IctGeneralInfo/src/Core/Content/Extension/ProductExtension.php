<?php declare(strict_types=1);

namespace IctGeneralInfo\Core\Content\Extension;

use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use IctGeneralInfo\Core\Content\IctGeneralInfo\IctGeneralInfoDefinition;
use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToOneAssociationField;

class ProductExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            (new OneToOneAssociationField('ictGeneralInfo','id','product_id',IctGeneralInfoDefinition::class,false)),
        );
    }

    public function getDefinitionClass(): string
    {
        return ProductDefinition::class;
    }
}
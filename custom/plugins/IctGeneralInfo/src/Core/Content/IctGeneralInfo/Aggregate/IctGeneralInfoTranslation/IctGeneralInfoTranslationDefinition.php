<?php declare(strict_types=1);

namespace IctGeneralInfo\Core\Content\IctGeneralInfo\Aggregate\IctGeneralInfoTranslation;

use IctGeneralInfo\Core\Content\IctGeneralInfo\IctGeneralInfoDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityTranslationDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class IctGeneralInfoTranslationDefinition extends EntityTranslationDefinition
{
    public const ENTITY_NAME = "ict_general_info_translation";

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    public function getEntityClass(): string
    {
        return IctGeneralInfoTranslationEntity::class;
    }

    public function getCollectionClass(): string
    {
        return IctGeneralInfoTranslationCollection::class;   
    }
    
    public function getParentDefinitionClass(): string
    {
        return IctGeneralInfoDefinition::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new StringField('name','name')),
            (new StringField('city','city')),
        ]);
    }
}   


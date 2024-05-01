<?php declare(strict_types=1);

namespace IctGeneralInfo\Core\Content\IctGeneralInfo;

use Shopware\Core\Content\Media\MediaDefinition;
use Shopware\Core\System\Country\CountryDefinition;
use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\BoolField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use IctGeneralInfo\Core\Content\IctGeneralInfo\IctGeneralInfoEntity;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\ApiAware;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslatedField;
use IctGeneralInfo\Core\Content\IctGeneralInfo\IctGeneralInfoCollection;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ReferenceVersionField;
use Shopware\Core\System\Country\Aggregate\CountryState\CountryStateDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslationsAssociationField;
use IctGeneralInfo\Core\Content\IctGeneralInfo\Aggregate\IctGeneralInfoTranslation\IctGeneralInfoTranslationDefinition;

class IctGeneralInfoDefinition extends EntityDefinition
{
    public const ENTITY_NAME = "ict_general_info";

    public function getEntityName() : string {

        return self::ENTITY_NAME;
    }

    public function getCollectionClass(): string
    {
        return IctGeneralInfoCollection::class;
    }

    public function getEntityClass(): string
    {
        return IctGeneralInfoEntity::class;
    }

    protected function defineFields(): FieldCollection
    {
        /**
         * IdField id
         * TranslatedField name
         * TranslatedField city
         * BoolField active
         * FkField country
         * FkField State
         * OneToOneAssociationField image
         * FkField product
         */
        
        return new FieldCollection([
            (new IdField('id', 'id'))->addFlags(new Required(), new PrimaryKey() ),
            (new TranslatedField('name', 'name'))->addFlags(new ApiAware()),
            (new TranslatedField('city', 'city'))->addFlags(new ApiAware()),
            (new BoolField('active', 'active')),
            (new FkField('country_id', 'countryId', CountryDefinition::class)),
            (new FkField('country_state_id', 'countryStateId', CountryStateDefinition::class)),
            (new FkField('product_id', 'productId', ProductDefinition::class)),
            (new ReferenceVersionField(self::class, 'product_id'))->addFlags(new ApiAware()),
            (new FkField('media', 'media', MediaDefinition::class)),
            (new OneToOneAssociationField('media','media','id',MediaDefinition::class,false)),
            (new OneToOneAssociationField('country','country_id','id',CountryDefinition::class,false)),
            (new OneToOneAssociationField('country_state','country_state_id','id',CountryStateDefinition::class,false)),
            (new OneToOneAssociationField('product','product_id','id',ProductDefinition::class,false)),
            (new TranslationsAssociationField(
                IctGeneralInfoTranslationDefinition::class,
                'ict_general_info_id',
            ))->addFlags(new ApiAware(), new Required()),
        ]);
    }

    
}
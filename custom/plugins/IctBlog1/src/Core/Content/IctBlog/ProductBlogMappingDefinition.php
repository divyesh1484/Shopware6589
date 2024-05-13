<?php

namespace IctBlog1\Core\Content\IctBlog1;

use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ReferenceVersionField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class ProductBlogMappingDefinition extends EntityDefinition
{
    public const ENTITY_NAME="product_blog";
    public function getEntityName(): string
    {
        // TODO: Implement getEntityName() method.
        return self::ENTITY_NAME;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new FkField('product_id', 'productId', ProductDefinition::class))->addFlags(new PrimaryKey(), new Required()),
            (new ReferenceVersionField(ProductDefinition::class))->addFlags(new PrimaryKey(), new Required()),

            (new FkField('id', 'id', IctBlogDefinition::class))->addFlags(new PrimaryKey(), new Required()),

            (new ManyToOneAssociationField('product', 'product_id', ProductDefinition::class, 'id', false)),
            (new ManyToOneAssociationField('ict_blog', 'id', IctBlogDefinition::class, 'id', false)),
        ]);
    }
}
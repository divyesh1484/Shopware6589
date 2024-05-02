<?php

namespace IctBlogPlugin\Core\Content;

use IctBlogPlugin\Core\Content\IctBlog\IctBlogDefinition;
use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Exception\MappingEntityClassesException;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ReferenceVersionField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\Framework\DataAbstractionLayer\MappingEntityDefinition;

class ProductBlogMappingDefinition extends MappingEntityDefinition
{
    public const ENTITY_NAME="ict_product_blog_mapping";

    public function getEntityName(): string
    {
        // TODO: Implement getEntityName() method.
        return self::ENTITY_NAME;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new FkField('ict_blog_id', 'ictBlogId', IctBlogDefinition::class))->addFlags(new PrimaryKey(), new Required()),
            (new FkField('product_id', 'productId', ProductDefinition::class))->addFlags(new PrimaryKey(), new Required()),
            (new ReferenceVersionField(ProductDefinition::class))->addFlags(new PrimaryKey(), new Required()),
            (new ManyToOneAssociationField('ictBlog', 'ict_blog_id', IctBlogDefinition::class, 'id', false)),
            (new ManyToOneAssociationField('product', 'product_id', ProductDefinition::class, 'id', false)),
        ]);
    }
}
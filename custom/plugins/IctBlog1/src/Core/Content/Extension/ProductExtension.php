<?php declare(strict_types=1);

namespace IctBlog1\Core\Content\Extension;

use IctBlog1\Core\Content\IctBlog1\ProductBlogMappingDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use IctBlog1\Core\Content\IctBlog1\IctBlogDefinition;
use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToOneAssociationField;

class ProductExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
//            (new OneToOneAssociationField('ictBlog','id','product_id',IctBlogDefinition::class,false)),
            (new ManyToManyAssociationField('ictBlog', IctBlogDefinition::class, ProductBlogMappingDefinition::class,'id','product_id'))
        );
    }

    public function getDefinitionClass(): string
    {
        return ProductDefinition::class;
    }
}
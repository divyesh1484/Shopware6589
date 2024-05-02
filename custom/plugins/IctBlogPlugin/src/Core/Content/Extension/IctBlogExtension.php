<?php

namespace IctBlogPlugin\Core\Content\Extension;

use IctBlogPlugin\Core\Content\ProductBlogMappingDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class IctBlogExtension extends EntityExtension
{

    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            (new OneToOneAssociationField('ictBlog','ict_blog_id','id',ProductBlogMappingDefinition::class,false)),

        );
    }

    public function getDefinitionClass(): string
    {
        return ProductBlogMappingDefinition::class;
    }
}
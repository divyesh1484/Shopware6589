<?php declare(strict_types=1);

namespace IctBlogPlugin\Core\Content\Extension;

use IctBlogPlugin\Core\Content\IctBlog\IctBlogDefinition;
use IctBlogPlugin\Core\Content\ProductBlogMappingDefinition;
use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class ProductExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            (new ManyToManyAssociationField(
                'ictBlog',
                IctBlogDefinition::class,
                ProductBlogMappingDefinition::class,
                'ict_blog_id',
                'product_id')
            )
        );
    }

    public function getDefinitionClass(): string
    {
        return ProductDefinition::class;
    }
}
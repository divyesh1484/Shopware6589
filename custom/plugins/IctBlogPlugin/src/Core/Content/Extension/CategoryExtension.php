<?php declare(strict_types=1);

namespace IctBlogPlugin\Core\Content\Extension;

use IctBlogPlugin\Core\Content\IctBlog\IctBlogDefinition;
use IctBlogPlugin\Core\Content\IctCategory\IctCategoryDefinition;
use Shopware\Core\Content\Category\CategoryDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class CategoryExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            (new OneToOneAssociationField('ictBlog','id','category_id',IctBlogDefinition::class,false)),
        );
    }

    public function getDefinitionClass(): string
    {
        return IctCategoryDefinition::class;
    }
}
<?php declare(strict_types=1);

namespace IctBlog1\Core\Content\Extension;

use IctBlog1\Core\Content\IctCategory\IctCategoryDefinition;
use Shopware\Core\Content\Category\CategoryDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class CategoryExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            (new OneToOneAssociationField('ictBlog','id','category_id',IctCategoryDefinition::class,false)),
        );
    }

    public function getDefinitionClass(): string
    {
        return CategoryDefinition::class;
    }
}
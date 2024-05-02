<?php declare(strict_types=1);

namespace IctBlogPlugin\Core\Content\Extension;

use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use IctBlogPlugin\Core\Content\IctBlog\IctBlogDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToOneAssociationField;

class IctCategoryExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
                (new OneToOneAssociationField('category','id','category_id',IctBlogDefinition::class,false)),

        );
    }

    public function getDefinitionClass(): string
    {
        return IctBlogDefinition::class;
    }
}
<?php declare(strict_types=1);

namespace IctBlogPlugin\Core\Content\IctCategory;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @package core
 * @method void                add(IctCategoryEntity $entity)
 * @method void                set(string $key, IctCategoryEntity $entity)
 * @method IctCategoryEntity[]    getIterator()
 * @method IctCategoryEntity[]    getElements()
 * @method IctCategoryEntity|null get(string $key)
 * @method IctCategoryEntity|null first()
 * @method IctCategoryEntity|null last()
 */
class IctCategoryCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return IctCategoryEntity::class;
    }
}
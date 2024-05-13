<?php declare(strict_types=1);

namespace IctBlog1\Core\Content\IctCategory\Aggregate\IctCategoryTranslation;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @package core
 * @method void                add(IctCategoryTranslationEntity $entity)
 * @method void                set(string $key, IctCategoryTranslationEntity $entity)
 * @method IctCategoryTranslationEntity[]    getIterator()
 * @method IctCategoryTranslationEntity[]    getElements()
 * @method IctCategoryTranslationEntity|null get(string $key)
 * @method IctCategoryTranslationEntity|null first()
 * @method IctCategoryTranslationEntity|null last()
 */
class IctCategoryTranslationCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return IctCategoryTranslationEntity::class;
    }
}
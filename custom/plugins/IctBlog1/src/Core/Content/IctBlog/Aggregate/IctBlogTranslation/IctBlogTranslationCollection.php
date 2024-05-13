<?php declare(strict_types=1);

namespace IctBlog1\Core\Content\IctBlog1\Aggregate\IctBlogTranslation;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @package core
 * @method void                add(IctBlogTranslationEntity $entity)
 * @method void                set(string $key, IctBlogTranslationEntity $entity)
 * @method IctBlogTranslationEntity[]    getIterator()
 * @method IctBlogTranslationEntity[]    getElements()
 * @method IctBlogTranslationEntity|null get(string $key)
 * @method IctBlogTranslationEntity|null first()
 * @method IctBlogTranslationEntity|null last()
 */
class IctBlogTranslationCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return IctBlogTranslationEntity::class;
    }
}
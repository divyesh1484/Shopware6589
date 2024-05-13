<?php declare(strict_types=1);

namespace IctBlog1\Core\Content\IctBlog1;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @package core
 * @method void                add(IctBlogEntity $entity)
 * @method void                set(string $key, IctBlogEntity $entity)
 * @method IctBlogEntity[]    getIterator()
 * @method IctBlogEntity[]    getElements()
 * @method IctBlogEntity|null get(string $key)
 * @method IctBlogEntity|null first()
 * @method IctBlogEntity|null last()
 */
class IctBlogCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return IctBlogEntity::class;
    }
}
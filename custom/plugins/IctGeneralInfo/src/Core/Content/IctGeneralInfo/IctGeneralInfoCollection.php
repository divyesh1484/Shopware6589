<?php declare(strict_types=1);

namespace IctGeneralInfo\Core\Content\IctGeneralInfo;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @package core
 * @method void                add(IctGeneralInfoEntity $entity)
 * @method void                set(string $key, IctGeneralInfoEntity $entity)
 * @method IctGeneralInfoEntity[]    getIterator()
 * @method IctGeneralInfoEntity[]    getElements()
 * @method IctGeneralInfoEntity|null get(string $key)
 * @method IctGeneralInfoEntity|null first()
 * @method IctGeneralInfoEntity|null last()
 */
class IctGeneralInfoCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return IctGeneralInfoEntity::class;
    }
}
<?php declare(strict_types=1);

namespace IctGeneralInfo\Core\Content\IctGeneralInfo\Aggregate\IctGeneralInfoTranslation;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @package core
 * @method void                add(IctGeneralInfoTranslationEntity $entity)
 * @method void                set(string $key, IctGeneralInfoTranslationEntity $entity)
 * @method IctGeneralInfoTranslationEntity[]    getIterator()
 * @method IctGeneralInfoTranslationEntity[]    getElements()
 * @method IctGeneralInfoTranslationEntity|null get(string $key)
 * @method IctGeneralInfoTranslationEntity|null first()
 * @method IctGeneralInfoTranslationEntity|null last()
 */
class IctGeneralInfoTranslationCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return IctGeneralInfoTranslationEntity::class;
    }
}
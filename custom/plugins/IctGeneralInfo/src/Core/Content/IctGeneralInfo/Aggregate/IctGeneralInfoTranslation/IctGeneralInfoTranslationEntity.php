<?php declare(strict_types=1);

namespace IctGeneralInfo\Core\Content\IctGeneralInfo\Aggregate\IctGeneralInfoTranslation;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;
use IctGeneralInfo\Core\Content\IctGeneralInfo\IctGeneralInfoEntity;
use Shopware\Core\System\Language\LanguageEntity;

class IctGeneralInfoTranslationEntity extends Entity
{
    use EntityIdTrait;

    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $city;

    /**
     * @var \DateTimeInterface
     */
    protected $createdAt;

    /**
     * @var \DateTimeInterface|null
     */
    protected $updatedAt;

    /**
     * @var string
     */
    protected $ictGeneralInfoId;

    /**
     * @var string
     */
    protected $languageId;

    /**
     * @var IctGeneralInfoEntity|null
     */
    protected $ictGeneralInfo;

    /**
     * @var LanguageEntity|null
     */
    protected $language;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function getIctGeneralInfoId(): string
    {
        return $this->ictGeneralInfoId;
    }

    public function setIctGeneralInfoId(string $ictGeneralInfoId): void
    {
        $this->ictGeneralInfoId = $ictGeneralInfoId;
    }

    public function getLanguageId(): string
    {
        return $this->languageId;
    }

    public function setLanguageId(string $languageId): void
    {
        $this->languageId = $languageId;
    }

    public function getIctGeneralInfo(): ?IctGeneralInfoEntity
    {
        return $this->ictGeneralInfo;
    }

    public function setIctGeneralInfo(?IctGeneralInfoEntity $ictGeneralInfo): void
    {
        $this->ictGeneralInfo = $ictGeneralInfo;
    }

    public function getLanguage(): ?LanguageEntity
    {
        return $this->language;
    }

    public function setLanguage(?LanguageEntity $language): void
    {
        $this->language = $language;
    }
}
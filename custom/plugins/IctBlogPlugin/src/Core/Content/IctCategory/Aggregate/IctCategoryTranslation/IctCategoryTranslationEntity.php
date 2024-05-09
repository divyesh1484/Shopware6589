<?php declare(strict_types=1);

namespace IctBlogPlugin\Core\Content\IctCategory\Aggregate\IctCategoryTranslation;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;
use IctBlogPlugin\Core\Content\IctCategory\IctCategoryEntity;
use Shopware\Core\System\Language\LanguageEntity;

class IctCategoryTranslationEntity extends Entity
{
    use EntityIdTrait;

    /**
     * @var string|null
     */
    protected $name;

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
    protected $ictCategoryId;

    /**
     * @var string
     */
    protected $languageId;

    /**
     * @var IctCategoryEntity|null
     */
    protected $ictCategory;

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

    public function getCreatedAt(): ?\DateTimeInterface
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

    public function getIctCategoryId(): string
    {
        return $this->ictCategoryId;
    }

    public function setIctCategoryId(string $ictCategoryId): void
    {
        $this->ictCategoryId = $ictCategoryId;
    }

    public function getLanguageId(): string
    {
        return $this->languageId;
    }

    public function setLanguageId(string $languageId): void
    {
        $this->languageId = $languageId;
    }

    public function getIctCategory(): ?IctCategoryEntity
    {
        return $this->ictCategory;
    }

    public function setIctCategory(?IctCategoryEntity $ictCategory): void
    {
        $this->ictCategory = $ictCategory;
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
<?php declare(strict_types=1);

namespace IctBlog1\Core\Content\IctBlog1;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;
use IctBlog1\Core\Content\IctCategory\IctCategoryEntity;
use Shopware\Core\Content\Product\ProductCollection;
use IctBlog1\Core\Content\IctBlog1\Aggregate\IctBlogTranslation\IctBlogTranslationCollection;

class IctBlogEntity extends Entity
{
    use EntityIdTrait;

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $description;

    /**
     * @var string|null
     */
    protected $author;

    /**
     * @var \DateTimeInterface|null
     */
    protected $releaseDate;

    /**
     * @var bool|null
     */
    protected $active;

    /**
     * @var string|null
     */
    protected $categoryId;

    /**
     * @var string|null
     */
    protected $prdouctId;

    /**
     * @var IctCategoryEntity|null
     */
    protected $blogCategory;

    /**
     * @var ProductCollection|null
     */
    protected $product;

    /**
     * @var IctBlogTranslationCollection
     */
    protected $translations;

    /**
     * @var \DateTimeInterface
     */
    protected $createdAt;

    /**
     * @var \DateTimeInterface|null
     */
    protected $updatedAt;

    /**
     * @var array|null
     */
    protected $translated;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(?string $author): void
    {
        $this->author = $author;
    }

    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(?\DateTimeInterface $releaseDate): void
    {
        $this->releaseDate = $releaseDate;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    public function getCategoryId(): ?string
    {
        return $this->categoryId;
    }

    public function setCategoryId(?string $categoryId): void
    {
        $this->categoryId = $categoryId;
    }

    public function getPrdouctId(): ?string
    {
        return $this->prdouctId;
    }

    public function setPrdouctId(?string $prdouctId): void
    {
        $this->prdouctId = $prdouctId;
    }

    public function getBlogCategory(): ?IctCategoryEntity
    {
        return $this->blogCategory;
    }

    public function setBlogCategory(?IctCategoryEntity $blogCategory): void
    {
        $this->blogCategory = $blogCategory;
    }

    public function getProduct(): ?ProductCollection
    {
        return $this->product;
    }

    public function setProduct(?ProductCollection $product): void
    {
        $this->product = $product;
    }

    public function getTranslations(): IctBlogTranslationCollection
    {
        return $this->translations;
    }

    public function setTranslations(IctBlogTranslationCollection $translations): void
    {
        $this->translations = $translations;
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

    public function getTranslated(): ?array
    {
        return $this->translated;
    }

    public function setTranslated(?array $translated): void
    {
        $this->translated = $translated;
    }
}
<?php declare(strict_types=1);

namespace SwagBlogPlug\Core\Content\Blog;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;
use Shopware\Core\Content\Product\ProductCollection;
use SwagBlogPlug\Core\Content\BlogCategory\SwagBlogCategoryEntity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;
use SwagBlogPlug\Core\Content\Blog\SwagBlogCollection;

class SwagBlogEntity extends Entity
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
     * @var string
     */
    protected $description;

    /**
     * @var bool
     */
    protected $active;

    /**
     * @var string|null
     */
    protected $author;

    /**
     * @var \DateTimeInterface
     */
    protected $releaseDate;

    /**
     * @var string
     */
    protected $swagBlogCategoryId;

    /**
     * @var \DateTimeInterface
     */
    protected $createdAt;

    /**
     * @var \DateTimeInterface|null
     */
    protected $updatedAt;

    /**
     * @var ProductCollection|null
     */
    protected $products;

    /**
     * @var SwagBlogCategoryEntity|null
     */
    protected $swagBlogCategory;

    /**
     * @var EntityCollection|null
     */
    protected $translations;

    /**
     * @var SwagBlogCollection|null
     */
    protected $blogs;

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

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(?string $author): void
    {
        $this->author = $author;
    }

    public function getReleaseDate(): \DateTimeInterface
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(\DateTimeInterface $releaseDate): void
    {
        $this->releaseDate = $releaseDate;
    }

    public function getSwagBlogCategoryId(): string
    {
        return $this->swagBlogCategoryId;
    }

    public function setSwagBlogCategoryId(string $swagBlogCategoryId): void
    {
        $this->swagBlogCategoryId = $swagBlogCategoryId;
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

    public function getProducts(): ?ProductCollection
    {
        return $this->products;
    }

    public function setProducts(?ProductCollection $products): void
    {
        $this->products = $products;
    }

    public function getSwagBlogCategory(): ?SwagBlogCategoryEntity
    {
        return $this->swagBlogCategory;
    }

    public function setSwagBlogCategory(?SwagBlogCategoryEntity $swagBlogCategory): void
    {
        $this->swagBlogCategory = $swagBlogCategory;
    }

    public function getTranslations(): ?EntityCollection
    {
        return $this->translations;
    }

    public function setTranslations(?EntityCollection $translations): void
    {
        $this->translations = $translations;
    }

    public function getBlogs(): ?SwagBlogCollection
    {
        return $this->blogs;
    }

    public function setBlogs(?SwagBlogCollection $blogs): void
    {
        $this->blogs = $blogs;
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
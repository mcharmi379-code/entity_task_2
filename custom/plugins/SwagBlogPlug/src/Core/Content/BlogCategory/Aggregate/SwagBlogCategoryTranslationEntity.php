<?php declare(strict_types=1);

namespace SwagBlogPlug\Core\Content\BlogCategory\Aggregate;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;
use SwagBlogPlug\Core\Content\BlogCategory\SwagBlogCategoryEntity;
use Shopware\Core\System\Language\LanguageEntity;

class SwagBlogCategoryTranslationEntity extends Entity
{
    use EntityIdTrait;

    /**
     * @var string
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
    protected $swagBlogCategoryId;

    /**
     * @var string
     */
    protected $languageId;

    /**
     * @var SwagBlogCategoryEntity|null
     */
    protected $swagBlogCategory;

    /**
     * @var LanguageEntity|null
     */
    protected $language;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
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

    public function getSwagBlogCategoryId(): string
    {
        return $this->swagBlogCategoryId;
    }

    public function setSwagBlogCategoryId(string $swagBlogCategoryId): void
    {
        $this->swagBlogCategoryId = $swagBlogCategoryId;
    }

    public function getLanguageId(): string
    {
        return $this->languageId;
    }

    public function setLanguageId(string $languageId): void
    {
        $this->languageId = $languageId;
    }

    public function getSwagBlogCategory(): ?SwagBlogCategoryEntity
    {
        return $this->swagBlogCategory;
    }

    public function setSwagBlogCategory(?SwagBlogCategoryEntity $swagBlogCategory): void
    {
        $this->swagBlogCategory = $swagBlogCategory;
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
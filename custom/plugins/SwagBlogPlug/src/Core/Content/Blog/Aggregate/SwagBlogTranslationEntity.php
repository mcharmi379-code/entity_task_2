<?php declare(strict_types=1);

namespace SwagBlogPlug\Core\Content\Blog\Aggregate;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;
use SwagBlogPlug\Core\Content\Blog\SwagBlogEntity;
use Shopware\Core\System\Language\LanguageEntity;

class SwagBlogTranslationEntity extends Entity
{
    use EntityIdTrait;

    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $author;

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
    protected $swagBlogId;

    /**
     * @var string
     */
    protected $languageId;

    /**
     * @var SwagBlogEntity|null
     */
    protected $swagBlog;

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

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(?string $author): void
    {
        $this->author = $author;
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

    public function getSwagBlogId(): string
    {
        return $this->swagBlogId;
    }

    public function setSwagBlogId(string $swagBlogId): void
    {
        $this->swagBlogId = $swagBlogId;
    }

    public function getLanguageId(): string
    {
        return $this->languageId;
    }

    public function setLanguageId(string $languageId): void
    {
        $this->languageId = $languageId;
    }

    public function getSwagBlog(): ?SwagBlogEntity
    {
        return $this->swagBlog;
    }

    public function setSwagBlog(?SwagBlogEntity $swagBlog): void
    {
        $this->swagBlog = $swagBlog;
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
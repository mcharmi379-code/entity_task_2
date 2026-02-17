<?php

declare(strict_types=1);

namespace SwagBlogPlug\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

/**
 * @internal
 */
class Migration1771226542 extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1771226542;
    }

    public function update(Connection $connection): void
    {
        $connection->executeStatement("
             CREATE TABLE `swag_blog_category` (
                `id` BINARY(16) NOT NULL,
                `created_at` DATETIME(3) NOT NULL,
                `updated_at` DATETIME(3) NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ");

        $connection->executeStatement("
            CREATE TABLE `swag_blog` (
            `id` BINARY(16) NOT NULL,
            `active` TINYINT(1) NOT NULL DEFAULT '0',
            `release_date` DATE NOT NULL,
            `swag_blog_category_id` BINARY(16) NULL,
            `created_at` DATETIME(3) NOT NULL,
            `updated_at` DATETIME(3) NULL,
            PRIMARY KEY (`id`),
            KEY `fk.swag_blog.swag_blog_category_id` (`swag_blog_category_id`),
            CONSTRAINT `fk.swag_blog.swag_blog_category_id`
                FOREIGN KEY (`swag_blog_category_id`)
                REFERENCES `swag_blog_category` (`id`)
                ON DELETE SET NULL
                ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ");

        $connection->executeStatement("
            CREATE TABLE `swag_blog_translation` (
                `swag_blog_id` BINARY(16) NOT NULL,
                `language_id` BINARY(16) NOT NULL,
                `name` VARCHAR(255) NOT NULL,
                `author` VARCHAR(255) NULL,
                `description` VARCHAR(255) NOT NULL,
                `created_at` DATETIME(3) NOT NULL,
                `updated_at` DATETIME(3) NULL,
                PRIMARY KEY (`swag_blog_id`,`language_id`),
                KEY `fk.swag_blog_translation.language_id` (`language_id`),
                CONSTRAINT `fk.swag_blog_translation.blog_id`
                    FOREIGN KEY (`swag_blog_id`)
                    REFERENCES `swag_blog` (`id`)
                    ON DELETE CASCADE
                    ON UPDATE CASCADE,
                CONSTRAINT `fk.swag_blog_translation.language_id`
                    FOREIGN KEY (`language_id`)
                    REFERENCES `language` (`id`)
                    ON DELETE CASCADE
                    ON UPDATE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
            ");


        $connection->executeStatement("
                CREATE TABLE `swag_blog_category_translation` (
                    `swag_blog_category_id` BINARY(16) NOT NULL,
                    `language_id` BINARY(16) NOT NULL,
                    `name` VARCHAR(255) NOT NULL,
                    `created_at` DATETIME(3) NOT NULL,
                    `updated_at` DATETIME(3) NULL,
                    PRIMARY KEY (`swag_blog_category_id`,`language_id`),
                    KEY `fk.swag_blog_category_translation.language_id` (`language_id`),
                    CONSTRAINT `fk.swag_blog_category_translation.category_id`
                        FOREIGN KEY (`swag_blog_category_id`)
                        REFERENCES `swag_blog_category` (`id`)
                        ON DELETE CASCADE
                        ON UPDATE CASCADE,
                    CONSTRAINT `fk.swag_blog_category_translation.language_id`
                        FOREIGN KEY (`language_id`)
                        REFERENCES `language` (`id`)
                        ON DELETE CASCADE
                        ON UPDATE CASCADE
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

                ");

        $connection->executeStatement("
            CREATE TABLE `swag_blog_product` (
                `blog_id` BINARY(16) NOT NULL,
                `product_id` BINARY(16) NOT NULL,
                PRIMARY KEY (`blog_id`,`product_id`),
                KEY `fk.swag_blog_product.product_id` (`product_id`),
                CONSTRAINT `fk.swag_blog_product.blog_id`
                    FOREIGN KEY (`blog_id`)
                    REFERENCES `swag_blog` (`id`)
                    ON DELETE CASCADE
                    ON UPDATE CASCADE,
                CONSTRAINT `fk.swag_blog_product.product_id`
                    FOREIGN KEY (`product_id`)
                    REFERENCES `product` (`id`)
                    ON DELETE CASCADE
                    ON UPDATE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
                ");
    }
}

CREATE TABLE `swag_migration_logging` (
    `id` BINARY(16) NOT NULL,
    `level` VARCHAR(64) NOT NULL,
    `code` VARCHAR(255) NOT NULL,
    `title` LONGTEXT NOT NULL,
    `description` LONGTEXT NOT NULL,
    `parameters` JSON NOT NULL,
    `title_snippet` VARCHAR(255) NOT NULL,
    `description_snippet` VARCHAR(255) NOT NULL,
    `entity` VARCHAR(255) NULL,
    `source_id` VARCHAR(255) NULL,
    `run_id` BINARY(16) NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    `auto_increment` INT(11) NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `json.swag_migration_logging.parameters` CHECK (JSON_VALID(`parameters`)),
    KEY `fk.swag_migration_logging.run_id` (`run_id`),
    CONSTRAINT `fk.swag_migration_logging.run_id` FOREIGN KEY (`run_id`) REFERENCES `swag_migration_run` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `swag_migration_run` (
    `id` BINARY(16) NOT NULL,
    `connection_id` BINARY(16) NULL,
    `environment_information` JSON NULL,
    `progress` JSON NULL,
    `totals` INT(11) NULL,
    `step` VARCHAR(255) NOT NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `json.swag_migration_run.environment_information` CHECK (JSON_VALID(`environment_information`)),
    CONSTRAINT `json.swag_migration_run.progress` CHECK (JSON_VALID(`progress`)),
    KEY `fk.swag_migration_run.connection_id` (`connection_id`),
    CONSTRAINT `fk.swag_migration_run.connection_id` FOREIGN KEY (`connection_id`) REFERENCES `swag_migration_connection` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `swag_migration_data` (
    `id` BINARY(16) NOT NULL,
    `run_id` BINARY(16) NOT NULL,
    `auto_increment` INT(11) NULL,
    `entity` VARCHAR(255) NOT NULL,
    `raw` JSON NOT NULL,
    `converted` JSON NULL,
    `unmapped` JSON NULL,
    `mapping_uuid` BINARY(16) NULL,
    `written` TINYINT(1) NULL DEFAULT '0',
    `convert_failure` TINYINT(1) NULL DEFAULT '0',
    `write_failure` TINYINT(1) NULL DEFAULT '0',
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `json.swag_migration_data.raw` CHECK (JSON_VALID(`raw`)),
    CONSTRAINT `json.swag_migration_data.converted` CHECK (JSON_VALID(`converted`)),
    CONSTRAINT `json.swag_migration_data.unmapped` CHECK (JSON_VALID(`unmapped`)),
    KEY `fk.swag_migration_data.run_id` (`run_id`),
    CONSTRAINT `fk.swag_migration_data.run_id` FOREIGN KEY (`run_id`) REFERENCES `swag_migration_run` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `swag_migration_mapping` (
    `id` BINARY(16) NOT NULL,
    `connection_id` BINARY(16) NOT NULL,
    `entity` VARCHAR(255) NOT NULL,
    `old_identifier` VARCHAR(255) NULL,
    `entity_uuid` BINARY(16) NULL,
    `entity_value` VARCHAR(255) NULL,
    `checksum` VARCHAR(255) NULL,
    `additional_data` JSON NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `json.swag_migration_mapping.additional_data` CHECK (JSON_VALID(`additional_data`)),
    KEY `fk.swag_migration_mapping.connection_id` (`connection_id`),
    CONSTRAINT `fk.swag_migration_mapping.connection_id` FOREIGN KEY (`connection_id`) REFERENCES `swag_migration_connection` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `swag_migration_media_file` (
    `id` BINARY(16) NOT NULL,
    `run_id` BINARY(16) NOT NULL,
    `entity` VARCHAR(255) NOT NULL,
    `uri` VARCHAR(255) NOT NULL,
    `file_name` VARCHAR(255) NOT NULL,
    `file_size` INT(11) NOT NULL,
    `media_id` BINARY(16) NOT NULL,
    `written` TINYINT(1) NULL DEFAULT '0',
    `processed` TINYINT(1) NULL DEFAULT '0',
    `process_failure` TINYINT(1) NULL DEFAULT '0',
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`),
    KEY `fk.swag_migration_media_file.run_id` (`run_id`),
    CONSTRAINT `fk.swag_migration_media_file.run_id` FOREIGN KEY (`run_id`) REFERENCES `swag_migration_run` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `swag_migration_general_setting` (
    `id` BINARY(16) NOT NULL,
    `selected_connection_id` BINARY(16) NULL,
    `is_reset` TINYINT(1) NULL DEFAULT '0',
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`),
    KEY `fk.swag_migration_general_setting.selected_connection_id` (`selected_connection_id`),
    CONSTRAINT `fk.swag_migration_general_setting.selected_connection_id` FOREIGN KEY (`selected_connection_id`) REFERENCES `swag_migration_connection` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `swag_migration_connection` (
    `id` BINARY(16) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `credential_fields` JSON NULL,
    `premapping` JSON NULL,
    `profile_name` VARCHAR(255) NOT NULL,
    `gateway_name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `json.swag_migration_connection.credential_fields` CHECK (JSON_VALID(`credential_fields`)),
    CONSTRAINT `json.swag_migration_connection.premapping` CHECK (JSON_VALID(`premapping`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `swag_blog` (
    `id` BINARY(16) NOT NULL,
    `active` TINYINT(1) NOT NULL DEFAULT '0',
    `release_date` DATE NOT NULL,
    `swag_blog_category_id` BINARY(16) NOT NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `json.swag_blog.translated` CHECK (JSON_VALID(`translated`)),
    KEY `fk.swag_blog.swag_blog_category_id` (`swag_blog_category_id`),
    CONSTRAINT `fk.swag_blog.swag_blog_category_id` FOREIGN KEY (`swag_blog_category_id`) REFERENCES `swag_blog_category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `swag_blog_translation` (
    `name` VARCHAR(255) NOT NULL,
    `author` VARCHAR(255) NULL,
    `description` VARCHAR(255) NOT NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    `swag_blog_id` BINARY(16) NOT NULL,
    `language_id` BINARY(16) NOT NULL,
    PRIMARY KEY (`swag_blog_id`,`language_id`),
    KEY `fk.swag_blog_translation.swag_blog_id` (`swag_blog_id`),
    KEY `fk.swag_blog_translation.language_id` (`language_id`),
    CONSTRAINT `fk.swag_blog_translation.swag_blog_id` FOREIGN KEY (`swag_blog_id`) REFERENCES `swag_blog` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT `fk.swag_blog_translation.language_id` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `swag_blog_category` (
    `id` BINARY(16) NOT NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `json.swag_blog_category.translated` CHECK (JSON_VALID(`translated`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `swag_blog_category_translation` (
    `name` VARCHAR(255) NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    `swag_blog_category_id` BINARY(16) NOT NULL,
    `language_id` BINARY(16) NOT NULL,
    PRIMARY KEY (`swag_blog_category_id`,`language_id`),
    KEY `fk.swag_blog_category_translation.swag_blog_category_id` (`swag_blog_category_id`),
    KEY `fk.swag_blog_category_translation.language_id` (`language_id`),
    CONSTRAINT `fk.swag_blog_category_translation.swag_blog_category_id` FOREIGN KEY (`swag_blog_category_id`) REFERENCES `swag_blog_category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT `fk.swag_blog_category_translation.language_id` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `swag_blog_product` (
    `blog_id` BINARY(16) NOT NULL,
    `product_id` BINARY(16) NOT NULL,
    PRIMARY KEY (`blog_id`,`product_id`),
    KEY `fk.swag_blog_product.blog_id` (`blog_id`),
    KEY `fk.swag_blog_product.product_id` (`product_id`),
    CONSTRAINT `fk.swag_blog_product.blog_id` FOREIGN KEY (`blog_id`) REFERENCES `swag_blog` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT `fk.swag_blog_product.product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
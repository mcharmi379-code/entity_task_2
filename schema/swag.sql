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
    `name` VARCHAR(255) NULL,
    `description` VARCHAR(255) NULL,
    `active` TINYINT(1) NULL DEFAULT '0',
    `author` VARCHAR(255) NULL,
    `release_date` DATE NULL,
    `product_id` BINARY(16) NULL,
    `category_id` BINARY(16) NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`),
    KEY `fk.swag_blog.category_id` (`category_id`),
    CONSTRAINT `fk.swag_blog.category_id` FOREIGN KEY (`category_id`) REFERENCES `swag_blog_category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `swag_blog_category` (
    `id` TINYINT(1) NOT NULL DEFAULT '0',
    `name` VARCHAR(255) NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
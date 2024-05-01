CREATE TABLE `ict_shop` (
    `id` BINARY(16) NOT NULL,
    `name` VARCHAR(255) NULL,
    `description` VARCHAR(255) NULL,
    `active` TINYINT(1) NULL DEFAULT '0',
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `ict_general_info` (
    `id` BINARY(16) NOT NULL,
    `active` TINYINT(1) NULL DEFAULT '0',
    `country_id` BINARY(16) NULL,
    `country_state_id` BINARY(16) NULL,
    `product_id` BINARY(16) NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `json.ict_general_info.translated` CHECK (JSON_VALID(`translated`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `ict_general_info_translation` (
    `name` VARCHAR(255) NULL,
    `city` VARCHAR(255) NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    `ict_general_info_id` BINARY(16) NOT NULL,
    `language_id` BINARY(16) NOT NULL,
    PRIMARY KEY (`ict_general_info_id`,`language_id`),
    KEY `fk.ict_general_info_translation.ict_general_info_id` (`ict_general_info_id`),
    KEY `fk.ict_general_info_translation.language_id` (`language_id`),
    CONSTRAINT `fk.ict_general_info_translation.ict_general_info_id` FOREIGN KEY (`ict_general_info_id`) REFERENCES `ict_general_info` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT `fk.ict_general_info_translation.language_id` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
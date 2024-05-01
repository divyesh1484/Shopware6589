<?php declare(strict_types=1);

namespace IctGeneralInfo\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1714484523ictGeneralInfoCreateTables extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1714484523;
    }

    public function update(Connection $connection): void
    {
        $sql = <<<SQL
        CREATE TABLE `ict_general_info` (
            `id` BINARY(16) NOT NULL,
            `active` TINYINT(1) NULL DEFAULT '0',
            `country_id` BINARY(16) NULL,
            `country_state_id` BINARY(16) NULL,
            `product_id` BINARY(16) NULL,
            `created_at` DATETIME(3) NOT NULL,
            `updated_at` DATETIME(3) NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        SQL;
        $connection->executeStatement($sql);

        $sql1 = <<<SQL
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
            CONSTRAINT `fk.ict_general_info_translation.ict_general_info_id` FOREIGN KEY (`ict_general_info_id`) REFERENCES `ict_general_info` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
            CONSTRAINT `fk.ict_general_info_translation.language_id` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        SQL;
        $connection->executeStatement($sql1);
    }
}

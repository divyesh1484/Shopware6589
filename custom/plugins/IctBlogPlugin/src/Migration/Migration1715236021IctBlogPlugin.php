<?php declare(strict_types=1);

namespace IctBlogPlugin\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1715236021IctBlogPlugin extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1715236021;
    }

    public function update(Connection $connection): void
    {
        $connection->executeStatement(" 
            CREATE TABLE `ict_category` (
                `id` BINARY(16) NOT NULL,
                `created_at` DATETIME(3) NOT NULL,
                `updated_at` DATETIME(3) NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
            
            CREATE TABLE `ict_category_translation` (
                `name` VARCHAR(255) NULL,
                `created_at` DATETIME(3) NOT NULL,
                `updated_at` DATETIME(3) NULL,
                `ict_category_id` BINARY(16) NOT NULL,
                `language_id` BINARY(16) NOT NULL,
                PRIMARY KEY (`ict_category_id`,`language_id`),
                KEY `fk.ict_category_translation.ict_category_id` (`ict_category_id`),
                KEY `fk.ict_category_translation.language_id` (`language_id`),
                CONSTRAINT `fk.ict_category_translation.ict_category_id` FOREIGN KEY (`ict_category_id`) REFERENCES `ict_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
                CONSTRAINT `fk.ict_category_translation.language_id` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
            
            CREATE TABLE `ict_blog` (
                `id` BINARY(16) NOT NULL,
                `release_date` DATETIME(3) NULL,
                `active` TINYINT(1) NULL DEFAULT '0',
                `category_id` BINARY(16) NULL,
                `created_at` DATETIME(3) NOT NULL,
                `updated_at` DATETIME(3) NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
            
            CREATE TABLE `ict_blog_translation` (
                `name` VARCHAR(255) NULL,
                `description` VARCHAR(255) NULL,
                `author` VARCHAR(255) NULL,
                `created_at` DATETIME(3) NOT NULL,
                `updated_at` DATETIME(3) NULL,
                `ict_blog_id` BINARY(16) NOT NULL,
                `language_id` BINARY(16) NOT NULL,
                PRIMARY KEY (`ict_blog_id`,`language_id`),
                KEY `fk.ict_blog_translation.ict_blog_id` (`ict_blog_id`),
                KEY `fk.ict_blog_translation.language_id` (`language_id`),
                CONSTRAINT `fk.ict_blog_translation.ict_blog_id` FOREIGN KEY (`ict_blog_id`) REFERENCES `ict_blog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
                CONSTRAINT `fk.ict_blog_translation.language_id` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
            
            CREATE TABLE `ict_product_blog_mapping` (
                `ict_blog_id` BINARY(16) NOT NULL,
                `product_id` BINARY(16) NOT NULL,
                `product_version_id` BINARY(16) NOT NULL,
                PRIMARY KEY (`ict_blog_id`,`product_id`,`product_version_id`),
                KEY `fk.ict_product_blog_mapping.product_id` (`product_id`,`product_version_id`),
                CONSTRAINT `fk.ict_product_blog_mapping.product_id` FOREIGN KEY (`product_id`,`product_version_id`) REFERENCES `product` (`id`,`version_id`) ON DELETE CASCADE ON UPDATE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
"       );
    }
}

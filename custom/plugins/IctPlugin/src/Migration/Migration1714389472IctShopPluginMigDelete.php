<?php declare(strict_types=1);

namespace IctPlugin\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1714389472IctShopPluginMigDelete extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1714387649;
    }

    public function update(Connection $connection): void
    {
        $sql = <<<SQL
        DROP TABLE IF EXISTS `ict_shop`
        SQL;
        $connection->executeStatement($sql);
    
    }

    public function updateDestructive(Connection $connection): void
    {

    }
}

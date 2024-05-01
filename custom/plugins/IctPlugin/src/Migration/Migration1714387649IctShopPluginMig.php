<?php declare(strict_types=1);

namespace IctPlugin\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1714387649IctShopPluginMig extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1714387649;
    }

    public function update(Connection $connection): void
    {

    }
}

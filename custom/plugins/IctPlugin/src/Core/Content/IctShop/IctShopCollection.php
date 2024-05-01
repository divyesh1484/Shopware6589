<?php declare(strict_types=1);

namespace IctPlugin\Core\Content\IctShop;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;
use IctPlugin\Core\Content\IctShop\IctShopEntity;

class IctShopCollection extends EntityCollection 
{
    protected function getExpectedClass(): string {
        return IctShopEntity :: class;
    }
}
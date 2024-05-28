<?php declare(strict_types=1);

namespace ICTCustomFees\Core\Checkout;

use Shopware\Core\Checkout\Cart\Cart;
use Shopware\Core\Checkout\Cart\CartBehavior;
use Shopware\Core\Checkout\Cart\CartProcessorInterface;
use Shopware\Core\Checkout\Cart\LineItem\CartDataCollection;
use Shopware\Core\Checkout\Cart\LineItem\LineItem;
use Shopware\Core\Checkout\Cart\LineItem\LineItemCollection;
use Shopware\Core\Checkout\Cart\Price\AbsolutePriceCalculator;
use Shopware\Core\Checkout\Cart\Price\Struct\AbsolutePriceDefinition;
use Shopware\Core\Checkout\Cart\Rule\LineItemRule;
use Shopware\Core\System\SalesChannel\SalesChannelContext;
use Shopware\Core\System\SystemConfig\SystemConfigService;
use Shopware\Core\Framework\Uuid\Uuid;


class CustomCartProcessor implements CartProcessorInterface
{
    private AbsolutePriceCalculator $calculator;

    public function __construct(AbsolutePriceCalculator $calculator, SystemConfigService $systemConfigService)
    {
        $this->calculator = $calculator;
        $this->systemConfigService = $systemConfigService;
    }

    public function process(CartDataCollection $data, Cart $original, Cart $toCalculate, SalesChannelContext $context, CartBehavior $behavior): void
    {
        $products = $this->findProducts($toCalculate);

        // no example products found? early return
        if ($products->count() === 0) {
            return;
        }
        $status = $this->systemConfigService->get('ICTCustomFees.config.status');
        if (!$status) {
            return;
        }
        $customFeesLineItem = $this->addCustomFees();

        // declare price definition to define how this price is calculated
        $absolutePrice= $this->systemConfigService->get('ICTCustomFees.config.customFeeAmount');
        $definition = new AbsolutePriceDefinition(
            $absolutePrice,
            new LineItemRule(LineItemRule::OPERATOR_EQ, $products->getKeys())
        );
        $customFeesLineItem->setPriceDefinition($definition);

        // calculate price
        $customFeesLineItem->setPrice(
            $this->calculator->calculate($definition->getPrice(), $products->getPrices(), $context)
        );
        $productId = $this->systemConfigService->get('ICTCustomFees.config.product');
        if (in_array($productId, $products->getKeys())){
            $toCalculate->add($customFeesLineItem);
        }
    }

    private function findProducts(Cart $cart): LineItemCollection
    {
        return $cart->getLineItems()->filter(function (LineItem $item) {
            // Only consider products, not custom line items or promotional line items
            if ($item->getType() !== LineItem::PRODUCT_LINE_ITEM_TYPE) {
                return false;
            }
            return $item;
        });
    }

    private function addCustomFees(): LineItem
    {
        $label = $this->systemConfigService->get('ICTCustomFees.config.name');

        $customFeesLineItem = new LineItem(Uuid::randomHex(), LineItem::CUSTOM_LINE_ITEM_TYPE, "", 1);

        $customFeesLineItem->setLabel($label);
        $customFeesLineItem->setGood(false);
        $customFeesLineItem->setStackable(false);
        $customFeesLineItem->setRemovable(true);

        return $customFeesLineItem;
    }
}
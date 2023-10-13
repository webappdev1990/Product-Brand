<?php
/**
 * WebAppDev
 * @package WebAppDev_ProductBrand
 * @author WebAppDev <https://github.com/webappdev1990/>
 */
namespace WebAppDev\ProductBrand\Plugin;

use Magento\Quote\Model\Quote\Item;

class DefaultItem
{
    public function aroundGetItemData($subject, \Closure $proceed, Item $item)
    {
        $data = $proceed($item);
        $product = $item->getProduct();

        $atts = [
            "product_manufacturer" => $product->getAttributeText('manufacturer')
        ];

        return array_merge($data, $atts);
    }
}

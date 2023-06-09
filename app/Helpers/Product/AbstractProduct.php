<?php

namespace App\Helpers\Product;

use App\Product\Models\ProductFlatProxy;
use App\Product\Models\ProductFlat;

abstract class AbstractProduct
{
    /**
     * array
     *
     * @var array
     */
    protected $productFlat = [];

    /**
     * Add Channle and Locale filter
     *
     * @param  \Webkul\Attribute\Contracts\Attribute  $attribute
     * @param  \Illuminate\Database\Eloquent\Builder  $qb
     * @param  string  $alias
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function applyChannelLocaleFilter($attribute, $qb, $alias = 'product_attribute_values')
    {
        $channel = core()->getRequestedChannelCode();

        $locale = core()->getRequestedLocaleCode();

        if ($attribute->value_per_channel) {
            if ($attribute->value_per_locale) {
                $qb->where($alias . '.channel', $channel)
                    ->where($alias . '.locale', $locale);
            } else {
                $qb->where($alias . '.channel', $channel);
            }
        } else {
            if ($attribute->value_per_locale) {
                $qb->where($alias . '.locale', $locale);
            }
        }

        return $qb;
    }

    /**
     * Sets product flat variable
     *
     * @param  \Webkul\Product\Contracts\Product|\Webkul\Product\Contracts\ProductFlat  $product
     * @return void|null
     */
    public function setProductFlat($product)
    {
        if (array_key_exists($product->id, $this->productFlat)) {
            return;
        }

        if (! $product instanceof ProductFlat) {
            $this->productFlat[$product->id] = ProductFlatProxy::modelClass()
                ::where('product_flat.product_id', $product->id)
                ->where('product_flat.locale', app()->getLocale())
                ->where('product_flat.channel', core()->getCurrentChannelCode())
                ->select('product_flat.*')
                ->first();
        } else {
            $this->productFlat[$product->id] = $product;
        }
    }
}

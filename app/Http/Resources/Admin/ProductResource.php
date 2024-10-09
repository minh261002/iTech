<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    private $arrProductAttributesId;
    private $arrProductAttributes;

    public static $wrap = 'product';
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $productAttributes = $this->productAttributes($this->productAttributes);
        $productVariations = $this->productVariations($this->productVariations);

        $data = [
            'id' => $this->id,
            'type' => $this->type,
            'slug' => $this->slug,
            'name' => $this->name,
            'price' => $this->price,
            'sale_price' => $this->sale_price,
            'sku' => $this->sku,
            'image' => $this->image,
            'gallery' => $this->gallery,
            'qty' => $this->qty,
            'status' => $this->status,
            'desc' => $this->desc,
            'meta_title' => $this->meta_title,
            'meta_desc' => $this->meta_desc,
            'meta_keywords' => $this->meta_keywords,
            'categories' => $this->categories,
            'productAttributes' => $productAttributes,
            'productVariations' => $productVariations,
            'arrProductAttributesId' => $this->arrProductAttributesId,
            'arrProductAttributes' => $this->arrProductAttributes,
        ];

        return $data;
    }

    private function productAttributes($data)
    {
        $data = $data->map(function ($productAttribute) {
            $arr = [];
            $this->arrProductAttributesId[] = $productAttribute->only('attribute_id')['attribute_id'];

            $this->arrProductAttributes[] = $productAttribute->attribute->variations->mapWithKeys(function ($item) {
                return [$item->id => $item->name];
            });

            foreach ($productAttribute->attributeVariations as $item) {
                $arr[] = $item->only('id')['id'];
            }

            unset($productAttribute->attributeVariations);

            $productAttribute->attributeVariations = $arr;

            return $productAttribute;
        });
        return $data;
    }

    private function productVariations($data)
    {
        $data = $data->map(function ($productVariation) {
            $arr = [];
            foreach ($productVariation->attributeVariations as $item) {
                $arr[] = $item->only('id')['id'];
            }

            unset($productVariation->attributeVariations);

            $productVariation->attributeVariations = $arr;

            return $productVariation;
        });
        return $data;
    }
}
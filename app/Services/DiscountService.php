<?php

namespace App\Services;
use App\Repositories\Interfaces\DiscountRepositoryInterface;
use App\Services\Interfaces\DiscountServiceInterface;
use Illuminate\Http\Request;

class DiscountService implements DiscountServiceInterface
{
    protected $discountRepository;
    public function __construct(
        DiscountRepositoryInterface $discountRepository
    ) {
        $this->discountRepository = $discountRepository;
    }

    public function create(Request $request)
    {
        $data = $request->validated();
        if (!isset($data['user_id'])) {
            $data['user_id'] = null;
        }
        if (!isset($data['product_id'])) {
            $data['product_id'] = null;
        }
        if (!isset($data['product_variation_id'])) {
            $data['product_variation_id'] = null;
        }
        $type = $data['type'];
        if ($type == 1) {
            $data['discount_value'] = null;
        } else {
            $data['percent_value'] = null;
        }

        $discount = $this->discountRepository->create($data);

        $data['user_id'] ? $discount->users()->attach($data['user_id']) : null;

        $data['product_id'] ? $discount->products()->attach($data['product_id']) : null;

        $data['product_variation_id'] ? $discount->productVariations()->attach($data['product_variation_id']) : null;

        return $discount;
    }

    public function update(Request $request)
    {
        $data = $request->validated();

        $data['user_id'] = $data['user_id'] ?? null;
        $data['product_id'] = $data['product_id'] ?? null;
        $data['product_variation_id'] = $data['product_variation_id'] ?? null;

        $type = $data['type'];
        if ($type == 1) {
            $data['discount_value'] = null;
        } else {
            $data['percent_value'] = null;
        }
        $discount = $this->discountRepository->update($data['id'], $data);

        $discount->users()->sync($data['user_id']) ?? null;

        $discount->products()->sync($data['product_id']) ?? null;


        $discount->productVariations()->sync($data['product_variation_id']) ?? null;


        return $discount;
    }

    public function updateStatus(Request $request)
    {
        $data = $request->all();

        return $this->discountRepository->update($data['discount_id'], ['status' => $data['status']]);
    }

    public function delete($id)
    {
        $discount = $this->discountRepository->findOrFail($id);

        $discount->users()->detach();
        $discount->products()->detach();
        $discount->productVariations()->detach();

        return $this->discountRepository->delete($id);
    }
}
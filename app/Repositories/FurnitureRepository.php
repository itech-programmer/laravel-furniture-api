<?php

namespace App\Repositories;

use App\Contracts\FurnitureRepositoryInterface;
use App\Models\Furniture;
use Illuminate\Database\Eloquent\Collection;

class FurnitureRepository implements FurnitureRepositoryInterface
{
    public function allWithFilters(array $filters): Collection|array
    {
        $query = Furniture::query();

        if (isset($filters['price_min'])) {
            $query->where('price', '>=', $filters['price_min']);
        }

        if (isset($filters['price_max'])) {
            $query->where('price', '<=', $filters['price_max']);
        }

        if (isset($filters['in_stock'])) {
            $query->where('in_stock', $filters['in_stock']);
        }

        return $query->get();
    }

    public function create(array $data)
    {
        return Furniture::create($data);
    }

    public function findById(int $id)
    {
        return Furniture::findOrFail($id);
    }

    public function update(int $id, array $data)
    {
        $furniture = Furniture::findOrFail($id);
        $furniture->update($data);

        return $furniture;
    }

    public function delete(int $id): int
    {
        return Furniture::destroy($id);
    }
}

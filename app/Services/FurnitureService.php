<?php

namespace App\Services;

use App\Contracts\FurnitureRepositoryInterface;
use App\Contracts\FurnitureServiceInterface;

class FurnitureService implements FurnitureServiceInterface
{
    protected FurnitureRepositoryInterface $furnitureRepository;

    public function __construct(FurnitureRepositoryInterface $furnitureRepository)
    {
        $this->furnitureRepository = $furnitureRepository;
    }

    public function getAll(array $filters)
    {
        return $this->furnitureRepository->allWithFilters($filters);
    }

    public function create(array $data)
    {
        return $this->furnitureRepository->create($data);
    }

    public function findById(int $id)
    {
        return $this->furnitureRepository->findById($id);
    }

    public function update(int $id, array $data)
    {
        return $this->furnitureRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->furnitureRepository->delete($id);
    }
}

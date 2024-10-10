<?php

namespace App\Contracts;

interface FurnitureRepositoryInterface
{
    public function allWithFilters(array $filters);
    public function create(array $data);
    public function findById(int $id);
    public function update(int $id, array $data);
    public function delete(int $id);
}

<?php

namespace App\Http\Controllers;

use App\Contracts\FurnitureServiceInterface;
use App\Http\Requests\FurnitureRequest;
use Illuminate\Http\Request;

class FurnitureController extends Controller
{
    private FurnitureServiceInterface $furnitureService;

    public function __construct(FurnitureServiceInterface $furnitureService)
    {
        $this->furnitureService = $furnitureService;
    }

    public function index(Request $request)
    {
        return $this->furnitureService->getAll($request->all());
    }

    public function store(FurnitureRequest $request)
    {
        return $this->furnitureService->create($request->validated());
    }

    public function show($id)
    {
        return $this->furnitureService->findById($id);
    }

    public function update(FurnitureRequest $request, $id)
    {
        return $this->furnitureService->update($id, $request->validated());
    }

    public function destroy($id)
    {
        return $this->furnitureService->delete($id);
    }
}

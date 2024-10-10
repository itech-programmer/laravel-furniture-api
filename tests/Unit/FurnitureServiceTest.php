<?php

namespace Tests\Unit;

use App\Contracts\FurnitureRepositoryInterface;
use App\Services\FurnitureService;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;

class FurnitureServiceTest extends TestCase
{
    private $furnitureRepository;
    private FurnitureService $furnitureService;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        $this->furnitureRepository = $this->createMock(FurnitureRepositoryInterface::class);
        $this->furnitureService = new FurnitureService($this->furnitureRepository);
    }

    public function testGetAllFurniture()
    {
        $filters = ['name' => 'Chair'];
        $furnitureItems = [
            ['id' => 1, 'name' => 'Chair', 'price' => 100],
            ['id' => 2, 'name' => 'Table', 'price' => 200],
        ];

        $this->furnitureRepository->expects($this->once())
            ->method('allWithFilters')
            ->with($filters)
            ->willReturn($furnitureItems);

        $result = $this->furnitureService->getAll($filters);
        $this->assertCount(2, $result);
        $this->assertEquals('Chair', $result[0]['name']);
    }

    public function testCreateFurniture()
    {
        $data = ['name' => 'Sofa', 'price' => 300];

        $this->furnitureRepository->expects($this->once())
            ->method('create')
            ->with($data)
            ->willReturn(['id' => 3, 'name' => 'Sofa', 'price' => 300]);

        $result = $this->furnitureService->create($data);
        $this->assertEquals('Sofa', $result['name']);
    }

    public function testFindById()
    {
        $furniture = ['id' => 1, 'name' => 'Chair', 'price' => 100];

        $this->furnitureRepository->expects($this->once())
            ->method('findById')
            ->with(1)
            ->willReturn($furniture);

        $result = $this->furnitureService->findById(1);
        $this->assertEquals('Chair', $result['name']);
    }

    public function testUpdateFurniture()
    {
        $data = ['name' => 'Chair Updated', 'price' => 150];

        $this->furnitureRepository->expects($this->once())
            ->method('update')
            ->with(1, $data)
            ->willReturn(['id' => 1, 'name' => 'Chair Updated', 'price' => 150]);

        $result = $this->furnitureService->update(1, $data);
        $this->assertEquals('Chair Updated', $result['name']);
    }

    public function testDeleteFurniture()
    {
        $this->furnitureRepository->expects($this->once())
            ->method('delete')
            ->with(1)
            ->willReturn(true);

        $result = $this->furnitureService->delete(1);
        $this->assertTrue($result);
    }
}

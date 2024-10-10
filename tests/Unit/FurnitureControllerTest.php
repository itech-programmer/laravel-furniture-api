<?php

namespace Tests\Unit;

use App\Contracts\FurnitureServiceInterface;
use App\Http\Controllers\FurnitureController;
use App\Http\Requests\FurnitureRequest;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;

class FurnitureControllerTest extends TestCase
{
    private $furnitureService;
    private FurnitureController $controller;

    protected function setUp(): void
    {
        $this->furnitureService = $this->createMock(FurnitureServiceInterface::class);
        $this->controller = new FurnitureController($this->furnitureService);
    }

    public function testIndex()
    {
        $request = new Request(['name' => 'Chair']);

        $this->furnitureService->expects($this->once())
            ->method('getAll')
            ->with($request->all())
            ->willReturn([]);

        $response = $this->controller->index($request);
        $this->assertIsArray($response);
    }

    /**
     * @throws Exception
     */
    public function testStore()
    {
        $request = $this->createMock(FurnitureRequest::class);

        $request->expects($this->once())
            ->method('validated')
            ->willReturn(['name' => 'Chair', 'description' => 'A nice chair', 'price' => 100, 'in_stock' => true]);

        $this->furnitureService->expects($this->once())
            ->method('create')
            ->with(['name' => 'Chair', 'description' => 'A nice chair', 'price' => 100, 'in_stock' => true])
            ->willReturn(['id' => 1, 'name' => 'Chair', 'description' => 'A nice chair', 'price' => 100, 'in_stock' => true]);

        $response = $this->controller->store($request);
        $this->assertIsArray($response);
        $this->assertEquals('Chair', $response['name']);
    }

    public function testShow()
    {
        $furniture = ['id' => 1, 'name' => 'Chair', 'price' => 100];

        $this->furnitureService->expects($this->once())
            ->method('findById')
            ->with(1)
            ->willReturn($furniture);

        $response = $this->controller->show(1);
        $this->assertIsArray($response);
        $this->assertEquals('Chair', $response['name']);
    }

    public function testUpdate()
    {
        $request = $this->createMock(FurnitureRequest::class);

        $request->expects($this->once())
            ->method('validated')
            ->willReturn(['name' => 'Chair Updated', 'description' => 'A better chair', 'price' => 150, 'in_stock' => false]);

        $this->furnitureService->expects($this->once())
            ->method('update')
            ->with(1, ['name' => 'Chair Updated', 'description' => 'A better chair', 'price' => 150, 'in_stock' => false])
            ->willReturn(['id' => 1, 'name' => 'Chair Updated', 'description' => 'A better chair', 'price' => 150, 'in_stock' => false]);

        $response = $this->controller->update($request, 1);
        $this->assertIsArray($response);
        $this->assertEquals('Chair Updated', $response['name']);
    }

    public function testDestroy()
    {
        $this->furnitureService->expects($this->once())
            ->method('delete')
            ->with(1)
            ->willReturn(true);

        $response = $this->controller->destroy(1);
        $this->assertTrue($response);
    }
}

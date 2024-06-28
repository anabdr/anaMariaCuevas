<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\OperationService;

class OperationServiceTest extends TestCase
{
    protected $operationService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->operationService = new OperationService();
    }

    public function testAdd(){
        $result = $this->operationService->executeOperation('add',5,3);
        $this->assertEquals(8,$result);
    }

    public function testSubtract(){
        $result = $this->operationService->executeOperation('subtract',150,2);
        $this->assertEquals(148,$result);
    }

    public function testMultiply(){
        $result = $this->operationService->executeOperation('multiply',36,95);
        $this->assertEquals(3420,$result);
    }
    public function testDivide(){
        $result = $this->operationService->executeOperation('divide',150,5);
        $this->assertEquals(30,$result);
    }
    public function testDivideByZero(){
        $this->expectException(\InvalidArgumentException::class);
        $this->operationService->executeOperation('divide', 6, 0);
    }
    public function testInvalidOperation(){
        $this->expectException(\InvalidArgumentException::class);
        $this->operationService->executeOperation('invalid', 6, 3);
    }
}

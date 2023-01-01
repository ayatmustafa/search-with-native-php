<?php

// Autoload files using the Composer autoloader.
require_once __DIR__ . '/../vendor/autoload.php';

use Repositories\Repositories;
use PHPUnit\Framework\TestCase;

final class TestRepositories extends TestCase
{
    public function testPrintHelloWorld() {
        $actualClass = new Repositories();
        $this->assertEquals('Hello World', $actualClass->printHelloWorld());
    }
}
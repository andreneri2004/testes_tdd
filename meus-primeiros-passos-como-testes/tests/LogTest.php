<?php

namespace Code;

use PHPUnit\Framework\TestCase;

class LogTest extends TestCase
{
    protected function AssertPreConditions(): void
    {
        $this->assertTrue(class_exists(Log::class));
    }

    public function testSeLogEFeitoComSucesso()
    {
        $log = new Log();

        $this->assertEquals('Logando dados no sistema: Testando save de log no sistema', $log->log('Testando save de log no sistema'));
    }
}
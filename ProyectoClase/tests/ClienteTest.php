<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class ClienteTest extends TestCase
{
    public function testCrearCliente(): void
    {
        $this->assertInstanceOf(
            Email::class,
            Email::fromString('user@example.com')
        );
    }
}
<?php

namespace Tests\App;

use App\Connect;
use PHPUnit\Framework\TestCase;

class ConnectTest extends TestCase
{
    public function testConnection()
    {
        $connection = new Connect();

        $result = $connection->connection();

        $this->assertSame("Connected to MySQL successfully!", $result);
    }
}
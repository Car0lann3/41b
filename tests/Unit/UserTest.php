<?php

namespace Tests\Unit;

use App\Models\User;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    private $user;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->user = new User();
    }

    public function test_isFillable_string()
    {
        $this->assertTrue($this->user->isFillable('name'));
        $this->assertTrue($this->user->isFillable('email'));
        $this->assertTrue($this->user->isFillable('password'));
        $this->assertFalse($this->user->isFillable(''));
        $this->assertFalse($this->user->isFillable('jsjsajiksa'));
    }

    public function test_isFillable_throws_onNull()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->user->isFillable(null);
    }

    public function test_isFillable_throws_onFalse()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->user->isFillable(false);
    }

    public function test_isFillable_throws_onTrue()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->user->isFillable(true);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function test_isFillable_onArray()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->user->isFillable([]);
    }
}

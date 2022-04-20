<?php

declare(strict_types=1);

/*
 * This file is part of Cauri PHP Crypto.
 *
 * (c) Cauri Land <info@cauri.cm>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CauriLand\Tests\Crypto\Concerns\Reads;

use CauriLand\Crypto\ByteBuffer\ByteBuffer;
use PHPUnit\Framework\TestCase;

/**
 * This is the integer reader test class.
 * @covers \CauriLand\Crypto\ByteBuffer\Concerns\Reads\Floats
 */
class FloatsTest extends TestCase
{
    /** @test */
    public function it_should_read_float32()
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeFloat32(8.0);
        $buffer->position(0);

        $this->assertSame(8.0, $buffer->readFloat32());
    }

    /** @test */
    public function it_should_read_float64()
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeFloat64(8.0);
        $buffer->position(0);

        $this->assertSame(8.0, $buffer->readFloat64());
    }

    /** @test */
    public function it_should_read_double()
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeDouble(8.0);
        $buffer->position(0);

        $this->assertSame(8.0, $buffer->readDouble());
    }
}

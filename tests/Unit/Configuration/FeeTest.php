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

namespace CauriLand\Tests\Crypto\Unit\Managers;

use CauriLand\Crypto\Configuration\Fee;
use CauriLand\Tests\Crypto\TestCase;

/**
 * This is the fee configuration test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \CauriLand\Crypto\Configuration\Fee
 */
class FeeTest extends TestCase
{
    /** @test */
    public function it_should_get_the_fee()
    {
        $actual = Fee::get(0);

        $this->assertSame('10000000', $actual);
    }

    /** @test */
    public function it_should_set_the_fee()
    {
        $actual = Fee::get(0);
        $this->assertSame('10000000', $actual);

        Fee::set(0, '5');

        $actual = Fee::get(0);
        $this->assertSame('5', $actual);
    }
}

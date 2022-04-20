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

namespace CauriLand\Tests\Crypto\Unit\Utils;

use CauriLand\Crypto\Utils\Slot;
use CauriLand\Tests\Crypto\TestCase;

/**
 * This is the slot test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \CauriLand\Crypto\Utils\Slot
 */
class SlotTest extends TestCase
{
    /** @test */
    public function it_should_get_the_time()
    {
        $actual = Slot::time();

        $this->assertIsInt($actual);
    }

    /** @test */
    public function it_should_get_the_epoch()
    {
        $actual = Slot::epoch();

        $this->assertIsInt($actual);
    }
}

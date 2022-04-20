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

namespace CauriLand\Tests\Crypto\Unit\Networks;

use CauriLand\Tests\Crypto\TestCase;

/**
 * This is the devnet network test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @coversNothing
 */
class NetworkTestCase extends TestCase
{
    /** @test */
    public function it_should_get_epoch()
    {
        $actual = $this->getTestSubject()->epoch();

        $this->assertSame($actual, $this->epoch);
    }

    /** @test */
    public function it_should_get_public_key_hash()
    {
        $actual = $this->getTestSubject()->pubKeyHash();

        $this->assertSame($actual, $this->pubKeyHash);
    }
}

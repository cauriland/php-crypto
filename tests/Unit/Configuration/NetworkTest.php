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

use CauriLand\Crypto\Configuration\Network;
use CauriLand\Crypto\Networks\AbstractNetwork;
use CauriLand\Crypto\Networks\Devnet;
use CauriLand\Crypto\Networks\Mainnet;
use CauriLand\Tests\Crypto\TestCase;

/**
 * This is the network configuration test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \CauriLand\Crypto\Configuration\Network
 */
class NetworkTest extends TestCase
{
    /** @test */
    public function it_should_get_the_network()
    {
        $actual = Network::get();

        $this->assertInstanceOf(AbstractNetwork::class, $actual);
    }

    /** @test */
    public function it_should_set_the_network()
    {
        Network::set(Mainnet::new());

        $actual = Network::get();
        $this->assertInstanceOf(Mainnet::class, $actual);

        Network::set(Devnet::new());

        $actual = Network::get();
        $this->assertInstanceOf(Devnet::class, $actual);
    }
}

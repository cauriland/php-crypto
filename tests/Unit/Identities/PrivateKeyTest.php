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

namespace CauriLand\Tests\Crypto\Unit\Identities;

use CauriLand\Crypto\Identities\PrivateKey as TestClass;
use CauriLand\Tests\Crypto\TestCase;

/**
 * This is the address test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \CauriLand\Crypto\Identities\PrivateKey
 */
class PrivateKeyTest extends TestCase
{
    /** @test */
    public function it_should_get_the_private_key_from_passphrase()
    {
        $fixture = $this->getFixture('identity');

        $actual = TestClass::fromPassphrase($fixture['passphrase']);

        $this->assertSame($fixture['data']['privateKey'], $actual->getHex());
    }

    /** @test */
    public function it_should_get_the_private_key_from_hex()
    {
        $fixture = $this->getFixture('identity');

        $actual = TestClass::fromHex($fixture['data']['privateKey']);

        $this->assertSame($fixture['data']['privateKey'], $actual->getHex());
    }

    /** @test */
    public function it_should_get_the_private_key_from_wif()
    {
        $fixture = $this->getFixture('identity');

        $actual = TestClass::fromWif($fixture['data']['wif']);

        $this->assertSame($fixture['data']['privateKey'], $actual->getHex());
    }
}

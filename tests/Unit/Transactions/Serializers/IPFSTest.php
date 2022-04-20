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

namespace CauriLand\Tests\Crypto\Unit\Transactions\Serializers;

use CauriLand\Crypto\Transactions\Serializer;
use CauriLand\Crypto\Transactions\Types\IPFS;
use CauriLand\Tests\Crypto\TestCase;

/**
 * This is the ipfs serializer test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \CauriLand\Crypto\Transactions\Types\IPFS
 */
class IPFSTest extends TestCase
{
    /** @test */
    public function it_should_serialize_the_transaction_with_a_passphrase()
    {
        $this->assertSerialized($this->getTransactionFixture('ipfs', 'ipfs-sign'));
    }

    /** @test */
    public function it_should_serialize_the_transaction_with_a_second_passphrase()
    {
        $this->assertSerialized($this->getTransactionFixture('ipfs', 'ipfs-secondSign'));
    }
}

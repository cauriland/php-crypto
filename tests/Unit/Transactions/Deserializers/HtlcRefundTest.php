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

namespace CauriLand\Tests\Crypto\Unit\Transactions\Deserializers;

use CauriLand\Crypto\Transactions\Types\HtlcRefund;
use CauriLand\Tests\Crypto\TestCase;

/**
 * @covers \CauriLand\Crypto\Transactions\Types\HtlcRefund
 */
class HtlcRefundTest extends TestCase
{
    /** @test */
    public function it_should_deserialize_the_transaction_signed_with_a_passphrase()
    {
        $fixture = $this->getTransactionFixture('htlc_refund', 'htlc-refund-sign');

        $this->assertTransaction($fixture);
    }

    /** @test */
    public function it_should_deserialize_the_transaction_signed_with_a_second_passphrase()
    {
        $fixture = $this->getTransactionFixture('htlc_refund', 'htlc-refund-secondSign');

        $actual = $this->assertTransaction($fixture);
        $this->assertSame($fixture['data']['secondSignature'], $actual->data['secondSignature']);
    }

    private function assertTransaction(array $fixture): HtlcRefund
    {
        $actual = $this->assertDeserialized($fixture, [
            'version',
            'network',
            'type',
            'typeGroup',
            'nonce',
            'senderPublicKey',
            'fee',
            'asset',
            'signature',
            'secondSignature',
            'amount',
            'id',
        ]);

        $this->assertTrue($actual->verify());

        return $actual;
    }
}

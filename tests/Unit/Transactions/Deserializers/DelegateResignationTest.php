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

use CauriLand\Crypto\Transactions\Deserializer;
use CauriLand\Crypto\Transactions\Types\DelegateResignation;
use CauriLand\Tests\Crypto\TestCase;

/**
 * This is the delegate resignation deserializer test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \CauriLand\Crypto\Transactions\Types\DelegateResignation
 */
class DelegateResignationTest extends TestCase
{
    /** @test */
    public function it_should_deserialize_the_transaction_signed_with_a_passphrase()
    {
        $transaction = $this->getTransactionFixture('delegate_resignation', 'delegate-resignation-sign');

        $this->assertTransaction($transaction);
    }

    private function assertTransaction(array $fixture): DelegateResignation
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

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
use CauriLand\Crypto\Transactions\Types\MultiSignatureRegistration;
use CauriLand\Tests\Crypto\TestCase;

/**
 * This is the multi signature registration deserializer test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \CauriLand\Crypto\Transactions\Types\MultiSignatureRegistration
 */
class MultiSignatureRegistrationTest extends TestCase
{
    /** @test */
    public function it_should_deserialize_the_transaction_signed_with_a_passphrase()
    {
        //TODO fail to verify : fixture is schnorr
        $transaction = $this->getTransactionFixture('multi_signature_registration', 'multi-signature-registration');

        $this->assertTransaction($transaction);
    }

    /** @test */
    public function it_should_deserialize_the_transaction_signed_with_a_second_passphrase()
    {
        //TODO fixture
        $this->markTestIncomplete('This test has not been implemented yet.');
        //$transaction = $this->getTransactionFixture('multi_signature_registration', 'multi-signature-secondSign');
//
        //$this->assertTransaction($transaction);
    }

    private function assertTransaction(array $fixture): MultiSignatureRegistration
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

        // TODO $this->assertTrue($actual->verify()); when AIP-18 with Schnorr implemented
        return $actual;
    }
}

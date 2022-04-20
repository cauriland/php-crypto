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

namespace CauriLand\Tests\Crypto\Unit\Transactions\Builder;

use CauriLand\Crypto\Identities\PublicKey;
use CauriLand\Crypto\Transactions\Builder\SecondSignatureRegistrationBuilder;
use CauriLand\Crypto\Transactions\Serializer;
use CauriLand\Tests\Crypto\TestCase;

/**
 * This is the second signature registration builder test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \CauriLand\Crypto\Transactions\Builder\SecondSignatureRegistrationBuilder
 */
class SecondSignatureRegistrationTest extends TestCase
{
    /** @test */
    public function it_should_create_a_valid_transaction()
    {
        $transaction = SecondSignatureRegistrationBuilder::new()
            ->signature('this is a top secret second passphrase')
            ->sign('this is a top secret passphrase');

        $this->assertTrue($transaction->verify());
        $this->assertFalse(isset($transaction->secondSignature));
        $this->assertSame($transaction->transaction->data['asset']['signature']['publicKey'], PublicKey::fromPassphrase('this is a top secret second passphrase')->getHex());
    }

    /** @test */
    public function it_should_match_fixture_passphrase()
    {
        $fixture = $this->getTransactionFixture('second_signature_registration', 'second-signature-registration');
        $builder = SecondSignatureRegistrationBuilder::new()
            ->signature($this->secondPassphrase)
            ->sign($this->passphrase);

        $this->assertTrue($builder->verify());
        $this->assertSame($fixture['serialized'], Serializer::new($builder->transaction)->serialize()->getHex());
        $this->assertSameTransactions($fixture, $builder->transaction->data);
    }
}

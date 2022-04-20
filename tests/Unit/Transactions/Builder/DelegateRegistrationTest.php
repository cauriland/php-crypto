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
use CauriLand\Crypto\Transactions\Builder\DelegateRegistrationBuilder;
use CauriLand\Crypto\Transactions\Serializer;
use CauriLand\Tests\Crypto\TestCase;

/**
 * This is the delegate registration builder test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \CauriLand\Crypto\Transactions\Builder\DelegateRegistrationBuilder
 */
class DelegateRegistrationTest extends TestCase
{
    /** @test */
    public function it_should_sign_it_with_a_passphrase()
    {
        $transaction = DelegateRegistrationBuilder::new()
            ->username('polopolo')
            ->sign($this->passphrase);

        $this->assertTrue($transaction->verify());
    }

    /** @test */
    public function it_should_sign_it_with_a_second_passphrase()
    {
        $secondPassphrase = 'this is a top secret second passphrase';

        $transaction = DelegateRegistrationBuilder::new()
            ->username('polopolo')
            ->sign($this->passphrase)
            ->secondSign($secondPassphrase);

        $this->assertTrue($transaction->verify());
        $this->assertTrue($transaction->secondVerify(PublicKey::fromPassphrase($secondPassphrase)->getHex()));
    }

    /** @test */
    public function it_should_match_fixture_passphrase()
    {
        $fixture = $this->getTransactionFixture('delegate_registration', 'delegate-registration-sign');
        $builder = DelegateRegistrationBuilder::new()
            ->username($fixture['data']['asset']['delegate']['username'])
            ->sign($this->passphrase);

        $this->assertTrue($builder->verify());
        $this->assertSame($fixture['serialized'], Serializer::new($builder->transaction)->serialize()->getHex());
        $this->assertSameTransactions($fixture, $builder->transaction->data);
    }

    /** @test */
    public function it_should_match_fixture_second_passphrase()
    {
        $fixture = $this->getTransactionFixture('delegate_registration', 'delegate-registration-secondSign');
        $builder = DelegateRegistrationBuilder::new()
            ->username($fixture['data']['asset']['delegate']['username'])
            ->sign($this->passphrase)
            ->secondSign($this->secondPassphrase);

        $this->assertTrue($builder->verify());
        $this->assertSame($fixture['serialized'], Serializer::new($builder->transaction)->serialize()->getHex());
        $this->assertSameTransactions($fixture, $builder->transaction->data);
    }
}

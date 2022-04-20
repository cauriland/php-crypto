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

namespace CauriLand\Tests\Crypto\Concerns;

use CauriLand\Crypto\Transactions\Serializer;
use CauriLand\Crypto\Transactions\Types\DelegateRegistration;
use CauriLand\Crypto\Transactions\Types\DelegateResignation;
use CauriLand\Crypto\Transactions\Types\HtlcClaim;
use CauriLand\Crypto\Transactions\Types\HtlcLock;
use CauriLand\Crypto\Transactions\Types\HtlcRefund;
use CauriLand\Crypto\Transactions\Types\IPFS;
use CauriLand\Crypto\Transactions\Types\MultiPayment;
use CauriLand\Crypto\Transactions\Types\MultiSignatureRegistration;
use CauriLand\Crypto\Transactions\Types\SecondSignatureRegistration;
use CauriLand\Crypto\Transactions\Types\Transfer;
use CauriLand\Crypto\Transactions\Types\Vote;

trait Serialize
{
    private $transactionsClasses = [
        Transfer::class,
        SecondSignatureRegistration::class,
        DelegateRegistration::class,
        Vote::class,
        MultiSignatureRegistration::class,
        IPFS::class,
        MultiPayment::class,
        DelegateResignation::class,
        HtlcLock::class,
        HtlcClaim::class,
        HtlcRefund::class,
    ];

    protected function assertSerialized(array $fixture): void
    {
        $data              = $fixture['data'];
        $transactionClass  = $this->transactionsClasses[$fixture['data']['type']];
        $transaction       = new $transactionClass();
        $transaction->data = $data;

        $actual = Serializer::new($transaction)->serialize();

        $this->assertSame($fixture['serialized'], $actual->getHex());
    }
}

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

namespace CauriLand\Crypto\Transactions\Builder;

use CauriLand\Crypto\Transactions\Types\HtlcClaim;

class HtlcClaimBuilder extends AbstractTransactionBuilder
{
    public function htlcClaimAsset(string $lockTransactionId, string $unlockSecret): self
    {
        $this->transaction->data['asset'] = [
            'claim' => [
                'lockTransactionId' => $lockTransactionId,
                'unlockSecret'      => $unlockSecret,
            ],
        ];

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    protected function getType(): int
    {
        return \CauriLand\Crypto\Enums\Types::HTLC_CLAIM;
    }

    protected function getTypeGroup(): int
    {
        return \CauriLand\Crypto\Enums\TypeGroup::CORE;
    }

    protected function getTransactionInstance(): object
    {
        return new HtlcClaim();
    }
}

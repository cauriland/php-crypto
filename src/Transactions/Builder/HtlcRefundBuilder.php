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

use CauriLand\Crypto\Transactions\Types\HtlcRefund;

class HtlcRefundBuilder extends AbstractTransactionBuilder
{
    public function htlcRefundAsset(string $lockTransactionId): self
    {
        $this->transaction->data['asset'] = [
            'refund' => [
                'lockTransactionId' => $lockTransactionId,
            ],
        ];

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    protected function getType(): int
    {
        return \CauriLand\Crypto\Enums\Types::HTLC_REFUND;
    }

    protected function getTypeGroup(): int
    {
        return \CauriLand\Crypto\Enums\TypeGroup::CORE;
    }

    protected function getTransactionInstance(): object
    {
        return new HtlcRefund();
    }
}

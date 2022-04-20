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

namespace CauriLand\Crypto\Transactions\Types;

use CauriLand\Crypto\ByteBuffer\ByteBuffer;

class HtlcRefund extends Transaction
{
    public function serialize(array $options = []): ByteBuffer
    {
        $buffer = ByteBuffer::fromHex($this->data['asset']['refund']['lockTransactionId']);

        return $buffer;
    }

    public function deserialize(ByteBuffer $buffer): void
    {
        $lockTransactionId = $buffer->readHex(32 * 2);

        $this->data['asset'] = [
            'refund' => [
                'lockTransactionId' => $lockTransactionId,
            ],
        ];
    }
}

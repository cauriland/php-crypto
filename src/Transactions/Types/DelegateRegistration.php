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

/**
 * This is the serializer class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class DelegateRegistration extends Transaction
{
    public function serialize(array $options = []): ByteBuffer
    {
        $usernameBuffer = ByteBuffer::fromUTF8($this->data['asset']['delegate']['username']);

        $buffer = ByteBuffer::new(1);
        $buffer->writeUInt8($usernameBuffer->capacity());
        $buffer->append($usernameBuffer);

        return $buffer;
    }

    public function deserialize(ByteBuffer $buffer): void
    {
        $usernameLength = $buffer->readUInt8();

        $this->data['asset'] = [
            'delegate' => [
                'username' => $buffer->readHexString($usernameLength * 2),
            ],
        ];
    }
}

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

use BitWasp\Bitcoin\Base58;
use BitWasp\Buffertools\Buffer;
use CauriLand\Crypto\ByteBuffer\ByteBuffer;

/**
 * This is the serializer class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class IPFS extends Transaction
{
    public function serialize(array $options = []): ByteBuffer
    {
        $buffer = ByteBuffer::fromBinary(Base58::decode($this->data['asset']['ipfs'])->getBinary());

        return $buffer;
    }

    public function deserialize(ByteBuffer $buffer): void
    {
        $hashFunction   = $buffer->readUint8();
        $ipfsHashLength = $buffer->readUint8();
        $ipfsHash       = $buffer->readHex($ipfsHashLength * 2);

        $buffer = ByteBuffer::new(1);
        $buffer->writeUInt8($hashFunction);
        $buffer->writeUInt8($ipfsHashLength);
        $buffer->writeHex($ipfsHash);

        $this->data['asset'] = [
            'ipfs' => Base58::encode(new Buffer($buffer->toBinary())),
        ];
    }
}

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

use CauriLand\Crypto\Transactions\Types\IPFS;

/**
 * This is the ipfs transaction class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class IPFSBuilder extends AbstractTransactionBuilder
{
    public function ipfsAsset(string $ipfsId): self
    {
        $this->transaction->data['asset'] = [
            'ipfs' => $ipfsId,
        ];

        return $this;
    }

    protected function getType(): int
    {
        return \CauriLand\Crypto\Enums\Types::IPFS;
    }

    protected function getTypeGroup(): int
    {
        return \CauriLand\Crypto\Enums\TypeGroup::CORE;
    }

    protected function getTransactionInstance(): object
    {
        return new IPFS();
    }
}

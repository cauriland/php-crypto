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

use CauriLand\Crypto\Transactions\Types\DelegateResignation;

/**
 * This is the delegate resignation transaction class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class DelegateResignationBuilder extends AbstractTransactionBuilder
{
    protected function getType(): int
    {
        return \CauriLand\Crypto\Enums\Types::DELEGATE_RESIGNATION;
    }

    protected function getTypeGroup(): int
    {
        return \CauriLand\Crypto\Enums\TypeGroup::CORE;
    }

    protected function getTransactionInstance(): object
    {
        return new DelegateResignation();
    }
}

<?php
/**
 * This file is part of the prooph/event-store-http-middleware.
 * (c) 2018-2018 prooph software GmbH <contact@prooph.de>
 * (c) 2018-2018 Sascha-Oliver Prolic <saschaprolic@googlemail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Prooph\EventStore\Http\Middleware\Container\Action;

use Prooph\EventStore\Http\Middleware\Action\ResetProjection;
use Prooph\EventStore\Http\Middleware\ResponsePrototype;
use Prooph\EventStore\Projection\ProjectionManager;
use Psr\Container\ContainerInterface;

final class ResetProjectionFactory
{
    public function __invoke(ContainerInterface $container): ResetProjection
    {
        return new ResetProjection($container->get(ProjectionManager::class), $container->get(ResponsePrototype::class));
    }
}

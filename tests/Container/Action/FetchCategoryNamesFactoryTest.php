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

namespace ProophTest\EventStore\Http\Middleware\Container\Action;

use Interop\Http\Factory\ResponseFactoryInterface;
use PHPUnit\Framework\TestCase;
use Prooph\EventStore\EventStore;
use Prooph\EventStore\Http\Middleware\Action\FetchCategoryNames;
use Prooph\EventStore\Http\Middleware\Container\Action\FetchCategoryNamesFactory;
use Prooph\EventStore\Http\Middleware\JsonTransformer;
use Prooph\EventStore\Http\Middleware\Transformer;
use Psr\Container\ContainerInterface;

class FetchCategoryNamesFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function it_returns_action_handler(): void
    {
        $eventStore = $this->prophesize(EventStore::class);
        $responseFactory = $this->prophesize(ResponseFactoryInterface::class);
        $transformer = $this->prophesize(Transformer::class);

        $container = $this->prophesize(ContainerInterface::class);
        $container->get(EventStore::class)->willReturn($eventStore->reveal())->shouldBeCalled();
        $container->get(ResponseFactoryInterface::class)->willReturn($responseFactory->reveal())->shouldBeCalled();
        $container->get(JsonTransformer::class)->willReturn($transformer->reveal())->shouldBeCalled();

        $factory = new FetchCategoryNamesFactory();

        $actionHandler = $factory($container->reveal());

        $this->assertInstanceOf(FetchCategoryNames::class, $actionHandler);
    }
}

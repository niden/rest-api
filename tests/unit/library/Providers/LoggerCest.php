<?php

namespace Phalcon\Api\Tests\unit\library\Providers;

use Monolog\Logger;
use Phalcon\Api\Providers\ConfigProvider;
use Phalcon\Api\Providers\LoggerProvider;
use Phalcon\Di\FactoryDefault;
use UnitTester;

class LoggerCest
{
    /**
     * @param UnitTester $I
     */
    public function checkRegistration(UnitTester $I)
    {
        $diContainer = new FactoryDefault();
        $provider    = new ConfigProvider();
        $provider->register($diContainer);
        $provider = new LoggerProvider();
        $provider->register($diContainer);

        $I->assertTrue($diContainer->has('logger'));
        /** @var Logger $logger */
        $logger = $diContainer->getShared('logger');
        $I->assertTrue($logger instanceof Logger);
        $I->assertEquals('api-logger', $logger->getName());
    }
}

<?php

namespace Janwebdev\ImageBundle\Tests\DependencyInjection;

use Janwebdev\ImageBundle\DependencyInjection\Configuration;
use Symfony\Component\Config\Definition\Processor;
use PHPUnit\Framework\TestCase;

class ConfigurationTest extends TestCase
{
    public function testEmptyConfig(): void
    {
        $processor = new Processor();
        $config = $processor->processConfiguration(new Configuration(), []);

        $this->assertArrayHasKey('driver', $config);
        $this->assertEmpty($config['driver']);
    }

    public function testConfig(): void
    {
        $sampleConfig = self::getSampleConfig();

        $this->assertEquals($sampleConfig, $this->processConfiguration($sampleConfig));
    }

    protected static function getSampleConfig(): array
    {
        return [
            'driver' => "gd"
        ];
    }

    private function processConfiguration(array $sampleConfig): array
    {
	    return (new Processor())->processConfiguration(new Configuration(), [$sampleConfig]);
    }
}

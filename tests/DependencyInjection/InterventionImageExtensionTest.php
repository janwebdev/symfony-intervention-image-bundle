<?php

namespace Janwebdev\ImageBundle\Tests\DependencyInjection;

use Janwebdev\ImageBundle\DependencyInjection\CompilerPass\PublicForTestsCompilerPass;
use Janwebdev\ImageBundle\DependencyInjection\InterventionImageExtension;
use Janwebdev\ImageBundle\ImageBundle;
use Janwebdev\ImageBundle\Image;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;

class InterventionImageExtensionTest extends TestCase
{
	public function testContainerDefinition(): void
	{
		$container = $this->createContainerFromFile('default');

		$this->assertTrue($container->hasDefinition('janwebdev.intervention.image'));
		$definition = $container->getDefinition('janwebdev.intervention.image');
		$this->assertEquals(Image::class, $definition->getClass());
	}

	protected function createContainerFromFile(string $file): ContainerBuilder
	{
		$container = $this->createContainer();

		$container->registerExtension(new InterventionImageExtension());
		$this->loadFromFile($container, $file);

		$container->addCompilerPass(new PublicForTestsCompilerPass());
		$container->compile();

		return $container;
	}

	protected function createContainer(): ContainerBuilder
	{
		$bundles = [
			'ImageBundle' => ImageBundle::class,
		];

		$container = new ContainerBuilder(new ParameterBag([
			'kernel.bundles'     => $bundles,
			'kernel.cache_dir'   => sys_get_temp_dir(),
			'kernel.debug'       => false,
			'kernel.environment' => 'test',
			'kernel.name'        => 'kernel',
			'kernel.root_dir'    => __DIR__,
		]));

		return $container;
	}

	protected function loadFromFile(ContainerBuilder $container, string $file): void
	{
		$loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/fixtures'));
		$loader->load($file.'.yaml');
	}
}
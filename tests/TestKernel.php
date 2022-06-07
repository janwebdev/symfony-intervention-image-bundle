<?php

namespace Janwebdev\ImageBundle\Tests;

use Janwebdev\ImageBundle\ImageBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

class TestKernel extends Kernel
{
	public function registerBundles(): iterable
	{
		return [
			ImageBundle::class => new ImageBundle()
		];
	}

	public function registerContainerConfiguration(LoaderInterface $loader)
	{
		// TODO: Implement registerContainerConfiguration() method.
	}
}
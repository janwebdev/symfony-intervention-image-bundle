<?php

namespace Janwebdev\ImageBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Janwebdev\ImageBundle\Image;

class ImageTest extends WebTestCase
{
	public function testImageServiceExists(): void
	{
		self::bootKernel();
		$container = self::$kernel->getContainer();
		$service = $container->get('janwebdev.intervention.image');
		self::assertInstanceOf(Image::class, $service);
	}
}
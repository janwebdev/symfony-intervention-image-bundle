<?php

namespace Janwebdev\ImageBundle;

use Janwebdev\ImageBundle\DependencyInjection\ImageExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class ImageBundle extends Bundle
{
    public function getContainerExtension(): ExtensionInterface
    {
        return new ImageExtension();
    }
}

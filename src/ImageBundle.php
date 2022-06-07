<?php

namespace Janwebdev\ImageBundle;

use Janwebdev\ImageBundle\DependencyInjection\CompilerPass\PublicForTestsCompilerPass;
use Janwebdev\ImageBundle\DependencyInjection\InterventionImageExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class ImageBundle extends Bundle
{
    public function build(ContainerBuilder $containerBuilder): void
    {
        parent::build($containerBuilder);
        $containerBuilder->addCompilerPass(new PublicForTestsCompilerPass());
    }

    public function getContainerExtension(): ExtensionInterface
    {
        return new InterventionImageExtension();
    }
}

<?php

namespace Janwebdev\ImageBundle;

use Intervention\Image\ImageManagerStatic;
use Intervention\Image\Image as InterventionImage;

class Image
{
    private ImageManagerStatic $manager;
    private array $config;

    public function __construct(ImageManagerStatic $manager, array $config = [])
    {
        $this->manager = $manager;
        $this->config = $config;
    }

    public function create($source): InterventionImage
    {
        $this->manager::configure(['driver' => $this->config['driver']]);
        return $this->manager::make($source);
    }
}

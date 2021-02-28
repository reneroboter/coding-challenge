<?php

declare(strict_types=1);

namespace RenéRoboter\CodingChallenge\Service;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Loader\LoaderInterface;

class TwigLoader
{
    public const TWIG_TEMPLATE_PATH =  CC_PLUGIN_DIRECTORY . '/templates';
    public const TWIG_TEMPLATE_CACHE_PATH = ABSPATH . '/cache';
    private LoaderInterface $loader;
    private Environment $twig;

    public function __construct()
    {
        $this->loader = new FilesystemLoader(self::TWIG_TEMPLATE_PATH);
        $this->twig = new Environment($this->loader, [
            // 'cache' => self::TWIG_TEMPLATE_CACHE_PATH,
        ]);
    }

    public function getTwig(): Environment
    {
        return $this->twig;
    }

    public function getLoader(): LoaderInterface
    {
        return $this->loader;
    }
}

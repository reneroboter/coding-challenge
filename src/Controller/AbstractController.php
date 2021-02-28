<?php

declare(strict_types=1);


namespace RenéRoboter\CodingChallenge\Controller;


use RenéRoboter\CodingChallenge\Service\TwigLoader;
use Twig\Environment;

class AbstractController
{
    protected Environment $twig;

    public function __construct()
    {
        $loader = new TwigLoader();
        $this->twig = $loader->getTwig();
    }
}

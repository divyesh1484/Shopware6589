<?php declare(strict_types=1);

namespace  IctPluginController\Storefront\Controller;
use Shopware\Storefront\Controller\StorefrontController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(defaults: ['_routeScope' => ['storefront']])]
class IctController extends StorefrontController
{
    #[Route(path: '/ictExample', name: 'frontend.ict.example', methods: ['GET'])]
    public function IctActive(): Response
    {
        return $this->renderStorefront('@IctPluginController/storefront/page/ict.html.twig', [
            'ictHello' => 'Hello ICT'
        ]);
    }
}
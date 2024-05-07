<?php declare(strict_types=1);

namespace IctPluginController\Storefront\Controller;

use Shopware\Storefront\Controller\StorefrontController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route(defaults: ['_routeScope' => ['storefront']])]
class ExampleController extends StorefrontController
{
    #[Route(path: '/example', name: 'frontend.example.example', methods: ['GET'], defaults: ['XmlHttpRequest' => 'true'])]
    public function showExample(): JsonResponse
    {
        return new JsonResponse(['timestamp' => (new \DateTime())->format(\DateTimeInterface::W3C)]);
    }
}
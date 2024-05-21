<?php declare(strict_types=1);

namespace ICTCustomField\Subscriber;

use Shopware\Core\Framework\DataAbstractionLayer\Event\EntityLoadedEvent;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Storefront\Page\Product\ProductPageLoadedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;

class MySubscriber implements EventSubscriberInterface
{

    public function __construct(
        private readonly EntityRepository $mediaRepository
    ) {
    }
    public static function getSubscribedEvents(): array
    {
        return [
            ProductPageLoadedEvent::class => 'onProductsLoaded'
        ];
    }

    public function onProductsLoaded(ProductPageLoadedEvent $event)
    {
        $mediaArray = [];
        $mediaId = $event->getPage()->getProduct()->getCustomFields()['ict_custom_field_media']??null;
        if (!empty($mediaId)){
            $media = $this->mediaRepository->search(new Criteria([$mediaId]), $event->getContext())->getElements();
            $mediaArray['ictMedia'] = $media;
            $event->getPage()->addArrayExtension('ictCustomFieldMedia', $mediaArray);
        }
    }
}

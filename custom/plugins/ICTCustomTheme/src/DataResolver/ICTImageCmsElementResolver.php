<?php declare(strict_types=1);
namespace ICTCustomTheme\DataResolver;

use Shopware\Core\Content\Cms\Aggregate\CmsSlot\CmsSlotEntity;
use Shopware\Core\Content\Cms\DataResolver\Element\AbstractCmsElementResolver;
use Shopware\Core\Content\Cms\DataResolver\Element\ElementDataCollection;
use Shopware\Core\Content\Cms\DataResolver\FieldConfig;
use Shopware\Core\Content\Cms\DataResolver\ResolverContext\EntityResolverContext;
use Shopware\Core\Content\Cms\DataResolver\ResolverContext\ResolverContext;
use Shopware\Core\Content\Cms\DataResolver\CriteriaCollection;
use Shopware\Core\Content\Cms\SalesChannel\Struct\ImageStruct;
use Shopware\Core\Content\Media\Cms\AbstractDefaultMediaResolver;
use Shopware\Core\Content\Media\MediaDefinition;
use Shopware\Core\Content\Media\MediaEntity;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\Log\Package;

#[Package('buyers-experience')]
class ICTImageCmsElementResolver extends AbstractCmsElementResolver
{

    final public const CMS_DEFAULT_ASSETS_PATH = '/bundles/storefront/assets/default/cms/';

    /**
     * @internal
     */
    public function __construct(private readonly AbstractDefaultMediaResolver $mediaResolver)
    {
    }
    /**
     * @internal
     */
    public function getType(): string
    {
        return 'ict-image';
    }

    public function collect(CmsSlotEntity $slot, ResolverContext $resolverContext): ?CriteriaCollection
    {

        $config = $slot->getFieldConfig();
        $media = $config->get('media');

        if (
            $media === null
            || $media->isDefault()
            || $media->getValue() === null
        ) {
            return null;
        }

        $mediaId = $media->getValue();

        $criteria = new Criteria([$mediaId]);

        $criteriaCollection = new CriteriaCollection();
        $criteriaCollection->add('media_' . $slot->getUniqueIdentifier(), MediaDefinition::class, $criteria);
        return $criteriaCollection;
    }

    public function enrich(CmsSlotEntity $slot, ResolverContext $resolverContext, ElementDataCollection $result): void
    {
        $config = $slot->getFieldConfig();
        $image = new ImageStruct();
        $slot->setData($image);

        $urlConfig = $config->get('url');
        if ($urlConfig !== null) {
            if ($urlConfig->isStatic()) {
                $image->setUrl($urlConfig->getStringValue());
            }

            if ($urlConfig->isMapped() && $resolverContext instanceof EntityResolverContext) {
                $url = $this->resolveEntityValue($resolverContext->getEntity(), $urlConfig->getStringValue());
                if ($url) {
                    $image->setUrl($url);
                }
            }

            $newTabConfig = $config->get('newTab');
            if ($newTabConfig !== null) {
                $image->setNewTab($newTabConfig->getBoolValue());
            }
        }

        $mediaConfig = $config->get('media');
        if ($mediaConfig && $mediaConfig->getValue()) {
            $this->addMediaEntity($slot, $image, $result, $mediaConfig, $resolverContext);
        }
    }

    private function addMediaEntity(
        CmsSlotEntity $slot,
        ImageStruct $image,
        ElementDataCollection $result,
        FieldConfig $config,
        ResolverContext $resolverContext
    ): void {
        if ($config->isDefault()) {
            $media = $this->mediaResolver->getDefaultCmsMediaEntity($config->getStringValue());

            if ($media) {
                $image->setMedia($media);
            }
        }

        if ($config->isMapped() && $resolverContext instanceof EntityResolverContext) {
            $media = $this->resolveEntityValue($resolverContext->getEntity(), $config->getStringValue());

            if ($media instanceof MediaEntity) {
                $image->setMediaId($media->getUniqueIdentifier());
                $image->setMedia($media);
            }
        }

        if ($config->isStatic()) {
            $image->setMediaId($config->getStringValue());

            $searchResult = $result->get('media_' . $slot->getUniqueIdentifier());
            if (!$searchResult) {
                return;
            }

            $media = $searchResult->get($config->getStringValue());
            if (!$media instanceof MediaEntity) {
                return;
            }

            $image->setMedia($media);
        }
    }
}
<?php declare(strict_types=1);

namespace ICTCustomField\Service;

use Shopware\Core\Defaults;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;
use Shopware\Core\System\CustomField\CustomFieldTypes;

class ICTCustomFieldsInstaller
{
    private const CUSTOM_FIELDSET_NAME = 'ict_custom_media';

    private const CUSTOM_FIELDSET = [
        'name' => self::CUSTOM_FIELDSET_NAME,
        'config' => [
            'label' => [
                'en-GB' => 'ICT Custom Field Image ',
                'de-DE' => 'ICT Custom Field Image ',
                Defaults::LANGUAGE_SYSTEM => 'Mention the fallback label here'
            ]
        ],
        'customFields' => [
            [
                'name' => 'ict_custom_field_media',
                'type' => CustomFieldTypes::MEDIA,
                'config' => [
                    'type' => 'media',
                    'customFieldType' => 'media',
                    'label' => [
                        'en-GB' => 'ICT Custom Field Media',
                        'de-DE' => 'ICT Custom Field Media',
                        Defaults::LANGUAGE_SYSTEM => 'Mention the fallback label here'
                    ],
                    'customFieldPosition' => 1
                ]
            ]
        ]
    ];

    public function __construct(
        private readonly EntityRepository $customFieldSetRepository,
        private readonly EntityRepository $customFieldSetRelationRepository
    ) {
    }

    public function install(Context $context): void
    {
        $this->customFieldSetRepository->upsert([
            self::CUSTOM_FIELDSET
        ], $context);
    }

    public function addRelations(Context $context): void
    {
        $this->customFieldSetRelationRepository->upsert(array_map(function (string $customFieldSetId) {
            return [
                'customFieldSetId' => $customFieldSetId,
                'entityName' => 'product',
                'customFieldType' => 'media',
                'type' => 'media',
            ];
        }, $this->getCustomFieldSetIds($context)), $context);
    }

    /**
     * @return string[]
     */
    private function getCustomFieldSetIds(Context $context): array
    {
        $criteria = new Criteria();

        $criteria->addFilter(new EqualsFilter('name', self::CUSTOM_FIELDSET_NAME));

        return $this->customFieldSetRepository->searchIds($criteria, $context)->getIds();
    }

    public function deleteRelations(Context $context): void
    {
        $this->customFieldSetRelationRepository->delete(array_map(function (string $customFieldSetId) {
            return [
                'customFieldSetId' => $customFieldSetId,
                'entityName' => 'product',
            ];
        }, $this->getCustomFieldSetIds($context)), $context);
    }
}

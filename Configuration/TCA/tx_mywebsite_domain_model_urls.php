<?php
return [
    'ctrl' => [
        'title' => 'Urls',
        'label' => 'url',
        'label-alt' => 'title',
        'label-alt_force' => true,
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'sortby' => 'sorting',
        'default_sortby' => 'label',
        'versioningWS' => true,
        'rootLevel' => 0,
        'iconfile' => 'EXT:my-website/Resources/Public/Icons/urls.svg',
        'origUid' => 't3_origuid',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'translationSource' => 'l10n_source',
        'searchFields' => 'title,description',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'security' => [
            'ignorePageTypeRestriction' => true,
        ],

    ],
    'columns' => [
        'url' => [
            'label' => 'url',
            'config' => ['type' => 'input']
        ],
        'type' => [
            'label' => 'type',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'label' => 'internal',
                        'value' => 'internal',
                    ],
                    [
                        'label' => 'external',
                        'value' => 'external',
                    ],
                ],
                'size' => 6,
            ],
        ],
        'title' => [
            'label' => 'title',
            'config' => ['type' => 'input']
        ]
    ],
    'types' => [
        [
            'showitem' => 'url, type, title'
        ]
    ]
];

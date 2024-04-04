<?php
return [
    'ctrl' => [
        'title' => 'Urls',
        'label' => 'url',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'sortby' => 'sorting',
        'default_sortby' => 'label',
        'versioningWS' => true,
        'rootLevel' => 0,
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
            'label' => 'URL',
            'config' => ['type' => 'input']
        ],
        'type' => [
            'label' => 'Type',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['GitHub URL', 'github'],
                    ['Twitter URL', 'twitter'],
                    ['LinkedIn URL', 'linkedin'],
                ],
                'size' => 6,
            ],
        ]
    ],
    'types' => [
        [
            'showitem' => 'url, type'
        ]
    ]
];

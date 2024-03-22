<?php
return [
    'ctrl' => [
        'title' => 'Resume Skills',
        'label' => 'category',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'delete' => 'deleted',
        'searchFields' => 'category,description',
        'security' => [
            'ignorePageTypeRestriction' => true,
        ],
    ],
    'columns' => [
        'category' => [
            'label' => 'Category',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['technology', 'technology'],
                    ['language', 'language'],
                ],
            ],
        ],
        'name' => [
            'label' => 'Description',
            'config' => ['type' => 'input']
        ],
    ],
    'types' => [
        '0' => ['showitem' => 'category, name'],
    ],
];

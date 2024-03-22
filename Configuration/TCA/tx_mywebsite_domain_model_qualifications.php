<?php
return [
    'ctrl' => [
        'title' => 'Resume Qualifications',
        'label' => 'category',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'sortby' => 'sorting',
        'versioningWS' => true,
        'rootLevel' => 0,
        'iconfile' => 'EXT:my-website/Resources/Public/Icons/qualifications.svg',
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
        'category' => [
            'label' => 'Category',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['Education', 'education'],
                    ['Experience', 'experience'],
                ],
            ],
        ],
        'time_from' => [
            'label' => 'Time From',
            'config' => ['type' => 'input']
        ],
        'time_to' => [
            'label' => 'Time To',
            'config' => ['type' => 'input']
        ],
        'company' => [
            'label' => 'Company',
            'config' => ['type' => 'input']
        ],
        'city' => [
            'label' => 'City',
            'config' => ['type' => 'input']
        ],

        'job_name' => [
            'label' => 'Job Name',
            'config' => ['type' => 'input']
        ],
        'job_description' => [
            'label' => 'Job Description',
            'config' => ['type' => 'text']
        ],
    ],
    'types' => [
        ['showitem' => 'category, time_from, time_to, company, city, job_name, job_description'],
    ]
];

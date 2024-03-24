<?php

return [
    'ctrl' => [
        'title' => 'Projects',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'searchFields' => 'name,description,github_url',
        'iconfile' => 'EXT:mywebsite/Resources/Public/Icons/tx_mywebsite_domain_model_projects.svg',
        'security' => [
            'ignorePageTypeRestriction' => true,
        ],
    ],
    'columns' => [
        'name' => [
            'exclude' => true,
            'label' => 'Name',
            'config' => [
                'type' => 'input',
                'size' => 20,
                'eval' => 'trim,required',
            ],
        ],
        'image' => [
            'exclude' => true,
            'label' => 'Image',
            'config' => [
                'type' => 'file',
                'allowed' => 'jpg,jpeg,png,gif',
                'disallowed' => '',
                'maxitems' => 1,
                'minitems' => 1,
                'size' => 1,
                'eval' => 'required',
                'uploadfolder' => 'fileadmin/user_upload/mywebsite',
                'show_thumbs' => 1,
                'appearance' => [
                    'fileUploadAllowed' => true,
                ],
            ],
        ],
        'description' => [
            'exclude' => true,
            'label' => 'Description',
            'config' => [
                'type' => 'text',
                'eval' => 'trim,required',
            ],
        ],
        'github_url' => [
            'exclude' => true,
            'label' => 'GitHub URL',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'eval' => 'trim,required',
                'softref' => 'typolink'
            ],
        ],
    ],
    'types' => [
        '0' => ['showitem' => 'name, image, description, github_url'],
    ],
];

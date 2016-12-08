<?php

return [

    'name' => 'driven/listings',

    'type' => 'extension',

    'main' => 'Driven\\Listings\\Module\\ListingsModule',

    'autoload' => [
        'Driven\\Listings\\' => 'src'
    ],

    'settings' => '@listings',

    'resource' => [
        'driven/listings:' => ''
    ],

    'permissions' => [

        'listings: manage lists' => [
            'title' => 'Manage lists',
            'description' => 'Create, edit, delete and publish lists'
        ]

    ],

    'config' => [
        'defaults' => [
            'listingTitle' => 'uk-h1',
            'listingDescription' => '',

            'categoryTitleDescription'=>'uk-margin-large-bottom uk-margin-large-top',
            'categoryTitle' => 'uk-h2 uk-text-center uk-text-uppercase uk-margin-remove',
            'categoryDescription' => 'uk-text-large uk-text-center',

            'itemContainer'=>'',
            'itemTitleDescription' => 'uk-width-medium-5-10 uk-flex-item-1',
            'itemTitle' => 'uk-h3',
            'itemDescription' => '',

            'itemPrice' => 'uk-width-medium-1-10 uk-text-right uk-text-large',
            'itemImage' => 'uk-width-medium-4-10',
            'itemTagsContainer' => 'uk-margin-top uk-text-bold uk-text-primary',
            'itemTag' => 'uk-badge'


        ]
    ],

    'routes' => [

        '/listings' => [
            'name' => '@listings',
            'controller' => 'Driven\\Listings\\Controller\\ListingsController'
        ],
        '/listings/category' => [
            'name' => '@listings/category',
            'controller' => 'Driven\\Listings\\Controller\\CategoryController'
        ],
        '/listings/category/item' => [
            'name' => '@listings/category/item',
            'controller' => 'Driven\\Listings\\Controller\\ItemController'
        ],
        '/listings/templates' => [
            'name' => '@listings/templates',
            'controller' => 'Driven\\Listings\\Controller\\TemplatesController'
        ],
        '/listings/info' => [
            'name' => '@listings/info',
            'controller' => 'Driven\\Listings\\Controller\\InfoController'
        ]

    ],

    'menu' => [

        'listings' => [
            'label' => 'Listings',
            'icon' => 'driven/listings:icon.svg',
            'url' => '@listings',
            'active' => '@listings*'

        ],

        'listings: root' => [
            'parent' => 'listings',
            'label' => 'Lists',
            'url' => '@listings'
        ],

        'listings: templates' => [
            'parent' => 'listings',
            'label' => 'Templates',
            'url' => '@listings/templates'
        ],

        'listings: info' => [
            'parent' => 'listings',
            'label' => 'Info',
            'url' => '@listings/info'
        ]
    ]
];

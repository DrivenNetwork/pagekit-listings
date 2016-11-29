<?php

return [

    'install' => function ($app) {

        $util = $app['db']->getUtility();

        if ($util->tableExists('@listings_listing') === false) {
            $util->createTable('@listings_listing', function ($table) {
                $table->addColumn('id', 'integer', ['unsigned' => true, 'length' => 10, 'autoincrement' => true]);
                $table->addColumn('created_by', 'integer', ['unsigned' => true, 'length' => 10, 'default' => 0]);
                $table->addColumn('created_on', 'integer', ['notnull' => false, 'length' => 11]);
                $table->addColumn('modified_by', 'integer', ['unsigned' => true, 'length' => 10, 'default' => 0]);
                $table->addColumn('modified_on', 'integer', ['notnull' => false, 'length' => 11]);
                $table->addColumn('title', 'string', ['length' => 255]);
                $table->addColumn('description', 'string', ['length' => 255]);
                $table->addColumn('template_id', 'integer', ['unsigned' => true, 'length' => 10]);
                $table->addColumn('available_from', 'time', ['notnull' => false, 'length' => 11]);
                $table->addColumn('available_to', 'time', ['notnull' => false, 'length' => 11]);
                $table->addColumn('position', 'smallint');
                $table->addColumn('status', 'smallint');
                $table->setPrimaryKey(['id']);
            });
        }

        if ($util->tableExists('@listings_category') === false) {
            $util->createTable('@listings_category', function ($table) {
                $table->addColumn('id', 'integer', ['unsigned' => true, 'length' => 10, 'autoincrement' => true]);
                $table->addColumn('listing_id', 'integer', ['unsigned' => true, 'length' => 10]);
                $table->addColumn('created_by', 'integer', ['unsigned' => true, 'length' => 10, 'default' => 0]);
                $table->addColumn('created_on', 'integer', ['notnull' => false, 'length' => 11]);
                $table->addColumn('modified_by', 'integer', ['unsigned' => true, 'length' => 10, 'default' => 0]);
                $table->addColumn('modified_on', 'integer', ['notnull' => false, 'length' => 11]);
                $table->addColumn('title', 'string', ['length' => 255]);
                $table->addColumn('description', 'string', ['length' => 255]);
                $table->addColumn('image', 'string', ['length' => 255]);
                $table->addColumn('position', 'smallint');
                $table->addColumn('status', 'smallint');
                $table->setPrimaryKey(['id']);
            });
        }

        if ($util->tableExists('@listings_item') === false) {
            $util->createTable('@listings_item', function ($table) {
                $table->addColumn('id', 'integer', ['unsigned' => true, 'length' => 10, 'autoincrement' => true]);
                $table->addColumn('category_id', 'integer', ['unsigned' => true, 'length' => 10]);
                $table->addColumn('listing_id', 'integer', ['unsigned' => true, 'length' => 10]);
                $table->addColumn('created_by', 'integer', ['unsigned' => true, 'length' => 10, 'default' => 0]);
                $table->addColumn('created_on', 'integer', ['notnull' => false, 'length' => 11]);
                $table->addColumn('modified_by', 'integer', ['unsigned' => true, 'length' => 10, 'default' => 0]);
                $table->addColumn('modified_on', 'integer', ['notnull' => false, 'length' => 11]);
                $table->addColumn('title', 'string', ['length' => 255]);
                $table->addColumn('description', 'string', ['length' => 255]);
                $table->addColumn('link', 'string', ['length' => 255]);
                $table->addColumn('actions', 'json_array');
                $table->addColumn('image', 'string', ['length' => 255]);
                $table->addColumn('position', 'smallint');
                $table->addColumn('status', 'smallint');
                $table->addColumn('price', 'float', ['default' => 0.00]);
                $table->addColumn('modifiers', 'json_array');
                $table->setPrimaryKey(['id']);

            });
        }

        if ($util->tableExists('@listings_template') === false) {
            $util->createTable('@listings_template', function ($table) {
                $table->addColumn('id', 'integer', ['unsigned' => true, 'length' => 10, 'autoincrement' => true]);
                $table->addColumn('created_by', 'integer', ['unsigned' => true, 'length' => 10, 'default' => 0]);
                $table->addColumn('created_on', 'integer', ['notnull' => false, 'length' => 11]);
                $table->addColumn('modified_by', 'integer', ['unsigned' => true, 'length' => 10, 'default' => 0]);
                $table->addColumn('modified_on', 'integer', ['notnull' => false, 'length' => 11]);
                $table->addColumn('title', 'string', ['length' => 255]);
                $table->addColumn('description', 'string', ['length' => 255]);
                $table->addColumn('html', 'string');
                $table->addColumn('editable', 'smallint', ['default' => 1]);
                $table->addColumn('locked', 'smallint', ['default' => 0]);
                $table->setPrimaryKey(['id']);

            });
        }

        $now = time();
        $app['db']->insert('@listings_template', [
            'id'=>0,
            'created_by' => 1,
            'created_on' => $now,
            'modified_by' => 1,
            'modified_on' => $now,
            'title' => 'Basic Template',
            'description' => 'Listings Default Template',
            'html' => '<h2 v-if="list.title" :class="settings.listingTitle || defaults.listingTitle" data-type="List Title">{{list.title}}</h2><div v-if="list.description" :class="settings.listingDescription || defaults.listingDescription" data-type="List Description">{{list.description}}</div><div :class="settings.categoryContainer || defaults.categoryContainer" v-for="category in list.categories | orderBy \'position\'" data-type="Category"> <section :class="settings.categoryTitleDescription || defaults.categoryTitleDescription"> <h3 v-if="category.title" :class="settings.categoryTitle || defaults.categoryTitle" data-type="Category Title">{{category.title}}</h3> <div v-if="category.description" :class="settings.categoryDescription || defaults.categoryDescription" data-type="Category Description">{{category.description}}</div></section> <section class="uk-list uk-flex uk-flex-column" :class="settings.itemContainer || defaults.itemContainer" data-type="Category Items"> <div class="uk-grid" :class="settings.itemContainer || defaults.itemContainer" v-for="item in category.items | orderBy \'position\'" data-type="Item" data-uk-grid-margin> <div v-if="item.image" :class="settings.itemImage || defaults.itemImage" data-type="Item Image"> <a v-if="item.link" :href="item.link" title="Item.title" alt="item.title"> <img :src="item.image" title="{{item.name}}" alt="{{item.name}}"/> </a> <img v-else :src="item.image" title="{{item.name}}" alt="{{item.name}}"/> </div><dl v-if="item.title || item.description" :class="settings.itemTitleDescription || defaults.itemTitleDescription" data-type="Item Title and Description"> <dt v-if="item.title" :class="settings.itemTitle || defaults.itemTitle" data-type="Item Title"> <a v-if="item.link" :href="item.link" title="Item.title" alt="item.title">{{item.title}}</a> <div v-else>{{item.title}}</div></dt> <dd v-if="item.description" :class="settings.itemDescription || defaults.itemDescription" data-type="Item Description" v-html="item.description"> </dd> <div v-if="item.modifiers.length" :class="settings.itemModifiersContainer || defaults.itemModifiersContainer" data-type="Item Modifiers"> <div v-for="modifier in item.modifiers" :class="settings.itemModifier || defaults.itemModifier" data-type="Modifier">{{modifier.title}}</div></div></dl> <div v-if="item.price" :class="settings.itemPrice || defaults.itemPrice" data-type="Item Price">{{item.price | currency}}</div></div></section></div>',
            'editable' => 0,
            'locked' => 1
        ]);

        $app['db']->insert('@listings_template', [
            'created_by' => 1,
            'created_on' => $now,
            'modified_by' => 1,
            'modified_on' => $now,
            'title' => 'Image Showcase',
            'description' => 'Display a large image for each item with it\'s title and description.',
            'html' => '<style>.accent-color{color: white;}</style>
                    <h2>{{list.title}}</h2>
                    <p v-html="list.description"></p>
                    <ul class="uk-list" v-for="category in list.categories" data-uk-margin>
                        <li v-for="item in category.items">
                            <div class="uk-margin-top uk-margin-left uk-position-absolute">
                                <h2 class="accent-color uk-text-uppercase uk-text-bold uk-margin-remove">{{item.title}}</h2>
                                <span class="accent-color uk-text-small" v-html="item.description"></span>
                            </div>
                            <img class="uk-width-1-1" :src="item.image"/>
                        </li>
                    </ul>',
            'editable' => 1,
            'locked' => 0
        ]);


        $app['db']->insert('@listings_listing', [
            'id' => 1,
            'created_by' => 1,
            'created_on' => $now,
            'modified_by' => 1,
            'modified_on' => $now,
            'title' => 'Sample List',
            'description' => 'Example of a simple list.<strong> Add the <em>code</em> to any page to view it.</strong>',
            'template_id'=>0,
            'available_from'=>1480460400,
            'available_to'=>1480460400,
            'position'=>0,
            'status'=>1
        ]);

        $app['db']->insert('@listings_category', [
            'id' => 1,
            'listing_id' => 1,
            'created_by' => 1,
            'created_on' => $now,
            'modified_by' => 1,
            'modified_on' => $now,
            'title' => 'Sample Category',
            'description' => 'Categories group items.',
            'image' => '',
            'position' => 0,
            'status' => 1
        ]);

        $app['db']->insert('@listings_category', [
            'id' => 2,
            'listing_id' => 1,
            'created_by' => 1,
            'created_on' => $now,
            'modified_by' => 1,
            'modified_on' => $now,
            'title' => 'Another Category',
            'description' => 'Categories group items.',
            'image' => '',
            'position' => 0,
            'status' => 1
        ]);

        $app['db']->insert('@listings_item', [
            'id' => 1,
            'category_id' => 1,
            'listing_id' => 1,
            'created_by' => 1,
            'created_on' => $now,
            'modified_by' => 1,
            'modified_on' => $now,
            'title' => 'Sample Item',
            'description' => '',
            'image' => 'packages/driven/listings/img/sample-0.jpeg',
            'position' => 0,
            'status' => 1,
            'link' => 'https://driven.network/',
            'actions' => '{}',
            'price' => 10.99,
            'modifiers' => '{}'
        ]);

        $app['db']->insert('@listings_item', [
            'id' => 2,
            'category_id' => 1,
            'listing_id' => 1,
            'created_by' => 1,
            'created_on' => $now,
            'modified_by' => 1,
            'modified_on' => $now,
            'title' => 'Drag Me to "Another Category"',
            'description' => '',
            'image' => 'packages/driven/listings/img/sample-1.jpeg',
            'position' => 1,
            'status' => 1,
            'link' => 'https://driven.network/',
            'actions' => '',
            'price' => 19.99,
            'modifiers' => '{}'
        ]);

    },

    'uninstall' => function ($app) {

        $util = $app['db']->getUtility();

        if ($util->tableExists('@listings_listing')) {
            $util->dropTable('@listings_listing');
        }

        if ($util->tableExists('@listings_category')) {
            $util->dropTable('@listings_category');
        }

        if ($util->tableExists('@listings_item')) {
            $util->dropTable('@listings_item');
        }

        if ($util->tableExists('@listings_template')) {
            $util->dropTable('@listings_template');
        }
    },

    'updates' => []

];
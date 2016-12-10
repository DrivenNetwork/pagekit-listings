<?php

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Schema\Comparator;

return [

    'install' => function ($app) {

        $util = $app['db']->getUtility();

        rename('packages/driven/listings/img/listings-sample-00.jpeg', 'storage/listings-sample-00.jpeg');
        rename('packages/driven/listings/img/listings-sample-01.jpeg', 'storage/listings-sample-01.jpeg');

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
                $table->addColumn('featured_from', 'time', ['notnull' => false, 'length' => 11]);
                $table->addColumn('featured_to', 'time', ['notnull' => false, 'length' => 11]);
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
                $table->addColumn('featured_from', 'time', ['notnull' => false, 'length' => 11]);
                $table->addColumn('featured_to', 'time', ['notnull' => false, 'length' => 11]);
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
                $table->addColumn('tags', 'json_array');
                $table->addColumn('featured_from', 'time', ['notnull' => false, 'length' => 11]);
                $table->addColumn('featured_to', 'time', ['notnull' => false, 'length' => 11]);
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
                $table->addColumn('html', 'text');
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
            'title' => 'Default Template',
            'description' => 'Listings built-in configurable template.',
            'html' => file_get_contents('views/admin/templates/default-template.php', FILE_USE_INCLUDE_PATH),
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
            'html' => file_get_contents('views/admin/templates/image-showcase.php', FILE_USE_INCLUDE_PATH),
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
            'featured_from'=>1480575600,
            'featured_to'=>1480633200,
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
            'description' => 'A Group of items',
            'image' => '',
            'position' => 0,
            'status' => 1,
            'featured_from'=>'',
            'featured_to'=>''
        ]);

        $app['db']->insert('@listings_category', [
            'id' => 2,
            'listing_id' => 1,
            'created_by' => 1,
            'created_on' => $now,
            'modified_by' => 1,
            'modified_on' => $now,
            'title' => 'Another Category',
            'description' => 'Another group of items',
            'image' => '',
            'position' => 1,
            'status' => 1,
            'featured_from'=>'',
            'featured_to'=>''
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
            'description' => 'This is the description for the item',
            'image' => 'storage/listings-sample-00.jpeg',
            'position' => 0,
            'status' => 1,
            'link' => 'https://driven.network/',
            'actions' => '{}',
            'price' => 10.99,
            'tags' => '{}',
            'featured_from'=>'',
            'featured_to'=>''
        ]);

        $app['db']->insert('@listings_item', [
            'id' => 2,
            'category_id' => 1,
            'listing_id' => 1,
            'created_by' => 1,
            'created_on' => $now,
            'modified_by' => 1,
            'modified_on' => $now,
            'title' => 'Sample Item 2',
            'description' => 'You can <strong>DRAG ME</strong> to "Another Category"',
            'image' => 'storage/listings-sample-01.jpeg',
            'position' => 1,
            'status' => 1,
            'link' => 'https://driven.network/',
            'actions' => '',
            'price' => 19.99,
            'tags' => '{}',
            'featured_from'=>'',
            'featured_to'=>''
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

    'updates' => [

        '1.0.3' => function ($app) {
            $util    = $app['db']->getUtility();
            $manager = $util->getSchemaManager();

            if ($util->tableExists('@listings_template')) {
                $tableOld = $util->listTableDetails('@listings_template');

                if ($tableOld->hasColumn('html')) {
                    $table = clone $tableOld;

                    $column = $table->getColumn('html');
                    $column->setLength(null);
                    $column->setType(Type::getType('text'));

                    $comparator = new Comparator;
                    $manager->alterTable($comparator->diffTable($tableOld, $table));

                    $app['db']->update('@listings_template', array('html' => file_get_contents('views/admin/templates/default-template.php', FILE_USE_INCLUDE_PATH)), array('id' => 1));
                    $app['db']->update('@listings_template', array('html' => file_get_contents('views/admin/templates/image-showcase.php', FILE_USE_INCLUDE_PATH),), array('id' => 2));
                }
            }
        }

    ]

];
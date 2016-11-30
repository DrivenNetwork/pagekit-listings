<?php

namespace Driven\Listings\Controller;

/**
 * @Access(admin=true)
 */
class InfoController
{
    public function indexAction()
    {

        //$data = Item::findAll();

        return [
            '$view' => [
                'title' => 'Listings Info',
                'name' => 'driven/listings:views/admin/index.info.php'
            ]
            //'$data' => $data
        ];
    }
}
<?php

namespace Driven\Listings\Controller;

use Pagekit\Application as App;
use Driven\Listings\Model\Item;
use Driven\Listings\Model\Listing;
use Pagekit\User\Model\Role;

/**
 * @Access(admin=true)
 */
class ItemController
{

    public function indexAction()
    {

        $data = Item::findAll();

        return [
            '$view' => [
                'title' => 'Listings',
                'name' => 'driven/listings:views/admin/index.php'
            ],
            '$data' => $data
        ];
    }

    /**
     * @Request({"data": "array", "listing_id":"int", "category_id":"int"}, csrf=true)
     **/
    public function saveAction($data, $listing_id, $category_id)
    {
        $user = App::user();
        $id = $data['id'];
        $now = time();

        if (!$id || !$item = Item::find($id)) {

            $item = Item::create([
                'listing_id' => $listing_id,
                'category_id' => $category_id,
                'created_by' => $user->id,
                'created_on' => $now,
                'modified_by' => $user->id,
                'modified_on' => $now,
                'title' => $data['title'],
                'description' => $data['description'],
                'link' => $data['link'],
                'actions' => $data['actions'],
                'image' => $data['image'],
                'position' => $data['position'],
                'status' => 1,
                'price' => $data['price'],
                'tags' => []

            ]);

        } else {
            $item->listing_id = $listing_id;
            $item->category_id = $category_id;
            $item->modified_by = $user->id;
            $item->modified_on = $now;
            $item->title = $data['title'];
            $item->description = $data['description'];
            $item->link = $data['link'];
            $item->actions = $data['actions'];
            $item->image = $data['image'];
            $item->position = $data['position'];
            $item->status = $data['status'];
            $item->price = $data['price'];
            $item->tags = $data['tags'];
        }

        $listing = Listing::find($item->listing_id);
        $listing->modified_by = $user->id;
        $listing->modified_on = $now;
        $listing->save();

        $item->save();

        return ['message' => 'success', 'item' => $item];

    }

}

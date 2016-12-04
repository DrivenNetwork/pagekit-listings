<?php

namespace Driven\Listings\Controller;

use Pagekit\Application as App;
use Driven\Listings\Model\ListingCategory as Category;
use Driven\Listings\Model\Listing;

/**
 * @Access(admin=true)
 */
class CategoryController
{

    public function indexAction()
    {

        $data = Category::findAll();

        return [
            '$view' => [
                'title' => 'Listings',
                'name' => 'driven/listings:views/admin/index.php'
            ],
            '$data' => $data
        ];
    }

    /**
     * @Request({"data": "array", "listing_id":"int"}, csrf=true)
     **/
    public function saveAction($data, $listing_id)
    {
        $user = App::user();
        $id = $data['id'];
        $now = time();

        if (!$category = Category::find($id)) {

            $category = Category::create([
                'listing_id' => $listing_id,
                'created_by' => $user->id,
                'created_on' => $now,
                'modified_by' => $user->id,
                'modified_on' => $now,
                'title' => $data['title'],
                'description' => $data['description'],
                'image' => $data['image'],
                'position' => $data['position'],
                'status' => 1

            ]);

        } else {
            $category->listing_id = $listing_id;
            $category->modified_by = $user->id;
            $category->modified_on = $now;
            $category->title = $data['title'];
            $category->description = $data['description'];
            $category->image = $data['image'];
            $category->position = $data['position'];
            $category->status = $data['status'];
        }

        $listing = Listing::find($category->listing_id);
        $listing->modified_by = $user->id;
        $listing->modified_on = $now;
        $listing->save();

        $category->save();

        return ['message' => 'success', 'category' => $category];

    }
}

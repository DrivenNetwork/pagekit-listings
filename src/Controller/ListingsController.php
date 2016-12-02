<?php

namespace Driven\Listings\Controller;

use Driven\Listings\Model\ListingCategory as Category;
use Driven\Listings\Model\Item;
use Driven\Listings\Model\Template;
use Pagekit\Application as App;
use Driven\Listings\Model\Listing;

/**
 * @Access(admin=true)
 */
class ListingsController
{

    public function indexAction()
    {

        $data = Listing::query()->related('editor')->related('template')->get();

        return [
            '$view' => [
                'title' => 'Listings',
                'name' => 'driven/listings:views/admin/index.php'
            ],
            '$data' => $data
        ];
    }

    /**
     * @Route("/edit", name="/edit")
     * @Request({"id": "int"})
     */
    public function editAction($id = 0)
    {
        try {

            $user = App::user();
            $now = time();

            if (!$user->hasAccess('listings: manage listings')) {
                App::abort(403, __('Insufficient User Rights.'));
            }

            if (!$listing = Listing::query()->where('id = ?', [$id])->related('categories')->related('categories.items')->first()) {

                if ($id) {
                    App::abort(404, __('Invalid listing id.'));
                }

                $listing = [
                    'id' => 0,
                    'created_by' => $user->id,
                    'created_on' => $now,
                    'modified_by' => $user->id,
                    'modified_on' => $now,
                    'title' => '',
                    'description' => '',
                    'template_id' => 0,
                    'featured_from' => 1479967200,
                    'featured_to' => 1480633200,
                    'position' => 0,
                    'status' => 1
                ];

            }

            $category = [
                'created_by' => $user->id,
                'created_on' => $now,
                'modified_by' => $user->id,
                'modified_on' => $now,
                'title' => '',
                'description' => '',
                'image' => '',
                'position' => 0,
                'status' => 1
            ];

            $item = [
                'created_by' => $user->id,
                'created_on' => $now,
                'modified_by' => $user->id,
                'modified_on' => $now,
                'title' => '',
                'description' => '',
                'image' => '',
                'position' => 0,
                'status' => 1,
                'price' => '',
                'tags' => []
            ];

            $templates = Template::findAll();


            $payload = [
                '$view' => [
                    'title' => $id ? __('Edit Listing') : __('Add Listing'),
                    'name' => 'driven/listings:views/admin/edit-listing.php'
                ],
                '$data' => [
                    'listing' => $listing,
                    'templates' => $templates,
                    'category_model' => $category,
                    'item_model' => $item
                ]
            ];

            return $payload;

        } catch (\Exception $e) {

            App::message()->error($e->getMessage());

            return App::redirect('@listings');
        }

    }

    /**
     * @Request({"data": "array"}, csrf=true)
     **/
    public function saveAction($data)
    {
        $user = App::user();
        $id = $data['id'];
        $now = time();

        $t_from = $data['featured_from'];
        $t_to = $data['featured_to'];

        // Set epoch to human time if necessary
        $featured_from = (is_numeric($t_from) && (int)$t_from == $t_from) ? $t_from : strtotime($t_from);
        $featured_to = (is_numeric($t_to) && (int)$t_to == $t_to) ? $t_to : strtotime($t_to);

        if (!$id || !$listing = Listing::find($id)) {

            $listing = Listing::create([
                'created_by' => $user->id,
                'created_on' => $now,
                'modified_by' => $user->id,
                'modified_on' => $now,
                'title' => $data['title'],
                'description' => $data['description'],
                'template_id' => $data['template_id'],
                'featured_from' => $featured_from,
                'featured_to' => $featured_to,
                'position' => $data['position'],
                'status' => 1

            ]);
        } else {
            $listing->modified_by = $user->id;
            $listing->modified_on = $now;
            $listing->title = $data['title'];
            $listing->description = $data['description'];
            $listing->template_id = $data['template_id'];
            $listing->featured_from = $featured_from;
            $listing->featured_to = $featured_to;
            $listing->position = $data['position'];
            $listing->status = $data['status'];
        }

        $listing->save();

        return ['message' => 'success', 'listing' => $listing];

    }

    /**
     * @Request({"positions": "array", "type":"string"}, csrf=true)
     **/
    public function positionsAction($positions, $type)
    {
        $user = App::user();
        $now = time();
        $listing_id =[];

        if ($type == 'categories') {
            foreach ($positions as &$position) {
                $category = Category::find($position['id']);
                $category->position = $position['position'];
                $category->save();
            }
            $listing_id = $category->listing_id;
        }

        if ($type == 'items') {
            foreach ($positions as &$position) {
                $item = Item::find($position['id']);
                $item->position = $position['position'];
                $item->category_id = $position['category_id'];
                $item->save();
            }
            $listing_id = $item->listing_id;
        }

        if ($listing_id) {
            $listing = Listing::query()->related('categories')->related('categories.items')->where('id = ?', [$listing_id])->first();
            $listing->modified_by = $user->id;
            $listing->modified_on = $now;
            $listing->save();
        }


        return ['message' => 'success', 'listing' => $listing];
    }

    /**
     * @Request({"id": "integer", "type": "string"}, csrf=true)
     **/
    public function deleteAction($id, $type = 'listing')
    {
        $user = App::user();
        $now = time();
        $cached = [];

        if ($type == 'listing') {
            if (!$id || !$listing = Listing::find($id)) {

                // Can't Find Listing

            } else {

                $categories = Category::query()->where('listing_id = ?',[$id])->get();
                $items = Item::query()->where('listing_id = ?',[$id])->get();

                foreach ($items as $item){
                    $item->delete();
                }

                foreach ($categories as $category){
                    $category->delete();
                }

                $cached = $listing;
                $listing->delete();
            }

            return ['message' => 'success', 'listing' => $cached];

        } elseif ($type == 'category') {

            if (!$id || !$category = Category::find($id)) {

                // Can't Find Category

            } else {
                $listing = Listing::query()->related('categories')->related('categories.items')->where('id = ?', [$category->listing_id])->first();
                $listing->modified_by = $user->id;
                $listing->modified_on = $now;
                $listing->save();

                // TODO: Delete Children Items

                $cached = $category;
                $category->delete();
            }

            return ['message' => 'success', 'category' => $cached];

        } elseif ($type == 'item') {

            if (!$id || !$item = Item::find($id)) {

                // Can't Find Category

            } else {
                $listing = Listing::query()->related('categories')->related('categories.items')->where('id = ?', [$item->listing_id])->first();
                $listing->modified_by = $user->id;
                $listing->modified_on = $now;
                $listing->save();
                $cached = $item;
                $item->delete();
            }

            return ['message' => 'success', 'item' => $cached];
        }


    }

}

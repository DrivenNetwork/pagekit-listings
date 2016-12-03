<?php

namespace Driven\Listings\Module;

use Driven\Listings\Model\Template;
use Pagekit\Application as App;
use Driven\Listings\Plugin\ListingsPlugin;
use Pagekit\Module\Module;
use Driven\Listings\Model\Listing;

class ListingsModule extends Module
{

    public static $counter = 1;

    /**
     * @param App $app
     * @param int $listing_id
     * @param array $options
     * @param null $view
     * @return mixed
     */
    public function renderList(App $app, $listing_id, $options = [], $view = null)
    {

        $user = App::user();
        $defaults = App::module('driven/listings')->config['defaults'];
        $template = null;

        /** @var List $list */
        if (!$list = Listing::query()
            ->where('id = ?', [$listing_id])
            ->where('status = ?', [1])
            ->related('editor')
            ->related(['categories' => function ($query) {
                return $query
                    ->orderBy('position')
                    ->where('status = ?', [1])
                    ->related(['items' => function ($query) {
                        return $query
                            ->orderBy('position')
                            ->where('status = ?', [1]);
                    }]);
            }])
            ->first()
        ) {
            //throw new App\Exception('Listing Not Available', 404) ;
        } else {
            $template = Template::find($list->template_id);

            // Sort Categories and Update Key Index
            usort($list->categories, function ($cat1, $cat2) {
                return $cat1->position <=> $cat2->position;
            });

            // Sort Items and Update Key Index
            foreach($list->categories as $sortCategory){
                usort($sortCategory->items, function ($item1, $item2) {
                    return $item1->position <=> $item2->position;
                });
            }
        }

        $app->on('view.data', function ($event, $data) use ($list, $options, $defaults, $template) {
            $data->add('$listing_' . self::$counter, [
                'defaults' => $defaults,
                'template' => $template,
                'list' => $list,
                'settings' => $options
            ]);
            self::$counter++;
        });

        return $app->view($view ?: 'driven/listings/list.php');
    }

    /**
     * {@inheritdoc}
     */
    public function main(App $app)
    {

        $app->on('boot', function () use ($app) {
            $module = App::module('driven/listings');

        });

        $app->subscribe(
            new ListingsPlugin()
        );

    }
}

<?php

namespace Driven\Listings\Plugin;

use Pagekit\Application as App;
use Pagekit\Content\Event\ContentEvent;
use Pagekit\Event\EventSubscriberInterface;

class ListingsPlugin implements EventSubscriberInterface
{

    /**
     * @param ContentEvent $event
     */
    public function onContentPlugins(ContentEvent $event)
    {
        $event->addPlugin('listings', [$this, 'applyPlugin']);
    }

    /**
     * @param  array $options
     * @return string|null
     */
    public function applyPlugin(array $options)
    {
        if (!isset($options['id'])) {
            return;
        }

		$listings = App::module('driven/listings');
		$app = App::getInstance();
		$listing_id = $options['id'];
		unset($options['id']);

		try {
            return $listings->renderList($app, $listing_id, $options);

		} catch (App\Exception $e) {
			return $e->getMessage();
		}

	}

    /**
     * {@inheritdoc}
     */
    public function subscribe()
    {
        return [
            'content.plugins' => ['onContentPlugins', 20],
        ];
    }
}

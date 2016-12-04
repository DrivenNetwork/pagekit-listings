<? $view->script('driven.list', 'driven/listings:js/list.js', ['vue']) ?>
<? $view->style('driven.uikit', 'driven/listings:/assets/css/uikit.min.css') ?>
<driven-listing-container><slot></slot></driven-listing-container>
<?php $view->style('info-styles', 'driven/listings:assets/css/info.css') ?>
<?php $view->script('info', 'driven/listings:js/info.js', ['vue', 'uk-tooltip']) ?>

<section id="info">

    <div class="uk-grid" data-uk-grid-margin>

        <div class="uk-width-small-1-1 uk-width-medium-1-4">
            <ul class="uk-nav uk-nav-side"
                data-uk-switcher="{connect:'#listings-info-content',swiping:false, active:0}">
                <li><a href="#">Overview</a></li>
                <li><a href="#">Default Template</a></li>
                <li><a href="#">Custom Templates</a></li>
                <li><a href="#">Data Model</a></li>
                <li><a href="#">About Listings</a></li>
            </ul>
            <hr>
            <div class="uk-text-center">
                <a class="uk-button uk-button-primary uk-width-small-1-3 uk-width-medium-1-1" target="_driven"
                   href="https://github.com/DrivenNetwork/pagekit-listings" title="View Listings on GitHub"><i
                            class="uk-icon-github uk-margin-small-right"></i> {{ 'View on GitHub' | trans }}</a>
            </div>
        </div>

        <div class="uk-width-small-1-1 uk-width-medium-3-4">
            <ul id="listings-info-content" class="uk-switcher">

                <li>
                    <? include 'overview.php'; ?>
                </li>

                <li>
                    <? include 'default-template.php';?>
                </li>

                <li>
                    <? include 'custom-templates.php';?>
                </li>

                <li>
                    <? include 'data-model.php'; ?>
                </li>

                <li>
                    <? include 'about.php';?>
                </li>

            </ul>

        </div>
    </div>

    <div id="listings-info-content">

    </div>

</section>
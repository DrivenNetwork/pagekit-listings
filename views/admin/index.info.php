<?php $view->style('info-styles', 'driven/listings:assets/css/info.css') ?>
<?php $view->script('info', 'driven/listings:js/info.js', ['vue', 'uk-tooltip']) ?>

<section id="info">

    <div class="uk-grid" data-uk-grid-margin>

        <div class="uk-width-small-1-1 uk-width-medium-1-4">
            <ul class="uk-nav uk-nav-side"
                data-uk-switcher="{connect:'#listings-info-content',swiping:false, active:2}">
                <li><a href="#">Overview</a></li>
                <li><a href="#">Data Model</a></li>
                <li><a href="#">Default Template</a></li>
                <li><a href="#">Custom Templates</a></li>
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

                <li data-uk-switcher-item="0">
                    <h2 class="uk-margin-remove">{{ 'Overview' | trans }}</h2>
                    <p>
                        <strong>Listings</strong> provides a clean way to create manageable content for your site.
                        Create any type of listed content
                        like professional portfolios, products showcase, events, restaurant menus and more. Quickly
                        build your list by using the built-in
                        <strong>Default Template</strong> which can be easily configured to showcase your content as you
                        want.</p>
                    <p class="important">If you want more control over the layout of your items create a <strong>Custom
                            Template</strong>.
                    </p>

                    <h4>{{ 'Basic Example' | trans }}</h4>

                    <p>Templates are built using basic HTML with <a href="http://v1.vuejs.org/guide/syntax.html"
                                                                    target="_driven" title="VueJs Data Binding Syntax">VueJs</a>
                        interpolations and
                        <a href="https://getuikit.com/docs/base.html" target="_driven" title="UIkit Docs">UIkit</a> for
                        styling and layout of your content.
                    </p>

                    <section class="" data-uk-margin>

                        <div class="uk-panel dr-pre uk-margin-bottom">
                            <span class="uk-panel-badge uk-badge">html</span>
                            <div class="pre" v-pre>
                                <strong>&lt;h1&gt;</strong>{{ list.title }}<strong>&lt;/h1&gt;</strong><br/>
                                <strong>&lt;p&gt;</strong>{{ list.description }}<strong>&lt;/p&gt;</strong>
                            </div>
                        </div>

                        <div class="uk-panel dr-pre">
                            <span class="uk-panel-badge uk-badge">output</span>
                            <h1 class="uk-margin-remove">Your Title</h1>
                            <p class="uk-margin-remove">The listing's description.</p>
                        </div>

                    </section>
                </li>

                <li data-uk-switcher-item="1">
                    <h2 class="uk-margin-remove">{{ 'Data Model' | trans }}</h2>
                    <p>Use the following snippets to create a custom template with your list's content.</p>

                    <section class="uk-margin-bottom" data-uk-margin>
                        <div><strong>STRING</strong>: Plain text/alphanumeric value</div>
                        <div><strong>COLLECTION</strong>: Group of sub-objects with values</div>
                        <div><strong>FLOAT</strong>: Number with two decimal places</div>
                    </section>

                    <section class="uk-panel dr-pre">
                        <span class="uk-panel-badge uk-badge">model</span>
                        <ul class="uk-list dr-org" v-pre>
                            <li>
                                <h2 class="uk-margin-small-bottom">LIST</h2>
                                <ul>
                                    <li>
                                        <dl class="uk-description-list-line">
                                            <dt>List's Title</dt>
                                            <dd>The title of the list</dd>
                                            <code>{{ list.title }}</code>
                                            <strong class="uk-text-muted uk-text-small">: STRING</strong>
                                        </dl>

                                        <dl class="uk-description-list-line">
                                            <dt>List's Description</dt>
                                            <dd>The description of the list</dd>
                                            <code>{{ list.description }}</code>
                                            <strong class="uk-text-muted uk-text-small">: STRING</strong>
                                        </dl>

                                        <dl class="uk-description-list-line">
                                            <dt>List's Categories</dt>
                                            <dd>Collection of available categories for the current list</dd>
                                            <code>{{ list.categories }}</code>
                                            <strong class="uk-text-muted uk-text-small">: COLLECTION</strong>
                                        </dl>

                                        <ul>
                                            <li>
                                                <dl class="uk-description-list-line">
                                                    <dt>Category's Title</dt>
                                                    <dd>The title of the current category in the loop</dd>
                                                    <code>{{ category.title }}</code>
                                                    <strong class="uk-text-muted uk-text-small">: STRING</strong>
                                                </dl>
                                            </li>
                                            <li>
                                                <dl class="uk-description-list-line">
                                                    <dt>Category's Description</dt>
                                                    <dd>The description of the current category in the loop</dd>
                                                    <code>{{ category.description }}</code>
                                                    <strong class="uk-text-muted uk-text-small">: STRING</strong>
                                                </dl>
                                            </li>
                                            <li>
                                                <dl class="uk-description-list-line">
                                                    <dt>Category's Image</dt>
                                                    <dd>The image of the current category in the loop</dd>
                                                    <code>{{ category.image }}</code>
                                                    <strong class="uk-text-muted uk-text-small">: STRING</strong>
                                                </dl>
                                            </li>
                                            <li>
                                                <dl class="uk-description-list-line">
                                                    <dt>Category's Items</dt>
                                                    <dd>A collection of available items for the current category</dd>
                                                    <code>{{ category.items }}</code>
                                                    <strong class="uk-text-muted uk-text-small">: COLLECTION</strong>
                                                </dl>
                                                <ul>
                                                    <li>
                                                        <dl class="uk-description-list-line">
                                                            <dt>Item's Title</dt>
                                                            <dd>The title of the current item</dd>
                                                            <code>{{ item.title }}</code>
                                                            <strong class="uk-text-muted uk-text-small">:
                                                                STRING</strong>
                                                        </dl>
                                                    </li>
                                                    <li>
                                                        <dl class="uk-description-list-line">
                                                            <dt>Item's Description</dt>
                                                            <dd>The description of the current item</dd>
                                                            <code>{{ item.description }}</code>
                                                            <strong class="uk-text-muted uk-text-small">:
                                                                STRING</strong>
                                                        </dl>
                                                    </li>
                                                    <li>
                                                        <dl class="uk-description-list-line">
                                                            <dt>Item's Image</dt>
                                                            <dd>The image of the current item</dd>
                                                            <code>{{ item.image }}</code>
                                                            <strong class="uk-text-muted uk-text-small">:
                                                                STRING</strong>
                                                        </dl>
                                                    </li>
                                                    <li>
                                                        <dl class="uk-description-list-line">
                                                            <dt>Item's Link</dt>
                                                            <dd>The link of the current item</dd>
                                                            <code>{{ item.link }}</code>
                                                            <strong class="uk-text-muted uk-text-small">:
                                                                STRING</strong>
                                                        </dl>
                                                    </li>
                                                    <li>
                                                        <dl class="uk-description-list-line">
                                                            <dt>Item's Price</dt>
                                                            <dd>The price of the current item</dd>
                                                            <code>{{ item.price }}</code>
                                                            <strong class="uk-text-muted uk-text-small">: FLOAT</strong>
                                                        </dl>
                                                    </li>
                                                    <li>
                                                        <dl class="uk-description-list-line">
                                                            <dt>Item's Tags</dt>
                                                            <dd>A collection of tags of the current item</dd>
                                                            <code>{{ item.tags }}</code>
                                                            <strong class="uk-text-muted uk-text-small">:
                                                                COLLECTION</strong>
                                                        </dl>
                                                        <ul>
                                                            <li>
                                                                <dl class="uk-description-list-line">
                                                                    <dt>Tag's Title</dt>
                                                                    <dd>The tag's title of the current item's tag</dd>
                                                                    <code>{{ tag.title }}</code>
                                                                    <strong class="uk-text-muted uk-text-small">:
                                                                        STRING</strong>
                                                                </dl>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </section>

                </li>

                <li data-uk-switcher-item="2">
                    <h2 class="uk-margin-remove">{{ 'Default Template' | trans }}</h2>
                    <p>
                        The default template offers many configurable options out of the box. Options are implemented
                        when using the <em>PLUGIN CODE</em>.
                        Each list you create has it's unique plugin code, which can be found on the <a
                                href="/admin/listings" title="Lists Page">lists page</a>.
                    </p>
                    <p>
                        To use the plugin code simply copy and paste it in your page's content area. The values for each
                        option are classes provided by the UIkit framework.

                        For example, <code>uk-hidden</code> is a class in UIkit's css framework to hide an element. The
                        option <code>"listingTitle":"uk-hidden"</code> hides the list's title.
                    </p>
                    <h4>{{ 'Example' | trans }}</h4>

                    <div class="uk-panel dr-pre uk-margin-bottom">
                        <span class="uk-panel-badge uk-badge">default</span>
                        <div class="pre" v-pre>
                            (listings){"id":"1"}
                        </div>
                    </div>

                    <div class="uk-panel dr-pre uk-margin-bottom">
                        <span class="uk-panel-badge uk-badge">options</span>
                        <div class="pre" v-pre>
                            (listings){ "id":"1",
                            "listingTitle":"uk-hidden",
                            "listingDescription":"uk-text-center"
                            }
                        </div>
                    </div>

                    <h4>Available Options</h4>
                    <table class="uk-table uk-table-striped uk-table-condensed">
                        <thead>
                        <tr>
                            <th>Option</th>
                            <th>Default Value</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><code>listingTitle</code></td>
                            <td>uk-h1</td>
                        </tr>
                        <tr>
                            <td><code>listingDescription</code></td>
                            <td class="uk-text-muted">none</td>
                        </tr>
                        <tr>
                            <td><code>categoryTitleDescription</code>
                                <i class="uk-icon-info-circle uk-text-muted uk-text-small uk-margin-small-left"
                                   title="Container" data-uk-tooltip></i>
                            </td>
                            <td>uk-margin-large-bottom uk-margin-large-top</td>
                        </tr>
                        <tr>
                            <td><code>categoryTitle</code></td>
                            <td>uk-h2 uk-text-center uk-text-uppercase uk-margin-remove</td>
                        </tr>
                        <tr>
                            <td><code>categoryDescription</code></td>
                            <td>uk-text-large uk-text-center</td>
                        </tr>
                        <tr>
                            <td><code>itemContainer</code>
                                <i class="uk-icon-info-circle uk-text-muted uk-text-small uk-margin-small-left"
                                   title="Container" data-uk-tooltip></i>
                            </td>
                            <td class="uk-text-muted">none</td>
                        </tr>
                        <tr>
                            <td><code>itemTitleDescription</code>
                                <i class="uk-icon-info-circle uk-text-muted uk-text-small uk-margin-small-left"
                                   title="Container" data-uk-tooltip></i>
                            </td>
                            <td>uk-width-medium-5-10 uk-flex-item-1</td>
                        </tr>
                        <tr>
                            <td><code>itemTitle</code></td>
                            <td>uk-h3</td>
                        </tr>
                        <tr>
                            <td><code>itemDescription</code></td>
                            <td class="uk-text-muted">none</td>
                        </tr>
                        <tr>
                            <td><code>itemPrice</code></td>
                            <td>uk-width-medium-1-10 uk-text-right uk-text-large</td>
                        </tr>
                        <tr>
                            <td><code>itemImage</code></td>
                            <td>uk-width-medium-4-10</td>
                        </tr>
                        <tr>
                            <td><code>itemTagsContainer</code>
                                <i class="uk-icon-info-circle uk-text-muted uk-text-small uk-margin-small-left"
                                   title="Container" data-uk-tooltip></i></td>
                            <td>uk-margin-top uk-text-bold uk-text-primary</td>
                        </tr>
                        <tr>
                            <td><code>itemTag</code></td>
                            <td>uk-badge</td>
                        </tr>
                        </tbody>
                    </table>

                </li>

                <li data-uk-switcher-item="3">
                    <h2 class="uk-margin-remove">{{ 'Custom Templates' | trans }}</h2>
                    <p>Content Here</p>
                </li>

                <li data-uk-switcher-item="4">
                    <h2 class="uk-margin-remove">{{ 'About Listings' | trans }}</h2>
                    <p>Content Here</p>
                </li>

            </ul>

        </div>
    </div>

    <div id="listings-info-content">

    </div>

</section>
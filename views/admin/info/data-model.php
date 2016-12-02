<h2 class="uk-margin-remove">{{ 'Data Model' | trans }}</h2>
<p>Use the following snippets to create a custom template with your list's content.</p>

<section class="uk-margin-bottom important" data-uk-margin>
    <div><strong class="uk-text-primary uk-text-uppercase">String</strong>: Plain text/alphanumeric value</div>
    <div><strong class="uk-text-primary uk-text-uppercase">Collection</strong>: Group of sub-objects with values</div>
    <div><strong class="uk-text-primary uk-text-uppercase">Float</strong>: Number with two decimal places</div>
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
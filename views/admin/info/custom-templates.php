<h2 class="uk-margin-remove">{{ 'Custom Templates' | trans }}</h2>
<p>
    <em>Listings</em> provides a powerful way to display all your lists' content with custom templates. Each listing can
    have it's own template; therefore, multiple lists can be displayed in different ways on the same page.
</p>

<p>
    To create a custom template go to the <a href="#" title="Templates Page">Templates</a> page. From there you can
    click on the <em class="uk-text-primary uk-text-uppercase">Add Template</em> button to begin.
</p>

<hr/>

<h4><i class="uk-icon-angle-right uk-text-primary"></i> {{ 'Basic Template Example' | trans }}</h4>

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
        <h2 class="uk-margin-remove">Your Title</h2>
        <p class="uk-margin-remove">The listing's description.</p>
    </div>

</section>

<hr/>

<h4><i class="uk-icon-angle-right uk-text-primary"></i> {{ 'Displaying Categories & Items' | trans }}</h4>

<p>
    Each list contains a collection of categories <code>list.categories</code> which contain a collection of items
    <code>list.categories[].items</code>. In order to display these you
    will have to create a <em>loop</em> using <a href="http://v1.vuejs.org/guide/list.html#v-for" title="Vuejs v-for"
                                                 target="_drive">VueJS's</a> <code>v-for</code>.
</p>

<hr/>

<p><i class="uk-icon-check uk-text-primary"></i> <strong>Categories</strong>: Use the following example to display
    all categories in the list.</p>

<section class="" data-uk-margin>

    <div class="uk-panel dr-pre uk-margin-bottom">
        <span class="uk-panel-badge uk-badge">html</span>
        <div class="pre" v-pre>
            &nbsp;<strong>&lt;div <em>v-for="category in list.categories"</em>&gt;</strong><br/>
            &nbsp;&nbsp;&nbsp;<strong>&lt;h1&gt;</strong>{{ category.title }}<strong>&lt;/h1&gt;</strong><br/>
            &nbsp;&nbsp;&nbsp;<strong>&lt;span&gt;</strong>{{ category.description }}<strong>&lt;/span&gt;</strong><br/>
            &nbsp;&nbsp;&nbsp;...<br/>
            &nbsp;<strong>&lt;/div&gt;</strong><br/>
        </div>
    </div>

    <div class="uk-panel dr-pre">
        <span class="uk-text-warning"><i class="uk-icon-warning"></i> <strong>Assuming there are 2 categories in the collection</strong></span>
        <br/><br/>
        <span class="uk-panel-badge uk-badge">output</span>
        <h2 class="uk-margin-remove">Category Title</h2>
        <p class="uk-margin-remove">Category description</p>
        <br/>
        <h2 class="uk-margin-remove">Second Category Title</h2>
        <p class="uk-margin-remove">Second category description</p>
        <br/>

    </div>

</section>

<hr/>

<p><i class="uk-icon-check uk-text-primary"></i> <strong>Items</strong>: Use the following example to display
    all items in the category.</p>

<section class="" data-uk-margin>

    <div class="uk-panel dr-pre uk-margin-bottom">
        <span class="uk-panel-badge uk-badge">html</span>
        <div class="pre" v-pre>
            <div class="dr-muted">
                &nbsp;<strong>&lt;div <em>v-for="category in list.categories"</em>&gt;</strong><br/>
                &nbsp;&nbsp;&nbsp;<strong>&lt;h1&gt;</strong>{{ category.title }}<strong>&lt;/h1&gt;</strong><br/>
                &nbsp;&nbsp;&nbsp;<strong>&lt;span&gt;</strong>{{ category.description }}<strong>
                    &lt;/span&gt;</strong><br/>
            </div>
            &nbsp;&nbsp;&nbsp;<strong>&lt;div <em>v-for="item in category.items"</em>&gt;</strong><br/>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>&lt;strong&gt;</strong>{{ item.title }}<strong>
                &lt;/strong&gt;</strong><br/>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>&lt;span&gt;</strong>{{ item.description }}<strong>
                &lt;/span&gt;</strong><br/>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;...<br/>
            &nbsp;&nbsp;&nbsp;<strong>&lt;/div&gt;</strong><br/>

            <div class="dr-muted">
                &nbsp;<strong>&lt;/div&gt;</strong><br/>
            </div>
        </div>
    </div>

    <div class="uk-panel dr-pre">
        <span class="uk-text-warning"><i class="uk-icon-warning"></i> <strong>Assuming each category contains 2 items</strong></span>
        <br/><br/>
        <span class="uk-panel-badge uk-badge">output</span>
        <h2 class="uk-margin-remove">Category Title</h2>
        <p class="uk-margin-remove">Category description</p>
        <div class="uk-margin-large-left uk-margin-top">
            <strong>Item Title</strong>
            <p class="uk-margin-remove">Item description</p>
        </div>
        <div class="uk-margin-large-left uk-margin-top">
            <strong>Item Title</strong>
            <p class="uk-margin-remove">Item description</p>
        </div>

        <br/>
        <h2 class="uk-margin-remove">Second Category Title</h2>
        <p class="uk-margin-remove">Second category description</p>
        <div class="uk-margin-large-left uk-margin-top">
            <strong>Item Title</strong>
            <p class="uk-margin-remove">Item description</p>
        </div>
        <div class="uk-margin-large-left uk-margin-top">
            <strong>Item Title</strong>
            <p class="uk-margin-remove">Item description</p>
        </div>

    </div>

</section>
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

<hr/>

<h4><i class="uk-icon-angle-right uk-text-primary"></i> {{ 'Usage' | trans }}</h4>
<p>
    To display one or many listings on a page copy and paste the PLUGIN CODE for each list on your Pagekit page. The plugin code for each list can be found on the <a :href="'../listings'" title=""Listings Page">Listings</a> page.

</p>

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
<h2 class="uk-margin-remove">{{ 'Default Template' | trans }}</h2>
<p>
    The default template offers many configurable options out of the box. Options are implemented
    when using the <em>PLUGIN CODE</em>.
    Each list you create has it's unique plugin code, which can be found on the <a
        href="/admin/listings" title="Listings Page">Listings</a> page.
</p>
<p>
    To use the plugin code simply copy and paste it in your page's content area. The values for each
    option are classes provided by the UIkit framework.

    For example, <code>uk-hidden</code> is a class in UIkit's css framework to hide an element. The
    option <code>"listingTitle":"uk-hidden"</code> hides the list's title.
</p>

<hr/>

<h4><i class="uk-icon-angle-right uk-text-primary"></i> {{ 'Example' | trans }}</h4>

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

<h4><i class="uk-icon-angle-right uk-text-primary"></i> {{ 'Available Options' | trans }}</h4>
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
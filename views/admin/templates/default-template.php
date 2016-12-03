<h2 v-if="list.title" :class="settings.listingTitle || defaults.listingTitle" data-type="List Title">{{list.title}}</h2>
<div v-if="list.description" :class="settings.listingDescription || defaults.listingDescription"
     data-type="List Description" v-html="list.description"></div>
<div :class="settings.categoryContainer || defaults.categoryContainer"
     v-for="category in list.categories | orderBy 'position'" data-type="Category">
    <section :class="settings.categoryTitleDescription || defaults.categoryTitleDescription">
        <h3 v-if="category.title"
            :class="settings.categoryTitle || defaults.categoryTitle"
            data-type="Category Title">
            {{category.title}}</h3>
        <div v-if="category.description" :class="settings.categoryDescription || defaults.categoryDescription"
             data-type="Category Description">
            {{category.description}}
        </div>
    </section>
    <section class="uk-list uk-flex uk-flex-column" :class="settings.itemContainer || defaults.itemContainer"
             data-type="Category Items">
        <div class="uk-grid" :class="settings.itemContainer || defaults.itemContainer"
             v-for="item in category.items | orderBy 'position'" data-type="Item" data-uk-grid-margin>
            <div v-if="item.image" :class="settings.itemImage || defaults.itemImage" data-type="Item Image">
                <a v-if="item.link" :href="item.link" title="Item.title" alt="item.title">
                    <img :src="item.image"
                         title="{{item.name}}"
                         alt="{{item.name}}"/>
                </a>
                <img v-else :src="item.image" title="{{item.name}}" alt="{{item.name}}"/></div>
            <dl v-if="item.title || item.description"
                :class="settings.itemTitleDescription || defaults.itemTitleDescription"
                data-type="Item Title and Description">
                <dt v-if="item.title" :class="settings.itemTitle || defaults.itemTitle" data-type="Item Title">
                    <a v-if="item.link" :href="item.link" title="Item.title" alt="item.title">{{item.title}}</a>
                <div v-else>{{item.title}}</div>
                </dt>
                <dd v-if="item.description" :class="settings.itemDescription || defaults.itemDescription"
                    data-type="Item Description" v-html="item.description"></dd>
                <div v-if="item.tags.length" :class="settings.itemTagsContainer || defaults.itemTagsContainer"
                     data-type="Item Tags">
                    <div v-for="tag in item.tags" :class="settings.itemTag || defaults.itemTag" data-type="Tag">
                        {{tag.title}}
                    </div>
                </div>
            </dl>
            <div v-if="item.price" :class="settings.itemPrice || defaults.itemPrice" data-type="Item Price">
                {{item.price | currency}}
            </div>
        </div>
    </section>
</div>
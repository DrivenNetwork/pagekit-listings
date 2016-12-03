<style>.accent-color{color: white;}</style>

<h2>{{list.title}}</h2>
<p v-html="list.description"></p>
<ul class="uk-list" v-for="category in list.categories" data-uk-margin>
    <li v-for="item in category.items">
        <div class="uk-margin-top uk-margin-left uk-position-absolute">
            <h2 class="accent-color uk-text-uppercase uk-text-bold uk-margin-remove">{{item.title}}</h2>
            <span class="accent-color uk-text-small" v-html="item.description"></span>
        </div>
        <img class="uk-width-1-1" :src="item.image"/>
    </li>
</ul>
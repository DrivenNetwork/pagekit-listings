<?php $view->script('listings', 'driven/listings:js/listings.js', ['vue','uikit-tooltip'])?>

<div id="listings" v-cloak>

    <div class="uk-margin uk-flex uk-flex-space-between uk-flex-wrap" data-uk-margin>
        <div class="uk-flex uk-flex-middle uk-flex-wrap" data-uk-margin>

            <h2 class="uk-margin-remove">{{getLength()}} {{ 'Lists' | trans }}</h2>

            <div class="pk-search">
                <div class="uk-search">
                    <input class="uk-search-field" type="text" v-model="search">
                </div>
            </div>

        </div>
        <div data-uk-margin>

            <a class="uk-button uk-button-primary" href="/admin/listings/edit">{{ 'Add List' | trans }}</a>

        </div>
    </div>

    <div class="uk-overflow-container">
        <table class="uk-table uk-table-hover uk-table-middle">
            <thead>
            <tr>
                <th width="40%">{{ 'Title' | trans }}</th>
                <th class="uk-text-center">{{ 'Status' | trans }}</th>
<!--                <th class="uk-text-center">{{ 'Available Times' | trans }}</th>-->
                <th class="uk-text-center">{{ 'Plugin Code' | trans }}</th>
                <th class="uk-text-center">{{ 'Active Template' | trans }}</th>
                <th class="uk-text-center">{{ 'Last Updated' | trans }}</th>
            </tr>
            </thead>
            <tbody>
            <tr class="uk-visible-hover-inline" v-for="listing in listings | filterBy search in 'title'">
                <td>
                    <a :href="'/admin/listings/edit?id='+listing.id">{{listing.title}}</a>
                </td>
                <td class="uk-text-center">
                    <a class="pk-icon-circle-success"
                       :title="listing.status ? 'Active': 'Inactive' | trans"
                       :class="listing.status ? 'pk-icon-circle-success': 'pk-icon-circle-danger'"
                       @click="toggle(listing)"
                       data-uk-tooltip></a>
                </td>
<!--                <td class="uk-text-center">{{ listing.available_from | timeFromEpoch }} <i class="uk-icon-long-arrow-right uk-text-primary uk-text-small"></i> {{ listing.available_to | timeFromEpoch }}</td>-->
                <td class="uk-text-center"><code title="{{ 'Place this on a Page' | trans}}" >(listings){"id":"{{listing.id}}"}</code></td>
                <td class="uk-text-center">
                    <a v-if="listing.template" href="/admin/listings/templates/edit?id={{listing.template.id}}" title="{{'Edit Template' | trans}}" data-uk-tooltip>{{listing.template.title}}</a>
                    <a v-else href="/admin/listings/templates" title="{{'View Templates' | trans}}" data-uk-tooltip>Default Template</a>
                </td>
                <td class="uk-text-center">
                    <div v-show="listing.modified_on && listing.modified_by">{{ listing.modified_on | dateFromEpoch }} <br/> by <a href="/admin/user/edit?id={{listing.editor.id}}">{{listing.editor.username}}</a></div>
                </td>

            </tr>

            </tbody>
        </table>

    </div>

</div>

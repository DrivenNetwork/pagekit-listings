<?php $view->script('templates', 'driven/listings:js/templates.js', ['vue', 'uk-tooltip'])?>

<div id="templates" v-cloak>

    <div class="uk-margin uk-flex uk-flex-space-between uk-flex-wrap" data-uk-margin>
        <div class="uk-flex uk-flex-middle uk-flex-wrap" data-uk-margin>

            <h2 class="uk-margin-remove">{{getLength()}} {{ 'Templates' | trans }}</h2>

            <div class="pk-search">
                <div class="uk-search">
                    <input class="uk-search-field" type="text" v-model="search">
                </div>
            </div>

        </div>
        <div data-uk-margin>

            <a class="uk-button uk-button-primary" href="/admin/listings/templates/edit">{{ 'Add Template' | trans}}</a>

        </div>
    </div>

    <div class="uk-overflow-container">
        <table class="uk-table uk-table-hover uk-table-middle">
            <thead>
            <tr>
                <th width="60%">{{ 'Title' | trans }}</th>
                <th class="uk-text-center">{{ 'Last Updated' | trans }}</th>
            </tr>
            </thead>
            <tbody>
            <tr class="uk-visible-hover-inline" v-for="template in templates | filterBy search in 'title'">
                <td>
                    <a v-if="template.editable"  :href="'/admin/listings/templates/edit?id='+template.id">
                        <span>{{template.title}}</span>
                    </a>
                    <div v-else>
                        <span>{{template.title}}</span>
                        <i v-if="!template.editable" class="uk-icon-user-o uk-text-muted" data-uk-tooltip title="Admin Privileges Required"></i>
                        <i v-if="template.locked" class="uk-icon-lock uk-text-muted" data-uk-tooltip title="System Template"></i>
                    </div>
                    <div class="uk-text-small" v-html="template.description"></div>
                </td>
                <td class="uk-text-center">
                    <div v-show="template.modified_on && template.modified_by">{{ template.modified_on | dateFromEpoch }} by <a href="/admin/user/edit?id={{template.editor.id}}">{{template.editor.username}}</a></div>
                </td>

            </tr>

            </tbody>
        </table>

    </div>

</div>

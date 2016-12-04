<?php $view->script('edit-listing', 'driven/listings:js/edit-listing.js', ['vue', 'editor', 'uikit-nestable', 'uikit-tooltip', 'uikit-lightbox', 'uikit-timepicker', 'uikit-accordion']) ?>


<section id="edit-listing">

    <form class="uk-form uk-form-horizontal uk-margin" v-validator="list_form" @submit.prevent="save | valid">

        <!--HEADER-->
        <div class="uk-margin uk-flex uk-flex-space-between uk-flex-wrap">
            <div data-uk-margin>

                <h2 class="uk-margin-remove">
                    {{ (listing.id ? 'Edit ' : 'New List') | trans }}
                    <em v-show="listing.id" class="uk-text-italic uk-text-muted">{{listing.title}}</em>
                </h2>

            </div>

            <div data-uk-margin>

                <a class="uk-button uk-margin-small-right" v-if="!listing.id" :href="$url.route('admin/listings/')">
                    {{ 'Cancel' | trans }}
                </a>
                <button class="uk-button uk-margin-small-right" v-if="listing.id"
                        type="button"
                        @click="remove(listing.id, 'listing', listing.title)">
                    {{ 'Delete' | trans }}
                </button>
                <button class="uk-button uk-button-primary" type="submit">{{ 'Save' | trans }}</button>

            </div>

        </div>

        <!--CONTENT-->
        <div class="uk-grid">
            <div class="uk-width-medium-3-4">

                <div class="uk-form-row">

                    <input name="title" class="uk-width-1-2" type="text" v-model="listing.title" v-validate:required
                           placeholder="{{ 'List Title' | trans }}"/>

                    <p class="uk-form-help-block uk-text-danger"
                       v-show="list_form && list_form.title.invalid"><?= __('Please provide a name.') ?></p>

                </div>

                <div class="uk-form-row uk-margin-bottom">
                    <v-editor :value.sync="listing.description"
                              :options="{markdown : false, height: 150}"></v-editor>
                </div>

            </div>
            <!--SETTINGS-->
            <div class="uk-width-medium-1-4 uk-form-stacked">

                <!--                NOT IMPLEMENTED YET!-->
                <!--                <div class="uk-form-row">-->
                <!--                    <span class="uk-form-label">Featured Times</span>-->
                <!--                    <input placeholder="From" v-model="listing.featured_from"-->
                <!--                           value="{{listing.featured_from | fromEpoch}}"-->
                <!--                           class="uk-form-width-small uk-margin-small-bottom" type="text" v-validate:required-->
                <!--                           name="featuredFrom"-->
                <!--                           v-validate:pattern.literal="/^(?!00)(\d{1,2}):(\d{2})(:00)?((\s?)([ap]m)|([AP]M))?$/i"-->
                <!--                           data-uk-timepicker="{format:'12h'}">-->
                <!--                    <input placeholder="To" v-model="listing.featured_to" value="{{listing.featured_to | fromEpoch}}"-->
                <!--                           class="uk-form-width-small uk-margin-small-bottom" type="text" v-validate:required-->
                <!--                           name="featuredTo"-->
                <!--                           v-validate:pattern.literal="/^(?!00)(\d{1,2}):(\d{2})(:00)?((\s?)([ap]m)|([AP]M))?$/i"-->
                <!--                           data-uk-timepicker="{format:'12h'}">-->
                <!--                    <p class="uk-form-help-block uk-text-danger"-->
                <!--                       v-show="list_form && (list_form.featuredFrom.invalid || list_form.featuredTo.invalid)">-->
                <? //= __('Please select a valid time.') ?><!--</p>-->
                <!--                </div>-->

                <div class="uk-form-row uk-flex uk-flex-column">
                    <span class="uk-form-label">{{'Visibility' | trans }}</span>
                    <label>
                        <input type="checkbox" v-model="listing.status" v-bind:true-value="1" v-bind:false-value="0">
                        {{'Active' | trans }}
                    </label>
                </div>

                <div class="uk-form-row uk-flex uk-flex-column">
                    <div class="uk-form-label">{{'Template' | trans }}</div>
                    <div class="uk-button uk-form-select" data-uk-form-select>
                        <span></span>
                        <select v-model="listing.template_id">
                            <option v-for="template in templates" :value="template.id">{{template.title}}</option>
                        </select>
                    </div>
                </div>

            </div>
        </div>

        <hr/>
        <!--LISTS-->
        <div class="uk-grid">
            <div class="uk-width-medium-3-4">
                <div class="uk-form-row">
                    <div class="uk-flex uk-flex-middle">
                        <button class="uk-button uk-button-primary" type="button" @click="openCategoryModal()"
                                :disabled="!listing.id">{{ 'Add Category' | trans }}
                        </button>
                        <em class="uk-text-muted uk-margin-left" v-if="!listing.id"><i class="uk-icon-info-circle"></i>
                            Please save list before adding categories</em>
                    </div>

                </div>

                <div class="uk-form-row">
                    <section id="sortable-categories-container">
                        <div id="sortable-categories" class="uk-sortable"
                             data-uk-sortable="{handleClass:'uk-sortable-handle'}">


                            <div v-for="category in listing.categories | orderBy 'position'"
                                 data-id="{{category.id}}" data-index="{{$index}}"
                                 class="sortable-category uk-panel uk-margin-bottom uk-accordion" data-uk-accordion>

                                <div
                                        class="uk-flex uk-flex-middle uk-flex-space-between uk-visible-hover uk-accordion-title  uk-margin-remove">
                                    <div class="uk-flex uk-flex-middle">
                                        <div class="uk-sortable-handle uk-margin-right" data-uk-tooltip
                                             title="{{ 'Change Order' | trans}}">
                                            <i class="uk-icon-hover uk-icon-reorder"></i>
                                        </div>
                                        <a @click.stop.prevent="openCategoryModal(category)">{{ category.title }}</a>
                                    </div>
                                    <div class="uk-flex uk-flex-middle">
                                        <a class="pk-icon-circle-success uk-hidden uk-animation-slide-right uk-icon-hover uk-margin-right"
                                           title="{{ category.status ? 'Active': 'Inactive' | trans }}"
                                           :class="category.status ? 'pk-icon-circle-success': 'pk-icon-circle-danger'"
                                           data-uk-tooltip
                                           @click.stop.prevent="toggle(category,'category')"></a>
                                        <a href=""
                                           class="uk-hidden uk-animation-slide-right uk-icon-hover uk-icon-pencil uk-margin-right"
                                           data-uk-tooltip title="{{ 'Edit Category' | trans}}"
                                           @click.stop.prevent="openCategoryModal(category)"></a>
                                        <a href=""
                                           class="uk-hidden uk-animation-slide-right uk-icon-hover uk-icon-trash-o"
                                           data-uk-tooltip title="{{ 'Delete Category' | trans}}"
                                           @click.stop.prevent="remove(category.id, 'category', category.title)"></a>
                                    </div>
                                </div>

                                <div class="uk-panel uk-panel-box uk-accordion-content sortable-categories-items">

                                    <ul class="uk-nestable sortable-items uk-margin-top"
                                        :class="{'uk-nestable-empty': !getLength(category.items)}"
                                        data-uk-nestable="{ group:'item', maxDepth:1, handleClass:'uk-nestable-handle' }">

                                        <li v-for="item in getItems(category) | orderBy 'position'"
                                            class="uk-nestable-item uk-margin sortable-item"
                                            data-categoryid="{{item.category_id}}" data-id="{{item.id}}"
                                            data-index="{{$index}}">
                                            <div class="uk-flex uk-flex-middle uk-flex-space-between uk-visible-hover">
                                                <div class="uk-flex uk-flex-middle uk-width-8-10">
                                                    <div class="uk-nestable-handle uk-margin-right" data-uk-tooltip
                                                         title="{{ 'Change Order or Move' | trans}}">
                                                        <i class="uk-icon-hover uk-icon-sort"></i>
                                                    </div>
                                                    <div class="uk-flex uk-flex-column">
                                                        <div class="uk-flex uk-flex-middle uk-flex-wrap">

                                                            <a class="uk-margin-small-right"
                                                               @click.stop.prevent="openItemModal(category.id, item)">

                                                                <strong class="uk-text-primary uk-margin-small-right">
                                                                    {{ item.title }} </strong>
                                                                <em v-if="item.price"
                                                                    class="uk-text-small uk-badge-notification uk-badge">{{
                                                                    item.price | currency }}</em>

                                                            </a>
                                                            <i class="uk-text-muted uk-icon-image" v-show="item.image"
                                                               data-uk-lightbox href="/{{item.image}}"></i>
                                                        </div>
                                                        <div class="uk-text-small" v-html="item.description"></div>

                                                    </div>
                                                </div>
                                                <div class="uk-flex uk-flex-middle">
                                                    <a class="pk-icon-circle-success uk-hidden uk-animation-slide-right uk-icon-hover uk-margin-right"
                                                       title="{{item.status ? 'Active': 'Inactive' | trans}}"
                                                       :class="item.status ? 'pk-icon-circle-success': 'pk-icon-circle-danger'"
                                                       data-uk-tooltip
                                                       @click.stop.prevent="toggle(item,'item')"></a>
                                                    <a href=""
                                                       class="uk-hidden uk-animation-slide-right uk-icon-hover uk-icon-pencil uk-margin-right"
                                                       data-uk-tooltip title="{{ 'Edit Item' | trans}}"
                                                       @click.stop.prevent="openItemModal(category.id, item)"></a>
                                                    <a href=""
                                                       class="uk-hidden uk-animation-slide-right uk-icon-hover uk-icon-trash-o"
                                                       data-uk-tooltip title="{{ 'Delete Item' | trans}}"
                                                       @click.stop.prevent="remove(item.id, 'item', item.title)"></a>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>

                                    <div class="uk-flex uk-margin-top">
                                        <button class="uk-button uk-button-primary"
                                                type="button"
                                                @click="openItemModal(category.id)">{{ 'Add Item' | trans }}
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

    </form>

    <? include 'modal-category.php'; ?>
    <? include 'modal-item.php'; ?>

</section>


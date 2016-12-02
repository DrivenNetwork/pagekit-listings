<v-modal v-ref:itemmodal large>

    <form class="uk-form" v-validator="item_form" @submit.prevent="saveItem(category_model.id) | valid">
        <div class="uk-modal-header uk-flex uk-flex-wrap uk-flex-space-between uk-flex-middle">

            <h2>{{ item_model.id ? 'Edit Item ' : 'New Item' | trans }}
                <em v-show="item_model.id"
                    class="uk-text-italic uk-text-muted">{{item_model.title}}</em>
            </h2>

            <label>
                <input type="checkbox" v-model="item_model.status" v-bind:true-value="1" v-bind:false-value="0">
                {{'Active' | trans }}
            </label>

        </div>


        <div class="uk-form-row">
            <div class="uk-flex uk-flex-wrap uk-flex-space-between">

                <div class="uk-form-width-large uk-margin-right-small">
                    <input name="title" placeholder="{{'Title'|trans}}"
                           class="uk-width-1-1" type="text" v-model="item_model.title"
                           v-validate:required/>
                    <p class="uk-form-help-block uk-text-danger">
                        <span v-show="item_form && item_form.title.invalid"><?= __('Please provide a title') ?></span>
                    </p>
                </div>
                <div class="uk-form-width-large uk-flex uk-flex-top uk-flex-right">
                    <div class="uk-margin-small-right uk-width-3-4">
                        <input-link class="uk-width-1-1" :link.sync="item_model.link"></input-link>
                    </div>
                    <div class="uk-width-1-4 uk-form-icon">
                        <i class="uk-icon-dollar"></i>
                        <input type="number" step="0.01" class="uk-width-1-1" placeholder="{{ 'Price' | trans }}"
                               v-model="item_model.price">
                    </div>
                </div>
            </div>
        </div>

        <div class="uk-form-row">

            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <v-editor :value.sync="item_model.description"
                              :options="{markdown : false, height: 100}"></v-editor>
                </div>
            </div>

        </div>

        <div class="uk-form-row">

            <section class="uk-form uk-grid">

                <div class="uk-panel uk-width-5-10">
                    <div class="uk-panel-box">
                        <input-image :source.sync="item_model.image" class="uk-responsive-height"></input-image>
                    </div>
                </div>

                <div class="uk-panel uk-width-5-10">
                    <div class="uk-panel-box">
                        <div class="uk-flex">
                            <input v-model="new_tag.title" placeholder="{{'Tag'|trans}}" validate:required
                                   class="uk-flex-item-1">
                            <button class="uk-button uk-button-primary uk-margin-small-left"
                                    @click.stop.prevent="(new_tag && new_tag.title) ? addTag(item_model) : ''">
                                <i class="uk-icon-plus"></i></button>
                        </div>

                        <ul v-if="item_model.tags.length"
                            class="uk-list uk-list-striped uk-margin-bottom-remove uk-scrollable-box uk-padding-remove"
                            style="height: 100px;">
                            <li v-for="tag in item_model.tags">
                                <div class="uk-flex uk-flex-middle uk-flex-space-between uk-visible-hover">

                                    <!--<input class="uk-form-blank uk-form-width-large" v-model="tag.title"/>-->
                                    <div class="uk-text-small uk-width-9-10">{{tag.title}}</div>
                                    <a href=""
                                       class=" uk-width-1-10 uk-hidden uk-animation-slide-right uk-icon-hover uk-icon-trash-o uk-text-muted"
                                       data-uk-tooltip title="{{ 'Remove Tag' | trans}}"
                                       @click.stop.prevent="removeTag(item_model, $index)"></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>

        <div class="uk-modal-footer">
            <div class="uk-text-right">
                <button class="uk-button uk-button uk-modal-close">{{ 'Cancel' | trans }}</button>
                <button class="uk-button uk-button-primary" type="submit">{{ 'Save' | trans }}</button>
            </div>
        </div>
    </form>
</v-modal>

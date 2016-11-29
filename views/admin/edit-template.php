<?php $view->script('edit-template', 'driven/listings:js/edit-template.js', ['vue', 'editor']) ?>


<section id="edit-template">
    <form class="uk-form uk-form-horizontal uk-margin" v-validator="templateForm" @submit.prevent="save | valid">

        <!--HEADER-->
        <div class="uk-margin uk-flex uk-flex-space-between uk-flex-wrap">
            <div data-uk-margin>

                <h2 class="uk-margin-remove">
                    {{ (template.id ? 'Edit ' : 'New Template') | trans }}
                    <em v-show="template.id" class="uk-text-italic uk-text-muted">{{template.title}}</em>
                </h2>

            </div>

            <div v-if="template.editable" data-uk-margin>

                <a class="uk-button uk-margin-small-right" v-if="!template.id"
                   :href="$url.route('admin/listings/templates')">
                    {{ 'Cancel' | trans }}
                </a>
                <button class="uk-button uk-margin-small-right" v-if="template.id"
                        type="button"
                        @click="remove(template.id, template.title)">
                    {{ 'Delete' | trans }}
                </button>
                <button class="uk-button uk-button-primary" type="submit">{{ 'Save' | trans }}</button>

            </div>

        </div>

        <!--CONTENT-->
        <div class="uk-grid">
            <div class="uk-width-medium-3-4">

                <div class="uk-form-row uk-flex uk-flex-middle uk-flex-space-between">

                    <div class="uk-flex-item-1">
                        <input name="title" class="uk-width-1-2" type="text" v-model="template.title"
                               v-validate:required
                               placeholder="{{ 'Template Title' | trans }}"/>
                        <p class="uk-form-help-block uk-text-danger"
                           v-show="templateForm.title.invalid"><?= __('Please provide a name.') ?></p>
                    </div>
<!--                    <label class="uk-flex-item-none">-->
<!--                        <input type="checkbox" v-model="template.editable" v-bind:true-value="1" v-bind:false-value="0">-->
<!--                        {{'Admin Only' | trans }}-->
<!--                    </label>-->

                </div>

                <div class="uk-form-row">
                    <textarea class="uk-width-1-1" v-model="template.description" rows="3"
                              placeholder="{{ 'Description' | trans}}"></textarea>
                </div>

            </div>

        </div>

        <hr/>

        <v-editor :value.sync="template.html"
                  :options="{markdown : false, height: 500, mode:'tab'}"></v-editor>

    </form>

<!--    <pre>{{template|json}}</pre>-->

</section>


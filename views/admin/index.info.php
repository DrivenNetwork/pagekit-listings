<?php $view->style('info-styles', 'driven/listings:assets/css/info.css') ?>
<?php $view->script('info', 'driven/listings:js/info.js', ['vue']) ?>

<section id="info">

    <div class="uk-grid" data-uk-grid-margin>

        <div class="uk-width-small-1-1 uk-width-medium-1-4">
            <ul class="uk-nav uk-nav-side" data-uk-switcher="{connect:'#listings-info-content'}">
                <li><a href="#" class="uk-active">Overview</a></li>
                <li><a href="#" class="uk-active">Data Model</a></li>
                <li><a href="#">Default Template</a></li>
                <li><a href="#">Custom Templates</a></li>
                <li><a href="#">About Listings</a></li>
            </ul>
            <hr>
            <div class="uk-text-center">
                <a class="uk-button uk-button-primary uk-width-small-1-3 uk-width-medium-1-1" target="_driven"
                   href="https://github.com/DrivenNetwork/pagekit-listings" title="View Listings on GitHub"><i
                            class="uk-icon-github uk-margin-small-right"></i> {{ 'View on GitHub' | trans }}</a>
            </div>
        </div>

        <div class="uk-width-small-1-1 uk-width-medium-3-4">
            <ul id="listings-info-content" class="uk-switcher">

                <li data-uk-switcher-item="0">
                    <h2 class="uk-margin-remove">{{ 'Overview' | trans }}</h2>
                    <p>
                        <strong>Listings</strong> provides a clean way to create manageable content for your site.
                        Create any type of listed content
                        like professional portfolios, products showcase, events, restaurant menus and more. Quickly
                        build your list by using the built-in
                        <strong>Default Template</strong> which can be easily configured to showcase your content as you
                        want.</p>
                    <p class="important">If you want more power over the look and layout of your items create a <strong>Custom
                            Template</strong>.
                    </p>

                    <h4>{{ 'Basic Example' | trans }}</h4>

                    <p>Templates are built using basic HTML with <a href="http://v1.vuejs.org/guide/syntax.html" target="_driven" title="VueJs Data Binding Syntax">VueJs</a> interpolations and
                        <a href="https://getuikit.com/docs/base.html" target="_driven" title="UIkit Docs">UIkit</a> for styling and layout of your content.
                    </p>

                    <section class="" data-uk-margin>

                        <div class="uk-panel uk-panel-box">
                            <span class="uk-panel-badge uk-badge">html</span>
                            <div class="pre" v-pre>
                                <strong>&lt;h1&gt;</strong>{{ list.title }}<strong>&lt;/h1&gt;</strong><br/>
                                <strong>&lt;p&gt;</strong>{{ list.description }}<strong>&lt;/p&gt;</strong>
                            </div>
                        </div>

                        <div class="uk-panel uk-panel-box">
                            <span class="uk-panel-badge uk-badge">output</span>
                            <h1 class="uk-margin-remove">Your Title</h1>
                            <p class="uk-margin-remove">The listing's description.</p>
                        </div>

                    </section>
                </li>

                <li data-uk-switcher-item="1">
                    <h2 class="uk-margin-remove">{{ 'Data Model' | trans }}</h2>
                    <p>Content Here</p>
                    <section class="uk-panel uk-panel-box">
                        <ul class="uk-list dr-org" v-pre>
                            <li>
                                <h3 class="uk-margin-small-bottom">LIST</h3>
                                <ul>
                                    <li>
                                        <dl class="uk-description-list-line">
                                            <dt>List's Title</dt>
                                            <dd>The title of the list</dd>
                                            <code>{{ list.title }}</code>
                                        </dl>

                                        <dl class="uk-description-list-line">
                                            <dt>List's Description</dt>
                                            <dd>The description of the list</dd>
                                            <code>{{ list.description }}</code>
                                        </dl>

                                        <dl class="uk-description-list-line">
                                            <dt>List's Categories</dt>
                                            <dd>Collection of available categories for the current list</dd>
                                            <code>{{ list.categories }}</code>
                                        </dl>

                                        <ul>
                                            <li>
                                                <dl class="uk-description-list-line">
                                                    <dt>Category's  Title</dt>
                                                    <dd>The title of the current category in the loop</dd>
                                                    <code>{{ category.title }}</code>
                                                </dl>
                                            </li>
                                            <li>
                                                <dl class="uk-description-list-line">
                                                    <dt>Category's  Description</dt>
                                                    <dd>The description of the current category in the loop</dd>
                                                    <code>{{ category.description }}</code>
                                                </dl>
                                            </li>
                                            <li>
                                                <dl class="uk-description-list-line">
                                                    <dt>Category's  Items</dt>
                                                    <dd>A collection of available items for the current category</dd>
                                                    <code>{{ category.items }}</code>
                                                </dl>
                                                <ul>
                                                    <li>
                                                        <dl class="uk-description-list-line">
                                                            <dt>Item's  Title</dt>
                                                            <dd>The title of the current item</dd>
                                                            <code>{{ item.title }}</code>
                                                        </dl>
                                                    </li>
                                                    <li>
                                                        <dl class="uk-description-list-line">
                                                            <dt>Item's Description</dt>
                                                            <dd>The description of the current item</dd>
                                                            <code>{{ item.description }}</code>
                                                        </dl>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </section>

                </li>

                <li data-uk-switcher-item="2">
                    <h2 class="uk-margin-remove">{{ 'Default Template' | trans }}</h2>
                    <p>Content Here</p>
                </li>

                <li data-uk-switcher-item="3">
                    <h2 class="uk-margin-remove">{{ 'Custom Templates' | trans }}</h2>
                    <p>Content Here</p>
                </li>

                <li data-uk-switcher-item="4">
                    <h2 class="uk-margin-remove">{{ 'About Listings' | trans }}</h2>
                    <p>Content Here</p>
                </li>

            </ul>

        </div>
    </div>

    <div id="listings-info-content">

    </div>

    <!--    <div class="uk-grid pk-grid-large" data-uk-grid-margin="">-->
    <!--        <div class="pk-width-sidebar uk-row-first">-->
    <!---->
    <!--            <div class="uk-panel">-->
    <!---->
    <!--                <ul class="uk-nav uk-nav-side pk-nav-large">-->
    <!---->
    <!--                    <li aria-expanded="true" class="uk-active">-->
    <!--                        <a>-->
    <!--                            <i class="uk-icon-justify uk-icon-small uk-margin-right pk-icon-large-settings"></i>-->
    <!--                            System</a>-->
    <!--                    </li>-->
    <!---->
    <!--                    <li aria-expanded="false">-->
    <!--                        <a>-->
    <!--                            <i class="uk-icon-justify uk-icon-small uk-margin-right pk-icon-large-pin"></i>-->
    <!--                            Localization</a>-->
    <!--                    </li>-->
    <!--                    <li aria-expanded="false"><a><i-->
    <!--                                    class="uk-icon-justify uk-icon-small uk-margin-right pk-icon-large-bolt"></i> Cache</a>-->
    <!--                    </li>-->
    <!--                    <li aria-expanded="false"><a><i-->
    <!--                                    class="uk-icon-justify uk-icon-small uk-margin-right pk-icon-large-mail"></i>-->
    <!--                            Mail</a></li>-->
    <!--                    <li class="uk-tab-responsive uk-active uk-hidden" aria-haspopup="true" aria-expanded="false"><a>-->
    <!--                            System</a>-->
    <!--                        <div class="uk-dropdown uk-dropdown-small" aria-hidden="true">-->
    <!--                            <ul class="uk-nav uk-nav-dropdown"></ul>-->
    <!--                            <div></div>-->
    <!--                        </div>-->
    <!--                    </li>-->
    <!--                </ul>-->
    <!---->
    <!--            </div>-->
    <!---->
    <!--        </div>-->
    <!--        <div class="pk-width-content">-->
    <!---->
    <!--            <ul class="uk-switcher uk-margin">-->
    <!--                <li aria-hidden="false" class="uk-active">-->
    <!--                    <div class="uk-margin uk-flex uk-flex-space-between uk-flex-wrap" data-uk-margin="">-->
    <!--                        <div data-uk-margin=""><h2 class="uk-margin-remove">System</h2></div>-->
    <!--                        <div data-uk-margin="">-->
    <!--                            <button class="uk-button uk-button-primary" type="submit">Save</button>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="uk-form-row"><label for="form-storage" class="uk-form-label">Storage</label>-->
    <!--                        <div class="uk-form-controls"><input id="form-storage" class="uk-form-width-large" type="text"-->
    <!--                                                             placeholder="/storage"></div>-->
    <!--                    </div>-->
    <!--                    <div class="uk-form-row"><label for="form-fileextensions" class="uk-form-label">File-->
    <!--                            Extensions</label>-->
    <!--                        <div class="uk-form-controls"><input id="form-fileextensions" class="uk-form-width-large"-->
    <!--                                                             type="text">-->
    <!--                            <p class="uk-form-help-block">Allowed file extensions for the storage upload.</p></div>-->
    <!--                    </div>-->
    <!--                    <div class="uk-form-row"><span class="uk-form-label">Developer</span>-->
    <!--                        <div class="uk-form-controls uk-form-controls-text"><p class="uk-form-controls-condensed">-->
    <!--                                <label><input type="checkbox" value="1"> Enable debug mode</label></p>-->
    <!--                            <p class="uk-form-controls-condensed"><label><input type="checkbox" value="1"> Enable debug-->
    <!--                                    toolbar</label></p></div>-->
    <!--                    </div>-->
    <!--                </li>-->
    <!--                <li aria-hidden="true">-->
    <!--                    <div class="uk-margin uk-flex uk-flex-space-between uk-flex-wrap" data-uk-margin="">-->
    <!--                        <div data-uk-margin=""><h2 class="uk-margin-remove">Localization</h2></div>-->
    <!--                        <div data-uk-margin="">-->
    <!--                            <button class="uk-button uk-button-primary" type="submit">Save</button>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="uk-form-row"><label for="form-sitelocale" class="uk-form-label">Site Locale</label>-->
    <!--                        <div class="uk-form-controls"><select id="form-sitelocale" class="uk-form-width-large">-->
    <!--                                <option value="ar_EG">Arabic - Egypt</option>-->
    <!--                                <option value="ar_SA">Arabic - Saudi Arabia</option>-->
    <!--                                <option value="az_AZ">Azerbaijani - Azerbaijan</option>-->
    <!--                                <option value="bn">Bengali</option>-->
    <!--                                <option value="bg_BG">Bulgarian - Bulgaria</option>-->
    <!--                                <option value="my_MM">Burmese - Myanmar (Burma)</option>-->
    <!--                                <option value="ca_ES">Catalan - Spain</option>-->
    <!--                                <option value="zh_CN">Chinese - China</option>-->
    <!--                                <option value="zh_TW">Chinese - Taiwan</option>-->
    <!--                                <option value="hr_HR">Croatian - Croatia</option>-->
    <!--                                <option value="cs_CZ">Czech - Czech Republic</option>-->
    <!--                                <option value="da_DK">Danish - Denmark</option>-->
    <!--                                <option value="nl_NL">Dutch - Netherlands</option>-->
    <!--                                <option value="en_HU">English - Hungary</option>-->
    <!--                                <option value="en_GB">English - United Kingdom</option>-->
    <!--                                <option value="en_US">English - United States</option>-->
    <!--                                <option value="fi_FI">Finnish - Finland</option>-->
    <!--                                <option value="fr_CA">French - Canada</option>-->
    <!--                                <option value="fr_FR">French - France</option>-->
    <!--                                <option value="fr_CH">French - Switzerland</option>-->
    <!--                                <option value="gl_ES">Galician - Spain</option>-->
    <!--                                <option value="ka_GE">Georgian - Georgia</option>-->
    <!--                                <option value="de_AT">German - Austria</option>-->
    <!--                                <option value="de_DE">German - Germany</option>-->
    <!--                                <option value="de_CH">German - Switzerland</option>-->
    <!--                                <option value="el_GR">Greek - Greece</option>-->
    <!--                                <option value="he_IL">Hebrew - Israel</option>-->
    <!--                                <option value="hu_HU">Hungarian - Hungary</option>-->
    <!--                                <option value="id_ID">Indonesian - Indonesia</option>-->
    <!--                                <option value="it_IT">Italian - Italy</option>-->
    <!--                                <option value="ja">Japanese</option>-->
    <!--                                <option value="ja_JP">Japanese - Japan</option>-->
    <!--                                <option value="ku">Kurdish</option>-->
    <!--                                <option value="lt_LT">Lithuanian - Lithuania</option>-->
    <!--                                <option value="ms_MY">Malay - Malaysia</option>-->
    <!--                                <option value="nb_NO">Norwegian Bokmål - Norway</option>-->
    <!--                                <option value="fa">Persian</option>-->
    <!--                                <option value="fa_IR">Persian - Iran</option>-->
    <!--                                <option value="pl_PL">Polish - Poland</option>-->
    <!--                                <option value="pt_BR">Portuguese - Brazil</option>-->
    <!--                                <option value="pt_PT">Portuguese - Portugal</option>-->
    <!--                                <option value="ro_RO">Romanian - Romania</option>-->
    <!--                                <option value="ru_RU">Russian - Russia</option>-->
    <!--                                <option value="sr_RS">Serbian - Serbia</option>-->
    <!--                                <option value="sk_SK">Slovak - Slovakia</option>-->
    <!--                                <option value="sl_SI">Slovenian - Slovenia</option>-->
    <!--                                <option value="so">Somali</option>-->
    <!--                                <option value="es_CL">Spanish - Chile</option>-->
    <!--                                <option value="es_CO">Spanish - Colombia</option>-->
    <!--                                <option value="es_MX">Spanish - Mexico</option>-->
    <!--                                <option value="es_ES">Spanish - Spain</option>-->
    <!--                                <option value="sv_SE">Swedish - Sweden</option>-->
    <!--                                <option value="tl_PH">Tagalog - Philippines</option>-->
    <!--                                <option value="ta">Tamil</option>-->
    <!--                                <option value="te_IN">Telugu - India</option>-->
    <!--                                <option value="th">Thai</option>-->
    <!--                                <option value="tr_TR">Turkish - Turkey</option>-->
    <!--                                <option value="udm">Udmurt</option>-->
    <!--                                <option value="uk_UA">Ukrainian - Ukraine</option>-->
    <!--                                <option value="vi_VN">Vietnamese - Vietnam</option>-->
    <!--                            </select></div>-->
    <!--                    </div>-->
    <!--                    <div class="uk-form-row"><label for="form-adminlocale" class="uk-form-label">Admin Locale</label>-->
    <!--                        <div class="uk-form-controls"><select id="form-adminlocale" class="uk-form-width-large">-->
    <!--                                <option value="ar_EG">Arabic - Egypt</option>-->
    <!--                                <option value="ar_SA">Arabic - Saudi Arabia</option>-->
    <!--                                <option value="az_AZ">Azerbaijani - Azerbaijan</option>-->
    <!--                                <option value="bn">Bengali</option>-->
    <!--                                <option value="bg_BG">Bulgarian - Bulgaria</option>-->
    <!--                                <option value="my_MM">Burmese - Myanmar (Burma)</option>-->
    <!--                                <option value="ca_ES">Catalan - Spain</option>-->
    <!--                                <option value="zh_CN">Chinese - China</option>-->
    <!--                                <option value="zh_TW">Chinese - Taiwan</option>-->
    <!--                                <option value="hr_HR">Croatian - Croatia</option>-->
    <!--                                <option value="cs_CZ">Czech - Czech Republic</option>-->
    <!--                                <option value="da_DK">Danish - Denmark</option>-->
    <!--                                <option value="nl_NL">Dutch - Netherlands</option>-->
    <!--                                <option value="en_HU">English - Hungary</option>-->
    <!--                                <option value="en_GB">English - United Kingdom</option>-->
    <!--                                <option value="en_US">English - United States</option>-->
    <!--                                <option value="fi_FI">Finnish - Finland</option>-->
    <!--                                <option value="fr_CA">French - Canada</option>-->
    <!--                                <option value="fr_FR">French - France</option>-->
    <!--                                <option value="fr_CH">French - Switzerland</option>-->
    <!--                                <option value="gl_ES">Galician - Spain</option>-->
    <!--                                <option value="ka_GE">Georgian - Georgia</option>-->
    <!--                                <option value="de_AT">German - Austria</option>-->
    <!--                                <option value="de_DE">German - Germany</option>-->
    <!--                                <option value="de_CH">German - Switzerland</option>-->
    <!--                                <option value="el_GR">Greek - Greece</option>-->
    <!--                                <option value="he_IL">Hebrew - Israel</option>-->
    <!--                                <option value="hu_HU">Hungarian - Hungary</option>-->
    <!--                                <option value="id_ID">Indonesian - Indonesia</option>-->
    <!--                                <option value="it_IT">Italian - Italy</option>-->
    <!--                                <option value="ja">Japanese</option>-->
    <!--                                <option value="ja_JP">Japanese - Japan</option>-->
    <!--                                <option value="ku">Kurdish</option>-->
    <!--                                <option value="lt_LT">Lithuanian - Lithuania</option>-->
    <!--                                <option value="ms_MY">Malay - Malaysia</option>-->
    <!--                                <option value="nb_NO">Norwegian Bokmål - Norway</option>-->
    <!--                                <option value="fa">Persian</option>-->
    <!--                                <option value="fa_IR">Persian - Iran</option>-->
    <!--                                <option value="pl_PL">Polish - Poland</option>-->
    <!--                                <option value="pt_BR">Portuguese - Brazil</option>-->
    <!--                                <option value="pt_PT">Portuguese - Portugal</option>-->
    <!--                                <option value="ro_RO">Romanian - Romania</option>-->
    <!--                                <option value="ru_RU">Russian - Russia</option>-->
    <!--                                <option value="sr_RS">Serbian - Serbia</option>-->
    <!--                                <option value="sk_SK">Slovak - Slovakia</option>-->
    <!--                                <option value="sl_SI">Slovenian - Slovenia</option>-->
    <!--                                <option value="so">Somali</option>-->
    <!--                                <option value="es_CL">Spanish - Chile</option>-->
    <!--                                <option value="es_CO">Spanish - Colombia</option>-->
    <!--                                <option value="es_MX">Spanish - Mexico</option>-->
    <!--                                <option value="es_ES">Spanish - Spain</option>-->
    <!--                                <option value="sv_SE">Swedish - Sweden</option>-->
    <!--                                <option value="tl_PH">Tagalog - Philippines</option>-->
    <!--                                <option value="ta">Tamil</option>-->
    <!--                                <option value="te_IN">Telugu - India</option>-->
    <!--                                <option value="th">Thai</option>-->
    <!--                                <option value="tr_TR">Turkish - Turkey</option>-->
    <!--                                <option value="udm">Udmurt</option>-->
    <!--                                <option value="uk_UA">Ukrainian - Ukraine</option>-->
    <!--                                <option value="vi_VN">Vietnamese - Vietnam</option>-->
    <!--                            </select></div>-->
    <!--                    </div>-->
    <!--                    <p>Is your language not available? Please help out by translating Pagekit into your own language on-->
    <!--                        <a href="https://www.transifex.com/pagekit/pagekit-cms/">Transifex</a>.</p>-->
    <!--                </li>-->
    <!--                <li aria-hidden="true">-->
    <!--                    <div class="uk-margin uk-flex uk-flex-space-between uk-flex-wrap" data-uk-margin="">-->
    <!--                        <div data-uk-margin=""><h2 class="uk-margin-remove">Cache</h2></div>-->
    <!--                        <div data-uk-margin="">-->
    <!--                            <button class="uk-button uk-button-primary" type="submit">Save</button>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="uk-form-row"><span class="uk-form-label">Cache</span>-->
    <!--                        <div class="uk-form-controls uk-form-controls-text"><p class="uk-form-controls-condensed">-->
    <!--                                <label><input type="radio" value="auto"> Auto (File)</label></p>-->
    <!--                            <p class="uk-form-controls-condensed"><label><input type="radio" value="apc" disabled="">-->
    <!--                                    APC</label></p>-->
    <!--                            <p class="uk-form-controls-condensed"><label><input type="radio" value="xcache" disabled="">-->
    <!--                                    XCache</label></p>-->
    <!--                            <p class="uk-form-controls-condensed"><label><input type="radio" value="file"> File</label>-->
    <!--                            </p></div>-->
    <!--                    </div>-->
    <!--                    <div class="uk-form-row"><span class="uk-form-label">Developer</span>-->
    <!--                        <div class="uk-form-controls uk-form-controls-text"><p class="uk-form-controls-condensed">-->
    <!--                                <label><input type="checkbox" value="1"> Disable cache</label></p>-->
    <!--                            <p>-->
    <!--                                <button class="uk-button uk-button-primary" type="button">Clear Cache</button>-->
    <!--                            </p>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </li>-->
    <!--                <li aria-hidden="true">-->
    <!--                    <div class="uk-margin uk-flex uk-flex-space-between uk-flex-wrap" data-uk-margin="">-->
    <!--                        <div data-uk-margin=""><h2 class="uk-margin-remove">Mail</h2></div>-->
    <!--                        <div data-uk-margin="">-->
    <!--                            <button class="uk-button uk-button-primary" type="submit">Save</button>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="uk-form-row"><label for="form-emailaddress" class="uk-form-label">From Email</label>-->
    <!--                        <div class="uk-form-controls"><input id="form-emailaddress" class="uk-form-width-large"-->
    <!--                                                             type="text"></div>-->
    <!--                    </div>-->
    <!--                    <div class="uk-form-row"><label for="form-fromname" class="uk-form-label">From Name</label>-->
    <!--                        <div class="uk-form-controls"><input id="form-fromname" class="uk-form-width-large" type="text">-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="uk-form-row"><label for="form-mailer" class="uk-form-label">Mailer</label>-->
    <!--                        <div class="uk-form-controls"><select id="form-mailer" class="uk-form-width-large">-->
    <!--                                <option value="mail">PHP Mailer</option>-->
    <!--                                <option value="smtp">SMTP Mailer</option>-->
    <!--                            </select></div>-->
    <!--                    </div>-->
    <!--                    <div class="uk-form-row" style="display: none;">-->
    <!--                        <div class="uk-form-row"><label for="form-smtpport" class="uk-form-label">SMTP Port</label>-->
    <!--                            <div class="uk-form-controls"><input id="form-smtpport" class="uk-form-width-large"-->
    <!--                                                                 type="text"></div>-->
    <!--                        </div>-->
    <!--                        <div class="uk-form-row"><label for="form-smtphost" class="uk-form-label">SMTP Host</label>-->
    <!--                            <div class="uk-form-controls"><input id="form-smtphost" class="uk-form-width-large"-->
    <!--                                                                 type="text"></div>-->
    <!--                        </div>-->
    <!--                        <div class="uk-form-row"><label for="form-smtpuser" class="uk-form-label">SMTP User</label>-->
    <!--                            <div class="uk-form-controls"><input id="form-smtpuser" class="uk-form-width-large"-->
    <!--                                                                 type="text"></div>-->
    <!--                        </div>-->
    <!--                        <div class="uk-form-row"><label for="form-smtppassword" class="uk-form-label">SMTP-->
    <!--                                Password</label>-->
    <!--                            <div class="uk-form-controls js-password">-->
    <!--                                <div class="uk-form-password"><input id="form-smtppassword" class="uk-form-width-large"-->
    <!--                                                                     type="password"> <a class="uk-form-password-toggle"-->
    <!--                                                                                         data-uk-form-password="">Show</a>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                        <div class="uk-form-row"><label for="form-smtpencryption" class="uk-form-label">SMTP-->
    <!--                                Encryption</label>-->
    <!--                            <div class="uk-form-controls"><select id="form-smtpencryption" class="uk-form-width-large">-->
    <!--                                    <option value="">None</option>-->
    <!--                                    <option value="ssl">SSL</option>-->
    <!--                                    <option value="tls">TLS</option>-->
    <!--                                </select></div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="uk-form-row">-->
    <!--                        <div class="uk-form-controls">-->
    <!--                            <button class="uk-button" type="button" style="display: none;">Check Connection</button>-->
    <!--                            <button class="uk-button" type="button">Send Test Email</button>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </li>-->
    <!--            </ul>-->
    <!---->
    <!--        </div>-->
    <!--    </div>-->

</section>
$(function () {

    _.forEach($('.driven-listing-container'), function (value, index) {
        index++;
        $(value).attr('id', 'list-' + index);

        new Vue({
            el: '#list-' + index,
            data: window['$listing_'+index],
            template: window['$listing_'+index].template.html,
            filters: {
                timeFromEpoch: function (value) {
                    if (!value) return;
                    var d = new Date(0);
                    d.setUTCSeconds(value);
                    return d.toLocaleTimeString([], {hour: '2-digit', minute: '2-digit', timeZone: 'UTC'});
                },
                dateFromEpoch: function (value) {
                    if (!value) return;
                    var d = new Date(0);
                    d.setUTCSeconds(value);
                    return d.toLocaleTimeString([], {
                        month: '2-digit',
                        day: '2-digit',
                        year: '2-digit',
                        hour: '2-digit',
                        minute: '2-digit'
                    });
                }

            }
        });
    });
});
$(function () {
    new Vue({
        el: '#templates',
        data: {templates: $data},
        methods: {
            getLength: function () {
                var size = 0, key;
                for (key in this.templates) {
                    if (this.templates.hasOwnProperty(key)) size++;
                }
                return size;
            },
        },
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
                return d.toLocaleTimeString([], {month:'2-digit', day:'2-digit', year:'2-digit', hour: '2-digit', minute: '2-digit'});
            }

        }
    });
});
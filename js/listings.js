$(function () {
    new Vue({
        el: '#listings',
        data: {listings: $data, count: 3},
        methods: {
            toggle: function (listing) {
                listing.status = !listing.status ? 1 : 0;
                this.save(listing)
            },
            getLength: function () {
                var size = 0, key;
                for (key in this.listings) {
                    if (this.listings.hasOwnProperty(key)) size++;
                }
                return size;
            },
            save: function(listing){
                UIkit.notify('Saving...');

                this.$http.post('admin/listings/save', {data: listing}).then(
                    function (res) {
                        UIkit.notify('Saved');
                    }).catch(function () {
                    UIkit.notify('Couldn\'t Save');
                })
            }
        },
        filters: {
            truncate: function(value){
                if(!value) return;
                var length = 45;
                if(value.length > length)
                    return value.substr(0,45) + '…';
                else
                    return value;
            },
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
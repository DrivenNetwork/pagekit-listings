$(function () {
    var vue = new Vue({
        el: '#edit-template',
        data: $data,
        methods: {

            save: function () {
                UIkit.notify('Saving');
                this.$http.post('admin/listings/templates/save', {data: this.template}).then(
                    function (res) {
                        UIkit.notify('Saved');
                        if (this.template.id !== res.data.template.id) window.location.href = '/admin/listings/templates/edit?id=' + res.data.template.id;
                    }).catch(function () {
                    UIkit.notify('Couldn\'t Save');
                })
            },

            remove: function (id, title) {
                var vm = this;
                UIkit.modal.confirm("Delete Template? <em>" + title + "</em><br><span class='uk-text-muted uk-text-small'><i class='uk-icon-warning uk-text-warning'></i> This cannot be undone</span>", function () {

                    UIkit.notify('Deleting');

                    vue.$http.post('admin/listings/templates/delete', {id: id}).then(
                        function (res) {

                            UIkit.notify('Template Deleted');

                            window.location.href = '/admin/listings/templates';

                        }).catch(function () {
                        UIkit.notify('Couldn\'t Delete');
                    });

                });
            }

        },
        filters: {

        }
    });


});
$(document).ready(function () {

    $('form.delete').on('submit', function(){
        return confirm('Do you want to delete this item?');
    });

    $('.ajax-form').on('submit', function(e) {

        e.preventDefault();

        let form = $(this);

        axios({

            method: form.prop('method'),
            url: form.prop('action'),
            data: form.serialize()

        }).then(function (response) {

            let comment = '<li class="list-group-item">' + response.data.author +' at ' + response.data.created_at + ': ' + response.data.content + '</li>';

            form.parent('.panel-body').find('ul.list-group').append(comment);

            form.reset();
        });

    });
});
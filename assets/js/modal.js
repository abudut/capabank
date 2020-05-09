$(document).on('click', '.user_status', function() {

    var id = $(this).attr('uid');
    var status = $(this).attr('ustatus');

    $('#user_id').val(id);
    $('#user_status').val(status);

    $('#modal_popup').modal({
        backdrop: 'static',
        keyboard: true,
        show: true
    });
});
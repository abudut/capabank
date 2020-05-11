$('#rol').change(function(){
    var id = $(this).val();
    $(location).attr('href','users/changeRole'+id);
  });  
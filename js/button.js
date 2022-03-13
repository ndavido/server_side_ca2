$(document).ready(function() {
    $('.validate-input input').on('keyup', function() {
      let empty = false;
  
      $('.validate-input input').each(function() {
        empty = $(this).val().length == 0;
      });
  
      if (empty)
        $('.actions input').attr('disabled', 'disabled');
      else
        $('.actions input').attr('disabled', false);
    });
  });
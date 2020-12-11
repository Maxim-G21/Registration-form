$(document).ready(function() {
    $('#form_reg').submit(function(){
        $.ajax({
            method: 'POST',
            url: 'validation.php',
            data: $('#form_reg').serialize(),
            success: function(data) {
                if(data !== '') {
                    $('.alert-danger').removeClass("d-none");
                    $('.error-type').text(data);
                };
                if(data === ''){
                    $('#form_reg').hide();
                    $('.alert-success').removeClass("d-none");
                    $('.alert-danger').addClass("d-none");
                };
            } 
        })
    return false;
    });
});
  
  
  
  
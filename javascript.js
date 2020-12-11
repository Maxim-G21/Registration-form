$(document).ready(function() {
    $('#form_reg').submit(function(){
        $.ajax({
        method: 'POST',
        url: 'validation.php',
        data: $('#form_reg').serialize(),
        success: function(data) {
            alert(data);
            if(data !== '') {
                $('.alert-danger').removeClass("hidden");
                $('.error-type').text(data);
            };
            if(data === ''){
                $('#form_reg').hide('slow');
                $('.alert-success').removeClass('hidden');
                $('.alert-danger').addClass("hidden");
            };
        } 
        })
        return false;
    });
});
  
  
  
  
$(document).ready(function() {
    $('#form').submit(function(e) {
      e.preventDefault();
      var city = $('#cityname').val(value);

      console.log(city);
      
   
    //   $(".error").remove();
   
    //   if (first_name.length< 1) {
    //     $('#first_name').after('<span class="error">This field is required</span>');
    //   }
    //   if (last_name.length< 1) {
    //     $('#last_name').after('<span class="error">This field is required</span>');
    //   }
    //   if (email.length< 1) {
    //     $('#email').after('<span class="error">This field is required</span>');
    //   } else {
    //     var regEx = /^[A-Z0-9][A-Z0-9._%+-]{0,63}@(?:[A-Z0-9-]{1,63}.){1,125}[A-Z]{2,63}$/;
    //     var validEmail = regEx.test(email);
    //     if (!validEmail) {
    //       $('#email').after('<span class="error">Enter a valid email</span>');
    //     }
    //   }
    //   if (password.length< 8) {
    //     $('#password').after('<span class="error">Password must be atleast 8 characterslong</span>');
    //   }
    });
  });
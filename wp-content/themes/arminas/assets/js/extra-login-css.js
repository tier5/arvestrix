( function( $ ) {
   $("#user_login").addClass("form-control");
   $("#user_pass").addClass("form-control");
   $("#wp-submit").addClass("btn btn-submit");
   $(".login-submit").addClass("align-center");

   $("form[name='loginform']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      log: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        email: true
      },
      pwd: {
        required: true,
        minlength: 5
      },
    },
    // Specify validation error messages
    messages: {
      log: "Please enter your e-mail address",
      pwd: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      }, 
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
} )( jQuery );


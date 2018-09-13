$(document).ready(function() {

    $('#theForm').submit(function(event) {

        var formData = {
            'name'    : $('#name').val(),
            'email'   : $('#email').val(),
            'message' : $('#message').val(),
            'website' : $('#website').val()
        };
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : '/wp-content/themes/form_tester/sections/form-handlers/thank_you.php', // the url where we want to POST
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the server
            encode      : true
        }).done(function(data) {

            if (!data['mailStatus']) {
               
                $('#success').html('Mail Failed')
                $('#email').attr('placeholder', data['emailError']).addClass('placer');
                $('#name').attr('placeholder', data['nameError']).addClass('placer');
                $('#message').attr('placeholder', data['messageError']).addClass('placer');

       
            } else {
                $('#success').html('Mail Sent!');
                //$('#message, #email, #name, #website').val('').addClass('outliner');
                $('#theForm .disappearing').addClass('shrink-me');
            }           
        });
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

    $('#theDbForm').submit(function(event) {
        
        var dbFields = {
            'firstname' : $('#DBfirstname').val(),
            'lastname'  : $('#DBlastname').val(),
            'phone'     : $('#DBphone').val(),
            'email'     : $('#DBemail').val()
        }

        console.log(dbFields)

        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : '/wp-content/themes/form_tester/sections/form-handlers/email_signup.php', // the url where we want to POST
            data        : dbFields, // our data object
            dataType    : 'json', // what type of data do we expect back from the server
            encode      : true
        }).done(function(data) {

            console.log(data);
            console.log(data['firstName']);
            
          
        });
        
        event.preventDefault();
    })
});


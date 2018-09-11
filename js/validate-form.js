$(document).ready(function() {
    $('#theForm').bsValidate({
        fields: {
          name: {
            required: {
              helpText: "Please enter your name.",
              alert: "Oops! You forgot to tell us your name. Please enter it below."
            }
          },
          email: {
            required: {
              helpText: "Please enter your email.",
              alert: "Please enter a valid e-mail",  
            }
          },
          website: {
            required: {
              helpText: "Please enter a website.",
              alert: "Please enter a valid website",  
            }
          },
          message: {
            required: {
                helpText: "Include a Message",
                alert: "Message is requred"
            }
          }
        }
      });

    // process the form
    $('form').submit(function(event) {

        var formData = {
            'name'       : $('input[name=name]').val(),
            'email'      : $('input[name=email]').val(),
            'message'    : $('textarea[name=message]').val(),
            'website'    : $('input[name=website]').val()
        };
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : '/wp-content/themes/form_tester/thank_you.php', // the url where we want to POST
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the server
            encode          : true
        })
            // using the done promise callback
            .done(function(data) {
                console.log(data);
            });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

});


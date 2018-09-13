<?php

function do_contact_section() { 

include(get_template_directory_uri() . '/sections/form-handlers/thank_you.php');
include(get_template_directory_uri() . '/sections/form-handlers/email_signup.php');
 
?>

    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Let's Get In Touch!</h2>
            <hr class="my-4">
            <p class="mb-5">Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto text-center">
            <i class="fa fa-phone fa-3x mb-3 sr-contact"></i>
            <p>123-456-6789</p>
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
            <p>
              <a href="#">feedback@startbootstrap.com</a>
            </p>
          </div>
        </div>

        <div class="row">
        
            <div class="col-md-8 mx-auto">
            <form autocomplete="on" class="form mb-5" id="theForm" method="POST" action="<?php echo htmlspecialchars(get_template_directory_uri() . '/sections/form-handlers/thank_you.php'); ?>">
                
                <div class="form-group disappearing">
                  <input id="name" name="name" class="form-control required" type="text" placeholder="Full Name"/>
                  <p id="name-alert"></p>
                </div>
                
                <div class="form-group disappearing">
                  <input id="email" name="email" class="form-control required" type="text" placeholder="Valid E-Mail"/>    
                  <p id="email-alert"></p>
                </div>

                <div class="form-group disappearing">
                  <input id="website" name="website" class="form-control required" rows="4" placeholder="Website"/>
                  <p id="website-alert"></p>
                </div>

                <div class="form-group disappearing">
                  <textarea id="message" name="message" class="form-control required" rows="4" placeholder="Message"></textarea>
                  <p id="message-alert"></p>
                </div>

                <div class="form-group">
                  <div class="col-12 mx-auto text-center">
                  <div id="success" class="mb-3"></div>
                    <button id="submit" name="submit" type="submit" class="btn btn-primary btn-xl" >Submit</button>
                  </div>
                </div>

               
               
              </form>
            </div>
        </div> 

        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Sign Up!</h2>
            <hr class="my-4">
          </div>
        </div>

        <div class="row">
        
            <div class="col-md-8 mx-auto">
            <form autocomplete="on" class="form" id="theDbForm" method="POST" action="<?php echo htmlspecialchars(get_template_directory_uri() . '/sections/form-handlers/email_signup.php'); ?>">
                
                <div class="form-group">
                  <input id="DBfirstname" name="firstname" class="form-control required" type="text" placeholder="First Name"/>
                </div>
                
                <div class="form-group">
                  <input id="DBlastname" name="lastname" class="form-control required" type="text" placeholder="Last Name"/>    
                </div>

                <div class="form-group">
                  <input id="DBphone" name="phone" class="form-control required" rows="4" placeholder="Phone"/>
                </div>

              
                <div class="form-group">
                  <input id="DBemail" name="email" class="form-control required" type="text" placeholder="Valid E-Mail"/>    
                </div>

                <div class="form-group">
                  <div class="col-12 mx-auto text-center">
                  <div id="success" class="mb-3"></div>
                    <button id="DBsubmit" name="dbsubmit" type="submit" class="btn btn-primary btn-xl">Sign up</button>
                  </div>
                </div>
  
               
              </form>
            </div>
        </div>
    </section>

<?php }
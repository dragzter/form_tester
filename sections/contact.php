<?php

function do_contact_section() { 

include(get_template_directory_uri() . '/thank_you.php');
 
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
            <form class="form" id="theForm" method="POST" action="<?php echo htmlspecialchars(get_template_directory_uri() . '/thank_you.php'); ?>">
                
                <div class="form-group">
                  <input name="name" class="form-control required" type="text" placeholder="Full Name"/>
                </div>
                
                <div class="form-group">
                  <input name="email" class="form-control required" type="text" placeholder="Valid E-Mail" required/>    
                </div>

                <div class="form-group">
                  <input name="website" class="form-control required" rows="4" placeholder="Website"/>
                </div>

                <div class="form-group">
                  <textarea name="message" class="form-control required" rows="4" placeholder="Message"></textarea>
                </div>

                <div class="form-group">
                  <div class="col-12 mx-auto text-center">
                    <button name="submit" type="submit" class="btn btn-primary btn-xl" >Submit</button>
                  </div>
                </div>

                <div class="col-md-12 success invisible">Thank You!</div>
               
              </form>
            </div>
        </div> 
    </section>

<?php }
<?php


function email_list_section()
{

    global $wpdb;

    $qry = "SELECT * FROM wp_email_signup";
    $email_list = $wpdb->get_results($qry, ARRAY_A); ?>

        <section class="bg-dark text-white">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="mb-4">Email List</h2>
                    </div>

                <?php foreach ($email_list as $rows) { ?>
                    <div class="col-md-4">

                        <div class="card mb-4" >
                            <div class="card-body text-left">
                                <h5 class="card-title text-dark"><?php echo $rows["firstName"] . " " . $rows["lastName"] ?> | ID: <span class="badge badge-primary"><?php echo $rows['id'] ?></span></h5>
                                <hr style="max-width:98%;" />
                                <p class="card-text text-dark">First Name: <?php echo $rows["firstName"]; ?></p>
                                <p class="card-text text-dark">Last Name: <?php echo $rows["lastName"]; ?></p>
                                <p class="card-text text-dark">Phone: <?php echo $rows["phone"]; ?></p>
                                <p class="card-text text-dark">E-Mail: <?php echo $rows["email"]; ?></p>

                            </div>
                        </div>
                    </div>
                <?php } ?>

                </div>
            </div>
        </section>
<?php
}
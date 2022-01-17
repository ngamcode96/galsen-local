<?php
session_start();
$page='contact';
require('../raccourcie/header.php');
?>
<section class="contact">
        <div class="container">
             <div class="section-title" >
                        <h2>Contacter nous</h2>
                    </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>Phone</h4>
                        <p>+221 78 370 72 85</p>
                        <p>+221 77 864 99 04</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4>Addresse</h4>
                        <p>Ziguinchor</p>
                        <p>Dakar</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt"></span>
                        <h4>Ouverture</h4>
                        <p>24h/24</p>
                        <p>7j/7</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p>ballagningue2@gmail.com</p>
                        <p>amadoungam18@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <?php require('../raccourcie/footer.php') ?>
<?php include('includes/layouts/header.php'); ?>

<!-- ##### Welcome Area Start ##### -->
<div class="breadcumb-area clearfix auto-init">
    <!-- breadcumb content -->
    <div class="breadcumb-content">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <nav aria-label="breadcrumb" class="breadcumb--con text-center">
                        <h2 class="w-text title wow fadeInUp" data-wow-delay="0.2s">FAQ Questions</h2>
                        <ol class="breadcrumb justify-content-center wow fadeInUp" data-wow-delay="0.4s">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">FAQ</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Welcome Area End ##### -->

<!-- ##### FAQ & Timeline Area Start ##### -->
<div class="faq-timeline-area section-padding-100-0" id="faq">
    <div class="container">
        <div class="section-heading text-center">
            <span>Important questions</span>
            <h2 class="d-text bold fadeInUp" data-wow-delay="0.3s"> Frequently Asked Questions</h2>
            <p class="fadeInUp" data-wow-delay="0.4s"></p>
        </div>
        <div class="row align-items-center">
            <div class="col-12 col-lg-6">
                <div class="welcome-meter wow fadeInUp" data-wow-delay="0.4s">
                    <img src="img/core-img/about-1.png" alt="">
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="info-faq-area mt-s">
                    <dl style="margin-bottom:0">
                        <!-- Single FAQ Area -->
                        <dt class="wave fadeInUp" data-wow-delay="0.2s">Are <?php echo $site_name; ?> accounts FDIC insured?</dt>
                        <dd class="fadeInUp" data-wow-delay="0.3s">
                            <p> Yes. <?php echo $site_name; ?> is a member of the FDIC, so our deposit accounts are insured up to the maximum amount allowed by law. If you want to learn more about FDIC insurance limits</p>
                        </dd>
                        <!-- Single FAQ Area -->
                        <dt class="wave fadeInUp" data-wow-delay="0.3s">Are there fees for <?php echo $site_name; ?> accounts?</dt>
                        <dd>
                            <p>There are no monthly maintenance or annual fees charged for <?php echo $site_name; ?> accounts. Certain circumstances, like early withdrawal of CDs or insufficient funds, may incur penalties or fees. For more information about fees, please see account Terms and Conditions.</p>
                        </dd>
                        <!-- Single FAQ Area -->
                        <dt class="wave fadeInUp" data-wow-delay="0.4s">Tell me about "test deposits."</dt>
                        <dd>
                            <p>For security reasons, we use test deposits as part of the external account verification process. 2 to 3 business days after you add a link to your <?php echo $site_name; ?> account, we’ll make two test deposits of less than $1.00 into your external account. We do not use your money to make these test deposits.</p>
                            <p>We’ll then ask you to log in to your <?php echo $site_name; ?> account and report the amounts of those test deposits. After you have confirmed the test deposit amounts, you’ll be able to begin transferring money between your <?php echo $site_name; ?> account and your external account. We use this method to verify each new external account. If you do not verify your external account within 99 days from when you opened your account, transfers will be restricted until you can verify your external account.</p>
                        </dd>
                        <!-- Single FAQ Area -->
                        <dt class="wave fadeInUp" data-wow-delay="0.5s">How do I reset my password?</dt>
                        <dd>
                            <p>You can reset your <?php echo $site_name; ?> Online Banking password on our website. Simply select the Forgot UserID and/or Password link Log In from the <?php echo $site_name; ?> Online Banking home page. You will be asked a few short questions to verify your identity. Then choose to have a one-time pass code sent to you by email, phone, or text. The one-time pass code will be active for 10 minutes.</p>
                        </dd>
                        <!-- Single FAQ Area -->
                        <dt class="wave fadeInUp" data-wow-delay="0.3s">How many <?php echo $site_name; ?> Online Banking accounts can I have?</dt>
                        <dd>
                            <p>You are allowed to open and maintain any combination of 25 total accounts. Please note that there is a 3 account maximum for Dream Accounts.</p>
                        </dd>
                        <!-- Additional Professional FAQ Areas -->
                        <dt class="wave fadeInUp" data-wow-delay="0.6s">What types of loans does <?php echo $site_name; ?> offer?</dt>
                        <dd>
                            <p><?php echo $site_name; ?> offers a variety of loans including personal loans, business loans, education loans, and house and property loans, each with competitive interest rates and flexible repayment terms.</p>
                        </dd>
                        <dt class="wave fadeInUp" data-wow-delay="0.7s">Can I manage my <?php echo $site_name; ?> account from my mobile device?</dt>
                        <dd>
                            <p>Yes, you can manage your <?php echo $site_name; ?> account from your mobile device using our secure mobile banking app available for both Android and iOS.</p>
                        </dd>
                        <dt class="wave fadeInUp" data-wow-delay="0.8s">What security measures does <?php echo $site_name; ?> have in place?</dt>
                        <dd>
                            <p><?php echo $site_name; ?> employs state-of-the-art security measures including two-factor authentication, end-to-end encryption, and regular security audits to protect your personal and financial information.</p>
                        </dd>
                        <dt class="wave fadeInUp" data-wow-delay="0.9s">How can I contact <?php echo $site_name; ?> customer support?</dt>
                        <dd>
                            <p>You can contact <?php echo $site_name; ?> customer support via phone, email, or live chat on our website. Our support team is available 24/7 to assist you with any inquiries or issues.</p>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### FAQ & Timeline Area End ##### -->

<!-- ##### Inquiry Form Area Start ##### -->
<section class="inquiry-form section-padding-100-70">
    <div class="container">
        <div class="section-heading text-center">
            <span>Contact Us</span>
            <h2 class="d-blue fadeInUp" data-wow-delay="0.3s">Inquire with Us</h2>
            <p class="fadeInUp" data-wow-delay="0.4s">Have any questions or need further assistance? Send us a message, and we'll get back to you shortly.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="contact_form">
                    <form action="mailpro.php" method="post" id="main_contact_form" novalidate="">
                        <div class="row">
                            <div class="col-12">
                                <div id="success_fail_info"></div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="group fadeInUp" data-wow-delay="0.2s">
                                    <input type="text" name="name" id="name" required="">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Name</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="group fadeInUp" data-wow-delay="0.3s">
                                    <input type="email" name="email" id="email" required="">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="group fadeInUp" data-wow-delay="0.4s">
                                    <input type="text" name="subject" id="subject" required="">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="group fadeInUp" data-wow-delay="0.5s">
                                    <textarea name="message" id="message" required=""></textarea>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Message</label>
                                </div>
                            </div>
                            <div class="col-12 text-center fadeInUp" data-wow-delay="0.6s">
                                <button type="submit" class="btn more-btn">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Inquiry Form Area End ##### -->

<?php include('includes/layouts/footer.php'); ?>

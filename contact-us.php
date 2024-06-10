<?php include('includes/layouts/header.php'); ?>

<!-- ##### Welcome Area Start ##### -->
<div class="breadcumb-area clearfix auto-init">
    <!-- breadcumb content -->
    <div class="breadcumb-content">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <nav aria-label="breadcrumb" class="breadcumb--con text-center">
                        <h2 class="w-text title wow fadeInUp" data-wow-delay="0.2s">Contact Us</h2>
                        <ol class="breadcrumb justify-content-center wow fadeInUp" data-wow-delay="0.4s">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Welcome Area End ##### -->

<!-- ##### Contact Area Start ##### -->
<section class="section-padding-100 contact_us_area" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <!-- Dream Dots -->
                    <span>Get in Touch</span>
                    <h2 class="wow fadeInUp d-blue" data-wow-delay="0.3s">We'd Love to Hear from You</h2>
                    <p class="wow fadeInUp" data-wow-delay="0.4s">Whether you have a question about our services, pricing, or anything else, our team is ready to answer all your questions.</p>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <div class="contact_form">
                    <form action="mailpro.php" method="post" id="main_contact_form" novalidate>
                        <div class="row">
                            <div class="col-12">
                                <div id="success_fail_info"></div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="group wow fadeInUp" data-wow-delay="0.2s">
                                    <input type="text" name="name" id="name" required>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Name</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="group wow fadeInUp" data-wow-delay="0.3s">
                                    <input type="email" name="email" id="email" required>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="group wow fadeInUp" data-wow-delay="0.4s">
                                    <input type="text" name="subject" id="subject" required>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="group wow fadeInUp" data-wow-delay="0.5s">
                                    <textarea name="message" id="message" required></textarea>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Message</label>
                                </div>
                            </div>
                            <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.6s">
                                <button type="submit" class="btn info-btn green-btn">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <hr> <!-- Line break -->

        <!-- Contact Information and Google Map -->
        <div class="row contact-info-section">
            <div class="col-12 col-md-6">
                <div class="contact-info wow fadeInUp" data-wow-delay="0.2s">
                    <h4>Our Address</h4>
                    <p><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $address; ?></p>
                </div>
                <div class="contact-info wow fadeInUp" data-wow-delay="0.3s">
                    <h4>Email Us</h4>
                    <p><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $support_mail; ?></p>
                </div>
                <div class="contact-info wow fadeInUp" data-wow-delay="0.4s">
                    <h4>Call Us</h4>
                    <p><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $support_number; ?></p>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="google-map wow fadeInUp" data-wow-delay="0.5s">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509761!2d144.95373531531093!3d-37.8162792797517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d43f1f2f7b1%3A0x5045675218ce6e0!2sEnvato!5e0!3m2!1sen!2sau!4v1495602800524" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Contact Area End ##### -->

<?php include('includes/layouts/footer.php'); ?>

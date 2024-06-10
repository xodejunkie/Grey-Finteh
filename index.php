<?php include('includes/layouts/header.php'); ?>

<!-- ##### Welcome Area Start ##### -->
<section class="hero-section overlayed relative" id="home">
    <div class="overlay"></div>
    <!-- Hero Content -->
    <div class="hero-section-content">
        <div class="container">
            <div class="row">
                <!-- Welcome Content -->
                <div class="col-12 col-lg-6 col-md-12">
                    <div class="welcome-content text-left">
                        <div class="promo-section mb-15">
                            <div class="integration-link">
                                <div class="integration-icon">
                                    <p class="badge">NEW!</p>
                                </div>
                                <span class="integration-text bold">We now accept (STP) Straight Through Process Transfer</span>
                            </div>
                        </div>
                        <h1 class="bold fadeInUp w-text" data-wow-delay="0.2s">We are your financial solution</h1>
                        <p class="wow fadeInUp g-text" data-wow-delay="0.3s">We the oceansgrey help to get to your financial goal as quickly as possible and we have all the necessary AI tools required.</p>
                        <div class="info-btn-group fadeInUp" data-wow-delay="0.4s">
                            <a href="account.html" class="btn info-btn green-btn mr-3">Open Account</a>
                            <a href="contact-us.html" class="btn info-btn green-btn more-btn mr-3">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Welcome Area End ##### -->

<div class="clearfix"></div>

<!-- ##### About Us Area Start ##### -->
<section class="about-us-area section-padding-100 relative" id="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 col-md-12 no-padding-left">
                <div class="welcome-meter about-sec-wrapper wow fadeInUp" data-wow-delay="0.4s">
                    <img src="img/core-img/about-sec1.png" class="about-i" alt="">
                </div>
            </div>
            <div class="col-12 col-lg-6 col-md-12">
                <div class="who-we-contant mt-s">
                    <div class="promo-section">
                        <h3 class="special-head ">About us!</h3>
                    </div>
                    <h4 class="d-text bold fadeInUp" data-wow-delay="0.3s">We deliver high performance with the clients’ projected satisfaction</h4>
                    <p class="fadeInUp" data-wow-delay="0.4s">Oceans Grey is a multinational digital financial institution that provides individuals,
                        businesses, private and public institutions across the Scotland and the globe with a broad range of 
                        market-leading digital financial products and services.
                    </p>
                    <div class="list-wrap align-items-center">
                        <div class="row"></div>
                    </div>
                    <a class="btn info-btn green-btn mt-30 fadeInUp" data-wow-delay="0.6s" href="about-us.html">Read More</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### About Us Area End ##### -->

<div class="clearfix"></div>

<!-- ##### Our Services Area Start ##### -->
<section class="our_services_area section-padding-100-0 relative hex-pat-1" id="services">
    <div class="container">
        <div class="section-heading text-center">
            <span>Our Services</span>
            <h2 class="bold fadeInUp" data-wow-delay="0.3s">Our Core Services</h2>
            <p class="fadeInUp" data-wow-delay="0.4s">We provide the following services to satisfy our clients.</p>
        </div>
        <div class="row">
            <?php
                $services = [
                    ["icon" => "s1.png", "title" => "Online Banking", "description" => "Open an account with us and get access to transfer and receive money anywhere in the globe."],
                    ["icon" => "s2.png", "title" => "Personal Loan & Funding", "description" => "Oceansgrey provides personal loans for their clients with very low interest rates."],
                    ["icon" => "s3.png", "title" => "Financial Bonus System", "description" => "We have artificial intelligence software (AI) that helps manage your financial plan to get the best result."],
                    ["icon" => "s4.png", "title" => "Financial & Business Loans", "description" => "Get up to 500,000,000.00 dollars and above for business with a very low interest rate."],
                    ["icon" => "s5.png", "title" => "Education Loans", "description" => "We provide educational loans for your children with very low interest rates and long repayment periods."],
                    ["icon" => "s6.png", "title" => "House & Property Loans", "description" => "Access large amounts of loans for house and property with little interest."],
                ];

                foreach ($services as $service) {
                    echo '<div class="col-12 col-md-6 col-lg-4">
                            <div class="service_single_content v2 text-center wow fadeInUp" data-wow-delay="0.2s">
                                <div class="serv_icon">
                                    <img src="img/icons/' . $service["icon"] . '" alt="">
                                </div>
                                <div class="service-content">
                                    <h6 class="bold">' . $service["title"] . '</h6>
                                    <p>' . $service["description"] . '</p>
                                </div>
                            </div>
                          </div>';
                }
            ?>
        </div>
    </div>
</section>
<!-- ##### Our Services Area End ##### -->

<!-- ##### Core Features Area Start ##### -->
<section class="creative-facts section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="who-we-contant">
                    <div class="promo-section">
                        <h3 class="special-head">Our Core Features!</h3>
                    </div>
                    <h4 class="d-text bold fadeInUp" data-wow-delay="0.3s">Why Choose Our Company</h4>
                    <p class="fadeInUp" data-wow-delay="0.4s">The following are some of the reasons you should choose us.</p>
                    <?php
                        $features = [
                            ["icon" => "d1.png", "title" => "Our client is our priority", "description" => "We ensure we provide the best service to our clients and get feedback to improve our services."],
                            ["icon" => "d2.png", "title" => "Direct Funds & Quick Loan approvals", "description" => "Immediately after your loan is approved, you get your funds directly to any of your accounts with us or others."],
                            ["icon" => "d3.png", "title" => "Lots of Financial Options", "description" => "We offer different financial options to make your banking experience easy."]
                        ];

                        foreach ($features as $feature) {
                            echo '<div class="services-block-four">
                                    <div class="inner-box">
                                        <div class="icon-img-box">
                                            <img src="img/icons/' . $feature["icon"] . '" alt="">
                                        </div>
                                        <h3><a href="#">' . $feature["title"] . '</a></h3>
                                        <div class="text">' . $feature["description"] . '</div>
                                    </div>
                                  </div>';
                        }
                    ?>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="contact_form green mt-s">
                    <form action="#" method="post" id="main_contact_form" novalidate="">
                        <div class="row">
                            <div class="col-12">
                                <div id="success_fail_info"></div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="group fadeInUp" data-wow-delay="0.2s">
                                    <input type="text" name="amount" id="name" required="">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label class="w-text">Loan Amount</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="group fadeInUp" data-wow-delay="0.3s">
                                    <input type="text" name="months" required="">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label class="w-text">Select The Month/Years</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="group fadeInUp" data-wow-delay="0.4s">
                                    <input type="text" name="terms" id="subject" required="">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label class="w-text">Terms of use:</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="group fadeInUp" data-wow-delay="0.3s">
                                    <input type="text" name="loan amount" id="email" required="">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label class="w-text">You are getting:</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="group fadeInUp" data-wow-delay="0.3s">
                                    <input type="text" name="email" id="due" required="">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label class="w-text">You must return:</label>
                                </div>
                            </div>
                            <div class="col-12 text-center fadeInUp" data-wow-delay="0.6s">
                                <button type="submit" class="btn more-btn">Apply for this Loan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Core Features Area End ##### -->

<!-- ##### How It Works Area Start ##### -->
<section class="section-padding-100-70 relative map-before">
    <div class="container">
        <div class="section-heading text-center">
            <span>How It Works</span>
            <h2 class="wow fadeInUp d-blue bold" data-wow-delay="0.3s">Get Your Loan in 3 Easy Steps</h2>
            <p class="wow fadeInUp" data-wow-delay="0.4s">Below are a few steps to get access to a loan from us.</p>
        </div>
        <div class="row">
            <?php
                $steps = [
                    ["icon" => "h1.png", "title" => "Select amount and terms"],
                    ["icon" => "h2.png", "title" => "Enter your personal information"],
                    ["icon" => "h3.png", "title" => "Get Loan Approved in 48 hours"]
                ];

                foreach ($steps as $step) {
                    echo '<div class="col-12 col-md-6 col-lg-4">
                            <div class="service_single_content transparent text-center wow fadeInUp" data-wow-delay="0.2s">
                                <div class="how_icon">
                                    <img src="img/icons/' . $step["icon"] . '" class="colored-icon" alt="">
                                </div>
                                <h6>' . $step["title"] . '</h6>
                            </div>
                          </div>';
                }
            ?>
        </div>
    </div>
</section>
<!-- ##### How It Works Area End ##### -->

<!-- ##### FAQ & Timeline Area Start ##### -->
<div class="faq-timeline-area section-padding-0-85" id="faq">
    <div class="container">
        <div class="section-heading text-center">
            <span>Important questions</span>
            <h2 class="d-text bold fadeInUp" data-wow-delay="0.3s">Frequently Asked Questions</h2>
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
                            <p>Yes, <?php echo $site_name; ?> is a member of the FDIC, so our deposit accounts are insured up to the maximum amount allowed by law. If you want to learn more about FDIC insurance limits</p>
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
                            <p>You can reset your <?php echo $site_name; ?> Online banking password on our website. Simply select the Forgot UserID and/or Password link Log In from the <?php echo $site_name; ?> Online banking home page. You will be asked a few short questions to verify your identity. Then choose to have a one time pass code sent to you by email, phone, or text. The one time pass code will be active for 10 minutes.</p>
                        </dd>
                        <!-- Single FAQ Area -->
                        <dt class="wave fadeInUp" data-wow-delay="0.3s">How many <?php echo $site_name; ?> Online banking accounts can I have?</dt>
                        <dd>
                            <p>You are allowed to open and maintain any combination of 25 total accounts. Please note that there is a 3 account maximum for Dream Accounts.</p>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### FAQ & Timeline Area End ##### -->

<div class="footer-bg">
    <!-- ##### Testimonial Area Start ##### -->
    
    <!-- ##### Testimonial Area End ##### -->
</div>

<?php include('includes/layouts/footer.php'); ?>

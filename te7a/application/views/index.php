<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]--><head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Flato - Responsive Resume, Personal Portfolio Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--main style-->
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>user_templ/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>user_templ/css/style.css">
        <!--background slider style-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>user_templ/css/slideshow.css" />
        <!--google font style-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,600,700,800,300' rel='stylesheet' type='text/css'>
        <!--font-family: 'Open Sans', sans-serif;-->
        <!-- font css style-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>user_templ/css/font-awesome.css">
        <!--for slider style-->

        <noscript>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>user_templ/css/fallback.css" />
        </noscript>

        <script>
            function sendMSG() {

                name = $("#name").val();
                email = $("#email").val();
                msg = $("#msg").val();
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("simple-msg").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "<?php echo base_url(); ?>feedback/collectFeedback/" + name + "/" + email + "/" + msg, true);
                xmlhttp.send();
            }
        </script>
        <!--[if lt IE 9]>
                                <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>user_templ/css/fallback.css" />
                        <![endif]-->
    </head><body>
        <!--wrapper start-->
        <div class="wrapper" id="wrapper">
            <header>
                <!--banner start-->
                <div class="banner row" id="banner">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 noPadd" style="height:100%">
                        <!--background slide show start-->
                        <div class="bannerPart"> <img src="http://placehold.it/1600x900&text=image1" alt="" class="bannerImg"> </div>
                        <!--background slide show end-->
                    </div>
                </div>
                <!--banner end-->
                <div class="bannerText container">

                    <h1>          
                        {jobtitle}          
                    </h1>
                    <h2>
                        {jobdesc}          
                    </h2>

                </div>
                <!--menu start-->
                <div class="menu">
                    <div class="navbar-wrapper">
                        <div class="container">
                            <div class="navwrapper">
                                <div class="navbar navbar-inverse navbar-static-top">
                                    <div class="container">
                                        <div class="navbar-header">
                                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                                            <a class="navbar-brand" href="#">Menu</a> </div>
                                        <div class="navbar-collapse collapse">
                                            <ul class="nav navbar-nav">
                                                <li class="menuItem active"><a href="#wrapper">Home</a></li>
                                                <li class="menuItem"><a href="#aboutme">About</a></li>
                                                <li class="menuItem"><a href="#technical">Skills</a></li>
                                                <li class="menuItem"><a href="#exprience">Experience</a></li>
                                                <li class="menuItem"><a href="#education">Education</a></li>
                                                <li class="menuItem"><a href="#protfolio">Portfolio</a></li>
                                                <li class="menuItem"><a href="#contact">Contact</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Navbar -->
                        </div>
                    </div>
                </div>
                <!--menu end-->
            </header>
            <!--about me start-->
            <section class="aboutme" id="aboutme">
                <div class="container">
                    <div class="heading">
                        <h2>About me</h2>
                        <p>A small introduction about my self</p>
                    </div>
                    <div class="row">
                        <div class=" col-xs-12 col-sm-12 col-md-7 col-lg-7">
                            {settings}
                            <h3>{hometitle}</h3>
                            <h4 class="subHeading">{homedesc}</h4>
                            {/settings}

                            {pages}
                            <p>{desc}</p>
                            <a href="<?php echo base_url(); ?>assets/uploads/files/{cv}" class="bntDownload">Download Printable Resume</a> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-offset-1 col-lg-offset-1 proPic"> <img src="<?php echo base_url(); ?>assets/uploads/files/{image}" alt="" class="img-circle topmar"> </div>
                        {/pages}

                    </div>
                </div>
            </section>
            <!--about me end-->
            <!--technical start-->
            <section class="technical" id="technical">
                <div class="container">
                    <div class="heading">
                        <h2>Technical Skills</h2>
                        <p>I can say i’m quite good at</p>
                    </div>
                    <div class="row">
                        {skills}
                        <div class=" col-xs-12 col-sm-4 col-md-4 col-lg-4 skillsArea">
                            <div class=" col-xs-12 col-sm-6 col-md-6 col-lg-6 skills"> <span class="chart skilBg" data-percent="{degree}"> <span class="percent"></span> </span>
                                <h4>{technology_name}</h4>
                                <p>{desc}</p>
                            </div>
                        </div>
                        {/skills}
                    </div>
                </div>
            </section>
            <!--technical end-->
            <!--exprience start-->
            <section class="exprience" id="exprience">
                <div class="container">
                    <div class="heading">
                        <h2>Work Experience</h2>
                        <p>My previous associations</p>
                    </div>
                    {experiences}
                    <div class="row workDetails">
                        <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                            <div class="workYear">{start_date}<br>
                                {end_date}</div>
                        </div>
                        <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 rightArea">
                            <div class="arrowpart"></div>
                            <div class="exCon">
                                <h4>{comp_name}</h4>
                                <h5>{job_title}</h5>
                                <p>{desc}</p>
                            </div>
                        </div>
                    </div>
                    {/experiences}
                </div>
            </section>
            <!--exprience end-->
            <!--education start-->
            <section class="education" id="education">
                <div class="container">
                    <div class="heading">
                        <h2>Education & Diplomas</h2>
                        <p>What I have done in my academic career</p>
                    </div>

                    {education}
                    <div class="row workDetails">
                        <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                            <div class="workYear">{end_date}</div>
                        </div>
                        <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 rightArea">
                            <div class="arrowpart"></div>
                            <div class="exCon">
                                <h4>{degree}</h4>
                                <h5>{university}</h5>
                                <p>{desc}</p>
                            </div>
                        </div>
                    </div>
                    {/education}
                </div>
            </section>
            <!--education end-->
            <!--protfolio start-->
            <section class="protfolio" id="protfolio">
                <div class="container">
                    <div class="heading">
                        <h2>Portfolio</h2>
                        <p>showcase of my latest works</p>
                    </div>
                    <div class="portfolioFilter">
                        <ul>
                            <li><a href="#" data-filter="*" class="current">All</a></li>
                            {projects_cats}
                            <li><a href="#" data-filter=".{cat_name}">{cat_name}</a></li>
                            {/projects_cats}
                        </ul>
                    </div>
                    <ul class="portfolioContainer row">
                        {projects}
                        <li class="{cat_name} col-xs-6 col-sm-4 col-md-3 col-lg-3">
                            <div class="lightCon"> <span class="hoverBox"> <span class="smallIcon"> <a rel="lightbox-demo" href="<?php echo base_url(); ?>assets/uploads/files/{image}" title="{title}" class="zoom lb lb_warsaw1"><i class="fa fa-search fa-2x"></i></a> <a href="{url}" title="{title}" target="_blank" class="linKed"><i class="fa fa-link fa-2x"></i></i></a> </span> </span> <img src="<?php echo base_url(); ?>assets/uploads/files/{image}" alt="{title}" > </div>
                        </li>
                        {/projects}
                    </ul>
                </div>
            </section>
            <!--protfolio end-->
            <!--contact start-->
            <section class="contact" id="contact">
                <div class="container topCon">
                    <div class="heading">
                        <h2>Get In Touch</h2>
                        <p>Please feel free if you would like to have a chat.</p>
                    </div>
                </div>
                <div class="row mapArea">
                    <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/?ie=UTF8&amp;ll=-37.817682,144.957595&amp;spn=0.01134,0.026157&amp;t=m&amp;z=16&amp;output=embed"></iframe>
                </div>
            </section>
            {contact}
            <section class="contactDetails">
                <div class="container">
                    <!--contact info start-->                    
                    <div class="col-xs-12 col-sm-3 col-md-4 col-lg-4">
                        <h4>Contact details</h4>
                        <p> <i class="fa fa-map-marker fa-lg"></i>{address}</p>
                        <p> <i class="fa fa-mobile fa-lg"></i>{mob1}</p>
                        <p> <i class="fa fa-envelope-o "></i> <a href="mailto:{email}">{email}</a></p>
                        <p> <i class="fa fa-link "></i> <a target="_blank" href="{website}">{website}</a></p>
                    </div>
                    <!--contact info end-->
                    <!--contact form start-->
                    <div class="col-xs-12 col-sm-9 col-md-8 col-lg-8 conForm">
                        <h4>Shoot a message!</h4>
                        <div id="message"></div>
                        <!--                        <form method="post" action="#" name="cform" id="cform">-->
                        <input name="name" id="name" type="text" class="col-xs-12 col-sm-6 col-md-6 col-lg-6" placeholder="Your name..." >
                        <input name="email" id="email" type="email" class=" col-xs-12 col-sm-6 col-md-6 col-lg-6 noMarr" placeholder="Your email..." >
                        <textarea name="msg" id="msg" cols="" rows="" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" placeholder="Your message..."></textarea>
                        <input type="button" onclick="sendMSG()" id="submit" name="send" class="submitBnt" value="Send message">
                        <div id="simple-msg"></div>
                        <!--                        </form>-->
                    </div>
                    <!--contact form end-->
                </div>
            </section>
            <!--contact end-->
            <!--footer start-->
            <section class="footer" id="footer">
                <div class="container">
                    <ul>
                        <li><a target="_blank" href="{twitter}"><i class="fa fa-twitter fa-2x"></i></a></li>
                        <li><a target="_blank" href="{facebook}"><i class="fa fa-facebook fa-2x"></i></a></li>
                        <li><a target="_blank" href="{linkedin}"><i class="fa fa-linkedin fa-2x"></i></a></li>
<!--                        <li><a href="#"><i class="fa fa-pinterest fa-2x"></i></a></li>-->
<!--                        <li><a href="#"><i class="fa fa-dribbble fa-2x"></i></a></li>-->
<!--                        <li><a href="#"><i class="fa fa-rss fa-2x"></i></a></li>-->
                    </ul>
                </div>
            </section>
            {/contact}
            <!--footer end-->
        </div>
        <!--wrapper end-->
        <!--modernizr js-->
        <script type="text/javascript" src="<?php echo base_url(); ?>user_templ/js/modernizr.custom.26633.js"></script>
        <!--jquary min js-->
        <script type="text/javascript" src="<?php echo base_url(); ?>user_templ/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>user_templ/js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>user_templ/js/jquery.gridrotator.js"></script>
        <!--for custom jquary-->
        <script src="<?php echo base_url(); ?>user_templ/js/custom.js"></script>
        <!--for placeholder jquary-->
        <script type="text/javascript" src="<?php echo base_url(); ?>user_templ/js/jquery.placeholder.js"></script>
        <!--for menu jquary-->
        <script type="text/javascript" src="<?php echo base_url(); ?>user_templ/js/stickUp.js"></script>
        <script type="text/javascript">
                            jQuery(function($) {
                                $(document).ready(function() {
                                    //enabling stickUp on the '.navbar-wrapper' class
                                    $('.navbar-wrapper').stickUp({
                                        parts: {
                                            0: 'banner',
                                            1: 'aboutme',
                                            2: 'technical',
                                            3: 'exprience',
                                            4: 'education',
                                            5: 'protfolio',
                                            6: 'contact'
                                        },
                                        itemClass: 'menuItem',
                                        itemHover: 'active',
                                        topMargin: 'auto'
                                    });
                                });

                                $(".navbar.navbar-inverse.navbar-static-top a").click(function() {
                                    $(".navbar-collapse").addClass("hideClass");
                                });


                                $(".navbar.navbar-inverse.navbar-static-top a").click(function() {
                                    $(".navbar-collapse").addClass("collapse");
                                });


                                $(".navbar.navbar-inverse.navbar-static-top a").click(function() {
                                    $(".navbar-collapse").removeClass("in");
                                });

                                $(".navbar-toggle").click(function() {
                                    $(".navbar-collapse").removeClass("hideClass");
                                });


                            });
        </script>
        <!--for portfoli filter jquary-->
        <script src="<?php echo base_url(); ?>user_templ/js/jquery.isotope.js" type="text/javascript"></script>
        <!--for portfoli lightbox -->
        <link type="text/css" rel="stylesheet" id="theme" href="<?php echo base_url(); ?>user_templ/css/jquery-ui-1.8.16.custom.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>user_templ/css/lightbox.min.css">
        <script type="text/javascript" src="<?php echo base_url(); ?>user_templ/js/jquery.ui.widget.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>user_templ/js/jquery.ui.rlightbox.js"></script>
        <!--for skill chat jquary-->
        <script src="<?php echo base_url(); ?>user_templ/js/jquery.easing.min.js"></script>
        <script src="<?php echo base_url(); ?>user_templ/js/jquery.easypiechart.js"></script>
        <!--contact form js-->
        <script type="text/javascript" src="<?php echo base_url(); ?>user_templ/js/jquery.contact.js"></script>
    </body>
</html>
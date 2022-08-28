<?php $this->start('head');?>
<meta content="test">
<style>
    #viewbtn{
        padding:10px;
        border-radius:20px;
        border:1px solid black;
        width:40px;
        height:40px;
        cursor: pointer;
    }
</style>
<?php $this->end();?>

<?php $this->start('body');?>
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(<?= PROOT?>assets/img/bg-img/breadcumb.jpg); height: 20vh;">
    </section>
    <!-- ##### Breadcumb Area End ##### -->
    
    <!-- ##### Buy Now Area Start ##### -->
    <section class="oneMusic-buy-now-area has-fluid bg-gray section-padding-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-2 mb-2">
                    <h3>Privacy Policy</h3>
                </div>
            </div>
        </div>
    </section>
        
    <!-- ##### Contact Area Start ##### -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="new-hits-area mb-100" style="padding:10px;">
                    
    
                    <h1>Who we are</h1>
                    <p>Our website address is: https://cloudymic.com..
                    </br>
                    </p>
                    
                    <h1>Comments</h1>
                    <p>When visitors leave comments on the site we collect the data shown in the comments form, and also the visitor’s IP address and browser user agent string to help spam detection.

An anonymized string created from your email address (also called a hash) may be provided to the Gravatar service to see if you are using it. The Gravatar service privacy policy is available here: https://automattic.com/privacy/. After approval of your comment, your profile picture is visible to the public in the context of your comment.
                    </br>
                    </p>
                    
                    <h1>Media</h1>
                    <p>If you upload images to the website, you should avoid uploading images with embedded location data (EXIF GPS) included. Visitors to the website can download and extract any location data from images on the website.
                    </br>
                    </p>
                    
                    <h1>Cookies</h1>
                    <p>If you leave a comment on our site you may opt-in to saving your name, email address and website in cookies. These are for your convenience so that you do not have to fill in your details again when you leave another comment. These cookies will last for one year.

If you visit our login page, we will set a temporary cookie to determine if your browser accepts cookies. This cookie contains no personal data and is discarded when you close your browser.

When you log in, we will also set up several cookies to save your login information and your screen display choices. Login cookies last for two days, and screen options cookies last for a year. If you select “Remember Me”, your login will persist for two weeks. If you log out of your account, the login cookies will be removed.

If you edit or publish an article, an additional cookie will be saved in your browser. This cookie includes no personal data and simply indicates the post ID of the article you just edited. It expires after 1 day.
                    </br>
                    </p>
                    
                    <h1>Embedded content from other websites</h1>
                    <p>Articles on this site may include embedded content (e.g. videos, images, articles, etc.). Embedded content from other websites behaves in the exact same way as if the visitor has visited the other website.

These websites may collect data about you, use cookies, embed additional third-party tracking, and monitor your interaction with that embedded content, including tracking your interaction with the embedded content if you have an account and are logged in to that website.
                    </br>
                    </p>
                    
                    <h1>Personal Identification Information</h1>
                    <p>We may collect personal identification information from Users in a variety of ways, including but limited to, when users visit our site, subscribe to our newsletter, fill out a form, and in connection to other activities, services, features or resources we make available on our site.
Users may be asked for as appropriate, name, email address, Users may, however, visit our site anonymously. We will collect personal identification information from users only if they voluntarily submit such information to us. Users can always refuse to supply personally identification information, except that it may prevent them from engaging in certain Site-related activities.
                    </br>
                    </p>
                    
                    <h1>Changes to this privacy policy</h1>
                    <p>Cloudymic has the discretion to update this policy anytime when we do we will post a notification on the main page of our website, revise the updated date at the bottom of this page. we encourage users to frequently check this page for any changes to stay informed about how we are helping to protect the personal information we collect, you acknowledge to agree that it is your responsibility to review this privacy policy periodically and become aware of modifications
                    </br>
                    </p>
                    
                    
                </div>
            </div>
    
            <?php
                require_once(ROOT. DS . 'app' . DS . 'lib' . DS . 'helpers' . DS . 'recent_sidebar.php');
                ?>
        </div>
    </div>
                
    <!-- ##### Contact Area End ##### -->


<?php $this->end();?>
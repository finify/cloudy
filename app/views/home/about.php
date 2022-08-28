<?php $this->setSiteTitle('Cloudymic.com | About us'); ?>
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
                    <h3>About Us</h3>
                </div>
            </div>
        </div>
    </section>
        
    <!-- ##### Contact Area Start ##### -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="new-hits-area mb-100" style="padding:10px;">
                    
    
                    <h1>Cloudymic.com</h1>
                    <p>Cloudymic is a music and music video streaming service platform .
                    </br>
                    We are focused and committed on being one of the most reliable and content filled platform in the music and entertainment media space.
                    </br>
                    Our focus here in Cloudymic is to give you latest, hot and trendy music and music videos from famous and upcoming artists all over the world. We are redefining the way music is streamed online with a different approach to online media.</p>
                        
                    
                </div>
            </div>
    
            <?php
                require_once(ROOT. DS . 'app' . DS . 'lib' . DS . 'helpers' . DS . 'recent_sidebar.php');
                ?>
        </div>
    </div>
                
    <!-- ##### Contact Area End ##### -->


<?php $this->end();?>
<?php
$dbhost = 'localhost'; 
   $dbuser = 'clouxwsu_cloudymic'; 
   $dbpass = '1@?S^oe&jq^?'; 
   $db ='clouxwsu_cloudymic';

   $con=mysqli_connect($dbhost,$dbuser,$dbpass,$db) ;

   
$sql5 = mysqli_query($con, "SELECT * FROM `recent_search`order by ID desc LIMIT 20");   //checking no of investments
$rows5 = mysqli_num_rows($sql5) ;

$sql2 = mysqli_query($con, "SELECT * FROM `recent_artist`order by ID desc LIMIT 20");   //checking no of investments
$rows2 = mysqli_num_rows($sql2) ;


function getLocationInfoByIp(){
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = @$_SERVER['REMOTE_ADDR'];
    $result  = array('country'=>'', 'city'=>'');
    if(filter_var($client, FILTER_VALIDATE_IP)){
        $ip = $client;
    }elseif(filter_var($forward, FILTER_VALIDATE_IP)){
        $ip = $forward;
    }else{
        $ip = $remote;
    }
    $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));    
    if($ip_data && $ip_data->geoplugin_countryName != null){
        $result['country'] = $ip_data->geoplugin_countryName;
        $result['city'] = $ip_data->geoplugin_city;
    }
    return $result;
}

$usercountry = getLocationInfoByIp() ;

if (isset($_POST['search_input']))
{  
    $search = $_POST['search_input'] ;
    
    $formated_search = str_replace(' ', '%20', $search);
    
    header("location:".PROOT."search/index/$formated_search"); 
   
   
    
    
}

$thisyear = date("Y"); 
?>
<?php $this->start('head');?>
<meta name="description" content="#1 Best Music Streaming and Downloading website.You can also read lyrics to all songs in <?=$thisyear?>.[learn more]">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.2.27/jquery.autocomplete.min.js"></script>

<?php $this->end();?>

<?php $this->start('body');?>

<!-- ##### Hero Area Start ##### -->
<section class="hero-area">
        <div class="hero-slide">
            <!-- Single Hero Slide -->
            <div class="single-hero-slide d-flex align-items-center justify-content-center" style="padding-left:5px;padding-right:10px;">
                <!-- Slide Img -->
                <div class="slide-img bg-img" alt="Cloudymic.com" style="background-image: url(<?= PROOT?>assets/img/bg-img/bg.jpg);">
                    
                </div>
                <!-- Slide Content -->
                <div class="container">
                    <div class="row">
                        <div class="col-12" style="padding-left:0px;padding-right:0px;">
                            <div class="hero-slide-content text-center">
                                <h6 style="color:white; font-size:1.5em; margin-top:20px;" data-animation="fadeInUp" data-delay="100ms">Search anything Music</h6>
                                <form method="POST" action="">
                                <input type="text" name="search_input" id="searchInput" placeholder="eg (song title and artist)">
                                <input type="submit" value="Search" id="inputBtn">
                                </form>
                                <h2 style="color:white; font-size:3em;" data-animation="fadeInUp" data-delay="300ms" class="mt-3">Download and Stream</h2>
                                <!-- <a data-animation="fadeInUp" data-delay="500ms" href="#" class="btn oneMusic-btn mt-50">Discover <i class="fa fa-angle-double-right"></i></a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    


    <!-- ##### Miscellaneous Area Start ##### -->
    <section class="miscellaneous-area section-padding-100-0">
        <div class="container">
            <div class="row">
               

                <!-- ***** New Hits Songs ***** -->
                <div class="col-12 col-lg-8">
                    <div class="new-hits-area mb-100">
                        <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                            <p>See what’s new</p>
                            <h1>latest Search Hits</h1>
                        </div>

                        <?php
                          if($rows5<1){?>
                            <div class="alert alert-warning" role="alert">
                              <span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
                              <span class="alert-text">No Search yet</span>
                            </div>
                            <?php
                          }else{
                              $id = 0;
                            while($row5 = mysqli_fetch_array($sql5)){
                              $song_title =$row5["song_title"];
                              $song_thumb =$row5["song_thumb"];
                              $song_artist =$row5["song_artist"];
                              $song_id =$row5["song_id"];
                              
                              
                              $formated_song_title = preg_replace('/[^A-Za-z0-9\-]/', ' ', $song_title); // Removes special chars.
                              $formated_song_title = str_replace('  ', ' ', $formated_song_title);
                              $formated_song_title = str_replace(' ', '_', $formated_song_title);
                            
                              
                              if($song_thumb == "https://assets.genius.com/images/default_cover_image.png?1646412014"){
                                        $song_thumb = "https://cloudymic.com/assets/img/cloudy_default.png";
                                    }
                              
                              echo"
                              <div class='myFunc single-new-item d-flex align-items-center justify-content-between wow fadeInUp' data-wow-delay='100ms'>
                                  <div class='first-part d-flex align-items-center' >
                                      <div class='thumbnail'>
                                          <a href='". PROOT.'song/index/'.$song_id.'/'.$formated_song_title.''."'><img src='$song_thumb' alt='$song_title'></a>
                                      </div>
                                      <div class='content-'>
                                          <h6><a  id='".$id."' href='https://cloudymic.com/song/index/".$song_id."/".$formated_song_title."'>$song_title</a></h6>
                                          <p>$song_artist</p>
                                      </div>
                                  </div>
                              </div>          
                                    ";
                                    $id++;
                                    
                            }
                          }
                        ?>
                        
                        
                    </div>
                </div>

                <!-- ***** Popular Artists ***** -->
                <div class="col-12 col-lg-4">
                    <div class="popular-artists-area mb-100">
                        <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                            <p>See what’s new</p>
                            <h2>Popular Artist</h2>
                        </div>

                        <?php
                          if($rows2<1){?>
                            <div class="alert alert-warning" role="alert">
                              <span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
                              <span class="alert-text">No Artist yet</span>
                            </div>
                            <?php
                          }else{
                            while($row2 = mysqli_fetch_array($sql2)){
                              $artist_name =$row2["artist_name"];
                              $artist_thumb =$row2["artist_thumb"];
                              $artist_id =$row2["artist_id"];
                              
                              $formated_artist_name = preg_replace('/[^A-Za-z0-9\-]/', ' ', $artist_name); // Removes special chars.
                              $formated_artist_name = str_replace('  ', ' ', $formated_artist_name);
                              $formated_artist_name = str_replace(' ', '_', $formated_artist_name);
                              
                              if($artist_thumb == "https://assets.genius.com/images/default_cover_image.png?1646240350"){
                                        $artist_thumb = "https://cloudymic.com/assets/img/cloudy_default.png";
                                    }
                              
                              echo"
                              <div class='single-artists d-flex align-items-center wow fadeInUp' data-wow-delay='100ms'>
                                  <div class='first-part d-flex align-items-center' >
                                      <div class='thumbnail'>
                                            
                                          <a href='". PROOT.'artist/index/'.$artist_id.'/'.$formated_artist_name.''."'><img src='$artist_thumb' alt='$artist_name'></a>
                                      </div>
                                      <div class='content-'>
                                      
                                          <h4><a href='". PROOT.'artist/index/'.$artist_id."/".$artist_name."'>$artist_name</a></h4>
                                      </div>
                                  </div>
                              </div>          
                                    ";
                                    
                            }
                          }
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Miscellaneous Area End ##### -->
    
    <script>
        $(window).load(function() {
    $("#searchInput").autocomplete({
        source: function(e, t) {
            var a = "//suggestqueries.google.com/complete/search?hl=en&ds=yt&client=youtube&hjson=t&cp=1&q=" + escape(e.term) + "&format=5&alt=json&callback=?";
            $.getJSON(a, function(e) {
                var a = [];
                $.each(e[1], function(e, t) {
                    a.push(t[0])
                }), t(a)
            })
        },
        select: function(e, t) {
            return location.href = "https://cloudymic.com/search/index/" + t.item.label
        },
        delay: 100
    })
});
    </script>
<?php $this->end();?>
<?php
$dbhost = 'localhost'; 
   $dbuser = 'clouxwsu_cloudymic'; 
   $dbpass = '1@?S^oe&jq^?'; 
   $db ='clouxwsu_cloudymic';

   $con=mysqli_connect($dbhost,$dbuser,$dbpass,$db) ;

?>
<?php
    if(isset($data['song_id'])) {
    $song_id = $data['song_id'];
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://genius.p.rapidapi.com/songs/".$song_id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "x-rapidapi-host: genius.p.rapidapi.com",
            "x-rapidapi-key: b03daa2879msh09e8a4983ec1f67p14d063jsn94bdb0a32ba9"
        ],
    ]);
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    $response_data = json_decode($response);

    if($response_data->meta->status == 200){
        

            // Decode JSON into PHP array
            $response_data = json_decode($response);
            $song = $response_data->response->song;
            $medias = $song->media;
            $artist_names = $song->artist_names;
            $url = $song->url;

            $full_title = $song->full_title;
            $header_image_thumbnail_url = $song->header_image_thumbnail_url;
            $header_image_url = $song->header_image_url;
            $artist_names = $song->artist_names;
            $id = $song->id;
            
            $formated_full_title1 = preg_replace('/[^A-Za-z0-9\-]/', ' ', $full_title); // Removes special chars.
            $formated_full_title1 = str_replace('  ', ' ', $formated_full_title1);
            $formated_full_title1 = str_replace(' ', '_', $formated_full_title1);
            
            if($header_image_url == "https://assets.genius.com/images/default_cover_image.png?1646240350"){
                        $header_image_url = "https://cloudymic.com/assets/img/cloudy_default.png";
                    }
            //new data
            $release_date_for_display = $song->release_date_for_display;
            
            $primary_artist_image_url = $song->primary_artist->image_url;
            $primary_artist_name = $song->primary_artist->name;
            $primary_artist_id = $song->primary_artist->id;
            $formated_primary_artist_name = preg_replace('/[^A-Za-z0-9\-]/', ' ', $primary_artist_name); // Removes special chars.
              $formated_primary_artist_name = str_replace('  ', ' ', $formated_primary_artist_name);
              $formated_primary_artist_name = str_replace(' ', '_', $formated_primary_artist_name);
            
            if(isset($song->album->id)){
                $album_id = $song->album->id;
            $album_name = $song->album->name;
            $album_cover_art_url = $song->album->cover_art_url;
            
            $curl = curl_init();

            curl_setopt_array($curl, [
            	CURLOPT_URL => "https://api.genius.com/albums/".$album_id."/tracks?access_token=6VreNFExoe_4N-UafOOStyOGjW31nLYHeXe-HwAibl-8CY5tfO6F6uGb7rxT5Ris",
            	CURLOPT_RETURNTRANSFER => true,
            	CURLOPT_FOLLOWLOCATION => true,
            	CURLOPT_ENCODING => "",
            	CURLOPT_MAXREDIRS => 10,
            	CURLOPT_TIMEOUT => 60,
            	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            	CURLOPT_CUSTOMREQUEST => "GET",
            	CURLOPT_HTTPHEADER => [
            		
            	],
            ]);
            
            $response = curl_exec($curl);
            $err = curl_error($curl);
            
            curl_close($curl);
            $response_data = json_decode($response);

            
            }
            
            
            
            //new data

            //new search 
                $sql1 = mysqli_query($con, "SELECT * FROM `recent_search` WHERE song_id='$id'");
                $rows1 = mysqli_num_rows($sql1) ;
                $datestring = date("d/m/Y");

                if($rows1 <1){
                    $query1 = mysqli_query($con, "INSERT INTO recent_search (song_id,song_artist,song_title,song_thumb,views,created) VALUES ('$id','$primary_artist_name','$full_title','$header_image_thumbnail_url','0','$datestring')");
                }else{
                  
                      $sqlquery4 = "DELETE FROM recent_search WHERE song_id='$id' " ;
                      $sqlresult4 = mysqli_query($con,$sqlquery4) ;
                      
                       $query1 = mysqli_query($con, "INSERT INTO recent_search (song_id,song_artist,song_title,song_thumb,views,created) VALUES ('$id','$primary_artist_name','$full_title','$header_image_thumbnail_url','0','$datestring')");
               
                }
            //new search
            
            //new search 
                $sql1 = mysqli_query($con, "SELECT * FROM `recent_artist` WHERE artist_id='$primary_artist_id'");
                $rows1 = mysqli_num_rows($sql1) ;
                $datestring = date("d/m/Y");

                if($rows1 <1){
                    $query1 = mysqli_query($con, "INSERT INTO recent_artist (artist_name,artist_thumb,artist_id,artist_count,created) VALUES ('$primary_artist_name','$primary_artist_image_url','$primary_artist_id','0','$datestring')");
                }else{
                  
                      $sqlquery4 = "DELETE FROM recent_artist WHERE artist_id='$primary_artist_id' " ;
                      $sqlresult4 = mysqli_query($con,$sqlquery4) ;
                      
                       $query1 = mysqli_query($con, "INSERT INTO recent_artist (artist_name,artist_thumb,artist_id,artist_count,created) VALUES ('$primary_artist_name','$primary_artist_image_url','$primary_artist_id','0','$datestring')");
               
                }
            //new search

            foreach ($medias as $media) {
                if($media->provider == 'youtube'){
                    $youtube_link = $media->url;

                    $formated_link = str_replace('http://www.youtube.com/watch?v=', 'https://www.youtube.com/embed/', $youtube_link);
                        $secure_youtube_link = str_replace('http', 'https', $youtube_link);
            
                        $video_id = str_replace('http://www.youtube.com/watch?v=', '', $youtube_link);
            
                        $download_btn_link = "https://loader.to/api/button/?url=".$secure_youtube_link."&f=mp3&color=64c896";
                        $download_btn_link4 = "https://loader.to/api/button/?url=".$secure_youtube_link."&f=mp4&color=64c896";
                }
            }


            $html = file_get_html($url);
            
            
            $lyrics = $html->find('div[id=lyrics-root-pin-spacer]',0);
            $description = $html->find('div.ikywhQ');
            $description1 = $html->find('div.ikywhQ');
            if(isset($description[0])){
                $description = $description[0];
            }else{
                $description = "";
            }
            if(isset($description1[1])){
                $description1 = $description1[1];
            }else{
                $description1 = "";
            }
            
           
    }else{
        header("location:".PROOT."");
    }
     
        
    }
   

$thisyear = date("Y"); 
?>
<?php $this->setSiteTitle(''.$full_title.' Lyrics , Mp3/Mp4 Download'); ?>

<?php $this->start('head');?>
<meta name="description" content="Download mp3/mp4, Stream and read lyrics to <?=$full_title?> | <?=$thisyear?>">
<meta property="og:title" content="Cloudymic - Download mp3/mp4, Stream and read lyrics" />
<meta property="og:description" content="Download mp3/mp4, Stream and read lyrics to <?=$full_title?> | <?=$thisyear?>" />
<meta property="og:image" content="<?= $header_image_url?>" />
<style>
#lyrics_div a{
    pointer-events: none;
   cursor: default;
   font-family: "Archivo Narrow", sans-serif;
    color: #000000;
    line-height: 1.3;
    font-weight: 700;
    font-size:20px;
}
#about_div a{
    pointer-events: none;
   cursor: default;
   font-family: "Archivo Narrow", sans-serif;
    color: #000000;
    line-height: 1.3;
    font-weight: 700;
    font-size:20px;
}
#about_div1 a{
    pointer-events: none;
   cursor: default;
   font-family: "Archivo Narrow", sans-serif;
    color: #000000;
    line-height: 1.3;
    font-weight: 700;
    font-size:20px;
}
#about_div p{
    pointer-events: none;
   cursor: default;
   font-family: "Archivo Narrow", sans-serif;
    color: #000000;
    line-height: 1.3;
    font-weight: 700;
    font-size:20px;
}
#about_div1 p{
    pointer-events: none;
   cursor: default;
   font-family: "Archivo Narrow", sans-serif;
    color: #000000;
    line-height: 1.3;
    font-weight: 700;
    font-size:20px;
    text-align:center;
}
.ikywhQ{
    text-align:center;
}
.ipOVSb{
    color:#001e9a;
}

.blackbtn {
  background: white;
  box-shadow: 0 0 0 0 rgba(255, 255, 255, 1);
  animation: pulse-black 2s infinite;
}


@keyframes pulse-black {
  0% {
    transform: scale(0.95);
    box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.7);
  }
  
  70% {
    transform: scale(1);
    box-shadow: 0 0 0 10px rgba(0, 0, 0, 0);
  }
  
  100% {
    transform: scale(0.95);
    box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
  }
}

#des iframe{
    width:100%;
}

.nav-link{
    line-height:normal!important;
    height:auto; 
    font-size:25px; 
    padding:5px;
}
</style>
<?php $this->end();?>

<?php $this->start('body');?>
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(<?= PROOT?>assets/img/bg-img/breadcumb3.jpg); height: 25vh;">
    </section>

    <section class="featured-artist-area mb-5" style="z-index: 999; margin-top: -50px;">
   
        
        <div class="container">
            <div class="row align-items-end">
                    <div class="col-12 col-md-5 col-lg-4">
                        <div class="featured-artist-thumb">
                        
                            <img src="<?= $header_image_url?>" style="width: 100%; border: 5px solid #fff;" alt="<?= $full_title ?>|Cover art">
                        </div>
                    </div>
                    <div class="col-12 col-md-7 col-lg-8">
                        <div class="featured-artist-content" style="color: #000!important;">
                            <div class=" text-left">
                                <h1 style="font-size:2.5em"><?= $full_title ?></h1>
                                <h5><?= $artist_names ?></h5>
                            </div>
                            <h6>Realeased on:<?= $release_date_for_display?></h6>
                            <h2><i id="sharebtn" style="color:black;" class="icon-share"></i>  <a href="whatsapp://send?text=Listen to *<?= $full_title ?>* Now😉 on Cloudymic, best music streaming services platform👉   https://cloudymic.com/song/index/<?= $data['song_id'] ?>/<?= $formated_full_title1 ?>"><i style="font-size:40px; margin-left:16px;" class="fa fa-whatsapp" aria-hidden="true"></i> </a></h2>
                        </div>
                </div>
            </div>
        </div>
    </section>
    <script>

      document.querySelector("#sharebtn").addEventListener("click", () => shareFiles());

    function shareFiles() {
        if (navigator.share) {
            navigator.share({
                    title: 'Stream and Download <?= $full_title ?>',
                    text: 'Stream and Download <?= $full_title ?>',
                    url: 'https://cloudymic.com/song/index/<?= $data['song_id'] ?>/<?= $formated_full_title1 ?>',
                })
                .then(() => console.log('Successful share'))
                .catch((error) => console.log('Error sharing', error));
        } else {
            console.log("Web Share API is not supported in your browser.")
        }
    };
    </script>

    <div class="container">
    <div class="row">
        <div class="col-lg-8 col-sm-12">
            <div class="oneMusic-tabs-content">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" style="height:auto; line-height:auto!important; font-size:19px; padding:9px;" id="tab--1" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="height:auto; line-height:auto!important; font-size:19px; padding:9px;" id="tab--2" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">LYRICS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="height:auto; line-height:auto!important; font-size:19px; padding:9px;" id="tab--3" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="true">STREAM / DOWNLOAD</a>
                    </li>
                </ul>

                <div class="tab-content mb-100" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab--1">
                        <div class="oneMusic-tab-content">
                            <div class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" 
                                data-wow-delay="100ms" style="padding:15px; background-color:#f5f9fa;">
                                <div class="first-part d-flex align-items-center">
                                    <div class="thumbnail">
                                        <a href="https://cloudymic.com/artist/index/<?=$primary_artist_id?>/<?=$formated_primary_artist_name?>"><img style="max-width:60px; border-radius:50px; margin-right:10px;" src="<?= $primary_artist_image_url?>" alt="<?= $primary_artist_name?>"> </a>
                                    </div>
                                    <div class="content-">
                                        <p style="margin-bottom:0px;">Primary Artist:</p>
                                        <a href="https://cloudymic.com/artist/index/<?=$primary_artist_id?>/<?=$formated_primary_artist_name?>"><h2><?= $primary_artist_name?></h2></a>
                                    </div>
                                </div>
                            </div>
                            <a href='//zikroarg.com/4/5086367' target='_blank'  class='btn oneMusic-btn m-2 blackbtn'>Fast Download <i class='fa fa-download'></i></a>
                            <?php if($description) {?>
                            <div id="des" style="width:100%;  padding:5px; background-color:#f5f9fa; box-shadow: 1px 1px 1px grey; margin-top:10px;">
                                <h5 id="about_div"><?=$description->innertext?></h5>
                            </div>
                            <?php } ?>
                            <?php if($description1) {?>
                            <div id="des" style="width:100%;  padding:5px; background-color:#f5f9fa; box-shadow: 1px 1px 1px grey; margin-top:10px;">
                                <h5 id="about_div1"><?=$description1?></h5>
                            </div>
                            <?php } ?>
                            <?php if(isset($song->album->id)){ ?>
                                <div style="width:100%;  padding:5px; background-color:#f5f9fa; box-shadow: 1px 1px 1px grey; margin-top:10px;">
                                    <h5>Album list</h5>
                                    <div class="first-part d-flex align-items-center">
                                        <div class="thumbnail">
                                            <a href="#"><img style="max-width:70px; margin-right:10px;" src="<?= $album_cover_art_url?>" alt="<?= $album_name?>"> </a>
                                        </div>
                                        <div class="content-">
                                            
                                            <a href="#"><h4><?= $album_name?></h4></a>
                                        </div>
                                    </div>
                                    <ul style="margin-top:10px;">
                                        
                                        <?php
                                        
                                        if ($err) {
                                            //echo "cURL Error #:" . $err;
                                            echo "No album list";
                                        } else {
                                            //
                                            // Decode JSON into PHP array
                                            $response_data = json_decode($response);
                                            //print_r($response_data->response->hits[0]->result->full_title);
                                           
                                            $tracks = $response_data->response->tracks;
                            
                                            $count = 0;
                                            $index = 0;
                                            // Traverse array and print employee data
                                            foreach ($tracks as $track) {
                            
                                                $count++;
                            
                                                $track_number = $track->number;
                                                $track_full_title = $track->song->full_title;
                                                $track_id = $track->song->id;
                                                
                                                $formated_track_full_title = preg_replace('/[^A-Za-z0-9\-]/', ' ', $track_full_title); // Removes special chars.
                                                  $formated_track_full_title = str_replace('  ', ' ', $formated_track_full_title);
                                                  $formated_track_full_title = str_replace(' ', '_', $formated_track_full_title);
                                                  
                                                if($track_full_title == $full_title){
                                                    echo"<li style='background-color:black;'><a href='". PROOT.'song/index/'.$track_id.'/'.$formated_track_full_title.''."'>
                                                <h5 style='color:white;'>$track_number. $track_full_title</h5>
                                                </a></li>";
                                                }else{
                                                    echo"<li><a href='". PROOT.'song/index/'.$track_id.'/'.$formated_track_full_title.''."'>
                                                <h5 style='color:#001e9a;'>$track_number. $track_full_title</h5>
                                                </a></li>";
                                                } 
                                            }
                            
                                        }
                                    ?>    
                                    </ul>
                                </div>
                                <?php } ?>
                                <div id="des" style="width:100%;  padding:5px; background-color:#f5f9fa; box-shadow: 1px 1px 1px grey; margin-top:10px;">
                                    <div id="disqus_thread"></div>
                                    <script>
                                        /**
                                        *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                        *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                                        
                                        var disqus_config = function () {
                                        this.page.url = "<?php echo 'https://cloudymic.com/song/index/'.$id.'/'.$formated_full_title1; ?>";  // Replace PAGE_URL with your page's canonical URL variable
                                        this.page.identifier = "<?php echo $id;?>"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                        };
                                        
                                        (function() { // DON'T EDIT BELOW THIS LINE
                                        var d = document, s = d.createElement('script');
                                        s.src = 'https://cloudymic.disqus.com/embed.js';
                                        s.setAttribute('data-timestamp', +new Date());
                                        (d.head || d.body).appendChild(s);
                                        })();
                                    </script>
                                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                
                                </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab--2">
                        <div class="oneMusic-tab-content">
                            <h5 id="lyrics_div"><?= $lyrics ?></h5>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab--3">
                        <div class="oneMusic-tab-content">
                            <?php if(isset($youtube_link)){
                            echo "<iframe width='100%' height='315'
                            src='$formated_link'>
                            </iframe>
                            <iframe style='width:100%;height:60px;border:0;overflow:hidden;' scrolling='no' src='$download_btn_link'></iframe>
                            <iframe style='width:100%;height:60px;border:0;overflow:hidden;' scrolling='no' src='$download_btn_link4'></iframe>
                            <a href='//thaudray.com/4/5086303' target='_blank'class='btn oneMusic-btn m-2 blackbtn'>Fast Download <i class='fa fa-download'></i></a>
                            
                            ";
                            }else{
                                echo "<h4>Sorry No Media</h4>";
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

       <?php
                require_once(ROOT. DS . 'app' . DS . 'lib' . DS . 'helpers' . DS . 'sidebar.php');
                ?>
        
    </div>
    
    
</div>
<?php $this->end();?>


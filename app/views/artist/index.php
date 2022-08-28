<?php  
function thousandsCurrencyFormat($num) {

  if($num>1000) {

        $x = round($num);
        $x_number_format = number_format($x);
        $x_array = explode(',', $x_number_format);
        $x_parts = array('k', 'm', 'b', 't');
        $x_count_parts = count($x_array) - 1;
        $x_display = $x;
        $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
        $x_display .= $x_parts[$x_count_parts - 1];

        return $x_display;

  }

  return $num;
}

if (isset($data['artist_id']))
    {
    $artist_id = $data['artist_id'];
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://genius.p.rapidapi.com/artists/".$artist_id,
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
            $artist = $response_data->response->artist;
            $name = $artist->name;
            $header_image_url = $artist->header_image_url;
            $image_url = $artist->image_url;
            $url = $artist->url;
            
            $id = $artist->id;
            
            
           
           
            $html = file_get_html($url);

            $description = $html->find('div[class=rich_text_formatting]',0);
            //description
            $curl = curl_init();
        
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://genius.p.rapidapi.com/artists/".$id."/songs?sort=popularity",
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
                $songs = $response_data->response->songs;
                
            }
    
        }

        
    }else{
    
    }
$thisyear = date("Y"); 
?>
<?php $this->setSiteTitle(''.$name.' Lyrics,Songs and Video | Cloudymic'); ?>
<?php $this->start('head');?>
<meta name="description" content="Download mp3/mp4, Stream and read lyrics to all <?=$name?> | <?=$thisyear?>">
<meta property="og:title" content="Cloudymic - Download mp3/mp4, Stream and read lyrics" />
<meta property="og:description" content="Download mp3/mp4, Stream and read lyrics to <?=$name?> | <?=$thisyear?>" />
<meta property="og:image" content="<?= $image_url?>" />
 <style>
    .fa-twitter {
        padding: 4px;
        border: 2px solid #00ACEE;
        border-radius: 50%;
    }

    .fa-facebook {
        padding: 3px 6px;
        border: 2px solid #4267B2;
        border-radius: 50%;
    }

    .fa-instagram {
        padding: 4px;
        border: 2px solid #fb3958;
        border-radius: 50%;
    }
    #viewbtn{
        padding:10px;
        padding-left:15px;
        border-radius:30px;
        border:1px solid black;
        width:45px;
        height:45px;
        cursor: pointer;
    }
    
    #about_div p{
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


</style>
<?php $this->end();?>


        




<?php $this->start('body');?>
<!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(<?= $header_image_url?>); height: 30vh;">
    </section>

    <section class="featured-artist-area mb-5" style="z-index: 999; margin-top: -70px;">
        <div class="container">
            <div class="row align-items-end">
                    <div class="col-12 col-md-5 col-lg-4">
                        <div class="featured-artist-thumb">
                            <img src="<?= $image_url?>" style="width: 100%; border: 8px solid #fff; border-radius: 50%;" alt="">
                        </div>
                    </div>
                    <div class="col-12 col-md-7 col-lg-8">
                        <div class="featured-artist-content" style="color: #000!important;">
                            <div class=" text-left">
                                <h2><?= $name?></h2>
                            </div>
                            
                            <!--<div class="socialLinks">-->
                            <!--    <a href="#">-->
                            <!--        <i class="fa fa-twitter" style="color:#00ACEE; font-size: 18px;"></i> <span style="color: grey;">100000 follwers</span>-->
                            <!--    </a>-->
                            <!--    <a href="#" style="padding: 0 10px;">-->
                            <!--        <i class="fa fa-facebook" style="color: #4267B2; font-size: 18px;"></i> <span style="color: grey;">100000 follwers</span>-->
                            <!--    </a>-->
                            <!--    <a href="#">-->
                            <!--        <i class="fa fa-instagram" style="color: #fb3958; font-size: 18px;"></i> <span style="color: grey;">100000 follwers</span> -->
                            <!--    </a>-->
                            <!--</div>-->
                        </div>
                </div>
            </div>
        </div>
    </section>


<div class="container">
    <div class="row">
        <div class="col-lg-8 col-sm-12">
            <ul class="nav nav-tabs mb-3">
                <li class='nav-item'>
                  <a class='nav-link active' data-toggle='tab' href='#s4'>ABOUT</a>
                </li>
                <li class='nav-item'>
                  <a class='nav-link ' data-toggle='tab' href='#s5'>POPULAR SONGS</a>
                 </li>   
               </ul>
              
               
                 <div class="tab-content mb-5">
                   <div class='tab-pane container fade in show active' id='s4'>
                        <h5 id="about_div">
                            <?= $description ?>
                        </h5>
                   </div>
                   <div class='tab-pane container fade' id='s5' style="padding:0px;">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="new-hits-area mb-100" style="padding:10px;">
                                    
                                    <?php
                                    foreach ($songs as $song) {

                                    
                
                                    $full_title = $song->full_title;
                                    $header_image_thumbnail_url = $song->header_image_thumbnail_url;
                                    $artist_names = $song->artist_names;
                                    $id = $song->id;
                
                                    $formated_full_title = preg_replace('/[^A-Za-z0-9\-]/', ' ', $full_title); // Removes special chars.
                                    $formated_full_title = str_replace('  ', ' ', $formated_full_title);
                                    $formated_full_title = str_replace(' ', '_', $formated_full_title);
                                    //truncating text
                                    if (strlen($full_title) < 30) {
                                        $new_title =  $full_title;
                                   } else {
                                   
                                      $new = wordwrap($full_title, 26);
                                      $new = explode("\n", $new);
                                   
                                      $new = $new[0] . '...';
                                   
                                      $new_title = $new;
                                   }
                                   
                                    
                                    echo"<div class='single-new-item d-flex align-items-center justify-content-between wow fadeInUp' data-wow-delay='100ms'>
                                        <div class='first-part d-flex align-items-center'>
                                            <div class='thumbnail'>
                                                <a href='". PROOT.'song/index/'.$id.'/'.$formated_full_title.''."'><img src='$header_image_thumbnail_url' alt=''></a>
                                            </div>
                                            <div class='content-'>
                                                <h4><a href='". PROOT.'song/index/'.$id.'/'.$formated_full_title.''."'>$new_title</a></h4>
                                                <h6><a href='". PROOT.'song/index/'.$id.'/'.$formated_full_title.''."'>$artist_names</a></h6>
                                            </div>
                                        </div>
                                        
                                    </div>";
                                }
                                    
                                    ?>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                                
                    <!-- ##### Contact Area End ##### -->
                   </div>
                    <div class='tab-pane container fade' id='s3'>3</div>
                       <div class='tab-pane container fade' id='s4'>
                        <div class="thumbnail">
                            <img src="img/bg-img/wt11.jpg" alt="">
                        </div>
                        <div class="content-">
                            <h6>Creative Lyrics</h6>
                            <p>Songs and stuff</p>
                        </div>
                       </div>
                       <div class='tab-pane container fade' id='s5'>5</div>
                       <div class='tab-pane container fade' id='s6'>6</div>    
                    </div>
        </div>

        <?php
                require_once(ROOT. DS . 'app' . DS . 'lib' . DS . 'helpers' . DS . 'recent_sidebar.php');
                ?>
    </div>
</div>

<?php $this->end();?>

<?php
$artist_id = $primary_artist_id;
   
            $curl = curl_init();
        
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://genius.p.rapidapi.com/artists/".$artist_id."/songs?sort=popularity",
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
    
        

?>

        <div class="col-lg-4 col-12">
            
            <div class="new-hits-area mb-100">
                <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                    <p style="color: rgb(0, 0, 0); font-size: 18px; font-weight: bold;">Related Songs</p>
                    <!-- <h2>New Hits</h2> -->
                </div>
                
                <?php
                if($response_data->meta->status == 200){
                                    foreach ($songs as $song) {

                                    
                
                                    $full_title = $song->full_title;
                                    $header_image_thumbnail_url = $song->header_image_thumbnail_url;
                                    $artist_names = $song->artist_names;
                                    $id = $song->id;
                                    
                                    if($header_image_thumbnail_url == "https://assets.genius.com/images/default_cover_image.png?1646240350"){
                                        $header_image_thumbnail_url = "https://cloudymic.com/assets/img/cloudy_default.png";
                                    }
                                    
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
                    
                }else{
                    echo "No Result";
                }
                                    
                                    ?>

            </div>
            
        </div>
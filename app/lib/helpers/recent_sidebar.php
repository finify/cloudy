<?php
$dbhost = 'localhost'; 
   $dbuser = 'clouxwsu_cloudymic'; 
   $dbpass = '1@?S^oe&jq^?'; 
   $db ='clouxwsu_cloudymic';

   $con=mysqli_connect($dbhost,$dbuser,$dbpass,$db) ;

 
$sql5 = mysqli_query($con, "SELECT * FROM `recent_search`order by ID desc LIMIT 20");   //checking no of investments
$rows5 = mysqli_num_rows($sql5) ;

?>

<!-- ***** New Hits Songs ***** -->
                <div class="col-lg-4 col-12">
                    <div class="new-hits-area mb-100">
                        <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                            <p>See what’s new</p>
                            <h2>latest Search Hits</h2>
                        </div>

                        <?php
                          if($rows5<1){?>
                            <div class="alert alert-warning" role="alert">
                              <span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
                              <span class="alert-text">No Search yet</span>
                            </div>
                            <?php
                          }else{
                            while($row5 = mysqli_fetch_array($sql5)){
                              $song_title =$row5["song_title"];
                              $song_thumb =$row5["song_thumb"];
                              $song_artist =$row5["song_artist"];
                              $song_id =$row5["song_id"];
                              
                              $formated_song_title = preg_replace('/[^A-Za-z0-9\-]/', ' ', $song_title); // Removes special chars.
                              $formated_song_title = str_replace('  ', ' ', $formated_song_title);
                              $formated_song_title = str_replace(' ', '_', $formated_song_title);
                              
                              if($song_thumb == "https://assets.genius.com/images/default_cover_image.png?1646240350"){
                                        $song_thumb = "https://cloudymic.com/assets/img/cloudy_default.png";
                                    }
                              echo" 
                              <div class='single-new-item d-flex align-items-center justify-content-between wow fadeInUp' data-wow-delay='100ms'>
                                  <div class='first-part d-flex align-items-center'>
                                      <div class='thumbnail'>
                                          <a href='". PROOT.'song/index/'.$song_id.'/'.$formated_song_title.''."'><img src='$song_thumb' alt=''></a>
                                      </div>
                                      <div class='content-'>
                                          <h6><a style='font-size:15px;' href='". PROOT.'song/index/'.$song_id.'/'.$formated_song_title.''."'>$song_title</a></h6>
                                          <p><a style='font-size:15px;' href='". PROOT.'song/index/'.$song_id.'/'.$formated_song_title.''."'>$song_artist</a></p>
                                      </div>
                                  </div>
                                  
                              </div>          
                                    ";
                            }
                          }
                        ?>
                        
                    </div>
                    
                </div>
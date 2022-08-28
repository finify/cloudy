<?php $this->setSiteTitle('Search result for--'.$data['search'].''); ?>
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
<?php

if (isset($data['search']))
{   

    $search = $data['search'];
    
   

    $cookie = 'search';
    setcookie($cookie, $search, time() + (86400 * 30), "/");
  
    $formated_search = str_replace(' ', '%20', $search);

    $curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://genius.p.rapidapi.com/search?per_page=30&page=1&q=".$formated_search,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 60,
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

    if($response_data->meta->status == 200){}else{
        header("location:".PROOT.""); 
    }
    

}else{ 
     
    if(isset($_COOKIE["search"])){
        $search = $_COOKIE["search"] ;

        $formated_search = str_replace(' ', '%20', $search);

    $curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://genius.p.rapidapi.com/search?per_page=30&page=1&q=".$formated_search,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 60,
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

    if($response_data->meta->status == 200){}else{
        header("location:".PROOT.""); 
    }
    }else{
        header("location:".PROOT.""); 
    }
}
?>
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
                    <h3>search result for <?= $search ?></h3>
                </div>
            </div>
        </div>
    </section>
        
    <!-- ##### Contact Area Start ##### -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="new-hits-area mb-100" style="padding:10px;">
                    
    
                    <?php
            if ($err) {
                //echo "cURL Error #:" . $err;
                echo "Please search again";
            } else {
                //
                // Decode JSON into PHP array
                $response_data = json_decode($response);
                //print_r($response_data->response->hits[0]->result->full_title);
               
                $hits = $response_data->response->hits;

                $count = 0;
                $index = 0;
                // Traverse array and print employee data
                foreach ($hits as $hit) {

                    $count++;

                    $song_data = $hit->result;
                    $song_index = $hit->index;

                    $full_title = $song_data->full_title;
                    $header_image_thumbnail_url = $song_data->header_image_thumbnail_url;
                    $artist_names = $song_data->artist_names;
                    $id = $song_data->id;
                    //truncating text
                    if (strlen($full_title) < 30) {
                        $new_title =  $full_title;
                   } else {
                   
                      $new = wordwrap($full_title, 28);
                      $new = explode("\n", $new);
                   
                      $new = $new[0] . '...';
                   
                      $new_title = $new;
                   }
                    
                    $formated_song_title = preg_replace('/[^A-Za-z0-9\-]/', ' ', $full_title); // Removes special chars.
                      $formated_song_title = str_replace('  ', ' ', $formated_song_title);
                      $formated_song_title = str_replace(' ', '_', $formated_song_title);
                    echo"<div class='single-new-item d-flex align-items-center justify-content-between wow fadeInUp' data-wow-delay='100ms'>
                    <div class='first-part d-flex align-items-center'>
                        <div class='thumbnail'>
                            <a href='". PROOT.'song/index/'.$id.'/'.$formated_song_title.''."'><img src='$header_image_thumbnail_url' alt='$full_title'></a>
                        </div>
                        <div class='content-'>
                            <h4><a href='". PROOT.'song/index/'.$id.'/'.$formated_song_title.''."'>$new_title</a></h4>
                            <h7>$artist_names</h7>
                        </div>
                    </div>
                    
                    
                </div>";
                }

            }


        ?>
                    <!-- Single Top Item -->
                    
    
                    
                </div>
            </div>
    
            <?php
                require_once(ROOT. DS . 'app' . DS . 'lib' . DS . 'helpers' . DS . 'recent_sidebar.php');
                ?>
        </div>
    </div>
                
    <!-- ##### Contact Area End ##### -->


<?php $this->end();?>
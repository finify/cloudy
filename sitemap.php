<?php

header('Content-type: application/xml');
  $dbhost = 'localhost'; 
   $dbuser = 'clouxwsu_cloudymic'; 
   $dbpass = '1@?S^oe&jq^?'; 
   $db ='clouxwsu_cloudymic';

   $con=mysqli_connect($dbhost,$dbuser,$dbpass,$db) ;
 
$sql5 = mysqli_query($con, "SELECT * FROM `recent_search`order by ID");   //checking no of investments
$rows5 = mysqli_num_rows($sql5) ;

$sql2 = mysqli_query($con, "SELECT * FROM `recent_artist`order by ID desc LIMIT 30");   //checking no of investments
$rows2 = mysqli_num_rows($sql2) ;

echo "<?xml version='1.0' encoding='UTF-8'?>"."\n";
echo "<urlset xmlns='http://www.sitemaps.org/schemas/sitemap/0.9'>"."\n";


while($row5 = mysqli_fetch_array($sql5)){
  $song_title =$row5["song_title"];
  $song_thumb =$row5["song_thumb"];
  $song_artist =$row5["song_artist"];
  $song_id =$row5["song_id"];
  
  $formated_song_title = preg_replace('/[^A-Za-z0-9\-]/', ' ', $song_title); // Removes special chars.
  $formated_song_title = str_replace('  ', ' ', $formated_song_title);
  $formated_song_title = str_replace(' ', '_', $formated_song_title);
  
  echo"<url xmlns:xlink='http://www.w3.org/1999/xlink'>
            <loc> https://cloudymic.com/song/index/".$song_id."/".$formated_song_title." </loc>
            <changefreq>daily</changefreq>
        </url>";
}

while($row2 = mysqli_fetch_array($sql2)){
$artist_name =$row2["artist_name"];
$artist_thumb =$row2["artist_thumb"];
$artist_id =$row2["artist_id"];

$formated_artist_name = preg_replace('/[^A-Za-z0-9\-]/', ' ', $artist_name); // Removes special chars.
$formated_artist_name = str_replace('  ', ' ', $formated_artist_name);
$formated_artist_name = str_replace(' ', '_', $formated_artist_name);
echo"
<url>
            <loc> https://cloudymic.com/artist/index/".$artist_id."/".$formated_artist_name." </loc>
            <changefreq>daily</changefreq>
        </url>        
    ";
    
}


echo "</urlset>";

?>
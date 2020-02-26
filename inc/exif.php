<?php
    $img_src = file_get_contents('php://input');
    $decoded_params = json_decode($img_src, true);
    
    foreach($decoded_params as $key => $val){
        $exif_data = exif_read_data( $val );
        echo json_encode($exif_data);
    }
?>
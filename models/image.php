<?php
    function imageUpload( $filename ) {
        $im = imagecreatefromstring( $filename );
        $size = filesize( $filename );
        $width = imagesx( $im );
        $height = imagesy( $im );

        $imageid = db_insert( 'images', compact( 'size', 'width', 'height' ) );

        move_uploaded_file( $filename, 'uploads/' . $imageid . '.jpg' );

        return $imageid;
    }
?>

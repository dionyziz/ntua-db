<?php
    class Image {
        function create( $filename, $desiredwidth, $desiredheight ) {
            global $settings;

            $data = file_get_contents( $filename );
            $source = imagecreatefromstring( $data );
            $size = filesize( $filename );
            $width = imagesx( $source );
            $height = imagesy( $source );

            $lambda1 = $desiredwidth / $width;
            $lambda2 = $desiredheight / $height;

            // scale by the bigger factor so that the bigger dimension matches
            // the desired crop area; the other one will be cut off
            // that way we won't have any blank areas in the result image
            // using lambda as the same factor for both dimensions, the result
            // is scaled without distortion
            $lambda = max( $lambda1, $lambda2 );

            $target = imagecreatetruecolor( $desiredwidth, $desiredheight );
            imagecopyresampled(
                $target,
                $source,
                // offset in case width is the bigger dimension (negative because
                // the image will be cut-off from the left and right slightly)
                ( $desiredwidth - $width * $lambda ) / 2,
                // similarly in case height is the dimension to be cut-off
                ( $desiredheight - $height * $lambda ) / 2, // one of these two will be 0 - the one matches by the max function above
                0, 0, $lambda * $width, $lambda * $height, $width, $height
            );

            // convert cropped/scaled image to jpeg regardless of the initial format (could be e.g. png)
            ob_start();
            imagejpeg( $target );
            $jpegdata = ob_get_clean();

            $imageid = db_insert( 'images', compact( 'size', 'width', 'height' ) );

            // delete the temporary file that was uploaded
            unlink( $filename );
            file_put_contents( $settings[ 'uploaddir' ] . $imageid . '.jpg', $jpegdata );

            return $imageid;
        }
    }
?>

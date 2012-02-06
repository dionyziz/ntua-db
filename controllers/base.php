<?php
    abstract class Controller {
        protected static function validUpload( $file ) {
            return !empty( $file ) && !empty( $file[ 'tmp_name' ] );
        }
        protected static function validateInput( $input ) {
            $errors = array();
            foreach ( $input as $variable => $value ) {
                if ( empty( $value ) ) {
                    $errors[] = 'no' . $variable;
                }
            }
            return $errors;
        }
        protected static function paramURL( $vars ) {
            $parts = array();
            foreach ( $vars as $key => $value ) {
                $parts[] = $key . '='. urlencode( $value );
            }
            return implode( '&', $parts );
        }
    }
?>

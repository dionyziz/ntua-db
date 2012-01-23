<?php
    class SpecializationController extends Controller {
        public static function listing() {
            $specializations = specializationListing();
            view( 'specialization/listing', array( 'specializations' => $specializations ) );
        }
        public static function createView( $errors, $umn, $tid ) {
            if ( !empty( $umn ) ) {
                $specialization = specializationItem( $umn, $tid );
                if ( $specialization === false ) {
                    throw new Exception( 'The specialization you are trying to edit does not exist' );
                }
                if ( empty( $tid ) ) {
                    $tid = $specialization[ 'tid' ];
                }
            }
            $techs = techListing();
            $planetypes = planetypeListing();
            $errors = array_flip( explode( ',', $errors ) );
            view( 'specialization/create', compact( 'errors', 'umn', 'tid', 'techs', 'planetypes' ) );
        }
        public static function create( $umn, $tid ) {
            $vars = compact( 'umn', 'tid' );
            if ( !empty( $errors ) ) {
                Redirect( 'specialization/create?errors=' . implode( ',', $errors ) . '&' . Controller::paramURL( $vars ) );
            }
            specializationCreate( $umn, $tid );
            Redirect( 'specialization/listing' );
        }
        public static function delete( $umn, $tid ) {
            $vars = compact( 'umn', 'tid' );
            $errors = Controller::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'specialization/listing' );
            }
            specializationDelete( $umn, $tid );
            Redirect( 'specialization/listing' );
        }
        public static function update( $umn, $tid ) {
            $vars = compact( 'umn', 'tid' );
            $errors = Controller::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'specialization/create?errors=' . implode( ',', $errors ) . '&' . Controller::paramURL( $vars ) );
            }
            specializationUpdate( $umn, $tid );
            Redirect( 'specialization/listing' );
        }
    }

?>

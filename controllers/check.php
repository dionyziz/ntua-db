<?php
    class CheckController extends Controller {
        public static function listing() {
            $checks = Check::listing();
            view( 'check/listing', array( 'checks' => $checks ) );
        }
        public static function createView( $errors, $checktypeid, $pid, $umn, $created, $duration, $score ) {
            if ( !empty( $checktypeid ) ) {
                $check = Check::item( $checktypeid, $pid, $umn );
                if  ( $check === false ) {
                    throw new Exception( 'The check you are trying to edit does not exist' );
                }
                if ( empty( $created ) ) {
                    $created = $check[ 'created' ];
                }
                if ( empty( $duration ) ) {
                    $duration = $check[ 'duration' ];
                }
                if ( empty( $score ) ) {
                    $score = $check[ 'score' ];
                }
            }
            $errors = array_flip( explode( ',', $errors ) );
            $checktypes = Checktype::listing();
            $planes = Plane::listing();
            $techs = Tech::listing();
            $employees = Employee::listing( 'tech' );
            view( 'check/create', compact( 'errors', 'checktypeid', 'pid', 'umn', 'created', 'duration', 'score', 'checktypes', 'planes', 'techs', 'employees' ) );
        }
        public static function validateInput( $input, $checktypeid ) {
            $res = Checktype::getMaxScore( $checktypeid );
            $maxscore = mysql_fetch_array( $res );
            $args = array(
                'duration'  => array( 'filter'  => FILTER_VALIDATE_INT,
                                      'options' => array( 'min_range' => 1 )
                                    ),
                'score'     => array( 'filter'  => FILTER_VALIDATE_INT,
                                      /* min_range not needed if UNSIGNED INT on db */
                                      'options' => array( 'min_range' => 0, 'max_range' => $maxscore[ 'maxscore' ] )
                                    ),
            );
            $validated = filter_var_array( $input, $args );
            $validated2 = Controller::validateInput( $validated );
            return $validated2;
        }
        public static function create( $checktypeid, $pid, $umn, $created, $duration, $score ) {
            $vars = compact( 'checktypeid', 'pid', 'umn', 'created', 'duration', 'score' );
            $errors = self::validateInput( $vars, $checktypeid );
            if ( !empty( $errors ) ) {
                unset( $vars[ 'checktypeid' ] );
                Redirect( 'check/create?errors=' . implode( ',', $errors ) . '&' . Controller::paramURL( $vars ) );
            }
            Check::create( $checktypeid, $pid, $umn, $created, $duration, $score);
            Redirect( 'check/listing' );
        }
        public static function delete( $checktypeid, $pid, $umn ) {
            $vars = compact( 'checktypeid' );
            $errors = Controller::validateInput( $vars );
            if ( !empty( $errors ) ) {
                Redirect( 'check/listing' );
            }
            Check::delete( $checktypeid , $pid, $umn);
            Redirect( 'check/listing' );
        }
        public static function update( $checktypeid, $pid, $umn, $created, $duration, $score ) {
            $vars = compact( 'checktypeid', 'pid', 'umn', 'created', 'duration', 'score' );
            $errors = self::validateInput( $vars, $checktypeid );
            if ( !empty( $errors ) ) {
                Redirect( 'check/create?errors=' . implode( ',', $errors ) . '&' . Controller::paramURL( $vars ) );
            }
            Check::update( $checktypeid, $pid, $umn, $created, $duration, $score );
            Redirect( 'check/listing' );
        }
    }
?>

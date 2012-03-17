<?php
    class StatisticController {
        public static function listing() {
            $employeeStatistic = Employee::aggregates();
            $planeStatistic = Plane::aggregates();
            $checkStatistic = Check::aggregates();
            if ( $employeeStatistic === false ) {
                throw new Exception( 'No entries in array' );
            }
            if ( $planeStatistic === false ) {
                throw new Exception( 'No entries in array' );
            }
            if ( $checkStatistic === false ) {
                throw new Exception( 'No entries in array' );
            }
            $stats = compact( 'employeeStatistic', 'planeStatistic', 'checkStatistic' );
            view ( 'statistic/listing', $stats );
        }
    }
?>

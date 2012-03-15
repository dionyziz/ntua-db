<?php
    class StatisticController {
        public static function view() {
        }
        public static function listing() {
            $employeeStatistic = Employee::aggregates();
            if ( $employeeStatistic === false ) {
                throw new Exception( 'No entries in array' );
            }
            view ( 'statistic/listing', array( 'employeeStatistic' => $employeeStatistic ) );
        }
    }
?>

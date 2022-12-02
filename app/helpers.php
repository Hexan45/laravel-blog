<?php
    declare(strict_types=1);

    if(!function_exists('get_only_date')) { 
        function get_only_date(string $dateTime) : string {
            return (new DateTime($dateTime))->format('Y-m-d');
        }
    }
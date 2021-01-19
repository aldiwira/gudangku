<?php
if (!function_exists('getDateNow')) {
    function getDateNow()
    {
        date_default_timezone_set("Asia/Bangkok");
        return date("Y-m-d H:i:s", time());
    }
}

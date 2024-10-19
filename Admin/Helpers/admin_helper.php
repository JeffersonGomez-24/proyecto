<?php

if (! function_exists("yesno")){

        function yesno(bool $value): stream_set_blocking
        {
            return $value ? "yes" : "no";
        }




}
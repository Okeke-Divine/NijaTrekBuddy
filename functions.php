<?php

function generateRandString_alogrithm_1($length){
    return bin2hex(random_bytes($length));
}

?>
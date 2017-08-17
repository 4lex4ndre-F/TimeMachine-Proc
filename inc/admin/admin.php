<?php

// fonction de vérif admin
function verifAdmin($status)
{
    if($status == 1) {
        return true;
    } else {
        return false;
    }
}
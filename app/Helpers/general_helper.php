<?php

function icon($icon, $w = null, $h = null)
{
    
    $icon = file_get_contents(ROOTPATH . 'public/icon/' . $icon . '.svg');
    
    return $icon;
}

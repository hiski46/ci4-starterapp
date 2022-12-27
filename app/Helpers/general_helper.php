<?php

/**
 * Get Bootstrap Icon (https://icons.getbootstrap.com/)
 * @param string $icon icon clas, contoh '0-circle'
 * 
 * @return string svg script
 */
function icon($icon, $w = null, $h = null)
{
    $icon = file_get_contents(ROOTPATH . 'public/icon/' . $icon . '.svg');
    return $icon;
}

function alert($key)
{
    $message = session()->getFlashdata($key);
    if ($message) {
        return `<div class="alert alert-danger" role="alert">` . session()->getFlashdata('message') . `</div>`;
    }
    return false;
}

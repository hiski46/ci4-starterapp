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


/**
 * Mengecek apakah halaman yang dibuka adalah menu yang dipilih.
 * @param string $key nama path yang ingin dicek
 * @param int $segment urutan segment yang ingin dicek (segment[1] = index.pxp )
 * 
 * @return string
 */
function isAktif($key, $segment = 2)
{
    if ($key === current_url(true)->getSegment($segment)) {
        return 'active';
    }
    return false;
}

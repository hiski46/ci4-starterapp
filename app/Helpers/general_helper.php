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

function breadcrumb()
{
    $url = str_replace(base_url() . '/index.php' . '/', '', current_url());
    $urlArr = explode('/', $url);
    $html = '<nav style="--bs-breadcrumb-divider: ' . "'/'" . ';" aria-label="breadcrumb">
        <ol class="breadcrumb">';
    for ($i = 0; $i < count($urlArr); $i++) {
        if ($i == 0) {
            $html .= ' <li class="breadcrumb-item"><a href="/">Dashboard</a></li>';
        }
        if ($i == count($urlArr) - 1) {
            $html .= '<li class="breadcrumb-item active" aria-current="page">' . $urlArr[$i] . '</li>';
        } else {
            $html .= ' <li class="breadcrumb-item"><a href="/' . $urlArr[$i] . '">' . $urlArr[$i] . '</a></li>';
        }
    }
    $html .= '</ol>
    </nav>';

    echo $html;
}

<?php

use function PHPUnit\Framework\isNan;

/**
 * Get Bootstrap Icon (https://icons.getbootstrap.com/)
 * @param string $icon icon class, contoh '0-circle'
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


/**
 * Print Breadcrumb
 * untuk mengubah nama url yang ditampilakan pada breadcrumb bisa dilakukan pada "App\Config\Breadcrump.php"
 * @return string
 */
function breadcrumb()
{

    $Config = new Config\Breadcrumb();
    $listUrl = $Config->listUrl;
    $url = str_replace(base_url() . '/index.php' . '/', '', current_url());
    $urlArr = explode('/', $url);
    $html = '<nav style="--bs-breadcrumb-divider: ' . "'/'" . ';" aria-label="breadcrumb">
        <ol class="breadcrumb">';
    for ($i = 0; $i < count($urlArr); $i++) {
        $url = $urlArr[$i];
        if (isset($listUrl[$url])) {
            $url = lang($listUrl[$url]);
        }

        if ($i == 0) {
            $html .= ' <li class="breadcrumb-item"><a class="breadcoumb" href="/">Dashboard</a></li>';
        }
        if ($i == count($urlArr) - 1) {
            if ((int)$urlArr[$i] == 0) {
                $html .= '<li class="breadcrumb-item active" aria-current="page">' . $url . '</li>';
            }
        } else {
            if ((int)$urlArr[$i + 1] > 0) {
                $html .= '<li class="breadcrumb-item active" aria-current="page">' . $url . '</li>';
            } else {
                $html .= ' <li class="breadcrumb-item"><a class="breadcoumb" href="/' . $urlArr[$i] . '">' . $url . '</a></li>';
            }
        }
    }
    $html .= '</>
    </nav>';

    echo $html;
}

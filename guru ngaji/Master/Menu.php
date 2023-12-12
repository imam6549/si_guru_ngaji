<?php

namespace Master;

class Menu
{
    public function topMenu()
    {
        $base = "http://localhost/guru%20ngaji/index.php?target=";
        $data = [
            array('Text' => 'BERANDA', 'Link' => $base . 'home'),
            array('Text' => 'GURU NGAJI', 'Link' => $base . 'guru_ngaji'),
            array('Text' => 'KECAMATAN', 'Link' => $base . 'kecamatan'),
            array('Text' => 'TPQ', 'Link' => $base . 'tpq')
        ];
        return $data;
    }
}
<?php
function jenis_surat($val = '')
{
    switch ($val) {
        case '':
            return $val;
            break;
        case 'kp':
            return '$val';
            break;

        default:
            return $val;
            break;
    }
}
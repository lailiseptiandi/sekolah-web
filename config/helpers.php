<?php

// use GuzzleHttp\Psr7\Request;

/**
 * @param $path
 * @return string
 */


function setActive($path)
{
  return Request::is($path . '*') ? 'active' : '';
}

/**
 * @param $format
 * @param string $tanggal
 * @param string $bahasa
 * @return string|string[]
 */

function TanggalID($format, $tanggal = "now", $bahasa = "id")
{
  $en = array(
    "Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat",
    "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", 'Nov', "Dec"
  );

  $id = array(
    "Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu",
    "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"
  );

  // mengganti kata yang berada padaa array en dengan id , f(default id)
  return str_replace($en, $bahasa, date($format, strtotime($tanggal)));
}

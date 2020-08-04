<?php
include('function.php');
function getkomponen()
{
  $table = 'bos_realisasi_komponen';
  return get_data($table);
}
?>
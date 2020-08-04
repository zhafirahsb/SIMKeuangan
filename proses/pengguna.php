<?php
include('function.php');
function getpengguna()
{
  $table = "tbl_user";
  return get_data($table);
}
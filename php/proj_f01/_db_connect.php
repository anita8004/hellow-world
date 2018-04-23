<?php

$mysqli = new mysqli('localhost', 'anita', 'admin', 'proj_fo1');

$mysqli->query("SET NAMES utf8");

if(! isset($_SESSION)){
    session_start();
}
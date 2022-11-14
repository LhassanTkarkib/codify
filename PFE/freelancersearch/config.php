<?php
/**
 * Codify : Freelancing Platform
 * Copyright (c) Codify (https://github.com/gaurangkumar/Codify).
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Codify (https://github.com/gaurangkumar/Codify)
 *
 * @link          http://Codify.ml/
 * @since         1.0.0
 *
 * @license       MIT License (https://opensource.org/licenses/mit-license.php)
 * @auther        GaurangKumar Parmar <gaurangkumarp@gmail.com>
 *                Krunal Bhavsar
 * @filename      var.php
 */

$host = 'localhost';
$user = 'codiwoob_hassan';
$pass = 'Sk@teordie2016';
$db = 'Codify';
$port = "3306";
$site = 'Codify';

$logo = 'asset/logo.png';
$favicon = 'asset/favicon.ico';



$conn = new mysqli($host, $user, $pass, "codiwoob_Codify", $port);
$mysqli = new mysqli($host, $user, $pass, "codiwoob_Codify", $port);

if ($mysqli->connect_errno) {
    echo 'Connect Error ('.$mysqli->connect_errno.') '.$mysqli->connect_error;
    exit;
}

  
?>
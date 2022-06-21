<?php
    // calling other file
    include_once 'config/config.php';
    include_once 'lib/Session.php';

    // initial session
    Session::init();

    // calling data admin
    include_once 'classes/Admin.php';
    $admin = new Admin($db);

    // calling data user
    include_once 'classes/User.php';
    $users = new User($db);

    include_once 'classes/Hasil.php';
    $hasil = new Hasil($db);

    include_once 'classes/Kriteria.php';
    $kriteria = new Kriteria($db);

    include_once 'classes/Pernyataan.php';
    $pernyataan = new Pernyataan($db);

    include_once 'classes/RuleBase.php';
    $rule = new Rule($db);

    // calling connection
    include 'lib/Database.php';
?>

<?php
session_start();

    $conn = myqli_connect(
        'localhost',
        'root',
        '',
        'gaoslinera'
    ) or die (mysqli_erro ($mysqli));

?>
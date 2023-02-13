<?php

// connect to data base

function connect()
{
    $con = mysqli_connect("localhost", "root", "", "social");
    if(mysqli_connect_errno())
    {
        echo "Error db connect:" . mysqli_connect_errno();
        return null;
    }

    return $con;
}

?>
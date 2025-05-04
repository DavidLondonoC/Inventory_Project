<?php   

$user = $_POST [ 'user_login' ] ;
$user =KeyStrings ( string: $user ) ;


$pass = $_POST [ 'user_password' ] ;
$pass = KeyStrings ( string: $pass ) ;


if ( empty ( $user ) || empty ( $pass ) ) {
    echo
    "<div class = 'notifiacation is-danger is light'>
        <strong>It's wrong!</strong><br>
        Please complete all required fields 
    </div>
    ";
    exit () ;
}



?>
<?php 

require_once ( 'db.php' ) ;

#---------------------------------------------------------- varibales ----------------------------------------------------------

$user_name =  KeyStrings ( $_POST [ "user_name" ] ) ;
$user_name = ucfirst(strtolower( $user_name )) ;

$user_last_name = KeyStrings ( $_POST [ "user_last_name" ] ) ;
$user_last_name = ucwords(strtolower($user_last_name));


$user_user = KeyStrings ( $_POST [ "user_user" ] ) ;
$user_user = strtolower( $user_user ) ;

$user_email = KeyStrings ( $_POST [ "user_email" ] ) ;
$user_email = strtolower( $user_email );

$password1 = KeyStrings ( $_POST [ "password1"] ) ;
$password2 = KeyStrings ( $_POST [ "password2" ] ) ;


if ( $user_name == "" || $user_last_name == "" || $user_user == ""|| $user_email == "" || $password1 == "" || $password2 == "" ) {
    echo  "
          <div class = 'notification is-danger is-light'>
            <strong>It's wrong</strong>
            <br>
            <p>Please complete all spaces in the form</p>
          </div>
          " ;
    exit () ;

 } 

#---------------------------------------------------------- Verifying data integrity ----------------------------------------------------------

if ( dataCheck ( "[a-zA-ZñÑ]{3,40}" , $user_name ) || 
     dataCheck ( "[a-zA-ZñÑ ]{3,40}" , $user_last_name ) ||
     dataCheck ( "[a-zA-ZñÑ;,.-_0-9]{4,20}" , $user_user )
     
    ) {
    echo "
          <div class = 'notification is-danger is-light'>
            <strong>It's wrong</strong>
            <br>
            <p>
            Please complete all spaces in the format
            <br>
            The input doesn't match the correct format
            </p>
          </div>
        " ;
    exit () ;
}

#---------------------------------------------------------- Check if email OR user exists ----------------------------------------------------------

$check_email = conn() ;
$check_email = $check_email -> query ( "SELECT CONCAT(Name , ' ' , LastName) AS FullName ,Email FROM users WHERE Email = '$user_email';" ) ;

$user_check = conn() ;
$user_check = $user_check -> query ( "SELECT CONCAT(Name , ' ' , LastName) AS FullName ,User FROM users WHERE User = '$user_user';" ) ;

if ( $check_email -> rowCount() > 0 ) {
    echo "
          <div class = 'notification is-danger is-light'>
            <strong>Something wrong</strong>
            <br>
            <p>
            Email is registered
            </p>
          </div>
        " ;
        exit () ;
} elseif ($user_check -> rowCount() > 0) {
    echo    "
    <div class = 'notification is-danger is-light'>
        <strong>Something wrong</strong>
        <br>
        <p>
        User is registered, please change it.
        </p>
    </div>
  " ;
}

$check_email = null ;
$user_check = null ;


#---------------------------------------------------------- Check Password ----------------------------------------------------------

if ( $password1 !== $password2 ) {
    echo "
    <div class = 'notification is-danger is-light'>
        <strong>Something wrong</strong>
        <br>
        <p>
        The passwords don't match!
        </p>
    </div>
  " ;
  exit () ; 
} else {
    $pass = password_hash ($password1 , PASSWORD_BCRYPT, ["cost" => 10] ) ;
}


# ---------------------------------------------------------- Save Info ----------------------------------------------------------

$save_user = conn() ;
$save_user = $save_user -> query (" CALL SpInsertUsers ('$user_name', '$user_last_name', '$user_user', '$pass', '$user_email') ") ;
    echo
    "
    <div class='banner'>
            <div class='notification is-link is-light'>
                <button class='delete'></button>
                <strong>All done!</strong>
                <br>
                <p>User created successfully!</p>
            </div>
    </div>
    " ;

$save_user = null;



?>
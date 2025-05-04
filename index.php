<?php require ( 'inc\session_start.php' ) ; #Session_Start ?>

<!DOCTYPE <!DOCTYPE html>

<html>
    <head>
                <?php include ( 'inc\head.php' ) ; ?> <!-- Head-->
    </head>
    <body>
        <div name = "include">
            <?php 
                
                if(!isset( $_GET [ 'views' ] ) || $_GET [ 'views' ] == '' ) {
                    $_GET [ 'views' ] = "login" ;
                }

                if ( is_file ( filename: 'views/' . $_GET [ 'views' ] .'.php') && $_GET [ 'views' ] != 'login' && $_GET [ 'views' ] != '404' )  {
                    include ( 'inc/navbar.php' ) ;
                    include ( 'views/' . $_GET['views'] . '.php' ) ;
                    include ( 'inc/script.php' ) ;
                } else {
                    if( $_GET [ 'views' ] == 'login' ) {
                        include ( 'views/login.php' ) ;
                    } else {
                        include ( 'views/404.php' ) ;
                    }
                }
                      
            ?> 
             
        </div>
    </body>
</html> 
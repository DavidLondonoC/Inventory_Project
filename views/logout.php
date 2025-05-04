<?php 
    session_destroy () ;

    if ( headers_sent () ) { 
        echo  "<script>  window.location.href = 'index.php?views=home' ; </script>" ;

    } else {
        header ( 'location: index.php?views=home' );
    }
?>
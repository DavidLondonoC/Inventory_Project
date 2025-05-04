<?php



function conn (): PDO{
    try {
        $user = getenv("DB_USER");
        $password = getenv("DB_PWD");


        $pdo = new PDO(dsn: 'mysql:host=localhost;dbname=inventory', username: "$user", password: "$password"); 
        $pdo->setAttribute(attribute: PDO::ATTR_ERRMODE, value: PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Error de conexión: ' . $e->getMessage();
    }

    return $pdo;
}

function dataCheck ($filter, $string): bool {
    if (preg_match(pattern: "/^" .$filter. "$/", subject: $string)) {
        return false;
    }else{
        return true;
    }
}


#Funtions--------------------------


#Clean strings

function KeyStrings($string): string {
    $string = trim($string);

    $patterns = [
        "<script>", "</script>", "<script scr>", "</script type>",
        "select * from", "delete from", "insert into", "drop table",
        "drop database", "truncate table", "show tables", "<?php", "?>",
        "--", "^", "<", "[", "]", "==", ";", "::"
    ];

    $string = str_ireplace($patterns, "", $string);

    $string = trim($string);

    return $string; 

}


#photo rename

function photorename($name) {

    $patterns = [
        " ","/","#","$","-",",","."
    ];

    $name = str_ireplace($patterns, "_" , $name);

    $name = $name . "_". rand(min: 0,max: 100);

    return $name;
}


#

function tablespage ( $page , $npage , $url , $button ) {
}


?>


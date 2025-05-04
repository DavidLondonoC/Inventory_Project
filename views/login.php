<div class="main-container">
    <form action="" class = "box login" method = "POST" autocomplete="off">
        <h5 class = "title is-5 has-text-centered is-uppercase" > Inventory System</h5>

        <div class="field">
            <label class = "label" >User</label>
            <div class= "control" >
                <input class = "input" type = "text" name = "user_login" pattern = "[a-zA-Z0-9]{4-20}" maxlength = "20" required>
            </div>
        </div>

        <div class="field">
            <label class = "label">Password</label>
            <div class="control">
                <input class = "input" type ="password" name = "user_password" pattern="[a-zA-Z0-9$@.-]{7-100}" maxlength = "100" required>
            </div>
        </div>

        <p class = "has-text-centered mb-4 mt-3"> 
            <button type = "submit" class = "button is-info is-rounded" >Start</button>
        </p>

        <?php 
        if ( isset ($_POST [ 'user_login' ] ) && 
             isset ($_POST [ 'user_password' ] ) ) {
                require_once 'php/db.php' ;
                require_once 'php/start_login.php' ;

                 
             } 

        
        
        ;
        ?>

    </form>
</div>
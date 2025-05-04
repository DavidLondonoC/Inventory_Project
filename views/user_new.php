<div class = "container is-fluid mb-6" >
    <h1 class = "title" >User</h1>
    <h2 class = "subtitle" >New user</h2>
</div>
<div class = "container pb-6 pt-6" >

    <div class = "form-rest mb-6 mt-6" ></div>

    <form action = "php/save_user.php" method = "POST" autocomplete = "off" class = "FormAjax" >
        <div class="columns">
            <div class="column">
                <div class="control">
                    <label><strong>Name</strong></label>
                    <input type = "text" class = "input" name = "user_name" pattern = "[a-zA-ZñÑ]{3,40}" maxlength = "40" required>
                </div>
            </div>
            <div class="column">
                <div class="control">
                    <label><strong>Last name</strong></label>
                    <input type = "text" class = "input" name = "user_last_name" pattern = "[a-zA-ZñÑ ]{3,40}" maxlength = "40" required >
                </div>
            </div>
        </div>
        <div class = "columns">
            <div class = "column">
                <div class = "control">
                    <label><strong>User</strong></label>
                    <input type = "text" class = "input" name = "user_user" pattern = "[a-zA-ZñÑ;,.-_0-9]{4,20}" maxlength = "20" required>
                </div>
            </div>
            <div class="column">
                <div class="control">
                    <label><strong>Email</strong></label>
                    <input type = "email" class = "input" name = "user_email" maxlength = "70" required autocomplete = "off">
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="control">
                    <label><strong>Password</strong></label>
                    <input type = "password" class = "input" name = "password1" required>
                </div>
            </div>
            <div class="column">
                <div class="control">
                    <label><strong>Confirm Password</strong></label>
                    <input type = "password" class = "input" name = "password2" required>
                </div>
            </div>
        </div>
        <p class = "has-text-centered">
            <button type = "submit" class = "button is-info is-rounded">Send</button> 
        </p>
    </form>
</div>



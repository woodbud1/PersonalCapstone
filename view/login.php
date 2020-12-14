<?php include 'loginheader.php'; ?>
    <main>
        <div class="row">
                <div class="large-12 columns">
                    <center><h1>Login</h1></center>
                </div>
        </div>   
        <form action = "index.php" method = "post">       
            <div id="form-wrapper" style="max-width:500px;margin:auto;">
                
                <label>Username: </label>
                <input type="text" name="username" value=""><br><br>
                 <label>Password: </label>
                <input type="password" name="password" value="">
                <span><font color="red"<b><?php if(isset($errorLogin)) { echo $errorLogin; }?></b></font> </span><br>
                <input type="hidden" name="action" value="Verify Login" />
                <input class="button" type="submit" value="Login" >  
                <input class="button" accept=" "type="submit" name="action" value="Registration" >
        </form>
    </main>
<?php include 'footer.php'; ?>

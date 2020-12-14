<?php include 'header.php'; 
$username = $_SESSION['username'];
$email = User_db::get_email($username);
$name = User_db::get_name($username);
$street = User_db::get_street($username);
$city = User_db::get_city($username);
$state = User_db::get_state($username);
//$postal = User_db::get_postal($username);
//postal code

?>
<main>
    <div class="row">
        <div class="large-12 columns">
            <center><h1>Edit Profile</h1></center>
        </div>
    </div>   
    <div id="form-wrapper" style="max-width:500px;margin:auto;">
        <form action="index.php" method="post" id="edituserinfo">
            <input type="hidden" name="action" value="Save" />

            <p>Please update your information as needed.</p>
            <label>Full Name: </label>
            <input type="text" name="name" value='<?php echo htmlspecialchars($name); ?>'><span><font color="red"><b><?php if (isset($errorName)) {
                echo $errorName;} ?></b></font> </span><br>

            <label>Email Address: </label>
            <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>"><font color="red"><b><?php if (isset($errorEmail)) {
                 echo $errorEmail;} ?></b></font> </span><br>
              
            <label>Street Address: </label>
            <input type="text" name="street" placeholder="please enter your street address" value="<?php echo htmlspecialchars($street); ?>"><span><font color="red"> <?php if(isset($errorStreet)) { echo $errorStreet; }?></font></span><br>

            <label>City<font color="red">*</font>: </label>
            <input type="text" name="city" placeholder="please enter your city of residence" value="<?php echo htmlspecialchars($city); ?>"><span><font color="red"> <?php if(isset($errorCity)) { echo $errorCity; }?></font></span><br>
            
            <label>State<font color="red">*</font>: </label>
            <input type="text" name="state" placeholder="please enter your state of residence" value="<?php echo htmlspecialchars($state); ?>"><span><font color="red"> <?php if(isset($errorState)) { echo $errorState; }?></font></span><br>
           
            <label>Postal Code<font color="red">*</font>: </label>
            <input type="text" name="postal" placeholder="please enter your zip code" value="<?php echo htmlspecialchars($postal); ?>"><span><font color="red"> <?php if(isset($errorPostal)) { echo $errorPostal; }?></font></span><br>
            
            <label>Password: </label>
            <input type="password" name="password"><span><font color="red"><b><?php if (isset($errorPassword)) {
                echo $errorPassword; } ?></b></font></span><br>

            <label>&nbsp;</label>
            <input type="hidden" name="action" value="Landing" >
            <input class="button" type="submit" value="Back" >
            <input type="submit" name="action" class="button" value="Image Upload">
            <input type="submit" name="action" class="button" value="Save" >
        </form>
    </div>
</main>
<?php include 'footer.php'; ?>
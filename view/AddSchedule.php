<?php include 'header.php'; ?>
<main>
    <div class="row">
        <div class="large-12 columns">
            <center><h1>Update User Schedule</h1></center>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <center><p>Please add add a time you can walk dogs:</p></center>
        </div>
    </div>   
     <div id="form-wrapper" style="max-width:500px;margin:auto;">
        <form action="index.php" method="post" id="adddays">

            <p>Please update your information as needed.</p>

            <label for="date">Date<font color="red">*</font>: </label>
            <label><input type="text" id="date" name="date" value="<?php echo htmlspecialchars($date); ?>"></label><span><font color="red"><b><?php if (isset($dateerror)) {
                 echo $dateerror;}?></b></font> </span><br>
                 
            <label>Time<font color="red">*</font>: </label>
            <input id="appt-time" type="time" name="time" value="<?php echo htmlspecialchars($time); ?>"><span><font color="red"><b><?php if (isset($timeerror)) {
                echo $timeerror; } ?></b></font></span><br>

            <label>&nbsp;</label>
        <div class="row"><center>
            <form action="." method="post" id="edituserinfo">
            <input type="hidden" name="action" value="Landing" >
            <input class="button" type="submit" value="Back" >
            <input type="submit" name="action" class="button" value="Add Walk" >
                   </form>
        </div></center<br><br>
    </div>
</main>
<?php include 'footer.php'; ?>

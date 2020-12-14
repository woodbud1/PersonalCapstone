<?php include 'header.php'; ?> 
        <div id="form-wrapper" style="max-width:500px;margin:auto;">
            <div class="row"><center>
                <div class="large-12 columns">
                    <center><h1>Welcome <?php { echo $user->getname(); }?>!</h1></center>
                </div><br><br>
        <form action="." method="post" id="landing">
            <?php if (($_SESSION['Type']) == 0) 
            { ?><input type="submit" name="action" class="button" value="Edit Profile" >
            <input type="submit" name="action" class="button" value="View Schedule" ><?php } ?>
            <?php if (($_SESSION['Type']) == 1) 
            { ?>
            <input type="submit" name="action" class="button" value="All Users" >
            <input type="submit" name="action" class="button" value="Add Walk Availability" >
            <input type="submit" name="action" class="button" value="Review Schedule" ><?php } ?>
            <input class="button" type="submit" name="action" value="Logout" >
        </form>
        <br>
 <div class="row">
        <div class="large-12 columns">
            <center><h3>My Appointments</h3></center>
        </div>
        <div class="small-12 column">
            <table class="responsive">
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Walker Name</th>
                    <th></th>
                </tr>

                <?php foreach ($appointments as $appt) : ?>
                <?php  $scheduleId =  htmlspecialchars($appt['ScheduleId']);
                $scheduledAppointment = Schedule_db::get_scheduleItem($scheduleId) ?>
               <tr>
                    <td><center><?php $date = htmlspecialchars($scheduledAppointment['Date']);
                    echo date_format (new DateTime($date), "m/d/y");?></center></td>
            <td><center><?php $army_time_str = htmlspecialchars($scheduledAppointment['Time']); 
                    $regular_time_str = date( 'g:i A', strtotime( $army_time_str ) );
                    echo htmlspecialchars($regular_time_str)?></center></td>
            <td><center><?php $ID = htmlspecialchars($scheduledAppointment['WalkerID']); 
                    $name = User_db::get_name_by_ID($ID);
                    echo htmlspecialchars($name);
                    ?></center>
            </td>
                    <td><form action="." method="post">
                        <input type="hidden" name="action" value="RemoveAppt">  
                        <input type="hidden" name="ID" value="<?php $ID = $appt['AppointmentId'];
                        echo $ID; ?>">
                        <center><input class="button" type="submit" value="Cancel"></center>
                    </form></td>
                </tr>
                <?php endforeach; ?>
            </table>
          </div>
        </div>
        </div></div><br><br></center>
<?php include 'footer.php'; ?>

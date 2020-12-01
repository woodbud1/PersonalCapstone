<?php include 'header.php'; ?>
<main>
    <div class="row">
        <div class="large-12 columns">
            <center><h1>Schedule Walker</h1></center>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <center><p>Please confirm you would like to book the appointment below:</p></center>
            <?php $schedule = Schedule_db::get_scheduleItem($ID); 
            //var_dump the array
            //var_dump($schedule);?>
        </div>
    </div>   
    <div id="form-wrapper" style="max-width:1000px;margin:auto;">
        <div class="small-12 column">
            <table class="responsive">
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Walker Name</th>
                </tr>
                <tr>
                    <td><center><?php $date = htmlspecialchars($schedule['Date']);
                    echo date_format (new DateTime($date), "m/d/y");?></center></td>
            <td><center><?php $army_time_str = htmlspecialchars($schedule['Time']); 
                    $regular_time_str = date( 'g:i A', strtotime( $army_time_str ) );
                    echo htmlspecialchars($regular_time_str)?></center></td>
            <td><center><?php $ID = htmlspecialchars($schedule['WalkerID']); 
                    $name = User_db::get_name_by_ID($ID);
                    echo htmlspecialchars($name);
                    ?></center>
            </td>       
                </tr>
            </table>
          </div>
            <center><form action="." method="post">
            <input type="hidden" name="action" value="Landing" >
            <input class="button" type="submit" value="Back" >
            <input type="submit" name="action" class="button" value="Confirm" >
             <input type="hidden" name="ID" value="<?php $ScheduleId = $schedule['ScheduleID'];
                        echo $ScheduleId; ?>">
            </form></center>
    </div>
</main>
<?php include 'footer.php'; ?>

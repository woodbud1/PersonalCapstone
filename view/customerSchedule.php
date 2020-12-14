<?php include 'header.php'; ?>
<main>
    <div class="row">
        <div class="large-12 columns">
            <center><h1>Available Appointments</h1></center>
        </div>
    </div>   <br><br>
    <div id="form-wrapper" style="max-width:1000px;margin:auto;">
        <div class="row"><center>
                  <form action="." method="post" id="edituserinfo">
            <input type="hidden" name="action" value="Landing" >
            <input class="button" type="submit" value="Back" >
                   </form>
        </div></center<br><br>
      <div class="row">  
        <div class="small-12 column">
            <table class="responsive">
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                </tr>

                <?php foreach ($schedules as $schedule) : ?>
                <tr>
                    <td><center><?php $date = htmlspecialchars($schedule['Date']);
                    echo date_format (new DateTime($date), "m/d/y");?></center></td>
                    <td><center><?php $army_time_str = htmlspecialchars($schedule['Time']); 
                    $regular_time_str = date( 'g:i A', strtotime( $army_time_str ) );
                    echo htmlspecialchars($regular_time_str)?></center></td>
                     
                </tr>
                <?php endforeach; ?>
            </table>
          </div>
      </div>
    </div>
</main>
<?php include 'footer.php'; ?>

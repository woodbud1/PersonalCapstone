<?php include 'header.php'; ?>
    <main>
        <div id="form-wrapper" style="max-width:500px;margin:auto;">
          <form action="index.php" method="POST" enctype="multipart/form-data">
             <input type="hidden" name="action" value="uploadImage"/>
             <input type="file" name="image" /><br>
             <input class="button" type="submit" value="Update"/>
          </form>
            <br>
            <br>
        </div> 
    </main>
   <?php include 'footer.php'; ?>
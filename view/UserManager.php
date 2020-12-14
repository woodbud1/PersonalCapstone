<?php include 'header.php'; ?>
<main>
    <div class="row">
            <div class="large-12 columns">
                <center><h1>User List</h1></center>
            </div>
    </div>  
    <div id="form-wrapper" style="max-width:1000px;margin:auto;">
        <div class="row">
        <div class="small-12 column">
            <table class="responsive">
                <tr>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th></th>
                </tr>

                <?php foreach ($users as $user) : ?>

                <tr>
                    <td><?php echo htmlspecialchars($user['Username']); ?></td>
                    <td><?php echo htmlspecialchars($user['Name']); ?></td>
                    <td><?php echo htmlspecialchars($user['Email']); ?> </td>
                    <td><form action="." method="post">
                        <input type="hidden" name="action" value="Edit">  
                        <input type="hidden" name="username" value="<?php echo $user['Username']; ?>">
                        <input type="hidden" name="email" value="<?php echo $user['Email']; ?>">
                        <input type="hidden" name="name" value="<?php echo $user['Name']; ?>">
                        <input class="button" type="submit" value="Edit User">
                    </form></td>
                </tr>
                <?php endforeach; ?>
            </table>
          </div>
        </div>
        
        </form></center>
            <form action="." method="post">
            <input type="hidden" name="action" value="Landing"> 
            <input type="submit" class="button" value="Back" >
        </form>
    </div>    
</main>
<?php include 'footer.php'; ?>  

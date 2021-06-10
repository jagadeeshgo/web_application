<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<br><br>
<div class="container">
  <h2>View Users</h2>
  <?php
    $conn=mysqli_connect('localhost','root','','webstar');
    if (isset($_GET['del'])){
      $del_id=$_GET['del'];
      $delete="DELETE FROM user WHERE user_id='$del_id'";
      $run_delete=mysqli_query($conn,$delete);
      if($run_delete === true){
        echo "record has been deleted";
      }else{
        echo "record not deleted";
      }
    }

  ?>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Image</th>
        <th>Details</th>
        <th>Delete</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $conn=mysqli_connect("localhost","root","","webstar");

        $select="SELECT * FROM user";
        $run=mysqli_query($conn,$select);
        while($row_user=mysqli_fetch_array($run)){

          $user_id=$row_user['user_id'];
          $user_name=$row_user['user_name'];
          $user_email=$row_user['user_email'];
          $user_password=$row_user['user_password'];
          $user_image=$row_user['user_image'];
          $user_details=$row_user['user_details'];

      ?>
      <tr>
        <td><?php echo $user_id;?></td>
        <td><?php echo $user_name; ?></td>
        <td><?php echo $user_email;?></td>
        <td><?php echo $user_password;?></td>
        <td> <img src="upload/<?php echo $user_image; ?>"hight="600px"; width="190px";></td>
        <td><?php echo $user_details;?></td>
        <td><a class="btn btn-danger" href="View_user.php?del=<?php echo $user_id;?>">Delete</a></td>
        <td><a class="btn btn-success" href="Edit_user.php?edit=<?php echo $user_id;?>">Edit</a></td>
        
      </tr>
      <?php } ?>
      
      </tr>
    </tbody>
  </table>
</div>

</body>
</html>

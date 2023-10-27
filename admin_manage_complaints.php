<?php
include('connection.php');
session_start();
$username_session = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css"/>
  </head>
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Brgy Blotter</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <?php 
            include('admin_sidebar.php');
         ?>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
          <?php 
            include('header.php');
         ?>  
            <!-- Page content-->
            <?php
                      // Check if the success message is set in the session and display it
                      if (isset($_SESSION['success'])) {
                          echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
                          unset($_SESSION['success']); // Clear the success message from the session
                      }
                      else if (isset($_SESSION['danger'])) {
                          echo '<div class="alert alert-danger">' . $_SESSION['danger'] . '</div>';
                          unset($_SESSION['danger']); // Clear the success message from the session
                      }

                      ?>
            <div class="container-fluid fontStyle" >
                
                <div class="row">
                    <div class="">
                   <!--  <ul class="nav nav-pills justify-content-center mt-3" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" data-toggle="pill" href="#admin">Admin</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="pill" href="#user">User</a>
                        </li>
                        
                      </ul> -->
                    </div>
              </div>


               <div class="tab-content">
                    <div id="admin" class="container tab-pane active"><br>
                      <h3>Manage Complaints</h3>
                      <br>
                       <?php 
                          $res = mysqli_query($conn, "SELECT * FROM complaints WHERE barangay='$username_session' order by ID desc");
                          if($res){
                            $rowcount = mysqli_num_rows($res);
                          }
                          
                          ?>    
                          
                          <button class="btn btn-primary" style="float: left;" data-toggle="modal" data-target="#addAdmin">Add New</button>            
                          <br><br>
                         <table class='table table-bordered table-striped example'  style="width:100%">
                            <thead>
                            <tr style="background: #d9d9d9 !important; text-align: center;">
                              <th>ID</th>
                              <th>Username</th>
                              <th>Barangay</th>
                              <th>Complaint</th>
                              <th>File</th>
                              <th>Status</th>
                              <th>Date</th>
                              <th>Time</th>
                              <th>Phone Number</th>
                              <th>Nature Of Incident</th>
                              <th>Incident Name</th>
                              <th>View</th> 
                              <th>Edit</th> 
                              <th>Delete</th>                                                               
                            </tr>
                          </thead>
                         
                            <tbody>
                                 <?php while($row = mysqli_fetch_array($res)){ ?>
                                <tr>  
                                  <td><?php echo $row["id"]; ?> </td>
                                  <td><?php echo $row["username"]; ?></td>
                                  <td><?php echo $row["barangay"]; ?></td>
                                  <td><?php echo $row["complaint"]; ?></td>           
                                  <td><?php echo $row["file"]; ?></td>
                                  <td><?php echo $row["status"]; ?></td> 
                                  <td><?php echo $row["date"]; ?></td> 
                                  <td><?php echo $row["time"]; ?></td> 
                                  <td><?php echo $row["phone_number"]; ?></td>
                                  <td><?php echo $row["nature_of_incident"]; ?></td> 
                                  <td><?php echo $row["incident_name"]; ?></td> 

                                  <td><?php echo '<button class="btn btn-primary viewBtnAdmin" data-toggle="modal" data-target="#viewBtnAdmin">View</button>' ?> </td>               
                                  <td><?php echo '<button class="btn btn-warning editBtnAdmin" data-toggle="modal" data-target="#editBtnAdmin">Edit</button>' ?> </td>
                                  <td><?php echo '<button class="btn btn-danger deleteAdmin" data-toggle="modal" data-target="#deleteAdmin">Delete</button>' ?> </td>
                                </tr>
                                 <?php
                                 }
                                ?>
                            </tbody>
                          </table>


                    </div>
                   <div id="user" class="container tab-pane fade">  
                          <h2>Manage User Credentials</h2>
                          <br>
                          <?php 
                          $res = mysqli_query($conn, "SELECT * FROM complaints order by ID desc");
                          if($res){
                            $rowcount = mysqli_num_rows($res);
                          }
                          
                          ?>  

                          <input type="text" id="searchUser" onkeyup="searchBar()" class="form-control" placeholder="Search by last name">
                          <br>  
                          
                          <button class="btn btn-primary" style="float: left;" data-toggle="modal" data-target="#addBtnUser">Add New User</button>            
                          <br><br>
                              
                        <table class='table table-bordered table-striped example' id="tableUser">
                          <thead>
                            <tr style="background: #d9d9d9 !important; text-align: center;">
                              <th>ID</th>
                              <th>Last Name</th>
                              <th>First Name</th>
                            <th>Middle Name</th>
                              <th>Username</th>
                              <th>Password</th>                                                 
                              <th>Edit</th> 
                              <th>Delete</th>                                                               
                            </tr>
                          </thead>
                          <tbody>          
                           <?php while($row = mysqli_fetch_array($res)){ ?>              
                            <tr>
                              
                              <td><?php echo $row["id"]; ?> </td>
                              <td><?php echo $row["last_name"]; ?></td>
                              <td><?php echo $row["first_name"]; ?></td>
                              <td><?php echo $row["middle_name"]; ?></td>           
                              <td><?php echo $row["username"]; ?></td>
                              <td><?php echo $row["password"]; ?></td> 
                             <td><?php echo '<button class="btn btn-warning editBtnUser" data-toggle="modal" data-target="#editBtnUser">Edit</button>' ?> </td> 
                              <td><?php echo '<button class="btn btn-danger deleteUser" data-toggle="modal" data-target="#deleteUser">Delete</button>' ?> </td>
                            </tr> 
                            <?php
                            }
                            ?>
                          </tbody>
                             
                          </table>

                      </div>                 
                </div>

 <div id="addAdmin" class="modal fade fontStyle" role="dialog" style="zoom: 90%;">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <form action="" method="post">  
              <div class="modal-header">
                <h4 class="modal-title">Add New</h4>
              </div>     
          <div class="modal-body">
              
              <div class="form-group">
                <label for="usr">User:</label>
                <input type="text" name="user" class="form-control" required>
              </div>

              <div class="form-group">
                <label for="usr">Barangay:</label>
                <input type="text" name="barangay" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="usr">Complain:</label>
                <input type="text" name="complain" class="form-control">
              </div>
              <div class="form-group">
                <label for="usr">File:</label>
                <input type="file" name="file" class="form-control" required >
              </div>
              <div class="form-group">
                <label for="usr">status:</label>
                <input type="text" name="status" class="form-control" required>
              </div> 
              <div class="form-group">
                <label for="usr">Nature:</label>
                <input type="text" name="nature" class="form-control" required>
              </div> 
              <div class="form-group">
                <label for="usr">Incident:</label>
                <input type="text" name="incident" class="form-control" required>
              </div> 



            </div>
            <div class="modal-footer">
              <button type="submit" name="addData" class="btn btn-primary">Add Admin</button>
              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>     
            </div>
          </form>
    </div>
  </div>
</div>   


<!-- Update Modal -->
<div id="viewBtnAdmin" class="modal fade" role="">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <form action="" method="post">
      <div class="modal-header">
        <h4 class="modal-title">View Admin</h4>
      </div>     
      <div class="modal-body">      
        <input id="view_admin_id" name="view_admin_id" type="hidden">
            
           <div class="form-group">
              <label for="usr">Last Name:</label>
              <input type="text" name="last_name" id="view_last_name" readonly class="form-control">
            </div>    
            <div class="form-group">
              <label for="usr">First Name:</label>
              <input type="text" name="first_name" id="view_first_name" readonly class="form-control">
            </div>
            <div class="form-group">
              <label for="usr">Username:</label>
              <input type="text" name="username" id="view_username" readonly class="form-control">
            </div>

            <div class="form-group">
              <label for="usr">Password:</label>
              <input type="password" name="password" id="view_password" readonly class="form-control">
            </div>

            <div class="form-group">
              <label for="usr">Phone Number:</label>
              <input type="number" name="phone_number" id="view_phone_number" readonly class="form-control">
            </div>

            <div class="form-group">
              <label for="usr">Address:</label>
              <input type="number" name="address" id="view_address" readonly class="form-control">
            </div>




        </div>

      </form>
    </div>
  </div>
</div>     



<!-- Update Modal -->
<div id="editBtnAdmin" class="modal fade" role="">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <form action="" method="post">
      <div class="modal-header">
        <h4 class="modal-title">Update</h4>
      </div>     
      <div class="modal-body">      
        <input id="update_admin_id" name="update_admin_id" type="hidden">
            
           <div class="form-group">
              <label for="usr">Last Name:</label>
              <input type="text" name="last_name" id="last_name" class="form-control">
            </div>    
            <div class="form-group">
              <label for="usr">First Name:</label>
              <input type="text" name="first_name" id="first_name" class="form-control">
            </div>
            <div class="form-group">
              <label for="usr">Username:</label>
              <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="form-group">
              <label for="usr">Password:</label>
              <input type="password" name="password" id="password" readonly class="form-control">
            </div>
             <div class="form-group">
              <label for="usr">Phone Number:</label>
              <input type="number" name="phone_number" id="phone_number" class="form-control">
            </div>
            <div class="form-group">
              <label for="usr">Address:</label>
              <input type="number" name="address" id="address"  class="form-control">
            </div>


        </div>

        <div class="modal-footer">
          <button type="submit" name="updateData" class="btn btn-primary">Update</button>
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>     
        </div>
      </form>
    </div>
  </div>
</div>     
<!-- End of Update Modal -->




<!-- Delete Modal -->
<div id="deleteAdmin" class="modal fade fontStyle" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Delete</h4>
        </div>
      <form action="" method="post">
        <div class="modal-body">
          <input id="delete_id" name="delete_id" type="hidden">
          <p>Are you sure you want to delete this?</p>
        </div>
        <div class="modal-footer">
          <button type="submit" name="deleteData" class="btn btn-danger">Delete</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>  
  </div>
</div>
<!-- ADD QUERY [ADD NEW USER] -->  
<?php 
  if(isset($_POST["addData"]))
     {
        $last_name = mysqli_real_escape_string($conn, $_POST["last_name"]);
        $first_name = mysqli_real_escape_string($conn, $_POST["first_name"]);
        $username = mysqli_real_escape_string($conn, $_POST["username"]);  
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        $password = password_hash($password, PASSWORD_BCRYPT);
        $phone_number = mysqli_real_escape_string($conn, $_POST["phone_number"]);
        $address = mysqli_real_escape_string($conn, $_POST["address"]);


        $query_show = mysqli_query($conn, "SELECT * FROM complaints");
        
        $query = mysqli_query($conn, "SELECT * FROM complaints WHERE username='$username'");
         if(mysqli_num_rows($query) > 0) 
         {
              $_SESSION['danger'] = 'The username already exists'; // Set the success message in the session
              echo '<script> window.location="admin_manage_users.php";</script>';       
         }
         else 
         {
              //else, i-eexecute nya yung insert query
              $query_insert = mysqli_query($conn, "INSERT INTO complaints 
                  VALUES('', '$last_name', '$first_name', 
                  '$username', '$password', '$phone_number', '$address')");
                if($query_insert)
                {            
                  $_SESSION['success'] = 'Data Inserted'; // Set the success message in the session
                   echo '<script> window.location="admin_manage_users.php";</script>';                        
                }
            
            
          }
      }

     if(isset($_POST['deleteData'])){    
        $id = $_POST['delete_id'];
        $query = mysqli_query($conn, "DELETE FROM complaints WHERE id='$id'");
        if($query) {
          $_SESSION['success'] = 'Data Deleted'; // Set the success message in the session
          echo '<script> window.location="admin_manage_users.php";</script>';              
         
        }
     }
?>  




<!-- UPDATE QUERY [EDIT ADMIN USER] -->                 
<?php 
     if(isset($_POST['updateData'])){    
        $id = $_POST['update_admin_id'];
        $last_name = mysqli_real_escape_string($conn, $_POST["last_name"]);
        $first_name = mysqli_real_escape_string($conn, $_POST["first_name"]);
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        $phone_number = mysqli_real_escape_string($conn, $_POST["phone_number"]);
        $address = mysqli_real_escape_string($conn, $_POST["address"]);



        $password = password_hash($password, PASSWORD_BCRYPT);
        $query = mysqli_query($conn, "UPDATE complaints 
          SET 
          last_name='$last_name', 
          first_name='$first_name', 
          username='$username', 
          password='$password',
          phone_number='$phone_number', 
          address='$address'
          WHERE id='$id'");
        if($query) {
              $_SESSION['success'] = 'Successfully Updated'; // Set the success message in the session
               echo '<script> window.location="admin_manage_users.php";</script>';              
            ;
        }
     }
?>




            </div>
        </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   
   Core theme JS
    <script src="js/scripts.js"></script>
</body>
</html>



<script>

   $(document).ready( function () {
        $('.example').DataTable();
      });



    $(document).ready(function(){
        $('.deleteAdmin').on('click', function(){
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
                return $(this).text();
      //          console.log(data);
            }).get();
            $('#delete_id').val(data[0]);          
        });
    });





$(document).ready(function(){
    $('.editBtnAdmin').on('click', function(){      
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
                return $(this).text();
          //      console.log(data);
            }).get();
            $('#update_admin_id').val(data[0]);
            $('#last_name').val(data[1]);
            $('#first_name').val(data[2]);
            $('#username').val(data[3]);
            $('#password').val(data[4]);  
            $('#phone_number').val(data[5]);  
            $('#address').val(data[6]);  
    });
 });

$(document).ready(function(){
    $('.viewBtnAdmin').on('click', function(){      
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
                return $(this).text();
          //      console.log(data);
            }).get();
            $('#view_admin_id').val(data[0]);
            $('#view_last_name').val(data[1]);
            $('#view_first_name').val(data[2]);
            $('#view_username').val(data[3]);
            $('#view_password').val(data[4]); 
            $('#view_phone_number').val(data[5]);
            $('#view_address').val(data[6]); 


    });
 });








$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});



 var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };


$('input[type="file"]'). change(function(e){
    fileName = e. target. files[0]. name;
    $('#imgLabel').text(fileName);
    $('#imgPreview').attr('src','images/'+fileName);
});



function searchBar() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("searchUser");
  filter = input.value.toUpperCase();
  table = document.getElementById("tableUser");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}




var $td = $('table td').eq(5),
    text = $td.text().replace(/\*/g, '%');

$td.text(text);


</script>


<script>
   // Get all the alerts with the "auto-close" class
  var alerts = document.querySelectorAll('.alert');

  // Loop through the alerts and set a timeout function to remove them after 4 seconds
  alerts.forEach(function(alert) {
    setTimeout(function() {
      alert.remove();
    }, 4000);
  });
</script>











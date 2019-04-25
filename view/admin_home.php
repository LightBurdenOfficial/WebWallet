<?php if (!defined("IN_WALLET")) { die("Auth Error!"); } ?>
<?php
if (!empty($error))
{
    echo "<p style='font-weight: bold; color: red;'>" . $error['message']; "</p>";
}
if (!empty($msg))
{
    echo "<p style='font-weight: bold; color: green;'>" . $msg['message']; "</p>";
}
?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <a href="?"><button type="submit" class="btn btn-danger float-left"><i class="fas fa-sign-out-alt"></i> Voltar para Wallet</button></a>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
      <div class="col-md-12">
        <strong style="font-size: 20px;">List of all users:</strong>
      </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <p> </p>
    </div>
  </div>
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <div class="table-responsive text-center">
      <table class="table table-hover table-dark" id="alist">
      <thead>
        <tr>
          <td scope="col">Username</td>
          <td scope="col">Created</td>
          <td scope="col">Is admin?</td>
          <td scope="col">Is locked?</td>
          <td scope="col">IP</td>
          <td scope="col">Info</td>
          <td scope="col">Delete</td>
        </tr>
      </thead>
      <tbody id="myTable">
   <?php
   foreach($userList as $user) {
      echo '<tr>
               <td>' . $user['username'] . '</td>
               <td>' . $user['date'] . '</td>
               <td>' . ($user['admin'] ? '<strong>Yes</strong> <a href="?a=home&m=deadmin&i=' . $user['id'] . '">De-admin</a>' : 'No <a href="?a=home&m=admin&i=' . $user['id'] . '">Make admin</a>') . '</td>
               <td>' . ($user['locked'] ? '<strong>Yes</strong> <a href="?a=home&m=unlock&i=' . $user['id'] . '">Unlock</a>' : 'No <a href="?a=home&m=lock&i=' . $user['id'] . '">Lock</a>') . '</td>
               <td>' . $user['ip'] . '</td>
               <td>' . '<a href="?a=info&i=' . $user['id'] . '">Info</a>' . '</td>
                       <td>' . '<a href="?a=home&m=del&i=' . $user['id'] . '" onclick="return confirm(\'Are you sure you really want to delete user ' . $user['username'] . ' (id=' . $user['id'] . ')?\');">Delete</a>' . '</td>
            </tr>';
   }
   ?>
   </tbody>
      </table>
    </div>
</div>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
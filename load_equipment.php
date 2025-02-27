<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "config.php";

$clicked_id = $_POST['clicked_id'];
$sql1 = "SELECT e.`id`, `ext_id`, `serial_no`, `install_date`, `location`, `location_img`, `last_checked`, `cus_id` FROM `ext_customer` e WHERE e.cus_id = $clicked_id";
$conn = $GLOBALS['con'];
$result1 = mysqli_query($conn, $sql1);

$output = '<div id="equipment_section" class="card">
              <div class="card-body">
                  <div class="row m-b-30">
                      <div class="table-responsive">
                          <table class="table table-hover e-commerce-table">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>serial_no</th>
                                      <th>install_date</th>
                                      <th>location</th>
                                      <th>Owner</th>
                                      <th></th>
                                  </tr>
                              </thead>
                              <tbody>';

if (mysqli_num_rows($result1) > 0) {
    $no1 = 1;
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $output .= '<tr>
                        <td>' . $no1++ . '</td>
                        <td>' . $row1['serial_no'] . '</td>
                        <td>' . $row1['install_date'] . '</td>
                        <td>' . $row1['location'] . '</td>
                        <td>' . $row1['cus_id'] . '</td>
                        <td class="text-right">
                            <a href="maintenance.php?key=' . $row1['id'] . '" class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                <i class="anticon anticon-edit"></i>
                            </a>
                        </td>
                    </tr>';
    }
} else {
    $output .= '<tr><td class="text-center" colspan="6">No Fire Equipments here</td></tr>';
}

$output .= '</tbody>
            </table>
          </div>
      </div>
  </div>
</div>';

echo $output;
?>

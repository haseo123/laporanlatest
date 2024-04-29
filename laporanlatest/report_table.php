<?php include 'db_connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Report Table</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      border: 1px solid black;
      padding: 8px;
      text-align: center;
    }

    th {
      background-color: #f2f2f2;
    }

    .input-text {
      width: 100%;
      box-sizing: border-box;
    }

    .select-dropdown {
      width: 100%;
      box-sizing: border-box;
    }

    .readonly {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>
  <h1>Report Table</h1>
  <table id="report-table">
    <thead>
      <tr>
        <th>Location</th>
        <th>Area</th>
        <th>Zone</th>
        <th>DUN</th>
        <th>Parlimen</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $reportData = getReportData($conn);
      foreach ($reportData as $row) {
      ?>
      <tr>
        <td><input type="text" class="input-text" placeholder="<?php echo $row['Location']; ?>"></td>
        <td>
        <?php
            $conn = mysqli_connect('localhost', 'root', '');
            mysqli_select_db($conn, 'laporan');

            $sql = "SELECT Area FROM DatabaseReport"; 
            $result = mysqli_query($conn, $sql);

            echo "<select name='Area'>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<option value='" . $row['Area'] . "'>" . $row['Area'] . "</option>";
            }
            echo "</select>";

            mysqli_close($conn); // Close the database connection when done
            ?>
        </td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
  <br>
  <button onclick="window.location.href = 'insert_data.php';">Add Row</button>

</body>
</html>

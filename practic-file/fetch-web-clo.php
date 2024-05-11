<?php
include "database/config.php";
$query = "SELECT * from web_engineering_clo";
$result =  mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <style>
            .completed {
                background-color: green;
                color: white;
            }
        </style>
        <script>
            window.addEventListener('DOMContentLoaded', (event) => {
                // Get all checkboxes with class 'checkbox'
                var checkboxes = document.querySelectorAll('.checkbox');

                checkboxes.forEach(function(checkbox) {
                    // Add an event listener to each checkbox
                    checkbox.addEventListener('change', function() {
                        var td = this.parentNode.previousElementSibling;

                        if (this.checked) {
                            // Checkbox is checked
                            td.style.backgroundColor = 'green';
                            td.style.color = 'white';
                        } else {
                            // Checkbox is unchecked
                            td.style.backgroundColor = 'white';
                            td.style.color = 'black';
                        }
                    });
                });
            });
        </script>
    </head>

    <body>
        <div class="container_fluid">
            <div class="row justify-content-center bg-white">
                <div class="col-8">
                    <div class="card shadow bg-white">
                        <h5 class="card-header addheadercolor text-center">WEB ENGINEERING CLO</h5>
                        <div class="card-body bg-white p-0">
                            <table class="table table-hover table-bordered table-font">
                                <thead class="addheadercolor">
                                    <tr>
                                        <th scope="col">CLO Number</th>
                                        <th scope="col">CLO</th>
                                        <th scope="col">Content</th>
                                        <th scope="col">Mark</th>
                                    </tr>
                                </thead>
                                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tbody>
                                        <tr>
                                            <th scope="row" rowspan="20"><?php echo $row['clo_number']; ?></th>
                                            <th><?php echo $row['clo_heading']; ?></th>
                                            <td><?php echo $row['clo_content']; ?></td>
                                            <td>
                                                <input type="checkbox" class="checkbox" id="">
                                                <label for="checkbox1">Mark Completed</label>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php } ?>
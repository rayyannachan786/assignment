<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
        margin-left: 10px;
    }

    th,
    td {
        padding: 15px;
        text-align: center;
    }

    table#t01 tr:nth-child(even) {
        background-color: #eee;
    }

    table#t01 tr:nth-child(odd) {
        background-color: #fff;
    }

    table#t01 th {
        background-color: black;
        color: white;
    }
</style>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand" href="#" style="color:white">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="animals.php" style="color:white">Home</a>
                </li>
            </ul>
        </div>
    </nav>

    <h1 id="title"><b><i>Search Result</i></b></h1>
    <?php

    $connection = mysqli_connect("localhost", "root", "", 'phpcrud');
    if (isset($_POST['submit'])) {
        $find = $_POST['search'];
        $query = "SELECT * FROM animaldata where category like '%$find%' or lifeexpect like '%$find%'";
        $result = mysqli_query($connection, $query);
    ?>

        <table border=1 id='t01' width='99%' style='margin-bottom:25px;'>
            <tr>
                <th>Sr. No</th>
                <th>Name</a></th>
                <th>Category</th>
                <th>Photo</th>
                <th>Description</th>
                <th>Lifeexpect</th>
                <th>Submission</th>
                <th>Action</th>
            </tr>

            <?php
            $count = mysqli_num_rows($result);
            if ($count > 0) {
                $num = 1;
                // output data of each row
                while ($row = mysqli_fetch_array($result)) {

                    echo ("<td>" . $num . "</td>");

                    echo ("<td>" . $row['name'] . "</td>");

                    echo ("<td>" . $row['category'] . "</td>");

                    echo ("<td><img src='images/" . $row['photo'] . "'width='100' height='100'></td>");

                    echo ("<td>" . $row['description'] . "</td>");

                    echo ("<td>" . $row['lifeexpect'] . "</td>");

                    echo ("<td>" . $row['submission'] . "</td>");

                    echo ("<td><a data-toggle='modal' data-target='#del$row[id]'>
                <i class='fa fa-trash fa-fw w3-xxlarge w3-text-red' data-toggle='tooltip' data-original-title='Delete'></i></a>");

                    echo ("<a data-toggle='modal' data-target='#edit$row[id]'>
                <i class='fa fa-pencil-square-o fa-fw w3-xxlarge' data-toggle='tooltip'data-original-title='Edit'></i> </a></td></tr>");

                    $num++;
            ?>
                    <!--Delete Modal -->
                    <div id="del<?php echo $row['id']; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-sm">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-body" style="text-align:center">
                                    <?php $id = $row['id']; ?>
                                    <img src="images/a.png" width="100" height="100">
                                    <p><b>Are you sure?</b></p>
                                    <p>It will be permanently deleted</p>
                                    <form action="deleterecord.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" class="btn btn-primary">Yes delete it</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!--Edit Modal -->

                    <div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Animal Data </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php

                                // Fetch data based on id
                                $id = $row['id'];
                                $result2 = mysqli_query($connection, "select * from animaldata where id=$id");

                                while ($animal_data = mysqli_fetch_array($result2)) {

                                    $name = $animal_data['name'];
                                    $category = $animal_data['category'];
                                    $description = $animal_data['description'];
                                    $lifeexp = $animal_data['lifeexpect'];
                                    $photo = $animal_data['photo'];
                                }
                                ?>

                                <form action="editcode.php" method="POST" enctype="multipart/form-data">

                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="name">Name:</label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter book name" required="" value="<?php echo $name; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="category">Category:</label>
                                            <select class="form-control" name="category" id="category">
                                                <option selected="true" disabled="disabled">---Select Category---</option>
                                                <option value="herbivores" <?php if ($category == 'herbivores') echo ('selected ="selected"');  ?>>Herbivores</option>
                                                <option value="omnivores" <?php if ($category == 'omnivores') echo ('selected ="selected"');  ?>>Omnivores</option>
                                                <option value="carnivores" <?php if ($category == 'carnivores') echo ('selected ="selected"');  ?>>Carnivores</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="filename">Photo:</label>
                                            <input type="file" class="form-control" name="filename" id="filename" accept="image/*">
                                            <img src="images/<?php echo $photo; ?>" width="100" height="100">
                                        </div>

                                        <div class="form-group">
                                            <label for="description">Description:</label>
                                            <textarea class="form-control" rows="5" name="description" id="description"><?php echo $description; ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="lifeexp">Life expectancy:</label>
                                            <select class="form-control" name="lifeexp" id="lifeexp">
                                                <option selected="true" disabled="disabled">---Select Category---</option>
                                                <option value="0-1 year" <?php if ($lifeexp == '0-1 year') echo ('selected ="selected"');  ?>>0-1 year</option>
                                                <option value="1-5 years" <?php if ($lifeexp == '1-5 years') echo ('selected ="selected"');  ?>>1-5 years</option>
                                                <option value="5-10 years" <?php if ($lifeexp == '5-10 years') echo ('selected ="selected"');  ?>>5-10 years</option>
                                                <option value="10+ years" <?php if ($lifeexp == '10+ years') echo ('selected ="selected"');  ?>>10+ years</option>
                                            </select>
                                        </div>
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" name="edit" class="btn btn-primary">Update Data</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
        <?php
                }
            } else {
                echo "<td colspan=8>No records Found</td>";
            }
            echo "</table><br>";
        }


        ?>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

        <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('[data-toggle="tooltip"]').tooltip({
                    placement: 'bottom'
                });
            });
        </script>
</body>

</html>
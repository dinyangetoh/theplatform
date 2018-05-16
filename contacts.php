<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Contacts - ThePlateform</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css">


</head>

<body>
    <?php

// Import db configuration
require_once('./config/db.php');

// Create connection
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = 'SELECT * FROM contacts ORDER BY gender ASC';
$result = $conn->query($sql);

?>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">
                    <a class="navbar-brand" href="index.php">The Platform</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php">Home
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contacts.php">Contacts</a>
                            </li>


                        </ul>

                    </div>
                </div>
            </nav>
        </header>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Contacts</h1>
                <!-- <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p> -->
            </div>
        </div>

        <section class="container">
            <div class="row pb-3">
                <div class="col">
                    <h4>Total Contacts:
                        <?= $result->num_rows ?>
                            </h>
                </div>
                <div class="col text-right">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#add-contact">Add Contact</button>
                </div>
            </div>
            <div class="content">



                <?php 
                if($result->num_rows >0){
            ?>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>Jamb Score</th>
                            <th>***</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $index =1;
                        while($contact= $result->fetch_assoc()){
                    ?>
                        <tr>
                            <td>
                                <?= $index++ ?>
                            </td>
                            <td>
                                <?= $contact['name'] ?>
                            </td>
                            <td>
                                <?= $contact['email'] ?>
                            </td>
                            <td>
                                <?= $contact['phone'] ?>
                            </td>
                            <td>
                                <?= $contact['gender'] ?>
                            </td>
                            <td>
                                <?= $contact['jamb_score'] ?>
                            </td>
                            <td>
                                <button class="btn btn-success btn-sm">View</button>

                                <button class="btn btn-info btn-sm">Edit</button>

                                <button class="btn btn-danger btn-sm">Delete</button>

                            </td>
                        </tr>

                        <?php } ?>
                    </tbody>
                </table>

                <?php
            }else{
                
                echo "No contacts found";
            }
            ?>

            </div>
        </section>


        <!-- Modal -->
        <div class="modal fade" id="add-contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Contact</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        contact form
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <?php 
$conn->close();

?>
</body>

</html>
<?php include_once("./layouts/header.php"); ?>
<?php

// Import db configuration
require_once('./config/db.php');

// Create connection
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if(isset($_POST['new-contact'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $jamb_score = $_POST['jamb_score'];

    $sqlInsert = "INSERT INTO contacts (name, email, phone, gender, jamb_score)VALUES('$name','$email','$phone','$gender','$jamb_score')";

    if($conn->query($sqlInsert)){
        $message= "Contact inserted successfully";
        $msgClass = "success";
    }else{
        $message = "Error inserting contact";
        $msgClass = "danger";
    }

}

$sql = 'SELECT * FROM contacts ORDER BY gender ASC';
$result = $conn->query($sql);

?>



    <section class="container">

        <?php if(isset($message)){ ?>
        <div class="alert alert-<?= $msgClass ?>">
            <?= $message ?>
        </div>

        <?php } ?>

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
                    <div class="row">
                        <div class="col">

                            <form method="post" action="contacts.php">

                                <div class="form-group row">

                                    <label class="col-3">Name</label>
                                    <div class="col">
                                        <input type="text" class="form-control" name="name" placeholder="Full Name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-3">Email</label>
                                    <div class="col">
                                        <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-3">Phone</label>
                                    <div class="col">
                                        <input type="text" class="form-control" name="phone" placeholder="Phone Number" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-3">Gender</label>
                                    <div class="col">
                                        <select name="gender" class="form-control" required>
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-3">Jamb Score</label>
                                    <div class="col">
                                        <input type="number" class="form-control" min="1" max="400" name="jamb_score" placeholder="Score" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <button type="submit" name="new-contact" class="form-control btn btn-primary">Submit</button>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
                <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div> -->
            </div>
        </div>
    </div>
    <?php 
$conn->close();

?>

    <?php include_once("./layouts/footer.php"); ?>
<?php $pageHeading = "View Contact"; ?>
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

$id = $_GET['id'];


if(isset($_POST['update-contact'])){
    $name = trim($_POST['name']);
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $jamb_score = $_POST['jamb_score'];

    $sqlUpdate = "UPDATE contacts SET name='$name', email='$email', phone= '$phone', gender='$gender', jamb_score='$jamb_score' WHERE id='$id'";

    if($conn->query($sqlUpdate)){
        $message= "Contact updated successfully";
        $msgClass = "success";
    }else{
        $message = "Error updating contact". mysqli_error($conn);;
        $msgClass = "danger";
    }

}

$sql = "SELECT * FROM contacts WHERE id='$id'";

$result = $conn->query($sql);

$contact = $result->fetch_assoc();

// close connection
$conn->close();

?>
    <div class="container">

        <?php if(isset($message)){ ?>
        <div class="alert alert-<?= $msgClass ?>">
            <?= $message ?>
        </div>

        <?php } ?>
        <div class="row">
            <div class="col">
                <h4>
                    <?= $contact['name'] ?>
                </h4>
            </div>
            <div class="col text-right">

                <a href="./contacts.php" class="btn btn-success btn-sm">View All</a>



            </div>

        </div>

        <table class="table table-striped">

            <tbody>
                <tr>
                    <th>Email</th>
                    <td>
                        <?= $contact['email'] ?>
                    </td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>
                        <?= $contact['phone'] ?>
                    </td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>
                        <?= $contact['gender'] ?>
                    </td>
                </tr>
                <tr>
                    <th>Jamb Score</th>
                    <td>
                        <?= $contact['jamb_score'] ?>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="row mb-4">
            <div class="col">

            </div>
            <div class="col text-right">

                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit-contact">Edit</button>

                <button class="btn btn-danger btn-sm">Delete</button>

            </div>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="edit-contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Contact</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">

                            <form method="post" action="">

                                <div class="form-group row">

                                    <label class="col-3">Name</label>
                                    <div class="col">
                                        <input type="text" value="<?= $contact['name'] ?>" class="form-control" name="name" placeholder="Full Name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-3">Email</label>
                                    <div class="col">
                                        <input type="email" value="<?= $contact['email'] ?>" class="form-control" name="email" placeholder="Email Address" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-3">Phone</label>
                                    <div class="col">
                                        <input type="text" class="form-control" value="<?= $contact['phone'] ?>" name="phone" placeholder="Phone Number" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-3">Gender</label>
                                    <div class="col">
                                        <select name="gender" class="form-control" required>
                                            <option value="">Select Gender</option>
                                            <option value="Male" <?=( $contact[ 'gender']=="Male" )? "selected": "" ?>>Male</option>
                                            <option value="Female" <?=( $contact[ 'gender']=="Female" )? "selected": "" ?>>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-3">Jamb Score</label>
                                    <div class="col">
                                        <input type="text" value="<?= $contact['jamb_score'] ?>" class="form-control" min="1" max="400" name="jamb_score" placeholder="Score"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <button type="submit" name="update-contact" class="form-control btn btn-primary">Update</button>
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
    <?php include_once("./layouts/footer.php"); ?>
<?php $pageHeading = "Home"; ?>

<?php include_once("./layouts/header.php"); ?>

<div class="container">
    <?php
        $fruits = [
            "Orange",
            "Mango",
            "Bannana",
            "Apple",
            "Lemon"
        ];

        $contacts =[
            [
                'name' =>'David Inyangetoh',
                'email'=>'david@gmail.com',
                'phone'=>'0840950850',
                'gender'=>'Male'
            ],
            [
                'name' =>'John Doe',
                'email'=>'johndoe@gmail.com',
                'phone'=>'09040950850',
                'gender'=>'Male'
            ],
            [
                'name' =>'Ekpono Ambrose',
                'email'=>'ekpono@gmail.com',
                'phone'=>'0840950850',
                'gender'=>'Male'
            ],
            [
                'name' =>'Emem Bob',
                'email'=>'emembob@gmail.com',
                'phone'=>'08140950850',
                'gender'=>'Female'
            ]

        ];
    ?>

        <ul>
            <?php 
                foreach($fruits as $fruit){
                    echo '<li>'. $fruit.'</li>';
                }
            ?>
        </ul>

        <?= json_encode($contacts) ?>
            <hr>

            <table>
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach($contacts as $index=>$contact){
                    ?>
                    <tr>
                        <td>
                            <?= $index+1 ?>
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
                    </tr>

                    <?php } ?>
                </tbody>
            </table>
</div>

<?php include_once("./layouts/footer.php"); ?>
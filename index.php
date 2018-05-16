<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>welcome to ThePlatform </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>

<body>
    <h1>The Platform</h1>
    <hr/>
    <ul class="menu">
        <li>
            <a href="index.php">Home</a>
        </li>
        <li>
            <a href="contacts.php">Contacts</a>
        </li>
    </ul>


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


</body>

</html>
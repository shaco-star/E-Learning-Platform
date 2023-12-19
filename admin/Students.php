<?php
    include 'connection.php';
    
    $sql="select * from users WHERE userType='student'";
    $result=mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <style>
        .card{
            max-height: 100%;
            max-width: 70%;
            background: white;
            margin: 0 25px 25px 50px;
            display:flex;
            flex-direction: column;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
        }
        table{
            border-collapse: collapse;
            width: 100%;
        }
        th{
            height: 50px;
        }
        th, td {
        padding: 8px;
        text-align: left;
        }
        tr:nth-child(even) {background-color: #f2f2f2;}
        .card table td:nth-child(1) img{
            height: 35px;
            width: 35px;
        }
        .card img{
            vertical-align: middle;
            margin-right: .5rem;
        }
        a{
            text-decoration: none;
        }
        
    </style>
</head>
<body>
    <div class="card">
        <table>
            <tr>
                <th>Student name</th>
                <th>Student ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Courses</th>
            </tr>
            <?php
                while($row=mysqli_fetch_assoc($result)){
                    echo "
                    <tr>
                    <td><a href=''><img src='images/user.png'></a>Student</td>
                    <td>".$row['userId']."</td>
                    <td>".$row['userName']."</td>
                    <td>".$row['email']."</td>
                    <td>3</td>
                </tr>
                    ";
                }
            ?>
        </table>
    </div>
</body>
</html>
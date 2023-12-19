<?php
        include 'connection.php';
        
        $result=mysqli_query($conn, "select * from instructors");

        if(isset($_GET['id'])){
            $id = $_GET['id'];  
            $delete=mysqli_query($conn, "DELETE FROM instructors WHERE id=$id");
            if($delete){
                header('location:instructors.php');
                header("Refresh:0");
            }
        }
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructors</title>
    <style>
        .card{
            max-height: 100%;
            max-width: 100%;
            background: white;
            margin: 0 25px 25px 25px;
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
        .del-btn{
            margin-left: 85px;
            display: inline-block;
            margin-top: 1rem;
            padding:.8rem 3rem;
            border-radius: .5rem;
            background:#E91E63;
            color:#fff;
            cursor: pointer;
            border: none;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="card">
        <table id="table">
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>User name</th>
                <th>Email</th>
                <th>Id</th>
            </tr>

            <?php
                while($row=mysqli_fetch_assoc($result)){
                    echo "
                    <tr>
                        <td><a href=''><img src='images/user.png'><span id='first-name'></span></a>".$row['firstName']."</td>
                        <td>".$row['lastName']."</td>  
                        <td>".$row['userName']."</td>  
                        <td>".$row['email']."</td> 
                        <td>".$row['id']."</td>  
                        <td><a class='del-btn' href='Instructors.php?id=".$row['id']."'>Delete</a></td>  
                    </tr>  
                    ";
                }    
            ?> 
        </table>
    </div>
    
</body>
</html>
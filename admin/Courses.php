<?php
    include 'connection.php';
    $sql="select * from courses";
    $result=mysqli_query($conn, $sql);

        if(isset($_GET['id'])){
            $id = $_GET['id'];  
            $delete=mysqli_query($conn, "DELETE FROM Courses WHERE courseId=$id");
            if($delete){
                header('location:Courses.php');
                header("Refresh:0");
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <style>
        *{
            font-family: 'Nunito', sans-serif;
            margin:0; padding:0;
            box-sizing: border-box;
            outline: none; border:none;
            text-decoration: none;
            text-transform: capitalize;
            transition: all .2s ease-out;
        }
        html{
            font-size: 72.5%;
            overflow-x: hidden;
        }
        body{
            padding:3rem 7%;
        }
        .btn{
            display: inline-block;
            margin-top: 1rem;
            padding:.8rem 3rem;
            border-radius: .5rem;
            background:#008ea1;
            color:#fff;
            cursor: pointer;
            font-size: 1.7rem;
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
            font-size: 1.7rem;
        }
        .course{
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
        }
        .course .box{
            /* flex:1 1 30rem; */
            border-radius: 5rem;
            border: .5rem solid #008ea1;
            padding: 1rem;
            position: relative;
        }
        .course .box img{
            height: 20rem;
            width: 100%;
            border-radius:20px;
        }
        .course .box .stars i{
            color:#FFAA4A;
            font-size: 1.5rem;
            padding:1rem 0;
        }
        .course .box h3{
            color:#444;
            font-size: 1.5rem;
            padding: 2.5;
        }
        .course .icons{
            display: flex;
            justify-content: space-between;
            border-top: .1rem solid rgba(0,0,0,.1);
            margin-top: 1rem;
            padding:.5rem;
            padding-top: 1rem;
        }
        .course .icons p{
            color:#666;
            font-size: 1.3rem;
        }
        .course .icons p i{
            padding-right: .4rem;
            /* color:#FC427B; */
        }
    </style>
</head>
<body>
    <section class="course">
        <?php
            while($row=mysqli_fetch_assoc($result)){
                echo"
                <div class='box'>
                    <img src='data:image;charset=utf8;base64,".base64_encode($row['image'])."'>
                    <div class='stars'>
                        <i class='fas fa-star'></i>   
                        <i class='fas fa-star'></i>   
                        <i class='fas fa-star'></i>   
                        <i class='fas fa-star'></i>   
                        <i class='far fa-star'></i>    
                    </div>
                    <h3>".$row['courseName']."</h3>
                    <button class='btn'>Learn more</button>
                    <a class='del-btn' href='Courses.php?id=".$row['courseId']."'>Delete</a>
                    <div class='icons'>
                        <p> <i class='far fa-clock'></i> 4 hours </p>
                        <p> <i class='far fa-calendar'></i> 3 months </p>
                        <p> <i class='fas fa-book'></i> 8 modules </p>
                    </div>
                </div>
                ";
            }
        ?>
    </section>
    
</body>
</html>
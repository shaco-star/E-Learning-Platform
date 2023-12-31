<?php
    include 'connection.php';

    $instructorsResult = mysqli_query($conn,"select firstName from instructors");
    $num_Instructors = mysqli_num_rows($instructorsResult);

    $coursesResult = mysqli_query($conn,"select courseId from Courses");
    $num_Courses = mysqli_num_rows($coursesResult);

    $studentsResult=mysqli_query($conn,"select userId from users WHERE userType='student'");
    $num_Students=mysqli_num_rows($studentsResult);

    $newStudents=mysqli_query($conn, "SELECT * FROM students ORDER BY studentId DESC LIMIT 4");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body{
            min-height: 100vh;
        }
        a{
            text-decoration: none;
            color: inherit;
        }
        li{
            list-style: none;
        }
        h1,h2{
            color: #444;  
        }
        h3{
            color: #999;
        }
        .btn{
            background: #008ea1;
            color: white;
            padding: 5px 10px;
            text-align: center;
            font-weight: 600;
        }
        .btn :hover{
            color: #008ea1;
            background-color: white;
            padding: 3px 8px;
            border: 2px solid #008ea1;
        }
        .side-menu{
            position: fixed;
            background: #008ea1;
            width: 20vw;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .side-menu .brand-name{
            height: 10vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .side-menu li{
            font-size: 24px;
            padding: 10px 40px;
            color: white;
            display: flex;
            align-items: center;

        }
        .side-menu li:hover{
            background:white;
            color: #008ea1;
        }
        .container{
            position:absolute;
            right: 0;
            width: 80vw;
            height: 100vh;
            background: #f1f1f1;
        } 
        .container .header{
            position: fixed;
            top: 0;
            right: 0;
            width: 80vw;
            height: 10vh;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            z-index: 1;
        }
        .container .header .nav{
            width: 90%;
            display: flex;
            align-items: center;   
        }
        .container .header .nav .search{
            flex: 3;
            display: flex;
            justify-content: center;
        }
        .container .header .nav .search input[type=text]{
            border: none;
            background: #f1f1f1;
            padding: 10px;
            width: 50%;
        }
        .container .header .nav .search button{
            width: 40px;
            height: 40px;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center; 
        }
        .container .header .nav .search button img{
            width: 30px;
            height: 30px;   
        }
        .container .header .nav .user{
            flex: .5;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .container .header .nav .user img{
            width: 40px;
            height: 40px; 
        }
        .container .header .nav .user .img-case{
            position: relative;
            width: 50px;
            height: 50px; 
        }
        .container .header .nav .user .img-case img{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        .container .content{
            position: relative;
            margin-top: 10vh ;
            min-height: 90;
            background: #f1f1f1;
        }
        .container .content .cards{
            padding: 20px 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .container .content .cards .card{
            width: 250px;
            height: 150px;
            background: white;
            margin: 20px 10px; 
            display: flex;
            align-items: center;
            justify-content: space-around;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
        }
        .container .content .content-2{
            min-height: 60vh;
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            flex-wrap: wrap;
        }
        .container .content .content-2 .recent-payments{
            min-height: 50vh;
            flex: 5;
            background: white;
            margin: 0 25px 25px 25px;
            display:flex;
            flex-direction: column;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
            
        }
        .container .content .content-2 .new-students{
            flex: 2;
            background: white;
            min-height: 50vh;
            margin: 0 25px;
            flex-direction: column;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
        }
        .container .content .content-2 .new-students table td:nth-child(1) img{
            height: 40px;
            width: 40px;
        }
        .title{
            display: flex;
            color: #008ea1;
            align-items: center;
            justify-content: space-around;
            padding: 15px 10px;
            border-bottom: 2px solid #999;
        }
        table, th, td {
        padding: 8px;
        text-align: left;
        }
        .container .header .nav .user .center{
            position: absolute;
            top: 50%;
            left: 75%;
            transform: translate(-50%, -50%);
        }
        .container .header .nav .user .center button{
            padding: 10px 20px;
            font-size: 15px;
            font-weight: 600;
            color: #fff;
            border: none;
            outline: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .container .header .nav .user .popup{
            position: absolute;
            top: -150%;
            left: 39%;
            opacity: 0;
            transform: translate(-50%, -50%) scale(1.25);
            width: 460px;
            height: 730px;
            padding: 20px 30px;
            background: #fff;
            box-shadow: 2px 2px 5px 5px rgba(0, 0, 0, 0.15);
            border-radius: 10px;
            transition: top 0ms ease-in-out 200ms,
                        opacity 200ms ease-in-out 0ms,
                        transform 200ms ease-in-out 0ms;
        }
        .container .header .nav .user .popup.active{
            left: 39%;
            top: 500%;
            opacity: 1;
            transform: translate(-50%, -50%) scale(1);
            transition: top 0ms ease-in-out 0ms,
                        opacity 200ms ease-in-out 0ms,
                        transform 200ms ease-in-out 0ms;
        }
        .container .header .nav .user .popup .close-btn{
            position: absolute;
            top: 10px;
            right: 10px;
            width: 15px;
            height: 15px;
            background: #888;
            color: #eee;
            text-align: center;
            line-height: 15px;
            border-radius: 15px;
            cursor: pointer;  
        }
        .container .header .nav .user .popup .form h2{
            text-align: center;
            margin: 10px 0px 20px;
            font-size: 25px;
        }
        .container .header .nav .user .popup .form form .form-element{
            margin: 8px 0px;
        }
        .container .header .nav .user .popup .form form .form-element label{
            font-size: 14px;
            color: #222;
        }
        .container .header .nav .user .popup .form form .form-element input[type="text"], input[type="password"]{
            margin-top: 15px;
            display: block;
            width: 100%;
            padding: 20px;
            outline: none;
            border: 1px solid #aaa;
            border-radius: 5px;
        }
        .container .header .nav .user .popup .form form .form-element button{
            width: 100%;
            height: 40px;
            border: none;
            outline: none;
            background: #008ea1 ;
            color: #fff;
        }   
    </style>
</head>
<body>
    <div class="side-menu">
        <div class="brand-name">
            <h1>Online Courses </h1>
        </div>
        <ul>
            <li><img src="images/dashboard (2).png" alt="">&nbsp;<a href="">Dashboard</a> </li>
            <li><img src="images/reading-book (1).png" alt="">&nbsp;<a href="Students.php">Students</a> </li>
            <li><img src="images/instructor.png" alt="">&nbsp; <a href="Instructors.php">Instructors</a></li>
            <li><img src="images/courses-32.png" alt="">&nbsp; <a href="Courses.php">Courses</a></li>
        </ul>
    </div>
    <div class="container">
        <div class="header">
            <div class="nav">
                <div class="search">
                    <input type="text" placeholder="Search...">
                    <button type="submit"><img src="images/search.png" alt=""></button>
                </div>
                <div class="user">
                    <div class="center">
                        <button class="btn" id="Add-new" style="border: none;">Add&nbsp;New</button>
                    </div>
                    <div class="popup">
                        <div class="close-btn">&times;</div>
                        <div class="form">
                            <form action="addInstructor.php" id="form" method="post">
                                <h2>Add instructor</h2>
                                <div class="form-element">
                                    <label for="id">Id: </label>
                                    <input type="text" id="id" name="id" placeholder="ID">
                                </div>
                                <div class="form-element">
                                    <label for="firstName">First name: </label>
                                    <input type="text" id="firstName" name="firstName" placeholder="First name">
                                </div>
                                <div class="form-element">
                                    <label for="lastName">Last name: </label>
                                    <input type="text" id="lastName" name="lastName" placeholder="Last name">
                                </div>
                                <div class="form-element">
                                    <label for="userName">User name: </label>
                                    <input type="text" id="userName" name="userName" placeholder="User name">
                                </div>
                                <div class="form-element">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" name="email" placeholder="example@gmail.com">
                                </div>
                                <div class="form-element">
                                    <label for="password">Password: </label>
                                    <input type="password" id="password" name="password" placeholder="********">
                                </div>
                                <div class="form-element" id="form">
                                    <button class = "btn" type="submit" name="submit" id="form">Add</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                    <img src="images/notifications.png" alt="">
                    <div class="img-case">
                        <img src="images/user.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h1><?php echo $num_Students;?></h1>
                        <h3>Students</h3> 
                    </div>
                    <div class="icon-case">
                        <img src="images/student image.jpg" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1><?php echo $num_Instructors;?></h1>
                        <h3>Instructors</h3> 
                    </div>
                    <div class="icon-case">
                        <img src="images/teachers image.jpg" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1><?php echo $num_Courses;?></h1>
                        <h3>Courses</h3> 
                    </div>
                    <div class="icon-case">
                        <img src="images/courses image.jpg" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>0</h1>
                        <h3>Total Income</h3> 
                    </div>
                    <div class="icon-case">
                        <img src="images/income image.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>Recent Payments</h2>
                        <a href="" class="btn">View All</a>
                    </div>
                    <table>
                        <tr>
                            <th>Student</th>
                            <th>Courses</th>
                            <th>Total Payments</th>
                        </tr>
                        <tr>
                            <td>student</td>
                            <td>courses</td>
                            <td>$0</td>
                            <td><a href="" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>student</td>
                            <td>courses</td>
                            <td>$0</td>
                            <td><a href="" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>student</td>
                            <td>courses</td>
                            <td>$0</td>
                            <td><a href="" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>student</td>
                            <td>courses</td>
                            <td>$0</td>
                            <td><a href="" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>student</td>
                            <td>courses</td>
                            <td>$0</td>
                            <td><a href="" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>student</td>
                            <td>courses</td>
                            <td>$0</td>
                            <td><a href="" class="btn">View</a></td>
                        </tr>
                    </table>
                </div>
                <div class="new-students">
                    <div class="title">
                        <h2>New Students</h2>
                        <a href="Students.html" class="btn">View All</a>
                    </div>
                    <table>
                        <?php
                            while($row=mysqli_fetch_assoc($newStudents)){
                                echo "
                                <tr>
                                    <td><img src='images/user.png'></td>
                                    <td>".$row['studentName']."</td>
                                </tr>
                                ";
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>    
    </div>
<script>
    document.querySelector("#Add-new").addEventListener("click", function(){
        document.querySelector(".container .header .nav .user .popup").classList.add("active");
    });
    document.querySelector(".container .header .nav .user .popup .close-btn").addEventListener("click", function(){
        document.querySelector(".container .header .nav .user .popup").classList.remove("active");
    });
</script>
</body>
</html>
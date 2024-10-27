<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Добро пожаловать в OurElephant!</title>
    </head>
    <body>
        <?php

            $localhost = "localhost"; //параметры для подключения к базе данных MySQL
            $root = "root";
            $passwordCon = "HelloThere1234";
            $database = "OurElephant";

            $conn = new mysqli($localhost, $root, $passwordCon, $database);//подкключаемся к бд

            if($conn->connect_error){//проверяем возможные ошибки при подключении
                die("Ошибка: " . $conn->connect_error);
            }

            if(isset($_POST["addRemark"]) and isset($_POST["nameUs"])){//если пользователь отправил отзыв об ученике
    
                $remark = $_POST["addRemark"];
                $user = $_POST["nameUs"];

                session_start();
                $teach = $_SESSION["name"];
                $subject = $_SESSION["subject"];

                $add_rem = "INSERT INTO feedback(teacher, subject, user, remark) VALUES('$teach', '$subject', '$user', '$remark')";

                if($result = $conn->query($add_rem, MYSQLI_STORE_RESULT)){
                    echo "Отзыв успешно добавлен";
                }
                else{
                    echo "Упс, что-то пошло не так(";
                }
            }

            if(isset($_POST["checkRemarks"])){

                $user = $_POST["checkRemarks"];

                $show_rem = "SELECT * FROM feedback WHERE user = '$user'";

                if($result = $conn->query($show_rem, MYSQLI_STORE_RESULT)){

                    echo "<p><h2>Отзывы учителей об ученике $user</h2></p>";

                    foreach($result as $res){
                        echo "<article>";
                            echo "<p><h3>Отзыв:</h3></p>";
                            echo "<p>";
                                echo $res["remark"];
                            echo "</p>";
                            echo "<p>";
                                echo "<h3>Учитель:  </h3>".$res["teacher"];
                            echo "</p>";
                            echo "<p>";
                                echo "<h3>Предмет:  </h3>".$res["subject"];
                            echo "</p>";
                        echo "</article>";
                    }
                }
                else{
                    echo "Упс, возникла какая-то ошибка :(";
                }

            }

            for($i = 0; $i < 5; $i++){
                $del = "del".$i;
                if(isset($_POST[$del])){

                    session_start();
                    $remarks = $_SESSION["remarks"];

                    $del_obj = $remarks[$i];

                    $del_rem = "DELETE FROM feedback WHERE remark='$del_obj'";

                    if($result = $conn->query($del_rem, MYSQLI_STORE_RESULT)){
                        echo "Отзыв успешно удалён";
                    }
                    else{
                        echo "Что-то пошло не так :(";
                    }
                }
            }

            $conn->close();
        ?>
    </body>
</html>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Добавление нового пользователя</title>
    </head>
    <body>
        <?php

            $pass_and_log = ["passwords"=>[], "logins"=>[]]; //массив всех уже занятых логинов и паролей, пробежимся по ним, чтобы не допустить дублирования
            
            $localhost = "localhost"; //параметры для подключения к базе данных MySQL
            $root = "root";
            $passwordCon = "HelloThere1234";
            $database = "OurElephant";

            $conn = new mysqli($localhost, $root, $passwordCon, $database);//подключаемся к бд

            if($conn->connect_error){//проверяем возможные ошибки при подключении
                die("Ошибка: " . $conn->connect_error);
            }

            $sel1 = "SELECT login, password FROM admins"; //создаём три запроса для того, чтобы собрать все существующие пароли и логины со всех бд
            $sel2 = "SELECT login, password FROM teachers";
            $sel3 = "SELECT login, password FROM users";

            if($res1 = $conn->query($sel1, MYSQLI_STORE_RESULT)){ 
                foreach($res1 as $rs){
                    $pass_and_log["passwords"][] = $rs["password"];//добавляем все пароли и логины из таблицы админов в общий массив
                    $pass_and_log["logins"][] = $rs["login"];
                }
            }

            if($res2 = $conn->query($sel2, MYSQLI_STORE_RESULT)){ 
                foreach($res2 as $rs){
                    $pass_and_log["passwords"][] = $rs["password"];//добавляем все пароли и логины из таблицы учителей в общий массив
                    $pass_and_log["logins"][] = $rs["login"];
                }
            }

            if($res3 = $conn->query($sel3, MYSQLI_STORE_RESULT)){ 
                foreach($res3 as $rs){
                    $pass_and_log["passwords"][] = $rs["password"];//добавляем все пароли и логины из таблицы учеников в общий массив
                    $pass_and_log["logins"][] = $rs["login"];
                }
            }

            if(isset($_POST["loginA"]) and isset($_POST["passwordA"]) and isset($_POST["nameA"]) and isset($_POST["phoneA"])){ //обработка запроса на добавление нового админа
                
                $name = $_POST["nameA"];
                $phone = $_POST["phoneA"];
                $login = $_POST["loginA"];
                $password = $_POST["passwordA"];

                if(in_array($password, $pass_and_log["passwords"]) or in_array($login, $pass_and_log["logins"])){//если текущие пароль или логин уже существуют, выведем ошибку
                    echo "Пользователь с таким логином или паролем уже зарегестрирован, пожалуйста, введите оригинальные пароль и логин";
                }
                else{

                    //запрос, чтобы добавить нового админа в таблицу
                    $addAdmin = "INSERT INTO admins (login, password, telephone, name) VALUES ('$login', '$password', '$phone', '$name')";
                    
                    if($conn->query($addAdmin)){//выполняем запрос
                        echo "Новый администратор успешно добавлен";//если успешно, выводим сообщение
                    }
                    else{//если не успешно, выводим сообщенние об ошибке
                        echo "Ошибка: ". $conn->error;
                    }
                }

            }

            if(isset($_POST["loginT"]) and isset($_POST["nameT"]) and isset($_POST["subject"]) and isset($_POST["passwordT"])){

                $name = $_POST["nameT"];
                $subject = $_POST["subject"];
                $login = $_POST["loginT"];
                $password = $_POST["passwordT"];

                if(in_array($password, $pass_and_log["passwords"]) or in_array($login, $pass_and_log["logins"])){
                    echo "Пользователь с таким логином или паролем уже зарегестрирован, пожалуйста, введите оригинальные пароль и логин";
                }
                else{

                    //запрос, чтобы добавить нового преподавателя в таблицу
                    $addTeacher = "INSERT INTO teachers (login, password, subject, name) VALUES ('$login', '$password', '$subject', '$name')";
                    
                    if($conn->query($addTeacher)){//выполняем запрос
                        echo "Новый преподаватель успешно добавлен";//если успешно, выводим сообщение
                    }
                    else{//если не успешно, выводим сообщенние об ошибке
                        echo "Ошибка: ". $conn->error;
                    }
                }
            }

            if(isset($_POST["loginU"]) and isset($_POST["passwordU"]) and isset($_POST["class"]) and isset($_POST["nameU"])){

                $name = $_POST["nameU"];
                $class = $_POST["class"];
                $password = $_POST["passwordU"];
                $login = $_POST["loginU"];

                if(in_array($password, $pass_and_log["passwords"]) or in_array($login, $pass_and_log["logins"])){
                    echo "Пользователь с таким логином или паролем уже зарегестрирован, пожалуйста, введите оригинальные пароль и логин";
                }
                else{

                    $addPadawan = "INSERT INTO users (login, password, name, class) VALUES ('$login', '$password', '$name', '$class')";

                    if($conn->query($addPadawan)){
                        echo "Новый ученик успешно добавлен";//если успешно, выводим сообщение
                    }
                    else{//если не успешно, выводим сообщенние об ошибке
                        echo "Ошибка: ". $conn->error;
                    }
                }
            }

            $conn->close();
        ?>
    </body>
</html>
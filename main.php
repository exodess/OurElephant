<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>OurElephant</title>
    </head>
    <body>
        <?php

            require __DIR__ . '/funcs.php'; //подключаем файл с функциями

            $login = "NotDef";
            $password = "NotDef";
            $isAdmin = false; //С помощью этих переменных поймём, кто вошёл - админ, учитель или ученик
            $isTeacher = false;//В зависимости от того, кто зайдёт, страницы будут различаться
            $isPadawan = false;

            if(isset($_POST["login"]) and isset($_POST["password"])){ //принимаем post-запрос логина и пароля, post - так как для конфиденциальных данных он предпочтительнее
                $login = $_POST["login"];
                $password = $_POST["password"];
            }

            $localhost = "localhost"; //параметры для подключения к базе данных MySQL
            $root = "root";
            $passwordCon = "HelloThere1234";
            $database = "OurElephant";

            $conn = new mysqli($localhost, $root, $passwordCon, $database);//подкключаемся к бд

            if($conn->connect_error){//проверяем возможные ошибки при подключении
                die("Ошибка: " . $conn->connect_error);
            }

            //По очереди выполним запросы в базы данных, где хранятся данные об админах, учениках и учителях, ищем совпадения и понимаем, что за кадр перед нами)
            $selectA = "SELECT * FROM admins WHERE login = '$login' AND password = '$password'"; //Запрос в БД админов
            $selectT = "SELECT * FROM teachers WHERE login = '$login' AND password = '$password'"; //запрос в БД учителей
            $selectU = "SELECT * FROM users WHERE login = '$login' AND password = '$password'"; //запрос в БД учеников

            if($result = $conn->query($selectA, MYSQLI_STORE_RESULT)){ //проверяем, есть ли пользователь с нужными нам логином и паролем в админской бд
                if($result->num_rows > 0){
                    $isAdmin = true;//если находим, то отмечаем, что работаем с учителем
                }
            }

            if($isAdmin == false and $result = $conn->query($selectT, MYSQLI_STORE_RESULT)){//проверяем, является ли пользователь учителем
                if($result->num_rows > 0){

                    $isTeacher = true;//если находим, то отмечаем, что работаем с учителем

                    foreach($result as $res){

                        session_start();

                        $name = $res["name"];
                        $subject = $res["subject"];

                        $_SESSION["name"] = $name;
                        $_SESSION["subject"] = $subject;

                        echo<<<HTML

                        <style>
                            @keyframes shadow{
                                from{
                                    box-shadow: 2px 2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.4), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4),
                                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.4), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4);
                                }
                                3%{
                                    box-shadow: 2px 1px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.4), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4),
                                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.4), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4);
                                }
                                6%{
                                    box-shadow: 2px 0px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.4), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4),
                                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.4), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4);
                                }
                                9%{
                                    box-shadow: 2px -1px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.4), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4),
                                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.4), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4);
                                }
                                13%{
                                    box-shadow: 2px -2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.4), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4),
                                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.4), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4);
                                }
                                16%{
                                    box-shadow: 1.66px -2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.4), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4),
                                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.4), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4);
                                }
                                19%{
                                    box-shadow: 1.33px -2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.4), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4),
                                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.4), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4);
                                }
                                22%{
                                    box-shadow: 1px -2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.4), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4),
                                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.4), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4);
                                }
                                25%{
                                    box-shadow: 0.66px -2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.4), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4),
                                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.4), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4);
                                }
                                28%{
                                    box-shadow: 0.33px -2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.4), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4),
                                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.4), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4);
                                }
                                31%{
                                    box-shadow: 0px -2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.4), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4),
                                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.4), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4);
                                }
                                34%{
                                    box-shadow: -0.33px -2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.4), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4),
                                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.4), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4);
                                }
                                37%{
                                    box-shadow: -0.66px -2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.4), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4),
                                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.4), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4);
                                }
                                40%{
                                    box-shadow: -1px -2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.4), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4),
                                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.4), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4);
                                }
                                43%{
                                    box-shadow: -1.33px -2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.4), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4),
                                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.4), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4);
                                }
                                46%{
                                    box-shadow: -1.66px -2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.4), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4),
                                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.4), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4);
                                }
                                50%{
                                    box-shadow: -2px -2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.4), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4),
                                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.4), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4);
                                }
                                53%{
                                    box-shadow: -2px -1px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.4), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4),
                                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.4), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4);
                                }
                                56%{
                                    box-shadow: -2px 0px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.4), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4),
                                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.4), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4);
                                }
                                59%{
                                    box-shadow: -2px 1px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.4), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4),
                                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.4), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4);
                                }
                                62%{
                                    box-shadow: -2px 2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.4), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4),
                                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.4), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4);
                                }
                                65%{
                                    box-shadow: -1.66px 2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.4), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4),
                                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.4), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4);
                                }
                                69%{
                                    box-shadow: -1.33px 2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.4), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4),
                                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.4), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4);
                                }
                                72%{
                                    box-shadow: -1px 2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.4), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4),
                                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.4), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4);
                                }
                                75%{
                                    box-shadow: -0.66px 2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.4), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4),
                                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.4), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4);
                                }
                                78%{
                                    box-shadow: -0.33px 2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.4), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4),
                                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.4), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4);
                                }
                                81%{
                                    box-shadow: 0px 2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.4), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4),
                                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.4), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4);
                                }
                                84%{
                                    box-shadow: 0.33px 2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.4), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4),
                                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.4), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4);
                                }
                                87%{
                                    box-shadow: 0.66px 2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.4), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4),
                                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.4), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4);
                                }
                                90%{
                                    box-shadow: 1px 2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.4), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4),
                                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.4), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4);
                                }
                                93%{
                                    box-shadow: 1.33px 2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.4), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4),
                                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.4), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4);
                                }
                                96%{
                                    box-shadow: 1.66px 2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.4), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4),
                                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.4), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4);
                                }
                                to{
                                    box-shadow: 2px 2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.4), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4),
                                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.4), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.4);
                                }
                            }

                            .flex1{
                                display: flex;
                                flex-direction: row;
                                flex-wrap: wrap;
                                justify-content: space-around;

                            }

                            *{
                                box-sizing: border-box;
                                margin: 0;
                                padding: 0;
                            }
                            body{
                                display: flex;
                                flex-direction: column;
                                
                                background-image: url(img/img.jpg);
                                background-size: cover;
                                font-family:'Courier New', Courier, monospace;
                                color: white;
                            }
                            h2{text-align: center;
                            padding-bottom: 10px;}
                            .div1{
                                display: flex;
                                flex-direction: row;
                                flex-wrap: wrap;

                                justify-content: space-around;
                            }
                            .div2{
                                display: flex;
                                flex-direction: row;
                                flex-wrap: wrap;

                                justify-content: space-around;
                            }

                            article{
                                border: 2px solid black;
                                border-radius: 10px;
                                margin: 5px;
                                padding: 10px;

                                background-color: rgb(0, 0, 0, 0.5);
                                font-size: 18px;
                            }
                            .item-article1{
                                text-align: center;
                                width: 30%;
                                min-width: 400px;
                            }
                            .item-article1 form{
                                width: 100%;
                                height: 10em;
                                display: flex;
                                flex-direction: column;
                                justify-content: space-around;
                            }
                            .item1{
                                width: 50%;
                                height: 4em;
                                border: 0px solid black;
                                border-radius: 15px;
                                text-align: center;
                            }
                            .input{
                                background-color: white;
                                opacity: 0.9;
                                border: 0;
                            }
                            .input:hover{
                                transform: scale(1.05);
                                box-shadow: 2px 2px 1px 1px rgba(0, 105, 161, 0.4), -2px -2px 1px 1px rgb(0, 105, 161, 0.4),
                                -2px 2px 1px 1px rgb(0, 105, 161, 0.4), 2px -2px 1px 1px rgb(0, 105, 161, 0.4);
                            }
                            .input:focus{
                                transform: scale(1);
                                opacity: 1;
                                outline-width: 0;
                                animation-name: shadow;
                                animation-duration: 0.85s;
                                animation-iteration-count: infinite;
                            }
                            .button-accept{
                                padding: 7px;
                                width: 12em;
                                font-size: 15px;
                                background-color: black;
                                color: white;
                                border: 1px solid black;
                                border-radius: 12px 1px 12px 1px;
                                align-self: flex-end;
                            }
                            .button-accept:hover{
                                transform: scale(1.05);
                                background-color: rgb(43, 43, 43);

                            }
                            .button-accept:active{
                                transform: scale(0.96);
                                background-color: rgb(43, 43, 43);
                            }
                            .item-article2{
                                width: 60%;
                                min-width: 400px;
                            }
                            .item2{
                                border: 2.5px solid black;
                                width: 80%;
                                border-radius: 10px;

                                padding: 5px;

                                background-color: rgb(0, 0, 0, 0.6);
                                opacity: 0.9;

                                font-size: 20px;
                            }
                            .item2:hover{
                                box-shadow: 2px 2px 1px 1px rgba(0, 105, 161, 0.4), -2px -2px 1px 1px rgb(0, 105, 161, 0.4),
                                -2px 2px 1px 1px rgb(0, 105, 161, 0.4), 2px -2px 1px 1px rgb(0, 105, 161, 0.4);
                                border-bottom: 2.5px solid rgba(0, 105, 161, 0.4);
                            }
                            .item-article3{
                                width: 60%;
                                
                            }

                            .item-article3 button{
                                font-size: 15px;
                                padding: 10px;
                                position: relative;
                                top: 16em;
                                left: 80%;

                                width: 10em;
                                background-color: black;
                                color: white;

                                border: 0;
                                border-radius: 12px 1px 12px 1px;;
                            }

                            .item-article3 button:hover{
                                transform: scale(1.05);
                                background-color: rgb(43, 43, 43);
                            }

                            .item-article3 button:active{
                                transform: scale(0.96);
                                background-color: rgb(43, 43, 43);
                            }

                            .item-article4{
                                width: 30%;
                                padding: 10px;
                                min-width: 400px;
                            }

                            .table{
                                min-width: 835px;
                                font-size: 10;
                                padding: 10px;
                                padding-bottom: 80px;
                            }
                            .table td{
                                max-width: 200px;
                            }

                            .table input{
                                width: 1.3em;
                                text-align: center;
                                padding-right: 2px;
                            }

                            tr{
                                padding-bottom: 5px;
                                margin-bottom: 5px;
                            }
                            .tr td{
                                outline-width: 1px solid black;
                                margin: 0;
                                padding: 0;
                            }

                            .data{
                                border: 0; 
                                border-radius: 5px;
                            }

                            .data:hover{
                                transform: scale(1.05);
                                box-shadow: 2px 2px 1px 1px rgba(0, 105, 161, 0.4), -2px -2px 1px 1px rgb(0, 105, 161, 0.4),
                                -2px 2px 1px 1px rgb(0, 105, 161, 0.4), 2px -2px 1px 1px rgb(0, 105, 161, 0.4);
                            }

                            .data:focus{
                                outline-width: 0;
                                box-shadow: 2px 2px 1px 1px rgba(0, 105, 161, 0.4), -2px -2px 1px 1px rgb(0, 105, 161, 0.4),
                                -2px 2px 1px 1px rgb(0, 105, 161, 0.4), 2px -2px 1px 1px rgb(0, 105, 161, 0.4);
                            }

                            textarea{
                                width: 100%;
                                font-size: 16px;
                                height: 13em;
                                max-width: 100%;
                                min-width: 50%;

                                max-height: 21em;
                                min-height: 13em;

                                border: 0;
                                border-radius: 15px;
                                padding: 10px;
                                margin-bottom: 0.8em;
                            }
                            textarea:hover{
                                transform: scale(1.03);
                                box-shadow: 2px 2px 1px 1px rgba(0, 105, 161, 0.4), -2px -2px 1px 1px rgb(0, 105, 161, 0.4),
                                -2px 2px 1px 1px rgb(0, 105, 161, 0.4), 2px -2px 1px 1px rgb(0, 105, 161, 0.4);
                            }
                            textarea:focus{
                                outline-width: 0;
                                transform: scale(1);
                                animation: shadow 0.85s infinite;
                            }

                            .kon{
                                display: flex;
                                flex-direction: column;
                                align-items: center;
                            }
                            .kon input{
                                border: 0;
                                border-radius: 15px;
                                width: 12em;
                                height: 4em;
                                padding: 10px;
                                margin-bottom: 1.3em;
                            }
                            .kon input:hover{
                                transform: scale(1.05);
                                box-shadow: 2px 2px 1px 1px rgba(0, 105, 161, 0.4), -2px -2px 1px 1px rgb(0, 105, 161, 0.4),
                                -2px 2px 1px 1px rgb(0, 105, 161, 0.4), 2px -2px 1px 1px rgb(0, 105, 161, 0.4);
                            }

                            .kon input:focus{
                                outline-width: 0;
                                transform: scale(1);
                                animation: shadow 0.85s infinite;
                            }

                            .kon2 {
                                width: 100%;
                                display: flex;
                                justify-content: space-between;
                            }
                            .kon2 button{
                                width: 10em;
                                height: 4em;
                                border: 0;
                                border-radius: 12px 1px 12px 1px;
                                background-color: black;
                                color: white;
                                font-size: 15px;
                                padding: 5px;
                            }
                            .kon2 button:hover{
                                transform: scale(1.05);
                                background-color: rgb(43, 43, 43);
                            }
                            .kon2 button:active{
                                transform: scale(0.96);
                                background-color: rgb(43, 43, 43);
                            }
                        </style>

                        <form>
                            <h2>Отправить отзыв об ученике</h2>
                            <p><textarea name="addRemark" id="addRemark">Введите отзыв об ученике</textarea></p>
                            <p><input type="text" placeholder="Введите имя ученика" name="nameUs" id="nameUs"/></p>
                            <p>
                                <button type="submit" formmethod="POST" formaction="remark.php">Отправить отзыв</button>
                                <button type="reset">Удалить отзыв</button>
                            </p>
                        </form>

                        <form>
                            <h2>Выставить оценку</h2>
                        </form>

                        <div class="div1">
                            <article class="item-article1">
                                <h2>Посмотреть отзывы об ученике</h2>
                                <form>
                                    <input class="item1 input" type="text" placeholder="Введите имя ученика" name="checkRemarks" id="checkRemarks" autocomplete="off" required />
                                    <button class="button-accept" type="submit" formmethod="POST" formaction="Remark.php">Посмотреть отзывы об ученике</button>
                                </form>
                            </article>
                        </div>
                        
                        <div class="div1">
                            <article class="item-article2">
                                <h2>Ваши последние отзывы</h2>
                            </article>
                        </div>

                        HTML;

                        $last_remarks = "SELECT remark, user FROM feedback WHERE teacher = '$name'";

                        if($check_rem = $conn->query($last_remarks, MYSQLI_STORE_RESULT)){

                            $count = 0;

                            $_SESSION["remarks"] = [];

                            foreach($check_rem as $rem){

                                $_SESSION["remarks"][] = $rem["remark"];

                                echo '<div class="div1">';
                                    echo '<article class="item-article2">';
                                        echo '<div class="flex">';
                                            echo '<form class="flex1">';
                                                echo '<div class="item2">';
                                                    echo '<p><h3>Отзыв:</h3></p>';
                                                    echo '<p>';
                                                        echo $rem["remark"];
                                                    echo '</p>';
                                                    echo '<p><h3>Кому:</h3></p>';
                                                    echo '<p>';
                                                        echo $rem["user"];
                                                    echo '</p>';
                                                echo '</div>';
                            
                                                echo '<button class="button-accept" type="submit" name="del'.$count.'" formmethod="POST" formaction="Remark.php" style="width: 5em; height: 5em; align-self: center;">Удалить отзыв</button>';
                                            echo '</form>';
                                        echo '</div>';
                                    echo '</article>';
                                echo '</div>';

                                /*echo "<article class='item-article1'>";
                                    echo "<p><h3>Отзыв:</h3></p>";
                                    echo "<p>";
                                        echo $rem["remark"];
                                    echo "</p>";
                                    echo "<p><h3>Кому:</h3></p>";
                                    echo "<p>";
                                        echo $rem["user"];
                                    echo "</p>";
                                    //echo<<<HTML
                                    echo "<form>";
                                        echo '<button type="submit" formaction="remark.php" formmethod="POST" name="del'.$count.'">Удалить отзыв</button>';
                                    echo "</form>";
                                    //HTML;
                                echo "</article>";*/

                                $count++;
                                if($count > 3){
                                    break;
                                }
                            }
                        }
                    }
                }
            }

            if($isAdmin == false and $isTeacher == false and $result = $conn->query($selectU, MYSQLI_STORE_RESULT)){//ищем пользователя в бд учеников
                if($result->num_rows > 0){

                    $isPadawan = true; //если находим, то отмечаем, что работаем с учеником

                    foreach($result as $res){

                        $name = $res["name"];

                        $show_rem = "SELECT * FROM feedback WHERE user = '$name'";

                        if($result = $conn->query($show_rem, MYSQLI_STORE_RESULT)){

                            echo "<p><h2>Отзывы учителей о вас</h2></p>";

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

                        echo<<<HTML

                        <div height="150" width="300">
                            <canvas id="myChart"></canvas>
                        </div>
                            
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                            
                        <script>

                            const labels = ["История", "Физика", "Математика", "Русский язык", "Информатика", "Химия"];

                            const data = {
                                labels: labels,
                                datasets: [
                                    {
                                        label: "Средние баллы по предметам",
                                        backgroundColor: [
                                            '#fc1254',
                                            '#fc8b12',
                                            '#e5fc12',
                                            '#64fc12',
                                            '#12fcc5',
                                            '#1283fc',
                                            '#5812fc',
                                            '#be12fc',
                                            '#fc12e5',
                                            '#d4d4d4',
                                            '#c87b91',
                                            '#3dfc12',
                                        ],
                                        borderColor: 'rgb(255, 99, 132)',
                                        data: [4, 5, 5, 4, 5, 4],
                                    },
                                ]
                            };

                            const config = {
                                type: 'bar',
                                data: data,
                                options: {
                                    responsitive: true,
                                    indexAxis: 'y',
                                    plugins: {
                                        legend:{
                                            display: true,
                                            position: 'bottom',
                                        },
                                        title:{
                                            display: true,
                                            text: 'Ваша успеваемость',
                                        }
                                    }
                                }
                            };
                                
                            const ctx = document.getElementById('myChart').getContext('2d');

                            ctx.canvas.width = 300;
                            ctx.canvas.height = 150;
                            
                            new Chart(ctx, config);

                        </script>

                        HTML;

                    }
                }
            }

            if($isAdmin == false and $isTeacher == false and $isPadawan == false){//Если мы не нашли пользователя с таким логином и паролем
                echo "<p>Упс, похоже вы неправильно ввели логин или пароль( Уточните информацию у ответственного. Хорошего Дня :)</p>";

                $admins = "SELECT name, telephone FROM admins";
                echo "<p>Контактные данные администраторов:</p>";
                if($result1 = $conn->query($admins, MYSQLI_STORE_RESULT)){
                    foreach($result1 as $res){
                        echo '<p>';
                        echo $res["telephone"]. " - " . $res["name"]; //поочерёдно выведутся номера и имена админов, с которыми можно связаться
                        echo '</p>';
                    }
                }
            }

            if($isAdmin == true){//Если зашёл админ

                //Функционал админа пока что состоит в том, чтобы добавлять новых админов, преподавателей и учеников

                echo<<<HTML

                <style>
                    *{
                        box-sizing: border-box;
                    }

                    body, html{
                        margin: 0;
                        padding: 0;
                        font-family: 'Courier New', Courier, monospace;
                    }
                    body{
                        background-image: url(https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvdjEwMTMtcC0wMDI0LmpwZw.jpg);
                        background-size: cover;

                        height: 100vh;
                        width: 100%;

                        display: flex;
                        flex-direction: column;
                        justify-content: center;
                    }
                    @media (min-width:480px) and (max-width:960px){
                        body{
                            background-image: url(https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvdjEwMTMtcC0wMDI0LmpwZw.jpg);
                            background-size: cover;

                            display: flex;
                            flex-direction: row;
                            flex-wrap: wrap;
                            justify-content: space-around;
                        }
                    }
                    @media (min-width:961px){
                        body{
                            background-image: url(https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvdjEwMTMtcC0wMDI0LmpwZw.jpg);
                            background-size: cover;

                            display: flex;
                            flex-direction: row;
                            justify-content: space-around;
                            align-items: center;
                        }
                    }

                    .box{
                        width: 30%;
                        min-width: 280px;
                        height: 23.4em;


                        padding: 5px;
                        margin: 20px;

                        border: 2px solid black;
                        border-radius: 10px;
                        text-align: center;

                        font-size: 24;
                        background-color: rgb(244, 244, 244);

                        box-shadow: 1px 1px 0.8px 0.8px rgba(0, 119, 183, 0.4), -1px -1px 0.8px 0.8px rgb(0, 119, 183, 0.4), 
                        -1px 1px 0.8px 0.8px rgb(0, 119, 183, 0.4), 1px -1px 0.8px 0.8px rgb(0, 119, 183, 0.4);

                    }

                    form{
                        height: 50%;
                        display: flex;
                        flex-direction: row;
                        flex-wrap: wrap;
                        justify-content: space-around;
                        margin-bottom: 20px;
                        align-items: center;
                    }
                    .form-item{
                        width: 45%;
                        height: 2.5em;
                        margin: 5px;
                    }
                    
                    button{
                        width: 9.5em;
                        height: 2.5em;
                        background-color: black;
                        color: white;
                        border: 0px;
                        border-radius: 7px 0px 7px 0px;
                    }
                    button:hover{
                        transform: scale(1.05);
                        background-color: rgb(43, 43, 43);
                        color: rgb(236, 236, 236);
                        cursor: pointer;
                    }
                    button:active{
                        transform: scale(0.96);
                        background-color: rgb(43, 43, 43);
                    }

                    input{
                        border: 1.5px solid rgb(18, 18, 18);
                    }
                    input:hover{
                        border: 2.3px solid black;
                        transition-property: border-radius;
                        transition-duration: 70ms;
                        border-radius: 4px;
                        transform: scale(1.05);
                    }
                    input:focus{
                        box-shadow: 2px 2px 1px 1px rgba(0, 105, 161, 0.8), -2px -2px 1px 1px rgb(0, 105, 161, 0.8),
                        -2px 2px 1px 1px rgb(0, 105, 161, 0.8), 2px -2px 1px 1px rgb(0, 105, 161, 0.8);
                        border-radius: 4px;
                    }
                    input::-webkit-input-placeholder{
                        color: rgb(80, 80, 80);
                    }

                </style>

                <div class="box">
                    <h2>Добавить нового отетственного</h2> <!-- HTML-форма для добавления нового админа -->
                    <form>
                        <p><input type="text" name="loginA" id="loginA" placeholder="Введите новый логин"/></p>
                        <p><input type="text" name="passwordA" id="passwordA" placeholder="Введите новый пароль"/></p>
                        <p><input type="text" name="nameA" id="nameA" placeholder="Введите ФИО ответственного"/></p>
                        <p><input type="text" name="phoneA" id="phoneA" placeholder="Введите телефон ответственного"/></p>
                        <p>
                            <button type="submit" formmethod="POST" formaction="add.php">Добавить</button>
                            <button type="reset">Сбросить</button>
                        </p>
                    </form>
                </div>
                
                <div class="box">
                    <h2>Добавить нового преподавателя</h2><!-- HTML-форма для добавления нового преподавателя -->
                    <form>
                        <p><input type="text" name="loginT" id="loginT" placeholder="Введите новый логин"/></p>
                        <p><input type="text" name="passwordT" id="passwordT" placeholder="Введите новый пароль"/></p>
                        <p><input type="text" name="subject" id="subject" placeholder="Введите предмет преподавателя"/></p>
                        <p><input type="text" name="nameT" id="nameT" placeholder="Введите ФИО преподавателя"/></p>
                        <p>
                            <button type="submit" formmethod="POST" formaction="add.php">Добавить</button>
                            <button type="reset">Сбросить</button>
                        </p>
                    </form>
                </div>

                <div class="box">
                    <h2>Добавьте нового ученика</h2><!-- HTML-форма для добавления нового ученика -->
                    <form>
                        <p><input type="text" name="loginU" id="loginU" placeholder="Введите новый логин"/></p>
                        <p><input type="text" name="passwordU" id="passwordU" placeholder="Введите новый пароль"/></p>
                        <p><input type="text" name="class" id="class" placeholder="Введите класс ученика"/></p>
                        <p><input type="text" name="nameU" id="nameU" placeholder="Введите ФИО ученика"/></p>
                            <button type="submit" formmethod="POST" formaction="add.php">Добавить</button>
                            <button type="reset">Сбросить</button>
                        </p>
                    </form>
                </div>

                HTML;
            }

            $conn->close();

        ?>
    </body>
</html>
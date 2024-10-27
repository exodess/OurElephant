<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Добро пожаловать в OurElephant!</title>
        <style>
            @keyframes shadow{
                from{
                    box-shadow: 2px 2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.6), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6),
                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.6), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6);
                }
                3%{
                    box-shadow: 2px 1px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.6), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6),
                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.6), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6);
                }
                6%{
                    box-shadow: 2px 0px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.6), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6),
                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.6), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6);
                }
                9%{
                    box-shadow: 2px -1px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.6), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6),
                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.6), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6);
                }
                13%{
                    box-shadow: 2px -2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.6), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6),
                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.6), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6);
                }
                16%{
                    box-shadow: 1.66px -2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.6), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6),
                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.6), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6);
                }
                19%{
                    box-shadow: 1.33px -2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.6), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6),
                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.6), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6);
                }
                22%{
                    box-shadow: 1px -2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.6), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6),
                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.6), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6);
                }
                25%{
                    box-shadow: 0.66px -2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.6), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6),
                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.6), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6);
                }
                28%{
                    box-shadow: 0.33px -2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.6), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6),
                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.6), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6);
                }
                31%{
                    box-shadow: 0px -2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.6), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6),
                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.6), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6);
                }
                34%{
                    box-shadow: -0.33px -2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.6), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6),
                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.6), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6);
                }
                37%{
                    box-shadow: -0.66px -2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.6), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6),
                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.6), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6);
                }
                40%{
                    box-shadow: -1px -2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.6), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6),
                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.6), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6);
                }
                43%{
                    box-shadow: -1.33px -2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.6), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6),
                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.6), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6);
                }
                46%{
                    box-shadow: -1.66px -2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.6), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6),
                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.6), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6);
                }
                50%{
                    box-shadow: -2px -2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.6), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6),
                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.6), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6);
                }
                53%{
                    box-shadow: -2px -1px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.6), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6),
                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.6), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6);
                }
                56%{
                    box-shadow: -2px 0px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.6), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6),
                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.6), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6);
                }
                59%{
                    box-shadow: -2px 1px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.6), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6),
                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.6), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6);
                }
                62%{
                    box-shadow: -2px 2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.6), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6),
                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.6), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6);
                }
                65%{
                    box-shadow: -1.66px 2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.6), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6),
                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.6), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6);
                }
                69%{
                    box-shadow: -1.33px 2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.6), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6),
                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.6), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6);
                }
                72%{
                    box-shadow: -1px 2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.6), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6),
                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.6), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6);
                }
                75%{
                    box-shadow: -0.66px 2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.6), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6),
                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.6), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6);
                }
                78%{
                    box-shadow: -0.33px 2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.6), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6),
                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.6), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6);
                }
                81%{
                    box-shadow: 0px 2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.6), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6),
                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.6), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6);
                }
                84%{
                    box-shadow: 0.33px 2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.6), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6),
                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.6), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6);
                }
                87%{
                    box-shadow: 0.66px 2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.6), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6),
                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.6), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6);
                }
                90%{
                    box-shadow: 1px 2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.6), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6),
                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.6), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6);
                }
                93%{
                    box-shadow: 1.33px 2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.6), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6),
                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.6), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6);
                }
                96%{
                    box-shadow: 1.66px 2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.6), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6),
                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.6), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6);
                }
                to{
                    box-shadow: 2px 2px 2.7px 2.7px rgb(0, 191, 255), 2px 2px 2.7px 2.7px rgba(0, 105, 161, 0.6), -2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6),
                    -2px 2px 2.7px 2.7px rgb(0, 105, 161, 0.6), 2px -2px 2.7px 2.7px rgb(0, 105, 161, 0.6);
                }
            }


            *{
                box-sizing: border-box;
                padding: 0;
                margin: 0;
            }

            body{
                background-color: url(https://i.pinimg.com/originals/5d/03/d2/5d03d23b7d7052279d7e4210d90292a1.jpg);
                background-image: url(https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvdjEwMTMtcC0wMDI0LmpwZw.jpg);
                background-size: cover;
                background-repeat: no-repeat;

                font-family: 'Courier New', Courier, monospace;
                font-size: 24px;
            }

            main{
                width: 100%;
                height: 100vh;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            article{
                width: 23em;
                height: 27em;

                background-color: rgba(0, 0, 0, 0.4);
                text-align: center;

                border: 0;
                border-radius: 15px;
                font-size: 1em;
            }

            h1{
                height: 2.35em;

                font-size: 28px;
                background-color: rgba(0, 0, 0, 0.8);
                color: white;
                border: 0;
                padding: 10px;
                border-radius: 15px;
            }

            form{
                margin-top: 3.5em;
                display: flex;
                flex-direction: row;

                justify-content: space-around;
            }

            .div1{
                width: 10em;
                height: 13em;

                padding: 5px;

                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: space-around;
            }
            
            input{
                width: 17em;
                height: 5.3em;

                border: 0;
                border-radius: 15px;

                padding: 5px;
                text-align: center;
            }

            input:hover{
                transform: scale(1.05);
            }

            input:active{
                transform: scale(0.96);
            }

            input:focus{
                transform: scale(1);
                outline-width: 0;
                animation: shadow 0.85s infinite;
            }
            
            .div2{
                width: 10em;
                height: 13em;

                display: flex;
                flex-direction: column;

                align-items: center;
                justify-content: space-around;
                padding: 5px;
            }

            button{
                width: 10em;
                height: 4.8em;
                font-size: 16px;

                background-color: black;
                color: white;
                outline-width: 0;
                border: 0;
                border-radius: 12px 1px 12px 1px;
            }

            button:hover{
                transform: scale(1.05);
                opacity: 0.665;
            }

            button:active{
                transform: scale(0.96);
            }
            
            @media (min-width:769px) {
                body{
                    font-size: 18px;
                }
                .div1{
                    width: 10em;
                    height: 9.5em;
                }
                .div2{
                    width: 10em;
                    height: 9.5em;
                }
                article{
                    font-size: 20px;
                }
                input{
                    width: 11em;
                    height: 4em;
                }
                button{
                    width: 8.5em;
                    height: 4em;
                }
            }

        </style>
    </head>
    <body>
        <main>
            <article>
                <h1>Рады тебя видеть :)</h1>
                <form>
                    <div class="div1">
                        <input type="text" name="login" id="login" placeholder="Введите ваш логин" required autocomplete="off"/>
                        <input type="password" name="password" id="password" placeholder="Введите пароль" required autocomplete="off"/>
                    </div>
                    <div class="div2">
                        <button type="submit" formmethod="POST" formaction="main.php">Войти</button>
                        <button type="reset">Сбросить</button>
                    </div>

                </form>
            </article>
        </main>
        
    </body>
</html>

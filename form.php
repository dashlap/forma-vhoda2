<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form.css">
    <title>Document</title>
</head>
<body>
    <main>
        <div class="form">
            <img src="https://avatars.mds.yandex.net/i?id=4cb5eae906a20a931155e1cb8091f0f7-3872711-images-thumbs&n=13" alt="картинка">

            <form class="stroki" action="login.php" method="post">
                <input type="text" name="username" placeholder="Username" maxlength="50" required>
                <input type="password" name="password" placeholder="Password" maxlength="50" required>

                <div class="buttons">
                    <button class="one">Sign in</button>
                    <button class="two">Sign up</button>
                </div>
                
                <a href="../register/register.html">Не зарегистрированы?</a>
            </form>
            <?php
                require 'constant.php';

                //подключаемся к серверу
                $link = mysqli_connect($host, $user, $password, $database);

                if (!$link){
                    echo "<p>Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error() . "</p>";
                }
                else {
                    echo "<p>Соединение установлено успешно</p>";
                }

                $login = strip_tags($_POST['login']);
                $password = strip_tags($_POST['password']);

                //выполняем операции с базой данных
                $sql = "SELECT FROM 'users' WHERE 'username' = '$login'"
    
                $result = msqli_query($link, $sql);

                if(!$result) {
                    echo '<p>Произошла ошибка при выполнении запроса</p>';
                }
                else {
                    $data = mysqli_fetch_array($result);

                    if($data['username'] == $login && $data['password'] == md5($password)) {
                        echo 'Добро пожаловать:'. $data['username'];
                    } else {
                        echo 'Не верен логин или пароль'
                    }
        
                }
            ?>
        </div>
    </main>
</body>
</html>

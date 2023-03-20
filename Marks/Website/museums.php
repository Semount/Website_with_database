<html>
    <head>
    <title>Музеи</title>
        <link href="styles.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </head>

    <body background="bak1.jpg">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="Stamps.php">Главная</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="museums.php">Музеи</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="u_list.php">Пользователи</a>
                        </li>
                </div>
            </div>
        </nav>
        <div class="container bg-white">
        <h1 class="text-center">Музеи и даты посещения выставок</h1>
        <?php
            $conn = new mysqli("localhost", "root", "", "stamps");
            if($conn->connect_error){
                die("Ошибка: " . $conn->connect_error);
            }
            $sql = "SELECT DISTINCT Name, Adress FROM museum";
            $col[0]="Название музея"; $col[1]="Адрес";
            $result = mysqli_query($conn, $sql);

            echo '<table class="table table-striped">'.'<tr>';
        for ($i=0; $i<mysqli_num_fields($result); $i++)
        {
            echo '<th>'.$col[$i].'</th>';
        }
        echo '</tr>';
        while($row=mysqli_fetch_row($result))
        {
            echo '<tr>';
            for ($i=0; $i<mysqli_num_fields($result); $i++)
            {
                echo '<td>'.$row[$i].'</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
        echo '<h3>Запись на посещение</h3>';
        echo '<div style="display: flex; justify-content: center">';
        echo '<form action="" method="post">
        <p>Псевдоним:<br>
            <input type="text" name="username" /></p>
        <br>
        <p>Электронная почта:<br>
            <input type="text" name="email" /></p>
        <br>
        <p>Номер выставки:<br>
            <input type="text" name="s_id" />
        </p>
        <br>
        <input type="submit" value="Записаться на посещение">';
        echo '<br>
    </form>
    </div>';
        if (isset($_POST["username"]) && isset($_POST["email"])  && isset($_POST["s_id"])) {
            $username = $_POST["username"];
            $email = $_POST["email"];
            $s_id = $_POST["s_id"];
            $n_id = "SELECT MAX(user.ID)";
            $sql = "insert into user(ID, Session_ID, username, email) values ('$n_id','$s_id', '$username', '$email')";
            $res = $conn->query($sql);
            echo ($res)?"<script>document.location.replace('museums.php');</script>":"Произошла ошибка при добавлении данных";
        }


        echo '<h3>Поиск выставок по музею</h3>';
        echo '<form action="" method="post">
            <p>
                Название: 
                <select name="museum_name" />
                    <option value="Центральный музей связи имени А. С. Попова">Центральный музей связи имени А. С. Попова</option>
                    <option value="Музей истории Русской почты и Моспочтамта">Музей истории Русской почты и Моспочтамта</option>
                    <option value="Музей связи Тверской области">Музей связи Тверской области</option>
                    <option value="Музей ямщика">Музей ямщика</option>
                    <option value="Дом стационарного смотрителя">Дом стационарного смотрителя</option>
                </select>
            </p>
            <input type="submit" value="Поиск">
        </form>';
        @$museum_name = $_POST["museum_name"];
        $sql = "SELECT * FROM museum_to_session WHERE Название = '$museum_name'";
        $result = mysqli_query($conn, $sql);
        $col[0]="Название"; $col[1] = "Дата"; $col[2] = "Время"; $col[3] = "Цена"; $col[4] = "Номер выставки";
        echo '<table class="table table-striped">'.'<tr>';
        for ($i=0; $i<mysqli_num_fields($result); $i++)
        {
            echo '<th>'.$col[$i].'</th>';
        }
        echo '</tr>';
        while($row=mysqli_fetch_row($result))
        {
            echo '<tr>';
            for ($i=0; $i<mysqli_num_fields($result); $i++)
            {
                echo '<td>'.$row[$i].'</td>';
            }
            echo '</tr>';
        }
        echo '</table>';

        $sql = "SELECT museum.Session_id, Mark1, Mark2, Mark3 FROM collection_to_mark JOIN museum on museum.Collection_id = collection_to_mark.ID WHERE museum.name = '$museum_name'";
        $result = mysqli_query($conn, $sql);
        $col[0]="Коллекции в этом музее:"; $col[1] = ""; $col[2] = ""; $col[3] = "";
        echo '<table class="table table-striped">'.'<tr>';
        for ($i=0; $i<mysqli_num_fields($result)  ; $i++)
        {
            echo '<th>'.$col[$i].'</th>';
        }
        echo '</tr>';
        while($row=mysqli_fetch_row($result))
        {
            echo '<tr>';
            for ($i=0; $i<mysqli_num_fields($result); $i++)
            {
                echo '<td>'.$row[$i].'</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
        echo '<br>';
        mysqli_close($conn);
        ?>
        </div>
    </body>
</html>
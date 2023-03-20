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
    <div class="container bg-white text-center">
        <h2>Пользователи и их записи на посещение</h2>
        <?php
            $conn = new mysqli("localhost", "root", "", "stamps");
            if($conn->connect_error){
                die("Ошибка: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM user";
            $col[0]="ID"; $col[1]="Номер выставки"; $col[2]="Никнейм"; $col[3]="Email";
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
        echo '<div style="display: flex; justify-content: space-between; text-align: right"> ';
        echo '<div align="left">';
        echo '<form action="" method="post">
            <p>
                ID пользователя: 
                <input type="text" name="uu_id" /></input>
                Новая сессия:
                <input type="text" name="u_s_id" /></input>
            </p>
            <input type="submit" value="Обновить" style="margin-left: 75px">
        </form>
        </div>';

        if (isset($_POST["uu_id"]) && isset($_POST["u_s_id"])) {
            @$uu_id = $_POST["uu_id"];
            @$u_s_id = $_POST["u_s_id"];
            $sql = "UPDATE user SET Session_ID = '$u_s_id' WHERE ID = '$uu_id'";
            $result = mysqli_query($conn, $sql);
            echo ($result)?"<script>document.location.replace('u_list.php');</script>":"Произошла ошибка при добавлении данных";
        }

        echo '<div>';
        echo '<form action="" method="post">
            <p>
                ID: 
                <input type="text" name="u_id" /></input>
            </p>
            <input type="submit" value="Удалить" style="margin-left: 75px">
        </form>
        </div>
        </div>';
        if (isset($_POST["u_id"])) {
            @$u_id = $_POST["u_id"];
            $sql = "DELETE FROM user WHERE ID = '$u_id'";
            $result = mysqli_query($conn, $sql);
            echo ($result)?"<script>document.location.replace('u_list.php');</script>":"Произошла ошибка при добавлении данных";
        }
        ?>
    </div>
</body>
</html>
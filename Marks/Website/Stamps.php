<html>
    <head>
        <title>Коллекция марок</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <body background="bak1.jpg">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

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
        <img class="img1" align="right" src="img1.jpg" height="400" width="500">

        <div class="forD text-justify">
            <strong><a href="https://ru.wikipedia.org/wiki/%D0%A4%D0%B8%D0%BB%D0%B0%D1%82%D0%B5%D0%BB%D0%B8%D1%8F" target="_blank">Филатели́я</a></strong> <em>(греч. philéō, люблю + atéleia, освобождение от оплаты)</em> — область коллекционирования и изучения знаков почтовой оплаты (например, почтовых марок) и других филателистических материалов.
            <br>
            Самым <span class="forS">непосредственным</span> образом областью изучения филателии является также история почтовой связи. <tt>В некоторых случаях под филателией может также подразумеваться совокупность собственно предметов филателистического коллекционирования.</tt>
        </div>
        <p class="f5">
            Цена почтовой марки, как и стоимость многих других предметов антиквариата, формируется сразу из нескольких факторов:
        </p>
        <ul type="square"><font color="navy"></font>
            <u>
            <li>Раритетность</li>
            <li type="disc">Редкость экземпляра</li>
            <li>Ограниченность тиража</li>
            </u>
        </font>

        </ul>
        <p class="f5">Помимо этих качеств, ценность почтового знака также определяется тем, что на нем изображено и какую историческую или музейную ценность они могут нести.
        </p>
        <a name="Примеры"></a>
        <p id="examples" onmouseover="this.style.color='red'; this.innerHTML='Примеры:'" onmouseout="this.style.color='black'; this.innerHTML='<em>Примеры:</em>'">
            Примеры:
        </p>
        <p>
            <hr size="5" color="black" align="middle" width="100%">
            <center>
            <img src=рейс.png height="200" width="300" vspace="20" hspace="30" alt="Рейс мира и дружбы" usemap="#voyage">
            <img src=Закарпатская_Украина.jpg height="200" width="300" vspace="20" hspace="30" alt="Закарпатская Украина" usemap="#ukraine">
            <img src=Авиапочта.png height="200" width="300" vspace="20" hspace="30" alt="Авиапочта с толстой пятёркой" usemap="#airmail">

            </center>
            <map name="voyage">
                <area shape="rect" coords="0,0,300,200" title="Рейс мира и дружбы">
            </map>
            <map name="ukraine">
                <area shape="rect" coords="0,0,300,200" title="Закарпатская Украина">
            </map>
            <map name="airmail">
                <area shape="rect" coords="0,0,300,200" title="Авиапочта с толстой пятёркой">
            </map>
            <map name="polar_year">
                <area shape="rect" coords="0,0,300,200" title="2-й Международный полярный год">
            </map>
                <hr size="5" color="black" align="middle" width="100%">
        </p>
        <font size="6">
            <em><p class="p-3 mb-2 bg-secondary text-white text-center a1"><nobr>"Афоризмы как марки - много их, а ценных-перлов мало" - Валерий Филатов.</nobr></p></em>
        </font>
        <div onmouseover="ap.src='animated_stamp.gif'" onmouseout="ap.src='animated_stamp.png'">
            <img id="ap" src="animated_stamp.png" align="right" width="550" height="350" border="4" alt="Funny GIF">
        </div>
            <img id="ag" src="graal.jpg" align="left" width="550" height="350" border="4" alt="Funny GIF" style="margin-bottom: 20px">

        <br>
            <hr size="5" color="black" align="middle" width="100%">
        <br>
            <h2 class="text-center">Самые дорогие марки</h2>
        <?php
            $conn = new mysqli("localhost", "root", "", "stamps");
            if($conn->connect_error){
                die("Ошибка: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM mark_sort WHERE Mark_price > 1000000";
            $col[0]="Название марки"; $col[1]="Цена";
            $result = mysqli_query($conn, $sql);
        echo '<div class="container w-50">';
            echo '<table class="table table-striped table-bordered table-hover">'.'<tr class="table-primary">';
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
        echo '</div>';
        ?>
        <br>
            <hr size="5" color="black" align="middle" width="100%">
        <h1 class="text-center">  Контакты  </h1>

    <div class="px-4 py-2 my-5 text-center">
        <img border="2" class="img-fluid" src="icon.png" alt="" width="72" height="57">
        <h1 class="display-5 fw-bold">О нас</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">
                Мы коллекционеры марок, которые любят своё увлечение и хотят поделиться с ним со всем миром!
            </p>
            <p class="lead mb-4 contacts">
                  Для связи с нами: <button>click</button>
            </p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center"></div>
        </div>
        <div class="col-xl-3 " style="justify-content: center; display: flex; margin: auto" >
            <form action="" method="post" name="feedback" id="commentform" style="background-color:rgb(90, 150, 150); padding:1%">
                <p><small>Имя: </small> <br /><input type="text" name="name" id="name" value="" size="25" /></p>
                <p><small>E-mail: </small> <br /><input type="email" name="email" id="email" value="" size="25" /></p>
                <p><small>Комментарий:  </small> <br /><textarea name="comment" id="comment" cols="55" rows="8"></textarea></p>
                <button type="button" class="btn btn-light" onClick="javascript:void(0); WinOpen(feedback);">Отправить</button>
            </form>
        </div>
        <div>
        </div>
        <br>
        <br>
        <a id="Обозначения"></a>
        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-0 border-top">
                <p class="col-md-0 mb-0 text-muted">© Tokiyashi</p>
                <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Главная страница</a></li>
                <li class="nav-item"><a href="#Примеры" class="nav-link px-2 text-muted">Примеры</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">О нас</a></li>
                </ul>
            </footer>
            </div>
    </div>
        </div>
    <script src="vue.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script type="text/javascript" src="script.js"></script>
    </body>
</html>
<!DOCTYPE HTML>
<html>
<head>
    <title>Как сделать всплывающее окно на сайте</title>
    <meta charset="utf-8">
    <style>
        #wrap{
            display: none;
            opacity: 0.8;
            position: fixed;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            padding: 16px;
            background-color: rgba(1, 1, 1, 0.725);
            z-index: 100;
            overflow: auto;
        }

        #window{
            width: 400px;
            height: 400px;
            margin: 50px auto;
            display: none;
            background: #fff;
            z-index: 200;
            position: fixed;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            padding: 16px;
        }

        .close{
            margin-left: 364px;
            margin-top: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<!--задний фон-->
<div onclick="show('none')" id="wrap"></div>
<!-- Всплывающее окно-->
<div id="window">
    <!-- Крестик-->
    <span class="close" onclick="show('none')">X</span>
    <img class="aligncenter size-full wp-image-7815" src="http://bloggood.ru/wp-content/uploads/2014/09/CoverCommander.jpg" alt="Бесплатная книга от автора блога «5 тезисов, которые помогут достичь любых целей!»" width="270" height="370">
    <br><a href="http://bloggood.ru/biblioteka/besplatnaya-kniga-ot-avtora-bloga-5-tezisov-kotorye-pomogut-dostich-lyubyx-celej.html/">Читать далее...</a>
</div>

<!--Кнопка-->
<button onclick="show('block')">Показать окно</button>
<script type="text/javascript">
    //Функция показа
    function show(state)
    {
        document.getElementById('window').style.display = state;
        document.getElementById('wrap').style.display = state;
    }
</script>
</body>
</html>
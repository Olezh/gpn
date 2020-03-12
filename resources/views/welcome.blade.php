<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <script src="{{asset('js/jquery.min.js')}}"></script>


    </head>
    <body>

    <div id="chat">

    </div>

    <div>
        <label>
            <input type="text" id="textplace">
        </label>

        <div>
            <button type="submit" form="mainform" id="button">Отпрвить</button>
        </div>
    </div>

    </body>

    <script type="text/javascript">

        function showChat(){
            var parent = $('#chat');
            $.ajax({
                url: '/api/get',
                type: 'GET',
                contentType: 'application/json; charset=utf-8',
                success: function (response) {
                    response.forEach(function(object, i, response){
                        parent.append('<p> ' + object.text + '</p>');
                    })
                }
        })
        }

        $(document).ready(showChat());

        $(document).on("click", "#button", function () {

            var message = $("#textplace").val();

            $.ajax({
                beforeSend: function (xhr) {
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
                },
                url: '/api/post',
                type: 'POST',
                data: {'sendbox': message},
                contentType: 'application/json; charset=utf-8',
                success: function () {
                    location.reload();                 }
            });
        });

    </script>
</html>

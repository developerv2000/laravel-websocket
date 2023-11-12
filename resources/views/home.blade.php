<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite('resources/css/app.css')
</head>

<body>
    <div class="chat">
        <div class="chat__body">
            @foreach ($messages->reverse() as $message)
                <p>{{ $message->body }}</p>
            @endforeach
        </div>

        <div class="chat__footer">
            <form class="chat__form">
                <input type="text" name="body" placeholder="Текст">
                <button>Отправить</button>
            </form>
        </div>
    </div>

    @vite('resources/js/app.js')
</body>

</html>

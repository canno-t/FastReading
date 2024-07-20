<html>
    <head></head>
    <body>
    {{$text}}
    <br>
    <a href="{{$url}}" target="_blank">Przeczytaj cały artykuł</a>
    <form action="{{route('chat')}}" method="POST">
        @csrf
        <input type="hidden" value="{{$text}}" name="text">
        <input name="user">
        <button type="submit">Dalej</button>
    </form>
    </body>
</html>

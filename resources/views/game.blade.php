<html lang="pl">
    <head>
        <meta charset="utf-8">
        <title>Szybkie czytanie</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link href='https://fonts.googleapis.com/css?family=Londrina Outline' rel='stylesheet'>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link href='https://fonts.googleapis.com/css?family=Anton' rel='stylesheet'>
        @vite(['resources/js/game.js', 'resources/css/game.css'])
    </head>
    <body style="font-family: Roboto;" >
    <nav class="navbar navbar-light mb-5" style="background-color: #b5a250">
    <span class="navbar-brand mb-0 h1 font-weight-bold text-white" style="margin-left: 2rem; font-family: Londrina Outline; font-size: 40px">Szybkie czytanie</span>
    </nav>
    <div class="d-flex justify-content-center">
        <div class="d-flex flex-column" style="width: 66%">
            <div class="mb-5 first-stage">
                <h5>
                    Obecna Rozgrywka
                </h5>
                <div class="justify-content-between align-items-center px-5 py-2" style="text-align: center;display: flex;border: solid 2px #d6d6d6;border-radius: 25px" id="article">
                    <span class="d-flex"><span class="material-symbols-outlined align-self-center mr-1" style="margin-right: 0.25rem">timer</span><span id="timer" style="font-size: 30px;margin-left: 0.25rem">0:30</span></span>

                    <a href="{{$url}}" target="_blank">Przeczytaj cały artykuł</a>
                </div>
            </div>
            <div class="card mb-5 first-stage" id="text-card" style="-webkit-box-shadow: 14px 13px 20px -20px rgba(66, 68, 90, 1);
-moz-box-shadow: 14px 13px 20px -20px rgba(66, 68, 90, 1);
box-shadow: 14px 13px 20px -20px rgba(66, 68, 90, 1);">
                <div class="card-header p-3 justify-content-between">
                    <h3 style="letter-spacing: 1px">Przeczytaj uważnie a następnie streść ten tekst</h3>
                </div>
                <div class="card-body p-3">
                    {{$text}}
                </div>
            </div>
            <div class='mb-5' id="second-stage" style="display: none">
                <div>
                    <h4>Streść fragment artykułu który przeczytałeś</h4>
                </div>
                <div class="card card-body">
                    <div style="width: 100%">
                        <div class='alert' id="comment" style="background-color: #f5f5dc">
                            <b>Czas się skończył!</b> Opisz o czym był tekst który przeczytałeś, jeśl nie udalo ci się przeczytać całego, streść tyle ile udało ci się przeczytać
                        </div>
                    </div>
                    <form id="form">
                        <meta type="hidden" content="{{ csrf_token() }}" id="_token">
                        <input type="hidden" value="{{$text}}" name="text">
                        <textarea rows="5" name="user" class="form-control" placeholder="teks opisuje..."></textarea>
                        <button type="submit" class="btn form-control mt-3" style="color: white;background-color: #b5a250">Dalej</button>
                    </form>
                </div>
            </div>
            <div id="third-stage" style="display: none">
                <div>
                    <h4>Wyniki</h4>
                </div>
                <div class="card card-body mb-5">
                    <div id="response-card">

                    </div>
                    <div class="d-flex flex-row w-100">
                        <div id="progress-chart">

                        </div>
                        <div id="progress-bar">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="background-color: #f5f5dc">
{{--        <div class="justify-content-around mt-4 py-5 align-items-center m-5" style="text-align: center;display: flex;border: solid 2px #d6d6d6;border-radius: 25px" id="article">--}}
{{--            <span class="d-flex"><span class="material-symbols-outlined align-self-center mr-1" style="margin-right: 0.25rem">timer</span><span id="timer" style="font-size: 30px;margin-left: 0.25rem">0:15</span></span>--}}

{{--            <a href="{{$url}}" target="_blank">Przeczytaj cały artykuł</a>--}}
{{--        </div>--}}
        <div class="px-3 py-5 d-flex flex-row">
            <div class=" flex-column w-50 px-3 info">
                <div class="d-flex flex-row w-100">
                    <h5>Ogóle informacje o szybkim czytaniu:</h5>
                </div>
                <div class="d-flex flex-row w-100">
                    <span class="mt-3">
                    Szybkie czytanie to umiejętność, która może znacznie zwiększyć naszą efektywność,
                    zwłaszcza w erze informacji, gdzie codziennie spotykamy się z ogromną ilością treści
                    do przyswojenia. Standardowa prędkość czytania dorosłego człowieka wynosi około <b>200-300 słów
                    na minutę</b>,
                    jednak dzięki odpowiednim technikom możliwe jest osiągnięcie znacznie wyższych wyników,
                    sięgających nawet <b>1000 słów na minutę</b>. Kluczowe jest jednak,
                    aby wraz z prędkością utrzymać odpowiedni poziom zrozumienia tekstu,
                    ponieważ samo szybkie czytanie bez pełnej analizy i przyswajania treści nie przynosi
                    oczekiwanych korzyści. Poniżej przedstawiamy najważniejsze metody nauki szybkiego czytania,
                    które pomogą nie tylko zwiększyć prędkość czytania, ale także poprawić jego zrozumienie.
                </span>
                </div>
            </div>
            <div class=" flex-column w-50 px-3 info">
                <div class="d-flex flex-row">
                    <h5>Taktyki na zwiększenie szybkości czytania:</h5>
                </div>
                <div class="d-flex flex-row mt-3">
                    <div class="card card-body tips">
{{--                        Subwokalizacja to wewnętrzne mówienie słów podczas czytania. Zmniejszając lub eliminując tę praktykę, można znacznie przyspieszyć tempo czytania.--}}
                    </div>
                    <div class="card card-body tips">
{{--                        Ćwiczenie, które pomaga zwiększyć obszar, który można zobaczyć na raz, umożliwiając czytanie większej ilości słów naraz.--}}
                    </div>
                    <div class="card card-body tips">
{{--                        Korzystanie z palca, wskaźnika lub pióra do prowadzenia wzroku po tekście. Pomaga to utrzymać stałe tempo i zapobiega cofaniu się wzroku do już przeczytanych fragmentów.--}}
                    </div>
                </div>

            </div>
            <div class="flex-column" id="info-mobile">
                <div>
                    <h5>Ogóle informacje o szybkim czytaniu:</h5>
                </div>
                <div class="my-3">
                    <span>
                    Szybkie czytanie to umiejętność, która może znacznie zwiększyć naszą efektywność,
                    zwłaszcza w erze informacji, gdzie codziennie spotykamy się z ogromną ilością treści
                    do przyswojenia. Standardowa prędkość czytania dorosłego człowieka wynosi około <b>200-300 słów
                    na minutę</b>,
                    jednak dzięki odpowiednim technikom możliwe jest osiągnięcie znacznie wyższych wyników,
                    sięgających nawet <b>1000 słów na minutę</b>. Kluczowe jest jednak,
                    aby wraz z prędkością utrzymać odpowiedni poziom zrozumienia tekstu,
                    ponieważ samo szybkie czytanie bez pełnej analizy i przyswajania treści nie przynosi
                    oczekiwanych korzyści. Poniżej przedstawiamy najważniejsze metody nauki szybkiego czytania,
                    które pomogą nie tylko zwiększyć prędkość czytania, ale także poprawić jego zrozumienie.
                </span>
                </div>
                <div class="mb-3">
                    <h5>Taktyki na zwiększenie szybkości czytania:</h5>
                </div>
                <div class="card card-body w-100 mb-3 mobile-tips">
                    {{--                        Subwokalizacja to wewnętrzne mówienie słów podczas czytania. Zmniejszając lub eliminując tę praktykę, można znacznie przyspieszyć tempo czytania.--}}
                </div>
                <div class="card card-body w-100 mb-3 mobile-tips">
                    {{--                        Ćwiczenie, które pomaga zwiększyć obszar, który można zobaczyć na raz, umożliwiając czytanie większej ilości słów naraz.--}}
                </div>
                <div class="card card-body w-100 mb-3 mobile-tips">
                    {{--                        Korzystanie z palca, wskaźnika lub pióra do prowadzenia wzroku po tekście. Pomaga to utrzymać stałe tempo i zapobiega cofaniu się wzroku do już przeczytanych fragmentów.--}}
                </div>
            </div>
        </div>
    </div>
    <div style="background-color: #4f4f4f;text-align: center;color: white;padding: 0.5rem">
        All right reserved itp...
    </div>
    </body>
</html>

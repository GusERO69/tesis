<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>

<body>
    <div class="dashboard">
        <header class="header">
            <span>Data</span>
            <span class="clock">10 : 40 : 00</span>
        </header>
        <div class="server-list">
            <div class="server">
                <ul class="details">
                    <li>
                        Hostname: <span class="data">EX (ex)</span>
                    </li>
                    <li>Status: <span class="data signal">ONLINE</span></li>
                    <li>Address: <span class="data">192.168.0.1</span></li>
                </ul>
            </div>
            <div class="server has-failed">
                <ul class="details">
                    <li>
                        Hostname: <span class="data">FAIL (F)</span>
                    </li>
                    <li>Status: <span class="data signal">OFFLINE</span></li>
                    <li>Address: <span class="data">192.168.0.1</span></li>
                </ul>
            </div>
            <div class="server has-failed">
                <ul class="details">
                    <li>
                        Hostname: <span class="data">FAIL (F)</span>
                    </li>
                    <li>Status: <span class="data signal">OFFLINE</span></li>
                    <li>Address: <span class="data">192.168.0.1</span></li>
                </ul>
            </div>
            <div class="server has-failed">
                <ul class="details">
                    <li>
                        Hostname: <span class="data">FAIL (F)</span>
                    </li>
                    <li>Status: <span class="data signal">OFFLINE</span></li>
                    <li>Address: <span class="data">192.168.0.1</span></li>
                </ul>
            </div>
        </div>
    </div>



    <h1>Lista de Hosts</h1>

    <ul>
        @foreach ($pings as $ping)
            <li>{{ $ping->name }} - {{ $ping->ip_address }}
                @if ($ping->is_alive)
                    <span style="color:green;">(Activo)</span>
                @else
                    <span style="color:red;">(Inactivo)</span>
                @endif
                <form action="{{ route('ping', $ping->id) }}" method="POST">
                    @csrf
                    <button type="submit">Ping</button>
                </form>
            </li>
        @endforeach
    </ul>

    <script src="{{ asset('assets/java.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>

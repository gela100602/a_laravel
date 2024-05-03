@extends('layout.main')

<head>
    <style>
        #sidebar {
            margin: 0;
            padding: 0;
            width: 200px;
            height: 100%;
            position: fixed;
            overflow: auto;
            background-color: #f1f1f1;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            padding: 1rem;
            font-size: 1.5rem;
            font-weight: 700;
            color: blue;
            text-align: center;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
        }

        .body a {
            display: block;
            color: blue;
            padding: 16px;
            text-decoration: none;
        }

        .body a:hover,
        .body a.active {
            background-color: blue;
            color: white;
        }

        #btn {
            background-color: transparent;
            border: none;
            cursor: pointer;
            color: blue;
            padding-left:0%;
        }

        #btn:hover {
            background-color: blue;
            color: white;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" style="relative">
            <div class="header">
                <span class="system">SAMPLE APP</span>
            </div>
            <div class="body">
                <a href="/dashboard">Dashboard</a>
                <a href="/users">Users</a>
                <a href="/genders">Genders</a>
                {{-- <a href="/logout" style="margin-top: 28rem">Logout</a> --}}
                <form action="/process/logout" method="post">
                    @csrf
                    <a style="margin-top: 28rem"><button id="btn" type="submit"
                            style="border: none; background-color: none;">Logout</button></a>
                </form>
            </div>
        </aside>
    </div>

    {{-- <script>
        var body = document.querySelector('.body');
        body.addEventListener('click', function(event) {
            var activeElement = body.querySelector('.active');
            if (activeElement) {
                activeElement.classList.remove('active');
            }
            if (event.target.tagName === 'A') {
                event.target.classList.add('active');
            }
        });
    </script> --}}
</body>

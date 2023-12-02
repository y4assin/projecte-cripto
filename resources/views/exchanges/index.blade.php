<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Exchanges</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
        }

        header {
            background-color: gold;
            border-bottom: 3px solid black;
            box-shadow: 1px 1px 10px grey;
            display: inline-flex;
            user-select: none;
            width: 100%;
        }

        header nav ul {
            padding: 0 1em;
        }

        header nav ul li {
            align-items: center;
            display: inline-flex;
        }

        header nav ul {
            height: 100%;
            margin: 0;
        }

        header nav ul li {
            border-left: 2px solid transparent;
            border-right: 2px solid transparent;
            height: inherit;
            list-style-type: none;
        }

        header nav ul li a {
            align-items: center;
            color: black;
            display: flex;
            font-weight: bold;
            height: inherit;
            padding: 0 2em;
            text-decoration: none;
        }

        header nav ul li a > * {
            margin: 0.25em;
        }

        header nav ul li:hover {
            background-color: white;
            border-left-color: black;
            border-right-color: black;
        }

        main {
            padding: 1em;
        }
       
        table {
            border-collapse: collapse;
            font-size: 15px;
            overflow: scroll;
        }

        thead {
            background-color: white;
            border-bottom: 2px solid black;
            box-shadow: 0 1px 1px black;
            position: sticky;
            top: 0;
        }

        th {
            border-bottom: 2px solid black;
            padding: 0.5em 0;
            user-select: none;
        }

        th:hover {
            background-color: rgb(255, 255, 181);
            text-decoration: underline;
        }

        td {
            border-bottom: 2px solid grey;
            padding: 0.5em 0.25em;
        }

        tbody tr:hover {
            background-color: rgb(190, 226, 255);
        }
    </style>
</head>
<body>
    <header>
        <div id="logo">
            <img src="{{asset('./img/CryptobrosLogo.png')}}" alt="">
        </div>
        <nav>
            <ul>
                <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M512 80c0 18-14.3 34.6-38.4 48c-29.1 16.1-72.5 27.5-122.3 30.9c-3.7-1.8-7.4-3.5-11.3-5C300.6 137.4 248.2 128 192 128c-8.3 0-16.4 .2-24.5 .6l-1.1-.6C142.3 114.6 128 98 128 80c0-44.2 86-80 192-80S512 35.8 512 80zM160.7 161.1c10.2-.7 20.7-1.1 31.3-1.1c62.2 0 117.4 12.3 152.5 31.4C369.3 204.9 384 221.7 384 240c0 4-.7 7.9-2.1 11.7c-4.6 13.2-17 25.3-35 35.5c0 0 0 0 0 0c-.1 .1-.3 .1-.4 .2l0 0 0 0c-.3 .2-.6 .3-.9 .5c-35 19.4-90.8 32-153.6 32c-59.6 0-112.9-11.3-148.2-29.1c-1.9-.9-3.7-1.9-5.5-2.9C14.3 274.6 0 258 0 240c0-34.8 53.4-64.5 128-75.4c10.5-1.5 21.4-2.7 32.7-3.5zM416 240c0-21.9-10.6-39.9-24.1-53.4c28.3-4.4 54.2-11.4 76.2-20.5c16.3-6.8 31.5-15.2 43.9-25.5V176c0 19.3-16.5 37.1-43.8 50.9c-14.6 7.4-32.4 13.7-52.4 18.5c.1-1.8 .2-3.5 .2-5.3zm-32 96c0 18-14.3 34.6-38.4 48c-1.8 1-3.6 1.9-5.5 2.9C304.9 404.7 251.6 416 192 416c-62.8 0-118.6-12.6-153.6-32C14.3 370.6 0 354 0 336V300.6c12.5 10.3 27.6 18.7 43.9 25.5C83.4 342.6 135.8 352 192 352s108.6-9.4 148.1-25.9c7.8-3.2 15.3-6.9 22.4-10.9c6.1-3.4 11.8-7.2 17.2-11.2c1.5-1.1 2.9-2.3 4.3-3.4V304v5.7V336zm32 0V304 278.1c19-4.2 36.5-9.5 52.1-16c16.3-6.8 31.5-15.2 43.9-25.5V272c0 10.5-5 21-14.9 30.9c-16.3 16.3-45 29.7-81.3 38.4c.1-1.7 .2-3.5 .2-5.3zM192 448c56.2 0 108.6-9.4 148.1-25.9c16.3-6.8 31.5-15.2 43.9-25.5V432c0 44.2-86 80-192 80S0 476.2 0 432V396.6c12.5 10.3 27.6 18.7 43.9 25.5C83.4 438.6 135.8 448 192 448z"/></svg> <span>CryptoCurrency</span></a></li>
                <li><a href="{{route('exchanges.index')}}"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M243.4 2.6l-224 96c-14 6-21.8 21-18.7 35.8S16.8 160 32 160v8c0 13.3 10.7 24 24 24H456c13.3 0 24-10.7 24-24v-8c15.2 0 28.3-10.7 31.3-25.6s-4.8-29.9-18.7-35.8l-224-96c-8-3.4-17.2-3.4-25.2 0zM128 224H64V420.3c-.6 .3-1.2 .7-1.8 1.1l-48 32c-11.7 7.8-17 22.4-12.9 35.9S17.9 512 32 512H480c14.1 0 26.5-9.2 30.6-22.7s-1.1-28.1-12.9-35.9l-48-32c-.6-.4-1.2-.7-1.8-1.1V224H384V416H344V224H280V416H232V224H168V416H128V224zM256 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg> <span>Exchanges</span></a></li>
                <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M96 0C43 0 0 43 0 96V416c0 53 43 96 96 96H384h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V384c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32H384 96zm0 384H352v64H96c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16zm16 48H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg> <span>Crypto History</span></a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="sectionAvailableExchanges">
            <h1>Available exchanges</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Wallet Address</th>
                        <th>Balance</th>
                        <th>Platform crypto id</th>
                        <th>Platform symbol</th>
                        <th>Platform name</th>
                        <th>Currency crypto id</th>
                        <th>Currency price USD</th>
                        <th>Currency symbol</th>
                        <th>Currency name</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- 
                        BUCLE FOR...EACH amb el qual anirem generant les
                        files de la taula amb les dades de la BD.
                    --> 
                    @foreach($exchanges as $exchange)
                        <tr>
                            <td>{{$exchange->id}}</td>
                            <td>{{$exchange->wallet_address}}</td>
                            <td>{{$exchange->balance}}</td>
                            <td>{{$exchange->platform_crypto_id}}</td>
                            <td>{{$exchange->platform_symbol}}</td>
                            <td>{{$exchange->platform_name}}</td>
                            <td>{{$exchange->currency_crypto_id}}</td>
                            <td>{{$exchange->currency_price_usd}} $</td>
                            <td>{{$exchange->currency_symbol}}</td>
                            <td>{{$exchange->currency_name}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
    <footer></footer>
</body>
</html>
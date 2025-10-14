<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    @endif
</head>

<style>
    table {
        border: 1px solid black;
        border-collapse: collapse;
        background-color: #f5f5f5;
        width: 100%;
        margin-bottom: 20px;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #333;
        color: #fff;
    }

    tr:nth-child(even) {
        background-color: #ddd;
    }

    tr:hover {
        background-color: #ccc;
    }
</style>

<body>
    @php
        if (count($dataTable) > 0) {
            echo '<table>';

            echo '<tr>';
            foreach ($dataTable[0] as $key => $value) {
                echo "<th>";
                echo $key;
                echo "<th>";
            }
            echo '</tr>';


            foreach ($dataTable as $key => $value) {
                echo '<tr>';

                foreach ($value as $key => $valorColuna) {
                    echo "<td>";
                    echo $valorColuna;
                    echo "<td>";
                }
                echo '</tr>';
            }

            echo '</table>';
        }
    @endphp
</body>

</html>
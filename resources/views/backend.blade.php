<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="/assets2/img/logo/icon.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="/assets2/img/logo/icon.png">
    <script src="/ckeditor/ckeditor.js"></script>
    <title>袋鼠購物</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div id="app"></div>

    @vite('resources/js/backend.js')
</body>
</html>
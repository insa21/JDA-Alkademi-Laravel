<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman user</title>
</head>

<body>
    <h1>Pemandangan</h1>
    <p>{{ $id }} {{ $nama }} {{ $email }}</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, eum architecto. Pariatur natus, vero aperiam
        odit voluptatibus laborum laudantium assumenda aliquam quam, eveniet voluptas? Autem aut reprehenderit laborum
        reiciendis numquam!</p>
    <img src="{{ asset('image/gunung.jpg') }}" alt="" width="100%" height="100%" srcset="">
</body>

</html>

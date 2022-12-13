<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500;700&display=swap" rel="stylesheet">
    <title>@yield('title')</title>
</head>

<body style="display: flex;
align-items: center;
flex-direction: column;
font-family: 'Roboto', sans-serif;
background: #edf2f7;">
    <div style="background: #fff; width: 100%; max-width: 600px; margin: 50px auto; border-radius: 10px; padding: 50px 32px 15px 32px;">
        <header style="display: flex;justify-content: space-between;">
            <img src="https://i.postimg.cc/GBqgGbhJ/consorcio-gcz-orion.png" alt="logo consorcio" style="width: 150px; margin-right: 300px;">
            <img src="https://i.postimg.cc/Q9C4qvFL/reconstruccion-con-cambios.png" alt="consorcio rcc" style="width: 150px;">
        </header>
        <section>
            @yield('content')
        </section>
        <section style="margin-top: 40px;">
            <p style="font-size: 16px;">Atte.</p>
            <p style="font-size: 16px;">Consorcio GCZ ORION</p>
        </section>
        <footer style="margin-top: 50px; font-size: 12px; color:#525252; text-align: center;">
            <p>No responder a este mensaje</p>
        </footer>
    </div>
</body>

</html>

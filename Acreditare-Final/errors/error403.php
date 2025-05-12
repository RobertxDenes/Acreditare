<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Resursă inaccesibilă</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="mySyle.css">
    <base href="\Acreditare-Final">
    <style>
        .buton-inapoi {
            background-color: black;
            color: red;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .buton-inapoi:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body>
    <!-- Text -->
    <div class="text-center">
        <h1 class="display-2 text-danger">Resursă la care NU ai acces!</h1>
    </div>
    <!-- buton Back -->
    <button class="buton-inapoi" onclick="history.back()">⬅️ Back</button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script>
        // verific dacă am un parametru suplimentar, numit user
        // dacă există deschid modalul de sign-up și pun valoarea recomandată
        const urlParams = new URLSearchParams(window.location.search);
        const userName = urlParams.get('user');
        if (userName) {
            // deschide modalul și pune noua valoare
            document.querySelector('#signupButon').click();
            document.querySelector('#signUpName').value = userName + '_new';
        }
    </script>
</body>

</html>
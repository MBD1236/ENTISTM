<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de desabonnement</title>
    <style>
        body {
            font-family: "Century Gothic", Arial, sans-serif;
            background-color: #ffffff;
            color: #120A5C;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
            border:  6px solid #120A5C; /* Ajout de la bordure */
        }
        img.logo {
            max-width: 200px;
            margin-bottom: 20px;
        }
        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #120A5C; /* Couleur du titre */
        }
        .message {
            margin-bottom: 20px;
        }
        .subscribe-link {
            color: #120A5C;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3 class="title">SERVICE COMMUNICATION ET INFORMATION</h3> <!-- Ajout du titre -->
        <img src="{{ asset('assets/front/img/logo/logo-5-entistmamou.png') }}" class="logo" alt="logo">
        <div class="message">
            <p>Vous vous etes desabonne de notre newsletter. Vous ne recevrez plus de nouvelles informations de notre part.</p>
            <p>Si vous souhaitez vous réabonner, <a href="{{ $subscribeLink }}" class="subscribe-link">cliquez ici</a>.</p>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Inscription des étudiants</title>
</head>
<body>
    <script src="{{ asset('assets/js/jquery.js') }} " defer></script>
    <h1>Inscription des étudiants</h1>
    <video id="video" width="640" height="480" autoplay></video>
    <button id="capture">Capturer</button>
    <canvas id="canvas" width="640" height="480" style="display:none;"></canvas>

    <script>
        navigator.mediaDevices.getUserMedia({ video: true })
            .then(function(stream) {
                var video = document.getElementById('video');
                video.srcObject = stream;
            })
            .catch(function(err) {
                console.error('Erreur d\'accès à la caméra: ', err);
            });

        document.getElementById('capture').addEventListener('click', function() {
            var video = document.getElementById('video');
            var canvas = document.getElementById('canvas');
            var context = canvas.getContext('2d');

            context.drawImage(video, 0, 0, canvas.width, canvas.height);

            // Convertir l'image en base64
            var image = canvas.toDataURL('image/jpeg');

            // Envoyer l'image au serveur (AJAX)
            // Exemple avec jQuery AJAX
            $.ajax({
                type: 'POST',
                url: '/enregistrer-image',
                data: { image: image },
                success: function(response) {
                    console.log('Image envoyée avec succès');
                },
                error: function(xhr, status, error) {
                    console.error('Erreur lors de l\'envoi de l\'image: ', error);
                }
            });
        });
    </script>
</body>
</html>

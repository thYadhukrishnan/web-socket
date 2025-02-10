<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web Socket</title>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    @yield('content')

    <script>
        // Initialize Pusher.js
        var pusher = new Pusher('local', { // Matches PUSHER_APP_KEY
            wsHost: window.location.hostname, // WebSocket host
            wsPort: 6001, // Matches PUSHER_PORT
            forceTLS: false, // Ensure this matches your WebSocket config
            disableStats: true,
            cluster: "mt1", // Matches PUSHER_APP_CLUSTER
        });

        // Subscribe to channel
        var channel = pusher.subscribe('send-message'); // Matches Laravel Event

        // Listen for event
        channel.bind('messageEvent', function(data) { // Matches Laravel broadcastAs() name
            console.log("Received event:", data);
            alert(data.message);
            // $("#message").append(`<p>${data.message}</p>`); // Append to page
        });
    </script>
</body>
</html>

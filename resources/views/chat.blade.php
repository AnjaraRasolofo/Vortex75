<!DOCTYPE html>
<html>
<head>
    <title>ChatGPT Laravel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body { font-family: Arial, sans-serif; padding: 30px; }
        input, button { padding: 10px; font-size: 16px; }
    </style>
</head>
<body>
    <h1>Chat avec ChatGPT</h1>

    <form method="POST" action="{{ route('chat.ask') }}">
        @csrf
        <input type="text" name="message" placeholder="Pose une question..." required>
        <button type="submit">Envoyer</button>
    </form>

    @isset($response)
        <h3>Réponse de ChatGPT :</h3>
        <p>{{ $response }}</p>
    @endisset
</body>
</html>

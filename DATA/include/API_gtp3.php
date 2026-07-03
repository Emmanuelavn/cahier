<style>
    body {
        font-family: Arial, sans-serif;
        width: 100vw;
    }

    h1 {
        text-align: center;
    }

    form {
        display: flex;
        flex-direction: row;
        width: 90%;
        justify-content: space-evenly;
    }

    form input:nth-child(1) {
        font-size: 16px;
        width: 500px;
        border-radius: 15px;
        padding: 10px 20px;
    }

    .chat_submit {
        cursor: pointer;
        color: white;
        border: none;
        background-color: #10a37f;
        font-size: 16px;
        font-weight: bold;
        padding: 5px 10px;
        border-radius: 20px;
    }

    .chat_submit:hover {
        scale: 1.3;
        background-color: gray;
        box-shadow: 0px 0px 1px #2222;
    }

    .chat-container {
        display: flex;
        flex-direction: column;
        max-width: 700px;
        margin: 0 auto;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 20px;
        background-color: #f5f5f5;
    }

    .chat-message {
        background-color: #fff;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 10px;
    }

    .user-message {
        background-color: #007bff;
        color: #fff;
        text-align: right;
    }

    .system-message {
        background-color: #ccc;
        font-style: italic;
    }
</style>
<h1>Chat GPT</h1>
<div class="chat-container">
    <div class="chat-history" id="chat-history">
        <?php
        // Code PHP pour récupérer et afficher l'historique complet de la conversation
        // Vous devez obtenir les messages précédents depuis votre base de données ou tout autre moyen
        // Voici un exemple basique (vous devrez adapter ceci à votre propre logique de stockage) :
        
        $historique_messages = array(
            array('role' => 'user', 'content' => 'Bonjour, comment ça va ?'),
            array('role' => 'bot', 'content' => 'Je vais bien, merci ! Comment puis-je vous aider ?'),
            // Ajoutez d'autres messages ici
        );

        foreach ($historique_messages as $message) {
            $role = $message['role'];
            $content = $message['content'];
            echo '<div class="chat-message ' . ($role === 'user' ? 'user-message' : 'system-message') . '">' . htmlspecialchars($content) . '</div>';
        }
        ?>
    </div>
    <?php

    if (isset($_POST["message"]) && isset($_POST["ok"])) {
        $message = $_POST["message"];
        $response = callOpenAI($message);
        if (isset($response['choices'][0]['message']['content'])) {
            $output = $response['choices'][0]['message']['content'];
            echo '<div class="chat-message user-message">' . htmlspecialchars($message) . '</div>';
            echo '<div class="chat-message">' . htmlspecialchars($output) . '</div>';
        } else {
            echo "<p>Aucune réponse n'a été générée.</p>";
        }
    }
    ;

    function callOpenAI($message)
    {
        $openai_token = getenv("OPENAI_API_KEY") ?: "YOUR_OPENAI_API_KEY";

        $data = array(
            "model" => "gpt-3.5-turbo",
            "messages" => array(
                array(
                    "role" => "system",
                    "content" => "tu es un expert en informatique et tu maîtrises tous les langages de programmation et tous les cours liés à l'informatique"
                ),
                array(
                    "role" => "user",
                    "content" => $message
                ),
            ),
            "max_tokens" => 50,
            "temperature" => 0.9
        );

        $headers = array(
            "Content-Type: application/json",
            "Authorization: Bearer $openai_token"
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.openai.com/v1/chat/completions");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }
    ?>
    <form method="POST">
        <input type="text" name="message" placeholder="Posez votre question à l'IA" required>
        <input type="submit" name="ok" value="Ok" class="chat_submit">
    </form>
</div>

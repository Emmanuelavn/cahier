const API_KEY = process.env.OPENAI_API_KEY || "YOUR_OPENAI_API_KEY";
const MODEL = "gpt-3.5-turbo";
const API_URL = "https://api.openai.com/v1/chat/completions";

const contextInput = document.getElementById("contextInput");
const userInput = document.getElementById("userInput");

let messageHistory = [
  {
    role: "system",
    content: contextInput.value,
  },
];

// Mettre à jour le contexte lorsqu'il est modifié
contextInput.addEventListener("input", () => {
  messageHistory[0].content = contextInput.value;
});

async function sendMessage(userMessage) {
  messageHistory.push({ role: "user", content: userMessage });

  const data = {
    model: MODEL,
    messages: messageHistory,
  };

  const response = await fetch(API_URL, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      "Authorization": `Bearer ${API_KEY}`,
    },
    body: JSON.stringify(data),
  });

  if (response.ok) {
    const json = await response.json();
    return json.choices[0].message.content;
  } else {
    throw new Error(`Erreur API: ${response.status}`);
  }
}

function appendMessage(content, role) {
  const messagesDiv = document.getElementById("messages");
  const message = document.createElement("p");
  message.innerText = `${role}: ${content}`;
  messagesDiv.appendChild(message);
}

userInput.addEventListener("keydown", async (event) => {
  if (event.key === "Enter") {
    const userMessage = userInput.value.trim();
    if (userMessage) {
      appendMessage(userMessage, "Vous");
      userInput.value = "";

      try {
        const assistantResponse = await sendMessage(userMessage);
        messageHistory.push({ role: "assistant", content: assistantResponse });
        appendMessage(assistantResponse, "Assistant");
      } catch (error) {
        console.error(error);
      }
    }
  }
});

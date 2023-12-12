var nameInput = document.querySelector("input[name='name']");
var messageInput = document.querySelector("input[name='message']");

var source = new EventSource("sse.php");
source.onmessage = function (event) {
    const textarea = document.querySelector("textarea");
    let message = "";
    const jsonData = JSON.parse(event.data);

    for (const data of jsonData) {
        const time = new Date(data.time);
        const formattedTime = time.toLocaleString();

        message += `Message: ${data.message}\n- Name: ${data.name} Time: ${formattedTime}\n\n`;
    }

    textarea.value = message;
    //select the last line
    textarea.scrollTop = textarea.scrollHeight;

};

const sendButton = document.querySelector("#send");
sendButton.addEventListener("click", function () {
    var name = nameInput.value;
    var message = messageInput.value;
    //post chat.php
    const formData = new FormData();
    formData.append("name", name);
    formData.append("message", message);

    fetch("chat.php", {
        method: "POST",
        body: formData
    });

    //clear input
    nameInput.value = "";
    messageInput.value = "";
});
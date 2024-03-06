const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=> {
    e.preventDefault(); //preventing form from submitting
}

// Sending a message
sendBtn.onclick = ()=> {
    // Using Ajax
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "php/insert-message.php", true);
    xhr.onload = ()=> {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                inputField.value = ""; // clear input field value after message send
                scrollToBottom();
            }
        }
    }
    // Sending form data through AJAX to Php
    let formData = new FormData(form); // Creating new formData Object
    xhr.send(formData); // Sending form data to Php
}

chatBox.onmouseenter = ()=> {
    chatBox.classList.add("active");
}
chatBox.onmouseleave = ()=>  {
    chatBox.classList.remove("active");
}

//Showing send and received messages 
setInterval(()=>{
    // Using Ajax
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "php/get-messages.php", true);
    xhr.onload = ()=> {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                chatBox.innerHTML = data;
                if(!chatBox.classList.contains("active")) { // if active class is not in chatbox then scroll to bottom 
                    scrollToBottom();
                }
            }
        }
    }
    // Sending form data through AJAX to Php
    let formData = new FormData(form); // Creating new formData Object
    xhr.send(formData); // Sending form data to Php
}, 500); // Function to run frequently after 500ms


// Function to Automatically scroll to the new message in a chat
function scrollToBottom() {
    chatBox.scrollTop = chatBox.scrollHeight;
}
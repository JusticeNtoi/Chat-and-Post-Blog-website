
const form = document.querySelector(".signup form"),
submitBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-txt");

form.onsubmit = (e)=> {
    e.preventDefault(); //preventing form from submitting
}

submitBtn.onclick = ()=> {
    // Using Ajax
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "php/signup.php", true);
    xhr.onload = ()=> {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                if(data == "success") {
                    location.href = "posts.php";
                } else {
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
            }
        }
    }
    // Sending form data through AJAX to Php
    let formData = new FormData(form); // Creating new formData Object
    xhr.send(formData); // Sending form data to Php
}
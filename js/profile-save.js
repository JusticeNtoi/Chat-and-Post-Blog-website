const form = document.querySelector(".profile form"),
submitBtn = form.querySelector(".profile-buttons .profile-save"),
errorText = form.querySelector(".error-txt");

form.onsubmit = (e)=> {
    e.preventDefault(); //preventing form from submitting
}

submitBtn.onclick = ()=> {
    // Using Ajax
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "php/profile.php", true);
    xhr.onload = ()=> {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                if(data == "success") {
                    location.href = "profile.php";
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
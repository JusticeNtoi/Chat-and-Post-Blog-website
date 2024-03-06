const postForm = document.querySelector(".posts .post-header .post-form"),
postTextarea = document.querySelector(".posts .post-header .post-form textarea"),
createPost = document.querySelector(".posts .post-header .create-post"),
postBtn = document.querySelector(".posts .post-header .post-form .post-btn");

const form = document.querySelector(".posts .post-header form"),
errorText = document.querySelector(".posts .post-header .error-txt"),
successText = document.querySelector(".posts .post-header .success-txt");

const mediaFile = document.getElementById('media-upload');

createPost.onclick = ()=> {
    postForm.classList.toggle("active");
    postTextarea.focus();
    postTextarea.value = "";
    mediaFile.value = '';
    
    createPost.classList.toggle("active");
    
    if (createPost.textContent === "Create a post") {
        createPost.textContent = "Cancel";
        errorText.style.display = "none";
        successText.style.display = "none";
    } else {
        createPost.textContent = "Create a post";
        errorText.style.display = "none";
        successText.style.display = "none";
    }
}

postForm.onsubmit = (e)=> {
    e.preventDefault(); //preventing form from submitting
}

postBtn.onclick = ()=> {
    // Using Ajax
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "php/create-post.php", true);
    xhr.onload = ()=> {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                if(data == "success") {
                    successText.textContent = data;
                    successText.style.display = "block";
                    errorText.style.display = "none";
                    postTextarea.value = "";
                    mediaFile.value = '';
                    postForm.classList.remove("active");
                    createPost.classList.remove("active");
                    createPost.textContent = "Create a post";
                } else {
                    errorText.textContent = data;
                    errorText.style.display = "block";
                    successText.style.display = "none";
                }
            }
        }
    }
    // Sending form data through AJAX to Php
    let formData = new FormData(form); // Creating new formData Object
    xhr.send(formData); // Sending form data to Php
}


const commentForm = document.querySelector(".comments form"),
commentTextarea = document.querySelector(".comments .comment-area .input-comment"),
commentBtn = document.querySelector(".comments .comment-area .comment-btn");

commentForm.onsubmit = (e)=> {
    e.preventDefault(); //preventing form from submitting
}

commentBtn.onclick = ()=> {
    // Using Ajax
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "php/send-comment.php", true);
    xhr.onload = ()=> {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                if(data == "success") {
                    commentTextarea.value = '';
                }
            }
        }
    }
    // Sending form data through AJAX to Php
    let formData = new FormData(commentForm); // Creating new formData Object
    xhr.send(formData); // Sending form data to Php
}
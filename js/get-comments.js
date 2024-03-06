
// Getting a posts-list class
const commentsList = document.querySelector(".comments .post-and-commets .comments-list");

// Update posts list
setInterval(()=>{
    // Using Ajax
    const url = `php/comments.data.php?post_id=${post_id}`;

    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("GET", url, true);
    xhr.onload = ()=> {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                commentsList.innerHTML = data;
            }
        }
    }
    xhr.send();
}, 500); // Function to run frequently after 500ms
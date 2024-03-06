// Getting a posts-list class
const postsList = document.querySelector(".posts .posts-list .list");

// // Update posts list
// setInterval(()=>{
//     // Using Ajax
//     let xhr = new XMLHttpRequest(); //creating XML object
//     xhr.open("GET", "php/posts.php", true);
//     xhr.onload = ()=> {
//         if(xhr.readyState === XMLHttpRequest.DONE) {
//             if(xhr.status === 200) {
//                 let data = xhr.response;
//                 postsList.innerHTML = data;
//             }
//         }
//     }
//     xhr.send();
// }, 500); // Function to run frequently after 500ms

// Function to load more posts
function loadMorePosts() {
    // Using Ajax
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "php/posts.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            let data = xhr.response;

            postsList.innerHTML = data;
            
        }
    };
    xhr.send();
}

// Load more posts when the "Load More" button is clicked
const loadMoreButton = document.querySelector(".posts-list .loadMoreButton");
loadMoreButton.addEventListener("click", loadMorePosts);

// Initial load of posts
loadMorePosts();
const searchBar = document.querySelector(".chats .search input"),
searchBtn = document.querySelector(".chats .search button"),
usersList = document.querySelector(".chats .chats-list");

searchBtn.onclick = ()=> {
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBar.value = "";
    searchBtn.classList.toggle("active");
}

// Searching users in the chat
searchBar.onkeyup = ()=>{
    let searchTerm = searchBar.value;

    // Adding active class to search Bar
    if(searchTerm != "") {
        searchBar.classList.add("active");
    } else {
        searchBar.classList.remove("active");
    }

    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "php/search.php", true);
    xhr.onload = ()=> {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                usersList.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);
}

// Update users list
setInterval(()=>{
    // Using Ajax
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("GET", "php/chats.php", true);
    xhr.onload = ()=> {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                if(!searchBar.classList.contains("active")) { // if search Bar does not contains active class
                    usersList.innerHTML = data;
                }
            }
        }
    }
    xhr.send();
}, 500); // Function to run frequently after 500ms
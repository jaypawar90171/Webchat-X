const searchbar = document.querySelector(".users .search input"),
searchbtn = document.querySelector(".users .search button"),
userList = document.querySelector(".users .users-list");
logoutbtn = document.querySelector(".logout");

searchbtn.onclick = ()=>
{
    searchbar.classList.toggle("active");
    searchbar.focus();
    searchbtn.classList.toggle("active");
}

searchbar.onkeyup = ()=>{
    let searchTerm = searchbar.value;
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/search.php", true);
    xhr.onload = ()=>
    {
        if(xhr.readyState === XMLHttpRequest.DONE)
        {
            if(xhr.status === 200)
            {
                let data  = xhr.response;
                console.log(data);
            }
        }
    }
    xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded")
    xhr.send("searchTerm=" + searchTerm);

}

setInterval(()=>
{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "php/users.php", true);
    xhr.onload = ()=>
    {
        if(xhr.readyState === XMLHttpRequest.DONE)
        {
            if(xhr.status === 200)
            {
                let data  = xhr.response;
                console.log(data);
                userList.innerHTML = data;
            }
        }
    }
    xhr.send();
}, 500) //this function will frequently after 500ms

logoutbtn.onclick = ()=>{

    
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "logout.php", true);
    xhr.onload = ()=>
    {
        if(xhr.readyState === XMLHttpRequest.DONE)
        {
            if(xhr.status === 200)
            {
                let data  = xhr.response;
                console.log("Succesfull logout");
                window.location.replace("login.php");
            }
        }
    }
    xhr.send();
}
/* This is used to show the password withe the helo of the javascript */ 

const passfile = document.querySelector(".form input[type='password']"),
toggllebtn = document.querySelector(".form .field i");

toggllebtn.onclick = ()=>{
    if(passfile.type == "password")
    {
        passfile.type = "text"; 
        toggllebtn.classList.add("active");
    }
    else
    {
        passfile.type = "password";
        toggllebtn.classList.remove("active");
    }
}
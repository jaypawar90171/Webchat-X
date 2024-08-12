const form = document.querySelector(".signup form"),
continueBtn = form.querySelector(".submit btn");
// errorText = form.querySelector(".error-txt");

form.onsubmit = (e)=>
{
    e.preventDefault();  //preaventing from form submittingp
}

continueBtn.onclick = ()=>
{
    
    let xhr = new XMLHttpRequest();  // creating xml object
    xhr.open("POST", "php/signup.php", true);
    xhr.onload = ()=>
    {
        if(xhr.readyState === XMLHttpRequest.DONE)
        {
            if(xhr.status === 200)
            {
                let data = xhr.response;
                if(data == "success")
                {

                }
                // else
                // {
                //     errorText.textcontent = data;
                //     errorText.style.display = "block";

                // }
            }
        }
    }

    //send the form data through ajax tom php
    let formData = new FormData(form);
    xhr.send(formData);
}
const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector(".button"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=>{
    e.preventDefault();
}


sendBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            console.log("message inserted");
              inputField.value = "";
              scrollToBottom();
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}

setInterval (()=>
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload = ()=>
    {
        if(xhr.readyState === XMLHttpRequest.DONE)
        {
            if(xhr.status === 200)
            {
                console.log("hello");
                let data  = xhr.response;
                chatBox.innerHTML = data;
                scrollToBottom();
            }
        }
    }

    //used to send the data from ajax to php
    let formData = new FormData(form);  // creating the FormData object
    xhr.send(formData);  // sending the form data to PHP
}, 500);  // this function will run frequently after 500ms


function scrollToBottom()
{
    chatBox.scrollTop = chatBox.scrollHeight;
}

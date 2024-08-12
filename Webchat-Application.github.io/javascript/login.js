const form = document.querySelector(".login form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/login.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                location.href = "users.php";
              }else{
                errorText.style.display = "block";
                errorText.textContent = data;
              }
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}


// <?php
//     $msg = $_SESSION['unique_id'];
//         $sql = "SELECT * FROM messages WHERE `msg_incoming_id` ='$user_id'";

//         $result = mysqli_query($conn, $sql);
//         while($row = $result -> fetch_assoc()){
//             echo '<div class="chat outgoing">
//             <div class="details">
//                 <p>'.$row['msg'].'</p>
//             </div>
//         </div>';
//         }
// ?>
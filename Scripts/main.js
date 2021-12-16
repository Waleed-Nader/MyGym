function showSI(){

    var inputs="<form class='inputSI' method='post'>"+
    "<input type='email' class='form-control' id='floatingInput' name='email' placeholder='name@example.com' required><br>"+
    "<input type='password' class='form-control' id='floatingPassword' name='password' placeholder='Password' required><br>"+
    "<button type='submit' onclick='' class='btn btn-outline-light me-2 a'>LogIn</button>"+
    "</form>";
    
if(document.getElementById("SIinput").innerHTML===""){
    document.getElementById("SIinput").innerHTML=inputs;
}
else{document.getElementById("SIinput").innerHTML="";
 }
}

function showSU(){
    
    var inputsup="<form class='inputSU' method='post'>"
    +"<h2><b>Create Account Here</b></h2><br>"+
    "<input type='text' class='form-control' id='floatingInput' name='name' placeholder='Name' required>"+
    "<input type='text' class='form-control' id='floatingInput' name='surname' placeholder='Surname' required><br>"+
    "<input type='email' class='form-control' id='floatingInput' name='email' placeholder='name@example.com' required>"+
    "<input type='password' class='form-control' id='floatingPassword' name='password' placeholder='Password' required><br>"+
    "<input type='password' class='form-control' id='floatingPassword' name='confirm-password' placeholder='Confirm Password' required><br>"+
    "<input type='submit' name='submit' value='submit' class='btn btn-outline-light me-2 a'>"+
    "</form>";
    
if(document.getElementById("SIinput").innerHTML===""){
    document.getElementById("SIinput").innerHTML=inputsup;
}
else{document.getElementById("SIinput").innerHTML="";
 }
}
function showSI(){

    var inputs="<form class='inputSI'>"+
    "<input type='email' class='form-control' id='floatingInput' placeholder='name@example.com' required><br>"+
    "<input type='password' class='form-control' id='floatingPassword' placeholder='Password' required><br>"+
    "</form>"+
    "<button type='submit' onclick='' class='btn btn-outline-light me-2 a'>Enter</button>";
if(document.getElementById("SIinput").innerHTML===""){
    document.getElementById("SIinput").innerHTML=inputs;
}
else{document.getElementById("SIinput").innerHTML="";
 }
}

function showSU(){
    
    var inputsup="<form class='inputSU'>"
    +"<h2><b>Create Account Here</b></h2><br>"+
    "<input type='text' class='form-control' id='floatingInput' placeholder='Name' required>"+
    "<input type='text' class='form-control' id='floatingInput' placeholder='Surname' required><br>"+
    "<input type='email' class='form-control' id='floatingInput' placeholder='name@example.com' required>"+
    "<input type='password' class='form-control' id='floatingPassword' placeholder='Password' required><br>"+
    "<input type='password' class='form-control' id='floatingPassword' placeholder='Confirm Password' required><br>"+
    "</form>"+
    "<button type='submit' class='btn btn-outline-light me-2 a'>Submit</button>";
if(document.getElementById("SIinput").innerHTML===""){
    document.getElementById("SIinput").innerHTML=inputsup;
}
else{document.getElementById("SIinput").innerHTML="";
 }
}
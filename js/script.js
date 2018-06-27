function pageReg() {
  registr.click();
	var result ="<div id ='contain'>" +
  "<form>"+
      "<input id='nam' type='text' placeholder='User name'>" +
      "<p id='pi'>" + "</p>" +
      "<input id='pass' type='password' placeholder='Password'>" +
      "<p id='pa'>" + " </p>"+
        "<input id='email'  type='text' placeholder='Email' >"+
        "<p id='its'>" + "</p>"+
      "<button id='sing' type='button'>" + "Check in" + "</button>" +"</form>"+ "<span class='add'>" +"+"+"</span>"+"</div>" ;
      
		document.querySelector("main").innerHTML = result;
		page = "registr";
    
    email.onkeyup = function (em) {
    if(!validateEmail(this.value)){
        email.style="border:3px solid red";
        its.innerText="wrong Email ";
        its.style.color="red";
            its.style.fontSize = "12px";
            its.style.lineHeight = " 1px";
            its.style.marginBottom = "4px";
            its.style.marginTop="-5px";
         
    }
    else if(validateEmail(this.value) ){
         email.style="border:3px solid green";
        its.innerText=" ";
    }
     
}
    nam.onkeyup = function (name) {
    if(!validateName(this.value)){
        nam.style="border:3px solid red";
        pi.innerText="wrong Name ";
        pi.style.color="red";
            pi.style.fontSize = "12px";
            pi.style.lineHeight = " 1px";
            pi.style.marginBottom = "4px";
            pi.style.marginTop="-5px";
         
    }
    else if(validateName(this.value) ){
         nam.style="border:3px solid green";
        pi.innerText=" ";
    }
     
}
pass.onkeyup = function (passe) {
    if(!validatePass(this.value)){
        pass.style="border:3px solid red";
        pa.innerText="wrong Password ";
        pa.style.color="red";
            pa.style.fontSize = "12px";
            pa.style.lineHeight = " 1px";
            pa.style.marginBottom = "4px";
            pa.style.marginTop="-5px";
         
    }
    else if(validatePass(this.value)){
         pass.style="border:3px solid green",
        pa.innerText=" "
    }
     
}

$(".add").on("click", function(){   
    $(".add").addClass("del");
   $("button").before(" <div class='d'> <input  class='m' type='text' placeholder='Email' > <p class='dell'>-</p></div>");
    $(".dell").click(function(){
             $(".d:hover" ).remove()
        })
     $(".m").keyup (function (em) {
    if(!validateEmail(this.value) || !check_unique ('nextEmail', $(".m").val(), arr)){
       $(".m").css({
           border:"3px solid red",
           color:"red"})     
    }
    else if(validateEmail(this.value) && check_unique ('nextEmail', $(".m").val(), arr) ){
        $(".m").css({
           border:"3px solid green",
           color:"#333"})  
    }
     
})
    
         
$("#sing").click(function(){
                 if (validateName(nam.value) &&
		validateEmail(email.value) &&    
		validatePass(pass.value) &&
        check_unique ('email', email.value, arr) 
                     )
		{
                 arr.push ({
			          name: nam.value,
			          email: email.value,
			          password: pass.value,
                      nextEmail: [$(".m")
                                     .eq(0)
                                     .val(), $(".m")
                                       .eq(1)
                                       .val(), $(".m")
                                       .eq(2)
                                       .val()]
                     
		          })
                 alert( "Successful Registration")}
    else if (validateName(nam.value) &&
		validateEmail(email.value) &&    
		validatePass(pass.value) &&
        check_unique ('email', email.value, arr) &&
             check_unique ('nextEmail', $(".m").val(), arr) &&
                     validateEmail($(".m").val()) ){
         arr.push ({
			          name: nam.value,
			          email: email.value,
			          password: pass.value,
                      nextEmail: [$(".m")
                                       .eq(0)
                                       .val(), $(".m")
                                       .eq(1)
                                       .val(), $(".m")
                                       .eq(2)
                                       .val()] 
		          })
                 alert( "Successful Registration")
    }
            
            else {
		alert( "Not Valid Fields")
	}
                 })
     
})
   
}

pageReg();


registr.onclick = function (event) {
	event.preventDefault();
	pageReg();
};


var arr =[];
function validateEmail(em) {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(em);
    
}
function validateName(name) {
    return /^[a-zA-Z'][a-zA-Z-' ]+[a-zA-Z']?$/.test(name);
}


function validatePass(passe) {
    return /[A-Za-z0-9]{8,}/.test(passe);
}


function check_unique (field_name, param, arr) {

	for (var index in arr) {

		if (arr[index][field_name] === param) {

			return false;
		}
	}
	return true;
}
function check_login (email, pass, arr) {

    for (var index in arr) {

        if (arr[index]['email'] === email && arr[index]['password'] === pass) {

            return true;
        }
    }
    return false;
}

$(".add").click();




 








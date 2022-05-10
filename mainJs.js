function emailFunction() {
    let spanVaild = document.getElementById("demo");
    let email     = document.getElementById("email");
    let button    = document.getElementById("button");

    let mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  
    if(email.value == ' '){
    spanVaild.innerHTML = 'Type Valid Email';
    spanVaild.style.color = "red";
    button.style.visibility = "hidden";
}else if(email.value.match(mailformat)){
    spanVaild.innerHTML = ' * Email Valid';
    spanVaild.style.color = "green";
    button.style.visibility = "visible";

  }else{
    spanVaild.innerHTML = 'Type Valid Email';
    spanVaild.style.color = "red";
    button.style.visibility = "hidden";
}
}
  
function numberFunction(){
  
      let NumberSpan = document.getElementById("NumberValid");
      let number     = document.getElementById("number");
      let button     = document.getElementById("button");

      if(number.value.length  < 10 || number.value.length > 10 ){
        NumberSpan.innerHTML = "Your number Must Be Eqale 10";
        NumberSpan.style.color = "red";
        button.style.visibility = "hidden";
      }else if(){
        NumberSpan.innerHTML = "Phone Number Valid";
        NumberSpan.style.color = "green";
        button.style.visibility = "visible";

      }
  
}
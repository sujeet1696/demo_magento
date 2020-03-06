 alert("Done");

function checkForm(form) {

    var letters = /^[a-zA-Z]+$/;
      if( form.name.value.match(letters)) {
        true;
      } else {
          // document.getElementById('nameerror').innerHTML='**only characters are allowed';
      alert("envalid name");
          return false;
      }
        if(form.name.length < 3 ) {
        // document.getElementById('nameerror').innerHTML='**name must be in 3 to 20 characters';
          alert("envalid name");
        document.form.name.focus();
        return false;
      }
      if(form.name.length > 20) {
        // document.getElementById('nameerror').innerHTML='**name must be in 3 to 20 characters';
        alert("envalid name");
        document.form.name.focus();
        return false;
      }



if (form.password.value != form.Confirmpass.value) {
  console.log(form.password.value);
alert("The password you have entered is not Matched!");
form.password.focus();
return false;
}


if(form.phno.value.length!=10){
alert("You have entered invalid phone number!");
// form.mobile.focus();
return false ;
}


if (form.password.value.length < 8)
{ alert("You have entered less than 8 characters for password");
 form.password.focus();
  return false;
}
if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(registration.email.value)) {
  return true;
}
  alert("You have entered an invalid email address!");
   registration.email.focus();
    return false;
}

function validate(){
    var username = document.getElementById('username').value;
    var email = document.getElementById('emailid').value;
    var address = document.getElementById('add').value;
    var mob = document.getElementById('mob').value;
    var country = document.getElementById('country');
    var selectedcountry = country.options[country.selectedIndex].value;
    var age = document.getElementById('age').value;
    var dob = document.getElementById('dob').value;
    var gender = document.getElementsByName('Gender');
    var password = document.getElementById('password').value;
    var tnc = document.getElementById('tnc').checked;

    if(username.trim() == ""){
      alert("Please enter your username!");
      return false;
    }
    else if(email.trim() == ""){
      alert("Please enter your email id!");
      return false;
    }
    else if(mob.trim()==""){
      alert("Please enter your mobile number!");
      return false;
    }
    else if(address.trim()==""){
      alert("Please enter your Address");
      return false;
    }
    else if(selectedcountry == ""){
      alert("Please select your country");
      return false;
    }
    else if(age.trim() == ""){
      alert("Please enter your age");
      return false;
    }
    else if((gender[0].checked==false) && (gender[1].checked==false) && (gender[2].checked==false)){
      alert("Please select your gender");
      return false;
    }
    else if(dob == ""){
      alert("Please enter your date of birth");
      return false;
    }
    else if(password.trim()== ""){
      alert("Please enter password");
      return false;
    }
    else if(tnc!=true){
      alert("Please agree to the terms and conditions");
      return false;
    }
    else{
      if(username.trim()!=""){
        var u = /^[a-z0-9\._]$/;
        if((username.trim().length<6) || (username.trim().length>20))
        {
          document.getElementById("un").innerHTML ="<br>username must contain 6-20 characters";
          document.getElementById("un").style.visibility="visible";
          return false;
        }
        if(password.search(/[a-z]/) == -1 && password.search(/[0-9]/) == -1 ){
          document.getElementById("un").innerHTML ="<br>username must contain combination of lowercase alphabets and numbers";
          document.getElementById("un").style.visibility="visible";
          return false;
        }
      }

      if(email.trim()!=""){
        var x = /^([a-zA-Z0-9\.-_]+)@([a-zA-Z0-9]+)\.([a-z]{2,10})(\.[a-z]{2,10})?$/;
        if(x.test(email)==false){
          document.getElementById("a0").innerHTML="Invalid";
          document.getElementById("a0").style.color="Red";
          document.getElementById("a0").style.visibility="visible";
          return false
        }
        else{
          document.getElementById("a0").innerHTML="Valid";
          document.getElementById("a0").style.color="Green";
          document.getElementById("a0").style.visibility="visible";
        }
      }


      if(mob.trim()!=""){
        var y = /^[789]{1}[0-9]{9}$/;
        if(y.test(mob)==false){
          document.getElementById("a1").innerHTML="Invalid";
          document.getElementById("a1").style.color="Red";
          document.getElementById("a1").style.visibility="visible";
          return false
        }
        else{
          document.getElementById("a1").innerHTML="Valid";
          document.getElementById("a1").style.color="Green";
          document.getElementById("a1").style.visibility="visible";
        }
      }


      if(age.trim()!=""){
        if(age>=100 || age<18){
          document.getElementById("a2").innerHTML="Invalid";
          document.getElementById("a2").style.color="Red";
          document.getElementById("a2").style.visibility="visible";
          return false;
        }
      }

      if(password.trim()!="")
      {
        if((password.trim().length<6) || (password.trim().length>10))
        {
          document.getElementById("pw").innerHTML ="<br>password must contain 6-8 characters";
          document.getElementById("pw").style.visibility="visible";
          return false;
        }
        if(password.search(/[A-Z]/) == -1){
          document.getElementById("pw").innerHTML ="<br>password must contain atleast one Uppercase alphabet";
          document.getElementById("pw").style.visibility="visible";
          return false;
        }
        if(password.search(/[a-z]/) == -1){
          document.getElementById("pw").innerHTML ="<br>password must contain atleast one lowercase alphabet";
          document.getElementById("pw").style.visibility="visible";
          return false;
        }
        if(password.search(/[0-9]/) == -1){
          document.getElementById("pw").innerHTML ="<br>password must contain atleast one number";
          document.getElementById("pw").style.visibility="visible";
          return false;
        }
        if(password.search(/[0-9]/) == -1){
          document.getElementById("pw").innerHTML ="<br>password must contain atleast one number";
          document.getElementById("pw").style.visibility="visible";
          return false;
        }
        if(password.search(/[\@\#\$\%\&\;\:\.\,\*\-]/) == -1){
          document.getElementById("pw").innerHTML ="<br>password must contain atleast one special character";
          document.getElementById("pw").style.visibility="visible";
          return false;
        }
      }
      alert('form submitted successfully');
      return true;
    }
  }
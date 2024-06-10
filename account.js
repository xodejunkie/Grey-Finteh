var step1 = document.getElementById("step1");
var step2 = document.getElementById("step2");
var step3 = document.getElementById("step3");
var step4 = document.getElementById("step4");
//var progres = document.getElementsByClassName("progres");
var progreslist = document.getElementById("progreslist");
var result = document.getElementById("result");
var warning = document.getElementById("warning");
var changes = document.getElementById("changes");
//functions

function move1(){
    var fname = document.getElementById("sname");
    var mname = document.getElementById("mname");
    var oname = document.getElementById("oname");
    var job = document.getElementById("job");
    var m_status = document.getElementById("m-status");
    var position = document.getElementById("position");
    //validation
    if(fname.value == ""){
        result.style.display = "block";
        warning.innerHTML = "Please fill in your surname name";
        return false;
    }else if(mname.value == ""){
        result.style.display = "block";
        warning.innerHTML = "Please fill in your middle name";
        return false;
    }else if(oname.value == ""){
        result.style.display = "block";
        warning.innerHTML = "Please fill in your othername";
        return false;
    }else if(job.value == ""){
        result.style.display = "block";
        warning.innerHTML = "Please fill in your job title";
        return false;
    }else if(m_status.value == "Marital status"){
        result.style.display = "block";
        warning.innerHTML = "Wrong marital status selected";
        return false;
    }else if(position.value == ""){
        result.style.display = "block";
        warning.innerHTML = "Please fill in your position at were you work";
        return false;
    }else{
        warning.innerHTML = "";
        step1.style.display = "none";
        step2.style.display = "block";
        changes.classList.remove("progres");
        changes.classList.add("progres2");
        return false;
    }
   
}
//back1
function back1(){
        warning.innerHTML = "";
        step1.style.display = "block";
        step2.style.display = "none";
        changes.classList.remove("progres2");
        changes.classList.add("progres");
        return false;
}
function move2(){
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var home = document.getElementById("home").value;
    var city = document.getElementById("city").value;
    var state = document.getElementById("state").value;
    var zipcode = document.getElementById("zipcode").value;
    var country = document.getElementById("country").value;
    //validation
    if(email == ""){
        result.style.display = "block";
        warning.innerHTML = "Please fill in your valid email address";
        return false;
    }else if(phone == ""){
        result.style.display = "block";
        warning.innerHTML = "Please fill in your valid phone number";
        return false;
    }else if(home = ""){
        result.style.display = "block";
        warning.innerHTML = "Please fill in your home address";
        return false;
    }else if(city == ""){
        result.style.display = "block";
        warning.innerHTML = "Please fill in your city";
        return false;
    }else if(state == ""){
        result.style.display = "block";
        warning.innerHTML = "Please fill in your state";
        return false;
    }else if(zipcode == ""){
        result.style.display = "block";
        warning.innerHTML = "Please fill in your zip-code";
        return false;

    }else if(country == ""){
        result.style.display = "block";
        warning.innerHTML = "Please fill in your country";
        return false;
    }else{
        warning.innerHTML = "";
        step2.style.display = "none";
        step3.style.display = "block";
        changes.classList.remove("progres2");
        changes.classList.add("progres3");
        return false;
    }
}

function back3(){
        warning.innerHTML = "";
        step2.style.display = "block";
        step3.style.display = "none";
        changes.classList.remove("progres3");
        changes.classList.add("progres2");
        return false;

}

//function3
function move3(){
    var acname = document.getElementById("acname").value;
    var deposite = document.getElementById("deposite").value;
    var type_acc = document.getElementById("type_acc").value;
    var currency = document.getElementById("currency").value;
    //validation
    if(acname == ""){
        result.style.display = "block";
        warning.innerHTML = "Please fill in your account name";
        return false;
    }else if(deposite == ""){
        result.style.display = "block";
        warning.innerHTML = "Please fill in deposite";
        return false;
    }else if(type_acc == "Type of Account"){
        result.style.display = "block";
        warning.innerHTML = "Please select the a valid account type";
        return false;
    }else if(currency == "Choose Currency"){
        result.style.display = "block";
        warning.innerHTML = "Please select the a valid currency";
        return false;
    }else{
        warning.innerHTML = "";
        step3.style.display = "none";
        step4.style.display = "block";
        changes.classList.remove("progres3");
        changes.classList.add("progres4");
        return false;
    }

}

function back4(){
        warning.innerHTML = "";
        step3.style.display = "block";
        step4.style.display = "none";
        changes.classList.remove("progres4");
        changes.classList.add("progres3");
        return false;
}

//function four
function move4(){
    var question = document.getElementById("question").value;
    var answer = document.getElementById("answer").value;
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var r_password = document.getElementById("r_password").value;
    if(question == "Security question"){
        result.style.display = "block";
        warning.innerHTML = "Please select the a valid security question";
        return false; 
    }else if(answer == ""){
        result.style.display = "block";
        warning.innerHTML = "Please fill in a valid answer";
        return false;
    }else if(username == ""){
        result.style.display = "block";
        warning.innerHTML = "Please fill in your user id";
        return false;
    }else if(password == ""){
        result.style.display = "block";
        warning.innerHTML = "Please fill in your password";
        return false;
    }else if(password != r_password){
        result.style.display = "block";
        warning.innerHTML = "Please your password did not match";
        return false;
    }else{
        warning.innerHTML = "";
        step4.style.display = "none";
        step5.style.display = "block";
        changes.classList.remove("progres4");
        changes.classList.add("progres5");
        return false;
    }
}

function back5(){
    warning.innerHTML = "";
    step4.style.display = "block";
    step5.style.display = "none";
    changes.classList.remove("progres5");
    changes.classList.add("progres4");
    return false;
}
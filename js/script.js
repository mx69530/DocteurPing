function validateForm() {
    var pseudo = document.forms["loginForm"]["pseudo"].value;
    var pass = document.forms["loginForm"]["pass"].value;
    if (pseudo == null || pseudo == "" || pass == null || pass == "") {
        alert("Name must be filled out");
        return false;
    }
}

function checkPseudo() {
 var pseudo = document.getElementById("pseudo").value;
    if (pseudo == "") {
        document.getElementById("pseudo").style.backgroundColor = "#ff8c8c";
    }
    else{
        document.getElementById("pseudo").style.backgroundColor = "#a5edb6";
    }	
}

function checkPass() {
$(document).click(function(event) {
    var pass = $(event.target).text();
});

console.log(pass);
 var pass = document.getElementById("pass").value;
    if (pass == "") {
        document.getElementById("pass").style.backgroundColor = "#ff8c8c";
    }
    else{
        document.getElementById("pass").style.backgroundColor = "#a5edb6";
    }	
	
	$(document).ready(function() {
    $("a").click(function(event) {
        alert(event.target.id);
    });
});
	
	
}

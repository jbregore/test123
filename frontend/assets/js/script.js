//toggle menu
var menuItems = document.getElementById("menuItems");

menuItems.style.maxHeight = "0px";

function menuToggle() {
	if(menuItems.style.maxHeight == "0px"){
		menuItems.style.maxHeight = "200px";
		document.getElementById('title-hide').style.display = "none";
	}
	else{
		menuItems.style.maxHeight = "0px";
		document.getElementById('title-hide').style.display = "block";
	}
}

function menuToggleAccount() {
	if(menuItems.style.maxHeight == "0px"){
		menuItems.style.maxHeight = "200px";
	}
	else{
		menuItems.style.maxHeight = "0px";
	}
}
 
//action.html toggle form
var LoginForm = document.getElementById("LoginForm");
var RegForm = document.getElementById("reg-form");
var Indicator = document.getElementById("Indicator");

function register() {
	RegForm.style.transform = " translateX(0px) ";
	LoginForm.style.transform = " translateX(0px) ";
	Indicator.style.transform = " translateX(100px) ";
	document.getElementById('password-check').innerHTML = "";
	document.getElementById('txt-user-username').value = "";
	document.getElementById('password-user-password').value = "";
	document.getElementById('password-user-password-confirm').value = "";
}

function login() {
	RegForm.style.transform = " translateX(400px) ";
	LoginForm.style.transform = " translateX(400px) ";
	Indicator.style.transform = " translateX(0px) ";
	document.getElementById('login-check').innerHTML = "";
	document.getElementById('login-user-username').value = "";
	document.getElementById('login-user-password').value = "";
}
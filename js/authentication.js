function login() {
	event.preventDefault()
	document.getElementById('login-form').action = auth;
	document.getElementById('login-form').method ='post'
	document.getElementById('login-form').submit();
}


<nav class="navbar bg-custom navbar-expand-lg">
	<div id='admin-navbar' class="container-fluid">
		<a id='home-link' href='' class="m-0 navbar-brand prime-font text-white font-16pt" onclick="sessionStorage.removeItem('studentInfo');">
			<h1>DataPi</h1>
		</a>
		<div>
			<ul class="row m-0">
				<li><a href="" class="text-warning secondary-font" onclick='logOut()'>Logout</a></li>
			</ul>
		</div>
	</div>
</nav>
<script>
	document.getElementById('home-link').href = window.localStorage.getItem('home')
</script>
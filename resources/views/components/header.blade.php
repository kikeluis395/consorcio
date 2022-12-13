<header class="header">
	<div class="container">
		<div class="header__content">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container-fluid">
					<a class="navbar-brand" href="/">
						<img  class="header__brand" src="{{ asset('images/consorcio_gcz_orion.png')}}" title="Consorcio GCZ Orion" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNavDropdown">
						<ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
							<li class="nav-item">
								<a class="nav-link {{ (request()->is('consorcio')) ? 'active' : '' }}" aria-current="page" href="/consorcio">Consorcio</a>
							</li>
						
						
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle {{ (request()->is('paquete5/*')) ? 'active' : '' }}" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									Paquete 5
								</a>
								<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
									<li><a class="dropdown-item " href="/paquete5/tarcilla">IE 005 Tarcilla de Jesús Granda Mora</a></li>
									<li><a class="dropdown-item" href="/paquete5/soterito">IE 094 Soterito Lopez Espinoza</a></li>
								</ul>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle  {{ (request()->is('paquete6/*')) ? 'active' : '' }}" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									Paquete 6
								</a>
								<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
									<li><a class="dropdown-item" href="/paquete6/ancash-costa">Ancash Costa</a></li>
									<li><a class="dropdown-item" href="/paquete6/ancash-sierra">Ancash Sierra</a></li>
									<li><a class="dropdown-item" href="/paquete6/cajamarca">Cajamarca</a></li>
									<li><a class="dropdown-item" href="/paquete6/la-libertad">La Libertad</a></li>
								</ul>
							</li>
							<li class="nav-item">
								<a class="nav-link btn-politica" href="/politica-antifraude">Política antifraude</a>
							</li>
							
						</ul>
						<a class="navbar-brand navigation__brand">
							<img class="header__brand" src="{{ asset('images/reconstruccion_con_cambios.png')}}" title="REConstruccion con Cambios" alt="">
						</a>
					</div>
				</div>
			</nav>
		</div>
	</div>
</header>
<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">

		<title>SYSEYEID</title>

	</head>
	<body class="bg-white font-sans">

		<header class="bg-white relative z-20 px-6">
			<div class="container mx-auto flex justify-between items-center relative h-24">
			<img src="{{ asset('images/syseyeidLogo.png') }}" class="h-12 w-auto rounded-full" />
				<a href="#" class="w-64 h-full inline-block py-4  items-center font-black text-lg">
					   SYS EYE ID
				</a>

				<ul class="hidden md:flex flex-1 h-full justify-end items-center text-sm">
					<li class="ml-6"><a href="{{ route('login') }}">Login</a></li>
					<li class="ml-6"><a href="{{ route('register') }}">Cadastre-se</a></li>
					
				</ul>

			
			</div>
		</header>

		<div class="w-full bg-blue-600">

			<div class="w-full h-full relative flex items-center justify-center py-24">

				<img src="{{ asset('images/olho.jpg') }}" class="absolute top-0 left-0 w-full h-full object-cover opacity-30" />

				<div class="px-6 max-w-4xl relative z-10 text-center">
					<h1 class="text-3xl md:text-4xl font-black text-white leading-tight mb-2">SYS EYE ID</h1>
					<h2 class="text-lg md:text-2xl font-condensed text-white leading-tight mb-8">Inteligência artificial na oftalmologia</h2>
					<a href="#" class="inline-block bg-white font-condensed text-primary py-2 px-5 text-base rounded-full hover:shadow-lg hover:bg-blue-600 hover:text-white">Saiba Mais</a>
				</div>

			</div>

		</div>

		<div class="bg-gray-100 py-24 px-12">
			<div class="container mx-auto">

				<div class="flex flex-wrap">

					<div class="mb-12 lg:mb-0 w-full lg:flex-1">
						<h2 class="mb-4 font-black leading-tight text-xl md:text-3xl text-gray-900">Ut enim ad minim veniam, quis nostrud.</h2>
						<h3 class="mb-6 text-sm md:text-lg text-gray-700 max-w-xl">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</h3>

						<ul class="py-6 mb-6">
							<li class="flex items-center mb-6">
								<img src="https://images.unsplash.com/photo-1487958449943-2429e8be8625?w=450" class="w-24 h-24 object-cover" />
								<div class="pl-5">
									<h4 class="font-black text-base md:text-lg text-gray-900 leading-tight mb-2">At tellus at urna condimentum.</h4>
									<p class="text-xs md:text-sm text-gray-700 leading-snug max-w-sm">Etiam dignissim diam quis enim lobortis scelerisque fermentum dui. Gravida rutrum quisque non tellus orci ac auctor augue.</p>
								</div>
							</li>
							<li class="flex items-center mb-6">
								<img src="https://images.unsplash.com/photo-1527576539890-dfa815648363?w=450" class="w-24 h-24 object-cover" />
								<div class="pl-5">
									<h4 class="font-black text-base md:text-lg text-gray-900 leading-tight mb-2">At tellus at urna condimentum.</h4>
									<p class="text-xs md:text-sm text-gray-700 leading-snug max-w-sm">Etiam dignissim diam quis enim lobortis scelerisque fermentum dui. Gravida rutrum quisque non tellus orci ac auctor augue.</p>
								</div>
							</li>
							<li class="flex items-center">
								<img src="https://images.unsplash.com/photo-1431576901776-e539bd916ba2?w=450" class="w-24 h-24 object-cover" />
								<div class="pl-5">
									<h4 class="font-black text-base md:text-lg text-gray-900 leading-tight mb-2">At tellus at urna condimentum.</h4>
									<p class="text-xs md:text-sm text-gray-700 leading-snug max-w-sm">Etiam dignissim diam quis enim lobortis scelerisque fermentum dui. Gravida rutrum quisque non tellus orci ac auctor augue.</p>
								</div>
							</li>
						</ul>

						<a href="#" class="inline-block bg-blue-600 text-white py-2 px-5 text-base rounded-full hover:shadow-lg">View all products</a>
					</div>

					<div class="w-full lg:w-5/12 px-12">

						<div class="bg-white p-4 rounded-lg shadow-lg">
							<img src="https://images.unsplash.com/photo-1439337153520-7082a56a81f4?w=800" class="w-full h-auto rounded" />
						</div>
					</div>

				</div>

			</div>
		</div>

		<div class="bg-white p-12 py-24">
				
			<div class="max-w-2xl mx-auto text-center mb-12">
				<h2 class="font-black leading-tight text-xl md:text-3xl mb-4">Ligula ullamcorper malesuada proin</h2>
				<p class="text-sm md:text-base font-condensed max-w-lg mx-auto">Etiam non quam lacus suspendisse faucibus interdum posuere lorem ipsum. Massa eget egestas purus viverra accumsan in.</p>
			</div>

			<div class="container mx-auto">
				
				<div class="flex flex-wrap justify-center items-center">
					
					<div class="mb-12 lg:mb-0 w-full lg:w-3/12 text-right">
						<div class="bg-white p-4 rounded-lg shadow-lg w-full">
							<img src="https://images.unsplash.com/photo-1493286825465-8b922d030e9c?w=800" class="w-full h-auto object-cover rounded" />
						</div>
					</div>
					
					<div class="w-full lg:flex-1 max-w-2xl text-sm lg:pl-12 text-gray-800">
						<h3 class="text-xl mb-3">Blandit volutpat maecenas volutpat blandit aliquam etiam</h3>
						<p class="mb-3">Ac auctor augue mauris augue neque gravida in fermentum et. Nunc id cursus metus aliquam eleifend mi in nulla posuere. Erat velit scelerisque in dictum non. Ut enim blandit volutpat maecenas volutpat. Blandit massa enim nec dui nunc mattis enim. Cursus risus at ultrices mi tempus imperdiet.</p>
						<p class="mb-3">Iaculis eu non diam phasellus vestibulum lorem sed risus. Lacus suspendisse faucibus interdum posuere lorem ipsum dolor sit amet. Nibh ipsum consequat nisl vel pretium lectus quam id. Convallis aenean et tortor at risus viverra. Sed odio morbi quis commodo odio aenean sed. Lobortis scelerisque fermentum dui faucibus in. Leo urna molestie at elementum eu facilisis. Eu volutpat odio facilisis mauris sit amet massa vitae.</p>
						<p>Tristique senectus et netus et malesuada fames ac turpis egestas. Blandit volutpat maecenas volutpat blandit aliquam etiam erat velit scelerisque. Pharetra massa massa ultricies mi quis.</p>
					</div>

				</div>

			</div>

		</div>

		<div class="bg-blue-600 text-white p-12">
				
			<div class="container mx-auto">
				
				<div class="flex flex-wrap justify-between items-center">
					<div class="text-center lg:text-left w-full mb-6 lg:mb-0 lg:w-auto">
						<strong class="font-black text-lg md:text-3xl">Excepteur sint occaecat cupidatat non</strong>
					</div>
					<div class="text-center lg:text-right w-full md:w-auto">
						<a href="#" class="inline-block bg-white text-blue-600 py-2 px-5 text-base rounded-full hover:shadow-lg">Get in touch!</a>
					</div>
				</div>

			</div>

		</div>
		


		<div class="bg-white py-24 px-12">
			
			<div class="max-w-xl mx-auto text-center">
				<h2 class="mb-2 font-black text-xl lg:text-3xl text-gray-900">Ut enim ad minim veniam.</h2>
				<h3 class="mb-6 text-base lg:text-lg text-gray-700 max-w-xl">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</h3>
			</div>

			<div class="conatiner mx-auto">
				
				<div class="flex flex-wrap">
					
					<div class="w-full lg:w-1/3 p-4">
						<a href="#" class="block w-full h-full relative rounded-lg overflow-hidden shadow-lg">
							<img src="https://images.unsplash.com/photo-1495431088732-09e59535d241?w=800" />

							<div class="absolute top-0 left-0 w-full h-full flex items-center justify-center">
								<div class="p-6 py-8 text-center max-w-xs relative">

									<div class="absolute left-0 top-0 w-full h-full bg-black opacity-50"></div>

									<div class="relative z-10">
										<h4 class="mb-2 font-display text-lg text-white">Ut enim ad minim veniam.</h4>
										<h5 class="mb-4 font-condensed text-xs text-white px-4">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</h5>
										<span class="inline-block bg-white font-condensed text-primary py-2 px-5 text-xs rounded-full">Find out more</span>
									</div>
								</div>
							</div>
						</a>
					</div>
					
					<div class="w-full lg:w-1/3 p-4">
						<a href="#" class="block w-full h-full relative rounded-lg overflow-hidden shadow-lg">
							<img src="https://images.unsplash.com/photo-1495431088732-09e59535d241?w=800" />

							<div class="absolute top-0 left-0 w-full h-full flex items-center justify-center">
								<div class="p-6 py-8 text-center max-w-xs relative">

									<div class="absolute left-0 top-0 w-full h-full bg-black opacity-50"></div>

									<div class="relative z-10">
										<h4 class="mb-2 font-display text-lg text-white">Ut enim ad minim veniam.</h4>
										<h5 class="mb-4 font-condensed text-xs text-white px-4">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</h5>
										<span class="inline-block bg-white font-condensed text-primary py-2 px-5 text-xs rounded-full">Find out more</span>
									</div>
								</div>
							</div>
						</a>
					</div>
					
					<div class="w-full lg:w-1/3 p-4">
						<a href="#" class="block w-full h-full relative rounded-lg overflow-hidden shadow-lg">
							<img src="https://images.unsplash.com/photo-1495431088732-09e59535d241?w=800" />

							<div class="absolute top-0 left-0 w-full h-full flex items-center justify-center">
								<div class="p-6 py-8 text-center max-w-xs relative">

									<div class="absolute left-0 top-0 w-full h-full bg-black opacity-50"></div>

									<div class="relative z-10">
										<h4 class="mb-2 font-display text-lg text-white">Ut enim ad minim veniam.</h4>
										<h5 class="mb-4 font-condensed text-xs text-white px-4">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</h5>
										<span class="inline-block bg-white font-condensed text-primary py-2 px-5 text-xs rounded-full">Find out more</span>
									</div>
								</div>
							</div>
						</a>
					</div>

				</div>

			</div>

		</div>

		<div class="bg-gray-200 px-6 py-12">

			<footer class="container mx-auto">

				<div class="flex flex-col md:flex-row">
					<div class="md:w-1/4 flex flex-col mb-12 md:mb-0">
						<h4 class="font-condensed pb-4">Legal</h4>
						<a href="#" class="text-sm text-gray-800 py-1">Privacy Policy</a>
						<a href="#" class="text-sm text-gray-800 py-1">Terms & Conditions</a>
					</div>
					<div class="md:w-1/4 flex flex-col mb-12 md:mb-0">
						<h4 class="font-condensed pb-4">About</h4>
						<a href="#" class="text-sm text-gray-800 py-1">Company Information</a>
						<a href="#" class="text-sm text-gray-800 py-1">History</a>
					</div>
					<div class="md:w-1/4 flex flex-col mb-12 md:mb-0">
						<h4 class="font-condensed pb-4">Services</h4>
						<a href="#" class="text-sm text-gray-800 py-1">Buildings</a>
						<a href="#" class="text-sm text-gray-800 py-1">Construction</a>
					</div>
					<div class="md:w-1/4 flex flex-col mb-12 md:mb-0">
						<h4 class="font-condensed pb-4">Find us</h4>
						<a href="#" target="_blank" class="text-sm text-gray-800 py-1">Office Location</a>
						<a href="#" target="_blank" class="text-sm text-gray-800 py-1">Contact Us</a>
					</div>
				</div>

				<div class="flex justify-between items-end pt-12">
					<div class="w-full md:w-1/2">
						<div>
							<p class="text-sm text-gray-700">Copyright © 2019 Company Name.</p>
							<p class="text-xs text-gray-700 mt-2">Etiam dignissim diam quis enim lobortis scelerisque fermentum dui.</p>
						</div>
					</div>
				</div>

			</footer>
		</div>

	</body>
</html>
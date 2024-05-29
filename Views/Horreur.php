<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    <style>
        * {
	box-sizing: border-box;
}

:root {
	--pad: clamp(1rem, 2vw, 3rem);
}

img {
	width: 100%;
	display: block;
}

body {
	margin: 0;
	padding: var(--pad) 0;
	font-family: "Open Sans", sans-serif;
}

a {
	color: inherit;
}

.wrapper {
	max-width: 80rem;
	margin: 0 auto;
	padding: 0 var(--pad);
}

.wrapper > * + * {
	margin-top: var(--pad);
}

ol {
	list-style: none;
	padding: 1.5rem;
	border: 0.1rem solid lightgrey;
	columns: 16rem;
	column-gap: calc(var(--pad) * 2);
	column-rule: 0.2rem dotted turquoise;
	border-radius: 0.5rem;
}

li {
	--y: calc(100% - 2rem);
	display: grid;
	grid-template-columns: minmax(3.75em, auto) 1fr;
	gap: 0 0.5em;
	break-inside: avoid;
  page-break-inside: avoid;
	background: radial-gradient(circle at 30% var(--y), rgb(50 50 50), rgb(0 0 0));
	color: white;
	border-radius: 0.75rem;
	overflow: hidden;
	box-shadow: 0.25rem 0.25rem 0.5rem rgb(0 0 0 / 0.17)
}

li + li {
	margin-top: 1rem;
}

li img {
	grid-column: 1 / 3;
	grid-row: 1;
	aspect-ratio: 1.8;
	object-fit: cover;
}

li::before {
	counter-increment: list-item -1;
	content: counter(list-item);
	font-weight: 700;
	font-size: 4.5em;
	letter-spacing: -0.125em;
	line-height: 1;
	color: turquoise;
	grid-column: 1;
	grid-row: span 2;
	align-self: end;
	margin: 0 0 -0.15em -0.15em;
}

li span {
	grid-column: 2;
}

li span:first-of-type {
	font-size: 1.5em;
	padding-top: 1rem;
}

li span:last-of-type {
	font-style: italic;
	padding-bottom: 1rem;
}

.divider {
	background: lavender;
	min-height: 6rem;
	padding: var(--pad) 0;
	width: 100vw;
	margin-left: 50%;
	transform: translate3d(-50%, 0, 0);
}

.divider a {
	text-decoration: none;
	display: inline-block;
	background: turquoise;
	padding: 0.5rem 1rem;
	border-radius: 0.5rem;
	font-size: 1.2rem;
	font-weight: 700;
}

h1 {
	font-size: clamp(1.5rem, 1vw + 2rem, 3.5rem);
}

h2 {
	font-size: clamp(1.3rem, 1vw + 1.6rem, 3rem);
	margin: 0;
}

.divider * + * {
	margin: 1.5rem 0 0 0;
}

.divider p {
	font-size: 1.4rem;
}
    </style>
    <div class="form-group">
<form  action="../Controller/GenreController.php" method="GET">
			<input type="text" name="horreur" class="input" placeholder="search by name ..." />
		<button class="btn btn-default" type="submit" name="rechHor">rechercher</button>
</form>
    <div class="wrapper">
	<ol reversed start="20">
		<li>
			<img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcR11JjAZEJC15LtCkF-8KU8zLEDfavPEen4WNf3ZIH2HIMJa88l" />
			<span>Dracula</span>
			<span>Roman de Bram Stoker</span>
		</li>
		<li>
			<span>Ça</span>
			<span>Roman de Stephen King</span>
		</li>
		<li>
			<span>La Sélection</span>
			<span> Livre de Kiera Cass</span>
		</li>
		<li>
			<span>Simetierre</span>
			<span>Roman de Stephen King</span>
		</li>
		<li>
			<img src="https://m.media-amazon.com/images/I/91Iyd7H54SL._SL1500_.jpg"  />
			<span>Carrie</span>
			<span> Roman de Stephen King</span>
		</li>
		<li>
			<span>Misery</span>
			<span>Roman de Stephen King</span>
		</li>
		<li>
			<img src="https://cdn.leslibraires.fr/Odo8p0Sznn3xavDF5uWVATJNXnzQbY8dCQrmIDW0Nqs/s:800:600/NjU1NjcyMw.webp" />
			<span>Salem</span>
			<span>Roman de Stephen King</span>
		</li>
		<li>
			<img src="https://media.electre-ng.com/images/image-id/12ecb7f00cac494b26943bc80519b4db88b081ee5cd506a427648e8c348d147a.jpg"  />
			<span>Frankenstein ou le Prométhée modern </span>
			<span>Roman de Mary Shelley</span>
		</li>
		<li>
        <span>Terreur</span>
			<span>Roman de Dan Simmons</span>
		</li>
		<li>
			<img src="https://static.fnac-static.com/multimedia/images_produits/ZoomPE/2/2/4/9782277123422/tsp20090710215343/Un-Bebe-pour-Rosemary.jpg"  />
			<span>Un bébé pour Rosemary</span>
            <span>Roman d'Ira Levin</span>

		</li>
	</ol>
	
	
</div>
</body>
</html>
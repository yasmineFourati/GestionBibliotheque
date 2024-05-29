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
			<input type="text" name="amour" class="input" placeholder="search by name ..." />
		<button class="btn btn-default" type="submit" name="rechR">rechercher</button>
</form>
    <div class="wrapper">
	<ol reversed start="25">
		<li>
			<img src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTlo1JXJvsaWfrTNaIcy_zFYxqNVGRFMjZMqoSYySOkdpegyscU" />
			<span>Irrésistible Alchimie</span>
			<span>Livre de Simone Elkeles</span>
		</li>
		<li>
			<span>Fascination</span>
			<span>Livre de Stephenie Meyer</span>
		</li>
		<li>
			<span>La Sélection</span>
			<span> Livre de Kiera Cass</span>
		</li>
		<li>
			<span>Les Hauts de Hurlevent</span>
			<span>Roman d'Emily Brontë</span>
		</li>
		<li>
			<img src="https://img2.cdn.cinoche.com/images/031ff37bc9018c3c967f7b36d2dd79e1.jpg"  />
			<span>Orgueil et Préjugés</span>
			<span> Roman de Jane Austen</span>
		</li>
		<li>
			<span>Jane Eyre</span>
			<span>Roman de Charlotte Brontë</span>
		</li>
		<li>
			<img src="https://static.fnac-static.com/multimedia/PE/Images/FR/NR/e6/40/c2/12730598/1507-1/tsp20240202084326/Avant-toi.jpg" />
			<span>Jamais plus</span>
			<span>Livre de Colleen Hoover</span>
		</li>
		<li>
			<img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcT_U8k4IRqRjXtRgpI0fARJN7IEL0Zfbxj9meRa9Ql-LB76gpw4"  />
			<span>Avant toi </span>
			<span>Roman de Jojo Moyes</span>
		</li>
		<li>
        <span>Laisse tomber la neige </span>
			<span>Livre de Cécile Chomin</span>
		</li>
		<li>
			<img src="https://m.media-amazon.com/images/I/61NTcMNEh9L._SL1311_.jpg"  />
			<span>The Book of Ivy - Tome 1</span>
		</li>
	</ol>
	
	
</div>
</body>
</html>
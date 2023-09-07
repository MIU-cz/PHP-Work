<?php
require '_tags-items.php';

$postItem = [
	'tag' => '',
	'title' => 'last post header from DB by tag',
	'text' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse id voluptate amet placeat beatae tempora eveniet officiis sint',
	'autor' => 'Cube Doe',
	'date' => date('d F Y', getDate()[0]),
	'img' => './src/img/blog-foto-tmp.svg'
];

$colPost = 10;

?>

<div class="main__container">
	<div class="main__content">
		<div class="main__item_container">
			<div class="main__item_content">
				<div class="item_foto"></div>
				<div class="item_tag"></div>
				<div class="item_autor">
					<div class="autor_foto"></div>
					<div class="autor_name"></div>
					<div class="deco_dot"></div>
					<div class="autor_date"></div>
				</div>
			</div>
		</div>
	</div>

	<div class="aside__content"></div>
</div>
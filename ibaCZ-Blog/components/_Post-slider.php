<?php
require '_tags-items.php';

$postItem = [
	'tag' => '',
	'title' => 'last post header from DB by tag',
	'autor' => 'Cube Doe',
	'date' => date('d F Y', getDate()[0]),
	'img' => './src/img/blog-foto-tmp.svg'
];

?>

<div class="slider_container">
	<?php
	foreach ($tag as $tagName) {
		echo '
			<div class="slider_item_container" style="background-image: url(' . $postItem['img'] . ')">
				<div class="item_content">
					<div class="item_tag">
						<button class="tag_btn" name="' . $tagName . '">' . $tagName . '</button>
					</div>
					<div class="item_title">
						<h3>' . $postItem['title'] . '</h3>
					</div>
					<div class="item_description">
						<div class="item_autor">' . $postItem['autor'] . '</div>
						<div class="item_date">' . $postItem['date'] . '</div>
					</div>
				</div>
			</div>	
			
		';
	}
	?>
</div>

<div class="pag_btns">
	<?php
	for ($i = 0; $i < count($tag); $i++) {
		echo '
			<button class="pagBtn" name="pag-btn-' . $tag[$i] . '"></button>
		';
	}
	?>

</div>
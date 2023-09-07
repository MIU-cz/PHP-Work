<?php
require '_tags-items.php';

$postItem = [
	'tag' => '',
	'title' => 'last post header from DB by tag',
	'text' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse id voluptate amet placeat beatae tempora eveniet officiis sint',
	'foto' => './src/img/autor-foto.png',
	'autor' => 'Cube Doe',
	'date' => date('d F Y', getDate()[0]),
	'img' => './src/img/blog-foto-tmp.svg'
];

$postBtn = [
	'share' => '
		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share-fill" viewBox="0 0 16 16">
			<path d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5z"/>
		</svg>',
	'more' => '
		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
			<path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
		</svg>'
];

$colPost = 10;

?>

<div class="main__container">
	<div class="main__content">
		<?php
		for ($i = 1; $i <= $colPost; $i++) {
			$tagIndx = round(rand(0, 4));

			echo '
				<div class="main__item_container">
					<div class="main__item_content">
						<div class="item_foto">
							<img src="' . $postItem['img'] . '" alt="blog-foto - ' . $postItem['img'] . '">
							<div class="item_tag"> 
								<button class="tag_btn" name="post-tag-' . $tag[$tagIndx] . '">
								' . $tag[$tagIndx] . '
								</button>
							</div>
						</div>					

						<div class="item_content">
							<div class="item_autor">
								<div class="autor_foto">
									<img src="' . $postItem['foto'] . '" alt="foto-' . $postItem['foto'] . '">
								</div>

								<div class="autor_name">
									<span>' . $postItem['autor'] . '</span>
								</div>
								
								<div class="autor_date">
									<span>' . $postItem['date'] . '</span>
								</div>
							</div>

							<div class="item_title">
								<h3>' . $postItem['title'] . '</h3>
							</div>
							
							<div class="item_text">
								<p>' . $postItem['text'] . '</p>
							</div>

							<div class="item_btns">
								<button class="post_btn" name="btn-share">' . $postBtn['share'] . '</button>
								<button class="post_btn" name="btn-more">' . $postBtn['more'] . '</button>
							</div>
						</div>
					</div>
				</div>
			';
		}
		?>

	</div>

	<div class="aside__content"></div>
</div>
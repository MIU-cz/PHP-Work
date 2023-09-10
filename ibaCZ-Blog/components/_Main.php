<?php
require '_tags-items.php';
require '_smm-bar.php';

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

$postItemAside = [
	'foto' => './src/img/blog-foto-tmp.svg',
	'title' => 'post item title',
	'date' => date('d F Y', getDate()[0])
];

?>

<div class="main__container">
	<div class="main__content_container">
		<div class="main__content">
			<?php
			for ($i = 1; $i <= $colPost; $i++) {
				$tagIndx = round(rand(0, 4));
				$colectionIndx = round(rand(0, 2));

				if ($i % 3 == 1) {
					$colectionBtn = '
						<button class="rounded_btn" name="post-collection-">
							' . $colection[$colectionIndx] . '
						</button>
				';
				} else {
					$colectionBtn = '';
				}

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

							<div class="item_tag_collection"> 	
							' . $colectionBtn . '							
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

		<div class="main_pagBtn_container">
			<button class="pagBtnBig">1</button>
			<button class="pagBtnBig">2</button>
			<button class="pagBtnBig">3</button>
		</div>
	</div>

	<div class="aside__content">
		<div class="aside_item_container brand_item">
			<div class="brand_logo">
				<img src="./src/img/logo-blog.svg" alt="logo-blog">
			</div>
			<div class="aside_text">
				<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse id voluptate amet placeat beatae tempora eveniet officiis sint</p>
			</div>
			<div class="smm__links_container">
				<ul class="links_content">
					<?php
					$smmBar($smmLinks);
					?>
				</ul>
			</div>
		</div>

		<div class="aside_item_container post_item">
			<div class="item_title">
				<h3>popular posts</h3>
			</div>

			<?php
			for ($i = 0; $i < 3; $i++) {
				echo '
				<div class="item">
					<div class="item_foto">
						<img src="' . $postItemAside['foto'] . '" alt="' . $postItemAside['foto'] . '">
					</div>
					<div class="item_description">
						<h2><a href="">' . $postItemAside['title'] . '</a></h2>
						<p>' . $postItemAside['date'] . '</p>
					</div>
				</div>
				';
			}
			?>

		</div>

		<div class="aside_item_container topics_item">
			<div class="item_title">
				<h3>Explore topics</h3>
			</div>

			<?php
			for ($i = 0; $i < 7; $i++) {
				echo '
				<div class="topic_item">
					<div class="item_deco">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
						</svg>
					</div>
					<div class="topic_title"><a href="">topic-title-' . ($i + 1) . '</a></div>
					<div class="topic_counts">(' . (round(rand(1, 10))) . ')</div>
				</div>
				';
			}
			?>


		</div>

		<div class="aside_item_container news_item">
			<div class="item_title">
				<h3>Newsletter</h3>
			</div>

			<div class="form_container">
				<div class="form_title">
					<span>Join 70,000 subscribers!</span>
				</div>
				<div class="form_content">
					<form action="" method="post" name="newsSubscribe">
						<input type="email" placeholder="Email adress ...">
						<button type="submit" class="form_btn">Sign up</button>
					</form>
				</div>
			</div>
		</div>

		<div class="aside_item_container celebrate_item">
			<div class="item_title">
				<h3>header item</h3>
			</div>
			<?php
			echo '
				<div class="item_container">
					<div class="_content">
						<div class="item_foto">
							<img src="' . $postItem['img'] . '" alt="blog-foto - ' . $postItem['img'] . '">
							<div class="item_tag"> 
								<button class="tag_btn" name="post-tag-' . $tag[$tagIndx] . '">
								' . $tag[4] . '
								</button>
							</div>	
						</div>		
					</div>					

					<div class="item_content">
						<div class="item_title">
							<h4>' . $postItem['title'] . '</h4>
						</div>
						<div class="item_autor">
							<div class="autor_name">
								<span>' . $postItem['autor'] . '</span>
							</div>
							
							<div class="autor_date">
								<span>' . $postItem['date'] . '</span>
							</div>
						</div>
					</div>
				</div>
			';

			?>

			<div class="item_btns">
				<button class="post_btn">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
					</svg>
				</button>
				<button class="post_btn">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
					</svg>
				</button>
			</div>

		</div>

		<div class="aside_item_container tags_item">
			<div class="item_title">
				<h3>tag clouds</h3>
			</div>

			<div class="tag_container">
				<?php
				foreach ($tag as $item) {
					echo '
					<button class="main_btn">#' . $item . '</button>
					';
				}
				?>

			</div>
		</div>

	</div>
</div>

<div class="instagram_container">
	<div class="instagram_btns">
		<button class="tag_btn">@Cube on Instagram</button>
	</div>

	<div class="instagram_content">
		<?php
		for ($i = 1; $i <= 6; $i++) {
			echo '
			
				<div class="insta_item">
					<img src="' . $postItem['img'] . '" alt="' . $postItem['img'] . '">
				</div>
			
			';
		}
		?>
	</div>

</div>
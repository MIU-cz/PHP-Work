<?php
require "_header-items.php";
?>

<div class="header__container">
	<div class="header_content">
		<div class="smm__links_container">
			<ul class="links_content">
				<?php
				$smmBar($smmLinks);
				?>
			</ul>
		</div>

		<div class="brand_container">
			<div class="brand_pic">
				<img src="./src/img/autor-foto.png" alt="autor-foto">
			</div>
			<div class="brand_logo">
				<img src="./src/img/logo-blog.svg" alt="logo-blog">
			</div>

			<div class="brand_title">
				<h1>professional writer & professional blogger</h1>
			</div>
		</div>

		<div class="btn_container" id="headerBtns">
			<button class="rounded_btn header_btn" id="btnSearch">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
					<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
				</svg>
			</button>
			<button class="rounded_btn header_btn" id="btnMenu"> </button>

			<div class="search_container hide"></div>
			<div class="menu_container hide"></div>
		</div>
	</div>


</div>

<nav class="header__navBar">
	<ul class="navbar_menu">
		<?php
		$menuBar($menuItems);
		?>
	</ul>
</nav>
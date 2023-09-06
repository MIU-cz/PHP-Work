<?php
// MENU Items
// ======================
$menuItems = [
	'Home' => [
		'Magazine',
		'Personal',
		'Personal Alt',
		'Minimal',
		'Classic'
	],
	'Lifestyle',
	'Inspiration',
	'Pages' => [
		'page-1',
		'page-2',
		'page-3'
	],
	'Contact'
];

$decoIco = [
	'toDown' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
				<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
			</svg>',
	'toRight' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
				<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
 			 </svg>'
];

$menuBar = function ($menuItems) use ($decoIco) {
	foreach ($menuItems as $key => $item) {
		if (is_array($item)) {
			echo '
				<li class="menu_item">
					<a href="?' . $key . '" onclick="showDropItems(event, \'' . $key . '\')">
					' . $key . '
					&nbsp;
					' . $decoIco['toDown'] . '
					</a>
					<ul class="drop_menu hide" name="' . $key . '">
			';
			foreach ($item as $tabItem) {
				echo '						
						<li class="drop_item">
							<a href="?' . $tabItem . '">
							' . $tabItem . '
							</a>
						</li>
					';
			}
			echo '
				</ul>
				</li>
			';
		} else {
			echo '
				<li class="menu_item">
					<a href="?' . $item . '">
					' . $item . '
					</a>
				</li>
			';
		}
	}
};

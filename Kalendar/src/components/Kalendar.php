<div class="kal_container">
	<table id="kalendar" data="<?php echo $season ?>">
		<caption class="kal_title">
			<?php
			echo '<div class="kal_navi">';
			echo '<a class="btn_cal" href="?month=' . $new_month - 1 . '&year=' . $new_year . '">' . $kal_btn['prev'] . '</a>';
			echo '<a class="btn_cal" href="?month=' . $cur_month . '">' . $kal_btn['cur_month'] . '</a>';
			echo '<a class="btn_cal" href="?month=' . $new_month + 1 . '&year=' . $new_year . '">' . $kal_btn['next'] . '</a>';
			echo '</div>';
			echo '<span>' . $cur_month_str . '</span><span>' . $new_year . '</span>';
			?>
		</caption>
		<thead>
			<tr class="row_header">
				<?php
				foreach ($weekday as $day) {
					echo '
						<th>' . $day . '</th>
						';
				}
				?>
			</tr>
		</thead>

		<tbody>
			<?php
			$d = 1;
			while ($d <= $col_days) {
				echo '<tr class="row_kal">';
				for ($w = 1; $w <= 7; $w++) {
					if ($d == 1 && $w < $cur_firstday_month || $d > $col_days) {
						echo '<td></td>';
					} else {
						if ($d == $cur_day && $new_month == $cur_month) {
							echo '<td class="cur_day">';
						} else {
							echo '<td>';
						}
						echo '<a href="?year=' . $new_year . '&month=' . $new_month . '&day=' . $d . '">' . $d . '</a>
								</td>
								';
						$d++;
					}
				}
				echo '</tr>';
			}
			?>
		</tbody>
	</table>
</div>
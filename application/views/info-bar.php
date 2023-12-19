 <span style="color:green;">
				  <!-- <span style="color: red;">This is the first span. </span>
				  <span style="color: green;">This is the second span. </span>
				  <span style="color: blue;">This is the third span. </span> -->
				  
					<?php if (!empty($berita)): 
					$nomerBerita = 1;
					?>
					
						<?php foreach ($berita as $data_info): ?>
						<?php $hariIni = $this->indonesian_calendar->isToday($data_info->started_date, $data_info->ended_date);
						?>
						<?php if ($hariIni): ?>
							Berita #<?=$nomerBerita;?> : 
							(<?= $this->indonesian_calendar->konversiDateWithoutHour($data_info->started_date); ?>) <?= $data_info->berita; ?>
							&emsp;<?php $nomerBerita++; ?>
						<?php endif; ?>
						<?php endforeach; ?>
					
					<?php else: ?>
							<p>No News!</p>
					<?php endif; ?>
						
</span>
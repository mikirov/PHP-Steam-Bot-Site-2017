<?php foreach($items as $item) { ?>
			<h4>
				<?php
					$i=0;
					foreach($item as $key => $value){
						echo "<p style='color:white;'>$key : $value</p>";
						if($i>=15){
							break;
						}
						$i +=1;
					}
					$description = $item['descriptions'];
					foreach ($description as $key => $value) {
						echo "<p style='color:white;'>$key : $value</p>";
					}
				?>
			</h4>
		<?php } ?>

													<?php foreach ($_Sayfa as $sayfa) if(
														(!isset($sayfa['menudeGoster'])||$sayfa['menudeGoster'])
														&& ( (!empty($sayfa['giris']) && !empty($LOGIN)) || !isset($sayfa['giris']) )
														) { 
														?><li <?php if($S==$sayfa['S'])echo 'class="active"' ?>>
															<a href="?s=<?php echo $sayfa['S'] ?>">
																<?php echo $sayfa['ad'] ?>
															</a>
														</li><?php
													} ?>
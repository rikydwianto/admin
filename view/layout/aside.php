  <aside class="left-sidebar" data-sidebarbg="skin5">
	<div class="scroll-sidebar">
		<nav class="sidebar-nav">
			<ul id="sidebarnav">
				<?php 
				foreach(menu_side() as $link){
					?>
				<li class="sidebar-item">
					<a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?=$link['url']?>"
						aria-expanded="false">
						<i class="mdi <?=$link['icon']?>"></i>
						<span class="hide-menu"><?=$link['caption']?></span>
					</a>
				</li>
					<?php
				} 
				
				?>
				
				
			</ul>
		</nav>
	</div>
</aside>

<div id="nav_menu" class="grid_16">
	<p>
		
		<?php
		/**
		 * @TODO 
		 * Tentativa de preencher com o maior número de itens de menu.
		 *
		 */
		for($i=0; $i<=7; $i++) {
			echo anchor('controller/action', 'Option'.$i.'', 'title="teste"');
		}
		echo anchor('admin/index', 'Admin', 'title="Admin"');
		?>
		
		
	</p>
</div>
<div class="clear"></div>
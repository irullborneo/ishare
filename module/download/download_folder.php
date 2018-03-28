<div class="row" style="margin-top: 100px">
	<div class="col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
		<div class="panel panel-primary">
			<div class="panel-heading">
			<?php echo getIcon('1') ?> DOWNLOAD FOLDER
			</div>
			<div class="panel-body">
				<ul class="list-group">
					<?php
						$sql=mysql_query("SELECT * FROM folder WHERE id='$id[1]' AND code='$id[0]'");
						$data=mysql_fetch_array($sql);

						$sqlfile=mysql_query("SELECT * FROM file WHERE id_induk='$data[id]'");
						while($file=mysql_fetch_array($sqlfile)){
							echo "<li class=\"list-group-item\"><a target='_blank' style=\"display: block;\" href=\"".getUrl2($file['id'], $file['id_type'])."\">".getIcon($file['id_type'])." $file[name_file]</a></li>
							";
						}
					?>
				</ul>
			</div>
		</div>
	</div>
</div>


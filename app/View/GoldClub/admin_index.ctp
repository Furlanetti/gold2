<div class="row-fluid">

	<h3 class="header smaller lighter blue">Lista de Gold Club</h3>

	<div id="table_reporter_wrapper" class="dataTables_wrapper" role="grid">
		
		<table id="table_report" class="table table-striped table-bordered table-hover dataTable" aria-describeby="table_report_info">
			<thead>
				<tr role="row">				
					<th class="sorting" role="columnheader" tabindex="0" aria-controls="table_report" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending" style="width: 390px;">Nome</th>
					<th class="sorting" role="columnheader" tabindex="0" aria-controls="table_report" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending" style="width: 390px;">Conteúdo</th>
					<th class="sorting" role="columnheader" tabindex="0" aria-controls="table_report" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending" style="width: 390px;">Data de Nasc.</th>
					<th class="sorting" role="columnheader" tabindex="0" aria-controls="table_report" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending" style="width: 390px;">Sexo</th>
					<th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="" style="width: 80px;"></th>
				</tr>
			</thead>

			<tbody role="alert" aria-live="polite" aria-relevant="all">

				<?php foreach($gold as $i => $goldclub) : ?>
					<tr class="odd">
						<td><?=$goldclub['GoldClub']['name']?></td>
						<td><?=$goldclub['GoldClub']['content']?></td>
						<td><?=$goldclub['GoldClub']['nasc_date']?></td>
						<td><?=$goldclub['GoldClub']['sex']?></td>
						<td class="td-actions">
							<div class="hidden-phone visible-desktop btn-group">

								<?php echo $this->Html->link('<i class="icon-edit bigger-120"></i>', '../GoldClub/edit/'.$goldclub['GoldClub']['id'], array('class' => 'btn btn-mini btn-info', 'escape' => false)); ?>

								<?php echo $this->Html->link('<i class="icon-trash bigger-120"></i>', '../GoldClub/delete/'.$goldclub['GoldClub']['id'], array('class' => 'btn btn-mini btn-danger', 'escape' => false), 'Tem certeza que deseja excluir essa equipe?'); ?>

							</div>
							<div class="hidden-desktop visible-phone">
								<div class="inline position-relative">
									<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
										<i class="icon-caret-down icon-only bigger-120"></i>
									</button>

									<ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">
										<li>											
											<?php echo $this->Html->link('<span class="green"><i class="icon-edit"></i></span>', '../GoldClub/edit/'.$goldclub['GoldClub']['id'], array('class' => 'tooltipo-success', 'data-rel' => 'tooltip', 'data-placement' => 'left', 'data-original-title' => 'Editar', 'escape' => false)) ?>										
										</li>											

										<li>
											<?php echo $this->Html->link('<span class="red"><i class="icon-trash"></i></span>', '../GoldClub/delete/'.$goldclub['GoldClub']['id'], array('class' => 'tooltip-error', 'data-rel' => 'tooltip', 'data-placement' => 'left', 'data-original-title' => 'Deletar', 'escape' => false), 'Tem certeza que deseja excluir essa equipe?') ?>
										</li>
									</ul>
								</div>
							</div>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>



		</table>

	</div>

</div>

<script type="text/javascript">
	$(function() {				
		
		
		$('table th input:checkbox').on('click' , function(){
			var that = this;
			$(this).closest('table').find('tr > td:first-child input:checkbox')
			.each(function(){
				this.checked = that.checked;
				$(this).closest('tr').toggleClass('selected');
			});
				
		});
	
		$('[data-rel=tooltip]').tooltip();
	})

</script>
<div class="row-fluid">

	<h3 class="header smaller lighter blue">Lista de Marcas</h3>

	<div id="table_reporter_wrapper" class="dataTables_wrapper" role="grid">
		
		<table id="table_report" class="table table-striped table-bordered table-hover dataTable" aria-describeby="table_report_info">
			<thead>
				<tr role="row">				
					<th class="sorting" role="columnheader" tabindex="0" aria-controls="table_report" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending" style="width: 190px;">Título</th>
					<th class="sorting_disabled th-actions" role="columnheader" rowspan="1" colspan="1" aria-label="" style="width: 299px;"></th>
				</tr>
			</thead>

			<tbody role="alert" aria-live="polite" aria-relevant="all">

				<?php foreach($brands as $i => $brand) : ?>
					<tr class="odd">
						<td><?=$brand['Brand']['title']?></td>						
						<td class="td-actions" align="center">
							<div class="hidden-phone visible-desktop btn-group">

								<?php echo $this->Html->link('<i class="icon-edit bigger-120"></i>', '../brands/edit/'.$brand['Brand']['id'], array('class' => 'btn btn-mini btn-info', 'escape' => false)); ?>

								<?php echo $this->Html->link('<i class="icon-trash bigger-120"></i>', '../brands/delete/'.$brand['Brand']['id'], array('class' => 'btn btn-mini btn-danger', 'escape' => false), 'Tem certeza que deseja excluir esse Marca?'); ?>

							</div>
							<div class="hidden-desktop visible-phone">
								<div class="inline position-relative">
									<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
										<i class="icon-caret-down icon-only bigger-120"></i>
									</button>

									<ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">

										<li>											
											<?php echo $this->Html->link('<span class="green"><i class="icon-edit"></i></span>', '../brands/edit/'.$brand['Brand']['id'], array('class' => 'tooltipo-success', 'data-rel' => 'tooltip', 'data-placement' => 'left', 'data-original-title' => 'Editar', 'escape' => false)) ?>										
										</li>											

										<li>
											<?php echo $this->Html->link('<span class="red"><i class="icon-trash"></i></span>', '../brands/delete/'.$brand['Brand']['id'], array('class' => 'tooltip-error', 'data-rel' => 'tooltip', 'data-placement' => 'left', 'data-original-title' => 'Deletar', 'escape' => false), 'Tem certeza que deseja excluir essa Marca?') ?>
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
<?php
switch ($ak) {
	default:
	try{
		$admin->beginTransaction();
		$admin->query("SELECT * FROM pendaftaran WHERE id = :id");
		$admin->bind(":id", 1);
		$admin->execute();
		$row = $admin->fetch();
		$admin->endTransaction();
	} catch (PDOException $e) {}
		?>
        <div class="col-md-4"></div>
        <div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">CMB Masuk</div>
					<div class="panel-body">
						<div class="table-responsive"></div>
					</div>
                    <div class="panel-footer">* Refresh halaman setelah dirubah/diedit.</div>
				</div>
			</div>
		</div>
	</div>

		<script type="text/javascript">
		$(document).ready(function() {
			AksiForm.init({
				formID: $('#formAksi')
			}, panggilAjaxTable);
			panggilAjaxTable();
			$('.fileinput').fileinput();
		});
		function panggilAjaxTable() {
			TableAjax.init({
				tableID: $('.table-responsive'),
				dataTable: "<?php echo $go ?>",
				url: "<?php echo $self ?>"
			});
			return;
		};
		</script>
         	<script type="text/javascript">
			$(function(){
				// fancybox
				$(".fancybox").fancybox({
					openEffect : 'elastic',
					closeEffect : 'elastic',
					nextEffect : 'elastic',
					prevEffect : 'elastic'
				});
			});
			</script>
		<?php
		break;
}
?>
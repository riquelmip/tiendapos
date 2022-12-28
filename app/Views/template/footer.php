
			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>AdminKit</strong></a> - <a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>Bootstrap Admin Template</strong></a>								&copy;
							</p>
						</div>
						
					</div>
				</div>
			</footer>
		</div>
	</div>
  
	
  <!--<script src="<?= base_url()?>/js/bootstrap.bundle.min.js"></script>-->
  <script src="<?= base_url()?>/js/app.js"></script>
  <script src="<?= base_url()?>/plugins/dataTables/jquery-3.5.1.js"></script>
  <script src="<?= base_url()?>/plugins/dataTables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url()?>/plugins/dataTables/dataTables.bootstrap5.min.js"></script>
  <!--Agregando href al btn ok con la url que trae el target href-->
  <script>
	$('#modal-confirm').on('show.bs.modal', function(e){
		$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
	});
  </script>
  <script>
      $(document).ready(function () {
          $('#example').DataTable();
      });
  </script>

</body>

</html>
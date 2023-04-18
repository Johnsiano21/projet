
<script>
$(document).on('click','.edit',function(e){
	e.preventDefault();
	var num = $(this).parent().siblings()[0].value;
	$.ajax({
		url : "<?php echo base_url(); ?>"+"/logement/getSingleLogement/"+num,
		method : "GET",
		success : function(result){
			
			var res = JSON.parse(result);
			$(".updateNum").val(res.id);
			$(".updateType").val(res.type_vente);
			$(".updatePrix").val(res.prix);
			$(".updateCite").val(res.cite);
			$(".updateDate").val(res.Date_achat);
			$(".updateId").val(res.num);
			
		}
	})

})
</script>

<div class="container-xl">
	<div class="table-responsive d-flex flex-column">
		<?php
			if(session()->getFlashdata("success")){

		?>
		<div class="alert w-50 align-self-center alert-success alert-dismissible fade show" role="alert">
			<?php echo session()->getFlashdata("success"); ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php
		}
		?>
	 
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>vente d'immobilier<b> VENTE</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Ajout de nouveau logement</span></a>
												
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						
						<th>Client n°:</th>
						<th>Type de vente</th>
						<th>Prix</th>
						<th>Cité</th>
                        <th>Date d'achat</th>
                        <th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					if($logement){
						foreach($logement as $log){

					
					?>
					
					                 
					<tr>
                        <input type="hidden" id="userId" name="id" value = "<?php echo $log['num'];?>" >
						
						<td><?php echo $log['id'];?></td>
						<td><?php echo $log['type_vente'];?></td>
                        <td><?php echo $log['prix'];?></td>
						<td><?php echo $log['cite'];?></td>
                        <td><?php echo $log['Date_achat'];?></td>
						<td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="btn btn-warning" data-toggle="tooltip" title="Acheter">Acheter</i></a>
							<a href="facture" class="btn btn-danger" title="Imprimer">Imprimer</a>
						</td>
					</tr>
					<?php
					}
				}
			?>

				</tbody>
			</table>
			<div class="d-flex justify-content-center align-items-center">
				<ul class="pagination">
					<li class = "page-item"><a href="/PHP_Igniter" class = "page-link">CLIENT</a></li>
					<li class = "page-item active"><a href="#" class = "page-link">ACHAT</a></li>
				</ul>
			</div>
		</div>
	</div>        
</div>
<!-- Add Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action = "<?php echo base_url().'/logement/saveLogement'; ?>" method = "POST" >
				<div class="modal-header">						
					<h4 class="modal-title">Nouveau logement</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>client n°:</label>
						<input type="text" class="form-control" name="id">
					</div>
					<div class="form-group">
						<label>Type de vente</label>
					<select name="type_vente" id="gender" class="form-control" required>
                        <option>Credit</option>
                        <option>Comptant</option>
                    </select>
					</div>
					<div class="form-group">
						<label>Prix</label>
						<input type="text" class="form-control" name="prix" required>
					</div>
					<div class="form-group">
						<label>Cité</label>
						<input type="text" class="form-control" name="cite" required>
					</div>
					<div class="form-group">
						<label>Date d'achat</label>
						<input type="date" class="form-control" name="Date_achat" >
					</div>				
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" name="submit" data-dismiss="modal" value="Annuler">
					<input type="submit" class="btn btn-success" value="Ajouter">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action = "<?php echo base_url().'/logement/updateLogement'; ?>" method = "POST">
				<div class="modal-header">						
					<h4 class="modal-title">Acheter Logement</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
                    <input type="hidden" name="updateId" class = "updateId" >					
					<div class="form-group">
						<label>Client n°:</label>
						<input type="text" class="form-control updateNum" name = "id" required>
					</div>
					<div class="form-group">
						<label>Type de vente</label>
					<select name="type_vente" id="gender" class="form-control updateType" required>
                        <option>Credit</option>
                        <option>Comptant</option>
                    </select>
                    </div>
					<div class="form-group">
						<label>Prix</label>
						<input type="text" class="form-control updatePrix" name = "prix"  required>
                    </div>
					<div class="form-group">
						<label>Cité</label>
						<input type="text" class="form-control updateCite" name = "cite"  required>
                    </div>			
					<div class="form-group">
						<label>Date d'achat</label>
						<input type="date" class="form-control updateDate" name = "Date_achat" required>
                    </div>						
				</div>
				<div class="modal-footer">
					<input type="button" name = "submit" class="btn btn-default" data-dismiss="modal" value="Annuler">
					<input type="submit" class="btn btn-info" value="Enregistrer">
				</div>
			</form>
		</div>
	</div>
</div>


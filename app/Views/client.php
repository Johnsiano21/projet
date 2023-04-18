
<script>
$(document).on('click','.edit',function(e){
	e.preventDefault();
	var id = $(this).parent().siblings()[0].value;
	$.ajax({
		url : "<?php echo base_url(); ?>"+"/getSingleClient/"+id,
		method : "GET",
		success : function(result){

		var res = JSON.parse(result);
		$(".updateNom").val(res.nom);
		$(".updatePrenom").val(res.prenom);
		$(".updateAdresse").val(res.adrs);
		$(".updateLieu").val(res.lieu_travail);
		$(".updateId").val(res.id);
		}
	})


})

$(document).on('click','.delete',function(e){
	e.preventDefault();

	var id = $(this).parent().siblings()[0].value;
	$.ajax({
		url : "<?php echo base_url(); ?>"+"/deleteClient",
		method : "POST",
		data : {id : id},
		success : function(res){
			if(res.includes("1")){
				window.location.href = window.location.href;
			}
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
						<h2>vente d'immobilier<b> CLIENT</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Ajout de nouveau client</span></a>
												
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						
						<th>Nom</th>
						<th>Prenom</th>
						<th>Adresse</th>
                        <th>Lieu de travail</th>
                        <th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					if($client){
						foreach($client as $cli){

					
					?>
					                 
					<tr>
                        <input type="hidden" id="userId" name="id" value = "<?php echo $cli['id'];?>" >
						
						<td><?php echo $cli['nom'];?></td>
						<td><?php echo $cli['prenom'];?></td>
                        <td><?php echo $cli['adrs'];?></td>
                        <td><?php echo $cli['lieu_travail'];?></td>
						<td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
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
					<li class = "page-item active"><a href="#" class = "page-link">CLIENT</a></li>
					<li class = "page-item"><a href="logement" class = "page-link">ACHAT</a></li>
				</ul>
			</div>
		</div>
	</div>        
</div>
<!-- Add Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action = "<?php echo base_url().'/saveClient'; ?>" method = "POST" >
				<div class="modal-header">						
					<h4 class="modal-title">Nouveau client</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Nom</label>
						<input type="text" class="form-control" name="nom" required>
					</div>
					<div class="form-group">
						<label>Prenom</label>
						<input type="text" class="form-control" name="prenom" required>
					</div>
					<div class="form-group">
						<label>Adresse</label>
						<input type="text" class="form-control" name="adrs" required>
					</div>
					<div class="form-group">
						<label>Lieu de travail</label>
						<input type="text" class="form-control" name="lieu_travail" required>
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
			<form action = "<?php echo base_url().'/updateClient'; ?>" method = "POST">
				<div class="modal-header">						
					<h4 class="modal-title">Modifier client</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
                    <input type="hidden" name="updateId" class = "updateId" >					
					<div class="form-group">
						<label>Nom</label>
						<input type="text" class="form-control updateNom" name = "nom" required>
					</div>
					<div class="form-group">
						<label>Prenom</label>
						<input type="text" class="form-control updatePrenom" name = "prenom"  required>
                    </div>
					<div class="form-group">
						<label>Adresse</label>
						<input type="text" class="form-control updateAdresse" name = "adrs"  required>
                    </div>			
					<div class="form-group">
						<label>Lieu de travail</label>
						<input type="text" class="form-control updateLieu" name = "lieu_travail"  required>
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


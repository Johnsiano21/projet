<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Facture</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			font-size: 14px;
		}
		table {
			border-collapse: collapse;
			width: 50%;
		}
		th, td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
		th {
			background-color: #f2f2f2;
		}
		.total {
			font-weight: bold;
			text-align: right;
		}
	</style>

<script>
    function imprimer() {
        window.print();
    }
</script>
</head>
<body>
    <div id="impression">
	<h1>Facture</h1>
	<table>
		<thead>
			<tr>
				<th>Client N°:</th>
				<th>Type de vente</th>
				<th>Prix</th>
                <th>Cité</th>
				<th>Date d'achat</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1</td>
				<td>Comptant</td>
				<td>500000</td>
				<td>Tranomora</td>
                <td>2023/04/15</td>
			</tr>
			<tr>
				<td colspan="3" class="total">Total :</td>
				<td>500000Ar</td>
			</tr>
		</tbody>
	</table>
    </div>
</br>
    <button onclick="imprimer()">Payé</button>
</body>
</html>

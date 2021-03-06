<div class="lead container-fluid">
    <h3>Transferencias</h3>



    <div class="card mb-3 " style="width: 30rem;">
        <div class="card-body">
            <h5 class="card-title">Nuevas Transferencias</h5>
            <p class="card-text">Haz transferencias puntuales y periódicas a cualquier cuenta nacional o internacional.</p>
            <a href="transferencias/add" class="btn btn-primary">Realizar nueva transferencia</a>
        </div>
    </div>

    <h3>Estas son las últimas transferencias enviadas</h3>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Cuenta de destino</th>
                <th>Concepto</th>
                <th>Beneficiario</th>
                <th>Fecha</th>
                <th>Importe</th>
            </tr>
        </thead>
        <?php
        foreach ($transferencias as $transf) {
            echo "
							<tr>
                                <td> " . $transf->getIbanDest() . " </td>
                                <td> " . $transf->getConcepto() . " </td>
                                <td> " . $transf->getBeneficiario() . " </td>
                                <td> " . $transf->getData() . " </td>
                                <td> " . $transf->getImport() . "€ </td> 
							</tr>
						";
        }
        ?>
    </table>
</div>
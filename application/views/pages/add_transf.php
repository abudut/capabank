
<div class="container-fluid">
    <h3>Realizar Transferencia</h3>

    <div class="card w-50">
        <div class="card-header">
            Transferencia
        </div>
        <div class="card-body">
            <h5 class="card-title">Transferencia</h5>
            <form class="form-group  row" action="<?php echo base_url(); ?>transferencias/transferir" method="POST">
                <div class="form-group">
                    <label>IBAN destinatario</label>
                    <input type="text" name="iban" class="form-control mx-sm-3">

                    <label>Concepto</label>
                    <input type="text" name="concepto" class="form-control mx-sm-3">

                    <label>Beneficiario</label>
                    <input type="text" name="beneficiario" class="form-control mx-sm-3">

                    <label>Importe</label>
                    <input type="text" name="importe" class="form-control mx-sm-3">

                    <div class="my-3 text-right">
                        <input type="submit" value="Enviar" class=" mb-2 btn btn-primary">
                    </div>
                </div>


</form>
        </div>
    </div>
        
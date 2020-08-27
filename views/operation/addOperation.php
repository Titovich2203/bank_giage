
<div class="container mt-5">
    <div class="col-md-10 offset-1">
        <div class="card">
            <div class="card-header blue lighten-4 text-center text-uppercase h4 font-weight-bold">
                Nouvelle operation
            </div>
            <div class="card-body">
                <form action="/bank_giage/controllers/operationCtrl.php?idCompte=<?= $compte['id'] ?>"" method="post">
                    <div class="row mt-4">
                        <div class="col-md-2 text-left">
                            <label for="nom" class="h5">TYPE</label>
                        </div>
                        <div class="col-md-4">
                            <select name="typeOperation" class="form-control">
                                <option value="" disabled selected>-- Choisir le type --</option>
                                <?php
                                foreach ($types as $t){
                                    ?>
                                    <option><?= $t['nom'] ?></option>
                                    <?php
                                }

                                ?>
                            </select>
                        </div>
                        <div class="col-md-2 text-left">
                            <label for="montant" class="h5">MONTANT</label>
                        </div>
                        <div class="col-md-4">
                            <input type="number" min="500" class="form-control" name="montant">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4 offset-5 mt-4">
                            <input type="submit" name="btnAddOp" class="btn btn-md btn-info">
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <br><br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h2>Liste des operations du compte <?= $compte['numero'] ?></h2>
                </div>
                <div class="card-body">
                    <table class="table table-info">
                        <tr>
                            <th>NUMERO OP</th>
                            <th>DATE OP</th>
                            <th>MONTANT</th>
                            <th>TYPE</th>
                            <th>NUM COMPTE</th>
                            <th>NOM GEST</th>
                        </tr>
                        <?php
                        if(isset($operations)){
                        foreach ($operations as $op){
                            if($op['etatOp'] == 1) {
                                ?>
                                <tr>
                                    <td><?= $op['numero'] ?></td>
                                    <td><?= $op['dateOperation'] ?></td>
                                    <td><?= $op['montant'] ?></td>
                                    <td><?= $op['type'] ?></td>
                                    <td><?= $compte['numero'] ?></td>
                                    <td><?= $op['nomEmp'] ?> <?= $op['prenomEmp'] ?></td>
                                </tr>
                                <?php
                            }
                        }}
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
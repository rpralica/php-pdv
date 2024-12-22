<?php
$plusVrijednost = $plusPostotak = $tdSaPdv = $tdIznosSaPdv = '';
$errors = ['plusVrijednost' => '', 'plusPostotak' => '', 'tdSaPdv' => '', 'tdIznosSaPdv' => ''];
if (isset($_POST['calcPlus'])) {
    $plusVrijednost = sanitizeAndValidate('plusVrijednost', 'float');
    $plusPostotak = sanitizeAndValidate('plusPostotak', 'int');

    if (empty($plusVrijednost)) {
        $errors['plusVrijednost'] = 'Niste upisali vrijednost ili nije brojčana vrijednost';
    }

    // Ako nema grešaka, izračunaj rezultate
    if (!array_filter($errors)) {
        list($tdSaPdv, $tdIznosSaPdv) = calcPlus($plusVrijednost, $plusPostotak);
    }
}
?>

<?php echo validate($errors, 'plusVrijednost'); ?>
<?php echo validate($errors, 'plusPostotak'); ?>

<div class="col-6 bg-danger  border border-3 border-white"> <!--   Plus -->

    <div class="row">
        <h3 class="text-center text-white">Dodaj PDV</h3>
        <div class="col-3">
            <input name="plusVrijednost" class="form-control " value="<?php echo $plusVrijednost ?>" type="text" style="font-size: 1.3em;"
                placeholder="Iznos">
        </div>
        <div class="col-1">
            <h3 class="text-white">+</h3>
        </div>

        <div class="col-2">
            <input name="plusPostotak" type="text" class="form-control " value="<?php echo isset($plusPostotak) && !empty($plusPostotak) ? $plusPostotak : 17; ?>"
                style="font-size: 1.3em;">
        </div>

        <div class="col-1">
            <h3 class="text-white mt-1">%</h3>
        </div>

        <div class="col">
            <button class="btn btn-success" name="calcPlus">Izračunaj</button>

        </div>

    </div>
    <br>
    <div class="row">
        <div class="col">
            <div class="col-6">
                <table class="table  table-borderless " style="font-size: larger;text-align: center;">
                    <thead>
                        <tr>

                            <th>Sa Pdv</th>
                            <th>Iznos Pdv</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <td class="tdFont" name="tdSaPdv"><?php echo isset($tdSaPdv) ? $tdSaPdv : ''; ?></td>
                            <td class="tdFont" name="tdIznosSaPdv"><?php echo isset($tdIznosSaPdv) ? $tdIznosSaPdv : ''; ?></td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
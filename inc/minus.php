<?php
$minusVrijednost = '';
$minusPostotak = '';
$tdBezPdv = '';
$tdIznosBezPdv = '';
$errors = ['minusVrijednost' => '', 'minusPostotak' => '', 'tdBezPdv' => '', 'tdIznosBezPdv' => ''];
if (isset($_POST['calcMinus'])) {
    $minusVrijednost = sanitizeAndValidate('minusVrijednost', 'float');
    $minusPostotak = sanitizeAndValidate('minusPostotak', 'int');

    if (empty($minusVrijednost)) {
        $errors['minusVrijednost'] = 'Niste upisali vrijednost ili nije brojčana vrijednost';
    }

    // Ako nema grešaka, izračunaj rezultate
    if (!array_filter($errors)) {
        list($tdIznosBezPdv, $tdBezPdv) = calcMinus($minusVrijednost, $minusPostotak);
    }
}
// Funkcija za izračun minus PDV-a


?>

<?php echo validate($errors, 'minusVrijednost'); ?>
<?php echo validate($errors, 'minusPostotak'); ?>

<div class="col-6 bg-info border border-3 border-white"> <!--   Minus -->
    <div class="row">
        <h3 class="text-center">Oduzmi PDV</h3>
        <div class="col-3">
            <input name="minusVrijednost" value="<?php echo $minusVrijednost ?>" class="form-control " type="text" style="font-size: 1.3em;" placeholder="Iznos">
        </div>
        <div class="col-1">
            <h3 class="text-white">-</h3>
        </div>

        <div class="col-2">
            <input name="minusPostotak" value="<?php echo isset($minusPostotak) && !empty($minusPostotak) ? $minusPostotak : 17; ?>" type="text" class="form-control" style="font-size: 1.3em;">
        </div>

        <div class="col-1">
            <h3 class="text-white mt-1">%</h3>
        </div>
        <div class="col">
            <button class="btn btn-success" name="calcMinus">Izračunaj</button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <div class="col-6">
                <table class="table  table-borderless " style="font-size: larger;text-align: center;">
                    <thead>
                        <tr>
                            <th>Bez Pdv</th>
                            <th>Iznos Pdv</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="tdFont" name="tdBezPdv"><?php echo isset($tdBezPdv) ? $tdBezPdv : ''; ?></td>
                            <td class="tdFont" name="tdIznosBezPdv"><?php echo isset($tdIznosBezPdv) ? $tdIznosBezPdv : ''; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-6 bg-info border border-3 border-white"> <!--   Minus -->
    <div class="row">
        <h3 class="text-center">Oduzmi PDV</h3>
        <div class="col-3">
            <input name="minusVrijednost" class="form-control " type="text" style="font-size: 1.3em;"
                placeholder="Iznos">
        </div>
        <div class="col-1">
            <h3 class="text-white">-</h3>
        </div>

        <div class="col-2">
            <input name="minusPostotak" type="text" class="form-control " value="17"
                style="font-size: 1.3em;">
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

                            <td class="tdFont" id="tdBezPdv"></td>
                            <td class="tdFont" id="tdIznosBezpdv"></td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
 <div class="col-6 bg-danger  border border-3 border-white"> <!--   Plus -->

     <div class="row">
         <h3 class="text-center text-white">Dodaj PDV</h3>
         <div class="col-3">
             <input name="plusVrijednost" class="form-control " type="text" style="font-size: 1.3em;"
                 placeholder="Iznos">
         </div>
         <div class="col-1">
             <h3 class="text-white">+</h3>
         </div>

         <div class="col-2">
             <input name="plusPostotak" type="text" class="form-control " value="17"
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

                             <td class="tdFont" id="tdSaPdv"></td>
                             <td class="tdFont" id="tdIznosSaPdv"></td>

                         </tr>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>
    <button type="button" class="close" ng-click="cancel();">
        <i class="fa fa-times-circle-o" style="margin:10px;color:blue;"></i>
    </button>
    <div class="modal-header">
        <h3 class="modal-title">Edit Bat [ID: {{product.id}}]</h3>
    </div>

    <div class="modal-body">
        <form name="product_form" class="form-horizontal" role="form" novalidate>

            <form-element label="SERIAL" mod="product">
                <input type="text" class="form-control" name="serial" placeholder="SERIAL" ng-model="product.serial" ng-disabled="product.id" focus/>
            </form-element>

            <form-element label="MODEL" mod="product">
                <input type="text" class="form-control" name="model" placeholder="MODEL" ng-model="product.model"/>
            </form-element>
            <form-element label="userinject" mod="product">
<select name="userinject" class="form-control" ng-model="product.userinject">
  <option value="Justin">1 - Justin</option>
  <option value="Wally">2 - Wally</option>
  <option value="William">3 - William</option>
  <option value="Other">4 - Other - See Note</option>
</select>
                <small class="errorMessage" ng-show="product_form.rmadesc.$dirty && product_form.rmadesc.$invalid"> Enter the Reason for Return.</small>
            </form-element>

            <form-element label="RMA Date" mod="product">
                <input type="text" class="form-control" name="rmadate" placeholder="Date RMA issued" ng-model="product.rmadate"/>
            </form-element>
            <form-element label="WEIGHT Barrel" mod="product">
                <input type="text" class="form-control" name="weightbar" placeholder="Weight Added Barrel" ng-model="product.weightbar"/>
            </form-element>
            <form-element label="WEIGHT Knob" mod="product">
                <input type="text" class="form-control" name="weightknob" placeholder="WEIGHT Knob" ng-model="product.weightknob"/>
            </form-element>
            <form-element label="Current Owner" mod="product">
                <input type="text" class="form-control" name="owner1" placeholder="Current Owner" ng-model="product.owner1"/>
            </form-element>

            <form-element label="NOTES" mod="product">
            <textarea class="form-control" name="notes" placeholder="NOTES" ng-model="product.notes">{{product.notes}}</textarea>
            </form-element>
            <form-element label="TEST Number" mod="product">
                <input type="text" name="testnum" class="form-control" placeholder="TEST Number" ng-model="product.testnum"  only-numbers/>
                <small class="errorMessage" ng-show="product_form.testnum.$dirty && product_form.testnum.$invalid"> Enter the Test Number.</small>
            </form-element>
            <form-element label="rmanum" mod="product">
                <input type="text" name="rmanum" class="form-control" placeholder="RMA Number" ng-model="product.rmanum"  only-numbers/>
                <small class="errorMessage" ng-show="product_form.rmanum.$dirty && product_form.rmanum.$invalid"> Enter the RMA Number.</small>
            </form-element>
            <form-element label="rmadesc" mod="product">
<select name="rmadesc" class="form-control" ng-model="product.rmadesc">
  <option value="Broken End Plug">Broken End Plug</option>
  <option value="Broken Handle">Broken Handle</option>
  <option value="Broken Knob">Broken Knob</option>
  <option value="Broken Sweet Spot">Broken Sweet Spot</option>
  <option value="Paint Chipping">Paint Chipping</option>
  <option value="Rattle">Rattle</option>
  <option value="Other - See Note">Other - See Note</option>
</select>
                <small class="errorMessage" ng-show="product_form.rmadesc.$dirty && product_form.rmadesc.$invalid"> Enter the Reason for Return.</small>
            </form-element>

           <form-element label="WEIGHT 1" mod="product">
                <input type="text" name="weight1" class="form-control" placeholder="WEIGHT 1" ng-model="product.weight1" only-numbers/>
                <small class="errorMessage" ng-show="product_form.weight1.$dirty && product_form.weight1.$invalid"> Enter the available first weight.</small>
            </form-element>
           <form-element label="WEIGHT 2" mod="product">
                <input type="text" name="weight2" class="form-control" placeholder="WEIGHT 2" ng-model="product.weight2" only-numbers/>
                <small class="errorMessage" ng-show="product_form.weight2.$dirty && product_form.weight2.$invalid"> Enter the available second weight.</small>
            </form-element>

            <form-element label="MFR ORDER #" mod="product">
                <input type="text" name="mfrordernum" class="form-control" placeholder="MFR Order Number" ng-model="product.mfrordernum"/>
                <small class="errorMessage" ng-show="product_form.mfrordernum.$dirty && product_form.mfrordernum.$invalid"> Enter the Manufacturer Order Number.</small>
            </form-element>

            <form-element label="WINDER POSITION" mod="product">
                <input type="text" name="winderpos" class="form-control" placeholder="WINDER POSITION" ng-model="product.winderpos"/>
                <small class="errorMessage" ng-show="product_form.winderpos.$dirty && product_form.winderpos.$invalid"> Enter the Winder Position.</small>
            </form-element>

            <div class="space"></div>
            <div class="space-4"></div>
            <div class="modal-footer">
                <form-element label="">
                    <div class="text-right">
                        <a class="btn btn-sm" ng-click="cancel()"><i class="ace-icon fa fa-reply"></i>Cancel</a>
                        <button ng-click="saveProduct(product);"
                                ng-disabled="product_form.$invalid || enableUpdate"
                                class="btn btn-sm btn-primary"
                                type="submit">
                            <i class="ace-icon fa fa-check"></i>{{buttonText}}
                        </button>
                    </div>
                </form-element>
            </div>

        </form>
    </div>


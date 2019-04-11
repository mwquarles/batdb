
    <button type="button" class="close" ng-click="cancel();">
        <i class="fa fa-times-circle-o" style="margin:10px;color:blue;"></i>
    </button>
    <div class="modal-header">
        <h3 class="modal-title">Edit Bat [ID: {{product.id}}]</h3>
    </div>

    <div class="modal-body">
        <form name="product_form" class="form-horizontal" role="form" validate>

            <form-element label="SERIAL" mod="product">
                <input type="text" class="form-control" name="serial" placeholder="SERIAL" ng-model="product.serial" ng-disabled="product.id" autofocus/>
            </form-element>

            <form-element label="MODEL" mod="product">
                <input type="text" class="form-control" name="model" placeholder="Model #" ng-model="product.model" />
            </form-element>
            <form-element label="Injected By" mod="product">
                <input type="text" class="form-control" name="userinject" placeholder="Injection Person" ng-model="product.userinject" />

                <small class="errorMessage" ng-show="product_form.userinject.$dirty && product_form.userinject.$invalid"> Enter the Person who Injected this.</small>
            </form-element>
           <form-element label="Core Weight" mod="product">
                <input type="text" name="weight1" class="form-control" placeholder="WEIGHT 1" ng-model="product.weight1" only-numbers/>
                <small class="errorMessage" ng-show="product_form.weight1.$dirty && product_form.weight1.$invalid"> Enter the available first weight.</small>
            </form-element>
           <form-element label="Epoxy Weight" mod="product">
                <input type="text" name="weight2" class="form-control" placeholder="WEIGHT 2" ng-model="product.weight2" only-numbers/>
                <small class="errorMessage" ng-show="product_form.weight2.$dirty && product_form.weight2.$invalid"> Enter the available second weight.</small>
            </form-element>

            <form-element label="WEIGHT Barrel" mod="product">
                <input type="text" class="form-control" name="weightbar" placeholder="Weight Added Barrel" ng-model="product.weightbar"/>
            </form-element>
            <form-element label="WEIGHT Knob" mod="product">
                <input type="text" class="form-control" name="weightknob" placeholder="WEIGHT Knob" ng-model="product.weightknob"/>
            </form-element>


            <form-element label="NOTES" mod="product">
            <textarea class="form-control" name="notes" placeholder="NOTES" ng-model="product.notes">{{product.notes}}</textarea>
            </form-element>


            <form-element label="MOLD POSITION" mod="product">
                <input type="text" name="winderpos" class="form-control" placeholder="MOLD POSITION" ng-model="product.winderpos"/>
                <small class="errorMessage" ng-show="product_form.winderpos.$dirty && product_form.winderpos.$invalid"> Enter the Winder Position.</small>
            </form-element>




           <form-element label="WEIGHT 3" mod="product">
                <input type="text" name="weight3" class="form-control" placeholder="FINAL WEIGHT" ng-model="product.weight3" only-numbers/>
                <small class="errorMessage" ng-show="product_form.weight3.$dirty && product_form.weight3.$invalid"> Enter the available Final weight.</small>
            </form-element>

            <form-element label="MFR ORDER #" mod="product">
                <input type="text" name="mfrordernum" class="form-control" placeholder="MFR Order Number" ng-model="product.mfrordernum"/>
                <small class="errorMessage" ng-show="product_form.mfrordernum.$dirty && product_form.mfrordernum.$invalid"> Enter the Manufacturer Order Number.</small>
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


app.controller('productsCtrl', function ($scope, $modal, $filter, Data) {
    $scope.product = {};
    Data.get('products').then(function(data){
        $scope.products = data.data;
    });
    $scope.changeProductStatus = function(product){
        product.status = (product.status=="Active" ? "Inactive" : "Active");
        Data.put("products/"+product.id,{status:product.status});
    };
    $scope.deleteProduct = function(product){
        if(confirm("Are you sure to remove the product")){
            Data.delete("products/"+product.id).then(function(result){
                $scope.products = _.without($scope.products, _.findWhere($scope.products, {id:product.id}));
            });
        }
    };
    $scope.open = function (p,size) {
        var modalInstance = $modal.open({
          templateUrl: 'partials/productEdit.php',
          controller: 'productEditCtrl',
          size: size,
          resolve: {
            item: function () {
              return p;
            }
          }
        });
        modalInstance.result.then(function(selectedObject) {
            if(selectedObject.save == "insert"){
                $scope.products.push(selectedObject);
                $scope.products = $filter('orderBy')($scope.products, 'id', 'reverse');
            }else if(selectedObject.save == "update"){
                p.notes = selectedObject.notes;
                p.weightbar = selectedObject.weightbar;
                p.weightknob = selectedObject.weightknob;
                p.testnum = selectedObject.testnum;
                p.weight1 = selectedObject.weight1;
                p.weight2 = selectedObject.weight2;
                p.weight3 = selectedObject.weight3;
                p.mfrordernum = selectedObject.mfrordernum;
                p.winderpos = selectedObject.winderpos;
		p.userinject = selectedObject.userinject;
		p.owner1 = selectedObject.owner1;
            }
        });
    };
    
 $scope.columns = [
                    {text:"ID",predicate:"id",sortable:true,dataType:"number"},
                    {text:"Serial",predicate:"serial",sortable:true},
                    {text:"Model",predicate:"model",sortable:true},
                    {text:"Injection Date",predicate:"timeinject",sortable:true},
                    {text:"Injector",predicate:"timeinject",sortable:true},
                    {text:"Test #",predicate:"testnum",sortable:true},
                    {text:"Weight 1",predicate:"weight1",reverse:true,sortable:true,dataType:"number"},
                    {text:"Weight 2",predicate:"weight2",sortable:true},
                    {text:"Weight 3",predicate:"weight3",sortable:true},
                    {text:"Mfr Order",predicate:"mfrordernum",sortable:true},
                    {text:"Mold Pos",predicate:"winderpos",sortable:true},
                    {text:"Weight Barrel",predicate:"weightbar",sortable:true},
                    {text:"Weight Knob",predicate:"weightknob",sortable:true},
                    {text:"Notes",predicate:"notes",sortable:true},
                    {text:"Action",predicate:"",sortable:false}
                ];

});


app.controller('productEditCtrl', function ($scope, $modalInstance, item, Data) {

  $scope.product = angular.copy(item);
        
        $scope.cancel = function () {
            $modalInstance.dismiss('Close');
        };
        $scope.title = (item.id > 0) ? 'Edit Product' : 'Add Product';
        $scope.buttonText = (item.id > 0) ? 'Update Product' : 'Add New Product';

        var original = item;
        $scope.isClean = function() {
            return angular.equals(original, $scope.product);
        }
        $scope.saveProduct = function (product) {
            product.uid = $scope.uid;
            if(product.id > 0){
                Data.put('products/'+product.id, product).then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(product);
                        x.save = 'update';
                        $modalInstance.close(x);
                    }else{
                        console.log(result);
                    }
                });
            }else{
                product.status = 'Active';
                Data.post('products', product).then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(product);
                        x.save = 'insert';
                        x.id = result.data;
                        $modalInstance.close(x);
                    }else{
                        console.log(result);
                    }
                });
            }
        };
});

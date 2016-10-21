
var app = angular.module('myApp', ['ui.bootstrap']);

app.filter('startFrom', function () {
    return function (input, start) {
        if (input) {       
            start = +start; //parse to int
            //var c;
            //for (i = 0; i < input.length; i++) {
            //    c = input[i];

            //    if (c.type == 'ring' || c.type == 'diamond') {
            //            start = c;

            //    }
            //    }


            return input.slice(start);

        }
       
        return [];
    }
});


//Fancy label
    $(".inputContact").focusout(function () {
        if ($(this).val().trim() === "") {
            $(this).removeClass('upPosition');
        } else {
            $(this).addClass('upPosition');
        }
    });


app.controller('customersCrtl', function ($scope, $http, $timeout) {
  
  
    $http.get('ajax/getCustomers.php').success(function (data) {
        $scope.list = data;
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 10; //max no of items to display in a page
        $scope.filteredItems = $scope.list.length; //Initially for no filter  
        $scope.totalItems = $scope.list.length;

        //Convert this three fields to number then its can be organized  numerically and not as default(Alphabetically)
        //$scope.predicate = '-id';
        //$scope.predicate = '-price';
        //$scope.predicate = '-size';  
        angular.forEach($scope.list, function (list) {
            list.id = parseFloat(list.id);
            list.price = parseFloat(list.price);
            list.size = parseFloat(list.size);
        }); 

      checkCorrectCheckBox();

    function checkCorrectCheckBox() {  
        //var selected = localStorage.getItem('selected');
        var selected = sessionStorage.getItem('selected');
        
        if(selected=="gold" || selected=="silver" || selected=="platinum")
             $( "#collapse1" ).addClass( "in" );
        else
             $( "#collapse2" ).addClass( "in" );

        switch (selected) {
            case "ring":
                $("#ringElement").prop("checked", true);     
                $scope.ringCheckbox="ring";     
                break;
            case "watch":
                $("#watchElement").prop("checked", true);
                $scope.watchCheckbox="watch";  
                break;
            case "earings":
                $("#earingsElement").prop("checked", true);
                $scope.earingsCheckbox="earings";  
                break;
            case "necklace":
                $("#necklaceElement").prop("checked", true);
                $scope.necklaceCheckbox="necklace";  
                break;
            case "diamond":
                $("#diamondElement").prop("checked", true);
                $scope.diamondCheckbox="diamond";  
                break;
            case "bracelet":
                $("#braceletElement").prop("checked", true);
                $scope.braceletCheckbox="bracelet";  
                break;
            case "diamondRing":
                $("#diamRingElment").prop("checked", true);
                $scope.diamondRingCheckbox="diamond";  
                break; 
            case "gold":
                $("#goldElement").prop("checked", true);
                $scope.goldCheckbox="gold";  
                break;
            case "silver":
                $("#silverElement").prop("checked", true);
                $scope.silverCheckbox="silver";  
                break;
            case "platinum":
                $("#platinumElement").prop("checked", true);
                $scope.platinumCheckbox="platinum";  
                break; 
        }

        sessionStorage.setItem('selected','');
        }

    });



    $scope.showType = function (data) {
        $mat=false; $typ=false; $pric =false; 
        if (!$scope.ringCheckbox && !$scope.watchCheckbox && !$scope.earingsCheckbox && !$scope.necklaceCheckbox && !$scope.diamondCheckbox && !$scope.braceletCheckbox && !$scope.diamondRingCheckbox )  
            $typ= true;

         if (!$scope.goldCheckbox && !$scope.silverCheckbox && !$scope.platinumCheckbox )  
            $mat= true;

        if (!$scope.fiftyCheckbox && !$scope.onehundredCheckbox && !$scope.twoHundredCheckbox && !$scope.threehundredCheckbox && !$scope.overCheckbox)  
            $pric= true;
        //if (!$scope.ringCheckbox && !$scope.watchCheckbox && !$scope.earingsCheckbox && !$scope.necklaceCheckbox && !$scope.diamondCheckbox && !$scope.braceletCheckbox && !$scope.diamondRingCheckbox )  
        //$typ= true;
        //alert((data.type === $scope.ringCheckbox || data.type === $scope.watchCheckbox || data.type === $scope.earingsCheckbox || data.type === $scope.necklaceCheckbox || data.type === $scope.diamondCheckbox || data.type === $scope.braceletCheckbox || data.type === $scope.diamondRingCheckbox) );
        if ((data.type === $scope.ringCheckbox || data.type === $scope.watchCheckbox || data.type === $scope.earingsCheckbox || data.type === $scope.necklaceCheckbox || data.type === $scope.diamondCheckbox || data.type === $scope.braceletCheckbox || data.type === $scope.diamondRingCheckbox) )
            $typ= true;

        if (data.material === $scope.goldCheckbox || data.material === $scope.silverCheckbox || data.material === $scope.platinumCheckbox) 
            $mat= true;

        if (((data.price>0 && data.price <=50)  && $scope.fiftyCheckbox) || ((data.price>50 && data.price <=100)  && $scope.onehundredCheckbox) || ((data.price>100 && data.price <=200)  && $scope.twoHundredCheckbox) || ((data.price>200 && data.price <=300)  && $scope.threehundredCheckbox)|| (( data.price >=300)  && $scope.overCheckbox) ) 
            $pric= true;
    
    // alert($typ);
    // alert($mat);
    // alert($pric);
            return $typ && $mat && $pric;
        //    //alert(data.type == $scope.ringCheckbox || data.type == $scope.watchCheckbox || data.type == $scope.earingsCheckbox);
        //    //alert($scope.earingsCheckbox);
        //    //alert(data.type);

        //    //var comparare = data.type;
        //    //alert($scope.earingsCheckbox);
        //    //switch (comparare) {
        //    //    case $scope.earingsCheckbox :
        //    //        alert($scope.earingsCheckbox);
        //    //        $scope.showType = "earings";
        //    //        break;
        //    //    default:
        //    //        $scope.showType = null;
        //    //}
        //    //alert("sfd");
        //    //$scope.filteredItems = 5;
        //    //$scope.showType = null;
        //    //}
        //    alert("as");
        //    $scope.showType = "earings";
        //return $scope.showType = "143";
    };

   
    //Filter by the checkboxes
  

    $scope.showAddProduct = function () {
        // clear form
        $scope.clearForm();

        // change modal title
        $('#contactSectionStyled').text("Create New Product");

        // hide update product button
        $('.blurEverything').show();

        

        // hide create product button
        $('#updateProduct').hide();
        $("#formInsert").show();
        $("#insertProduct").show();

        // Change the plus sign of the add product to an X
        $scope.changeX ="x";

        //Plus Sign go to right
        $("#addProduct").addClass('addProductRight');
        $("#plusSing").addClass('plusSingRights');

    }


    // Update data Load
    var index;
    $scope.edit = function (id, thisIndex) {
        // Change the plus sign of the add product to an X
        $scope.changeX = "x";

        //Plus Sign go to right
        $("#addProduct").addClass('addProductRight');
        $("#plusSing").addClass('plusSingRights');
        index = thisIndex; 
        // clear form
        $scope.clearForm();

        // change modal title
        $('#contactSectionStyled').text("Update New Product");

        // hide insert product button
        $('#insertProduct').hide();

        // show update product button
        $('#updateProduct').show();

        $('.blurEverything').show();
        // post id of product to be edited
        $http.get('ajax/getOneProduct.php?id=' + id).success(function (data, status, headers, config) {

            $scope.id = data[0]["id"];
            $scope.price = parseInt(data[0]["price"]);
            $scope.type = data[0]["type"];
            $scope.material = data[0]["material"];
            $scope.size =parseInt( data[0]["size"]);
            $scope.maker = data[0]["maker"];

            //Fancy label 
            $(".inputContact").addClass('upPosition');
                
        })
        .error(function (data, status, headers, config) {
            alert("Error");
        });
    }

    // Clear Form
    $scope.clearForm = function () {
        $scope.id = "";
        $scope.name = "";
        $scope.description = "";
        $scope.price = "";
        $scope.type = "";
        $scope.material = "";
        $scope.size = "";
        $scope.maker = "";

        angular.forEach(
       angular.element("input[type='file']"),
       function (inputElem) {
           angular.element(inputElem).val(null);
       });
    }

    // Features to show the data in the table
    $scope.setPage = function (pageNo) {
        $scope.currentPage = pageNo;
    };

    $scope.filter = function () {
        $timeout(function () {
            $scope.filteredItems = $scope.filtered.length;                    
        }, 10);
    };
    



// Sort By Price this is the combobox to select sortby Price

    //$scope.listOfOptions = ['Price: Low to High', 'Price: Hight to Low'];

    //$scope.selectedItemChanged = function (predicate) {
    //    if ($scope.selectedItem == "") { alert("d"); return false;}
    //    if ($scope.selectedItem == "Price: Low to High" && !$scope.reverse) {
    //        $scope.predicate = predicate;
    //        //        $scope.predicate = "price";
    //        //        $scope.reverse = !$scope.reverse;
    //        alert("as");
    //        $scope.reverse = !$scope.reverse;;
    //    }
    //    if ($scope.selectedItem == "Price: Hight to Low" && $scope.reverse) {
    //        $scope.predicate = predicate;
    //        //    $scope.predicate = "price";
    //        //    $scope.reverse = !$scope.reverse;
    //        alert("2");
    //        $scope.reverse = !$scope.reverse;
    //    }
    //};




    $scope.sort_by = function (predicate) {
        $scope.predicate = predicate;
        $scope.reverse = !$scope.reverse;
        //$scope.reverse = ($scope.propertyName === propertyName) ? !$scope.reverse : false;
        //$scope.propertyName = propertyName;
    };

    // Remove Row by Id
    $scope.removeRow = function (id) {
        if (confirm("Do you want to erase the row!")) {
             $http.get("ajax/delete.php?del=" + id).success(function (data) {

                        var index = -1;
                        var comArr = eval($scope.list);
                        for (var i = 0; i < comArr.length; i++) {
                            if (comArr[i].id === id) {
                                index = i;
                                break;
                            }
                        }

                        if (index === -1) {
                            alert("Something gone wrong");
                        }
                        $scope.list.splice(index, 1);


                    }).error(function (data) {
                        alert("Something gone wrong");
                    })
        }
       
    };

    // Insert in the dataBase
    $scope.uploadFile = function () {

        // show insert product button
        $('#insertProduct').show();

        // hide update product button
        $('#updateProduct').hide();

        var price = $scope.price;
        var type = $scope.type;
        var material = $scope.material;
        var size = $scope.size;
        var maker = $scope.maker;

        if (price != "" && type != "" && material != "" && size != "" && maker != "") {
            var imageone = $scope.imageone;
            var imagetwo = $scope.imagetwo;
            var imagethree = $scope.imagethree;
            var imagefour = $scope.imagefour;
            var imagefive = $scope.imagefive;


            var fd = new FormData();

            fd.append('price', price);
            fd.append('type', type);
            fd.append('material', material);
            fd.append('size', size);
            fd.append('maker', maker);

            fd.append('imageone', imageone);
            fd.append('imagetwo', imagetwo);
            fd.append('imagethree', imagethree);
            fd.append('imagefour', imagefour);
            fd.append('imagefive', imagefive);

            var uploadUrl = 'ajax/insert.php';
            $http.post(uploadUrl, fd, {
                transformRequest: angular.identity,
                headers: { 'Content-Type': undefined }
            })
            .success(function (dataa) {
                //Refresh the list adding new value
                $http.get('ajax/getLastCustumer.php').success(function (data) {
                    $scope.list.push(data[0]);
                });
                $scope.clearForm();
            })
            .error(function () {
                alert("The Record wasn't Insert");
            });
        }

    };

    // Update 
    $scope.updateFile = function () {


        var id = $scope.id;
        var price = $scope.price;
        var type = $scope.type;
        var material = $scope.material;
        var size = $scope.size;
        var maker = $scope.maker;

        var imageone = $scope.imageone;
        var imagetwo = $scope.imagetwo;
        var imagethree = $scope.imagethree;
        var imagefour = $scope.imagefour;
        var imagefive = $scope.imagefive;


        var fd = new FormData();

        fd.append('id', id);
        fd.append('price', price);
        fd.append('type', type);
        fd.append('material', material);
        fd.append('size', size);
        fd.append('maker', maker);

        fd.append('imageone', imageone);
        fd.append('imagetwo', imagetwo);
        fd.append('imagethree', imagethree);
        fd.append('imagefour', imagefour);
        fd.append('imagefive', imagefive);

        $http.post('ajax/updateProduct.php', fd, {
            transformRequest: angular.identity,
            headers: { 'Content-Type': undefined }
        }).success(function (data) {
            console.log(index);
            //if (data[0]["success"]) {
                $scope.list[index].price = price;
                $scope.list[index].type = type;
                $scope.list[index].material = material;
                $scope.list[index].size = size;
                $scope.list[index].maker = maker;



                if (imageone) {
                    var reader = new FileReader();
                    reader.readAsDataURL(imageone);
                    reader.onload = function (e) {
                        $scope.list[index].imageone = e.target.result;
                        $scope.$apply();
                    };

                }
                if (imagetwo) {
                    var reader = new FileReader();
                    reader.readAsDataURL(imagetwo);
                    reader.onload = function (e) {
                        $scope.list[index].imagetwo = e.target.result;
                        $scope.$apply();
                    };

                }
                if (imagethree) {
                    var reader = new FileReader();
                    reader.readAsDataURL(imagethree);
                    reader.onload = function (e) {
                        $scope.list[index].imagethree = e.target.result;
                        $scope.$apply();
                    };

                }
                if (imagefour) {
                    var reader = new FileReader();
                    reader.readAsDataURL(imagefour);
                    reader.onload = function (e) {
                        $scope.list[index].imagefour = e.target.result;
                        $scope.$apply();
                    };

                }
                if (imagefive) {
                    var reader = new FileReader();
                    reader.readAsDataURL(imagefive);
                    reader.onload = function (e) {
                        $scope.list[index].imagefive = e.target.result;
                        $scope.$apply();
                    };

                }

                //alert("Updated successfully");
            //}
            //else {
            //    alert("Not Updated");
            //}
                $scope.clearForm();
        })
        .error(function () {
            alert("Dont Update")
        });

    };

    //close the Blur with a click
    $scope.closeBlur = function (event) {
        
        $('.blurEverything').hide();
        $scope.changeX = "+";
        //Plus Sign go to default(left) css
        $("#addProduct").removeClass('addProductRight');
        $("#plusSing").removeClass('plusSingRights');
        $(".inputContact").removeClass('upPosition');
    }    
    $("#quickView").click(function (event) {
        event.stopPropagation();
    });
     

    //Sell Page show the quick View
    $scope.quickViewButton = function (list) {
        if ($(".blurEverything").length == 0) {
            $('body').append('<div class="blurEverything"><div id="quickView"><img id="closeblur" src="icons/closeimages.png" alt="close" /><div ><img id="quickViewBigImg" src="' + list.imageone + '" />  <img class="zoomImage" src="' + list.imageone + '" />  <img class="zoomImage" src="' + list.imagetwo + '" /> <img class="zoomImage" src="' + list.imagethree + '" /> <img class="zoomImage" src="' + list.imagefour + '" /> <img class="zoomImage" src="' + list.imagefive + '" /></div> </div></div>');
        }
        closeImage();
        closeBlur();
    }

    function closeBlur() {
        $("#quickView").click(function (event) {
            event.stopPropagation();
        });

        $(".blurEverything").click(function (e) {
            $(".blurEverything").remove();
        });

        $(".zoomImage").hover(function () {
            var source = (this.src);
            $("#quickViewBigImg").attr("src", source);
        });
    }

    function closeImage() {
        $("#closeblur").click(function () {
            $(".blurEverything").remove();
        });
    }
});



app.directive('fileModel', ['$parse', function ($parse) {
    return {
        restrict: 'A',
        link: function (scope, element, attrs) {
            var model = $parse(attrs.fileModel);
            var modelSetter = model.assign;

            element.bind('change', function () {
                scope.$apply(function () {
                    modelSetter(scope, element[0].files[0]);
                });
            });
        }
    };
}]);

app.service('fileUpload', ['$http', function ($http) {

    this.uploadFileToUrl = function (file, uploadUrl) {

        var fd = new FormData();
        fd.append('file', file);
        $http.post(uploadUrl, fd, {
            transformRequest: angular.identity,
            headers: { 'Content-Type': undefined }
        })
        .success(function () {
        })
        .error(function () {
        });
    }
}]);

    

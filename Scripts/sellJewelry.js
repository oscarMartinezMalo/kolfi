/// <reference path="jquery-3.0.0.js" />
$(document).ready(function () {
    checkCorrectCheckBox();
    createImagesProducts(); 
    sortByCheckbox();
    sortByPrice();

})

function checkCorrectCheckBox() {
    //var selected = localStorage.getItem('selected');
    var selected = sessionStorage.getItem('selected');
    switch (selected) {
        case "ring":
            $("#ringElement").prop("checked", true);
            checkBoxTypes.push("ring");
            break;
        case "watch":
            $("#watchElement").prop("checked", true);
            checkBoxTypes.push("watch");
            break;
        case "earings":
            $("#earingsElement").prop("checked", true);
            checkBoxTypes.push("earings");
            break;
        case "necklace":
            $("#necklaceElement").prop("checked", true);
            checkBoxTypes.push("necklace");
            break;
        case "diamond":
            $("#diamondElement").prop("checked", true);
            checkBoxTypes.push("diamond");
            break;
        case "bracelet":
            $("#braceletElement").prop("checked", true);
            checkBoxTypes.push("bracelet");
            break;
        case "diamondRing":
            $("#diamRingElment").prop("checked", true);
            checkBoxTypes.push("diamRingElment");
            break; 
    }

}

// Create all the product with specifications
var fullList = [];

function createImagesProducts() {
    $.ajax({
        url: "getImages.php",
        dataType: "json",
        success: function (data) {

            for (var i = 0; i < data.length; i++) {
                    createProduct(data[i]);
            }
        }
    });
}

function createProduct(textt) {

    var pricee = returnProperty(textt, 0).slice(0, -1);
    var typee = returnProperty(textt, 1);
    var metall = returnProperty(textt, 2);
    var makerr = returnProperty(textt, 3);
    var idd = returnProperty(textt, 4);
    var objJewelry = {
        price: pricee,
        type: typee,
        metal: metall,
        maker: makerr,
        id: idd,
        src: textt
    };

    var selected = sessionStorage.getItem('selected');
    if (selected != "") {
        if (selected == objJewelry.type) {
            $('#SellJewelryContainer').append('<div class="imageElement" id="' + objJewelry.id + '"><img class="productImage"  src="' + textt + "/1.jpg" + '"> <p>' + objJewelry.price + '$</p>  <hr /> <p>' + objJewelry.metal + '</p>   <p>' + objJewelry.maker + '</p> <p>' + objJewelry.id + '</p> <input type="button" id="previewButton" onclick="quickViewButton(this.name)"  name="' + textt + '" value="quick View" /> </div>');
            ShowList.push(objJewelry);
        }     
    } else {
        $('#SellJewelryContainer').append('<div class="imageElement" id="' + objJewelry.id + '"><img class="productImage"  src="' + textt + "/1.jpg" + '"> <p>' + objJewelry.price + '$</p>  <hr /> <p>' + objJewelry.metal + '</p>   <p>' + objJewelry.maker + '</p> <p>' + objJewelry.id + '</p> <input type="button" id="previewButton" onclick="quickViewButton(this.name)"  name="' + textt + '" value="quick View" /> </div>');
        ShowList.push(objJewelry);
    }
    fullList.push(objJewelry);
}

function createProductList(textt) {
    ShowList.push(textt);
    $('#SellJewelryContainer').append('<div class="imageElement" id="' + textt.id + '"><img class="productImage"  src="' + textt.src + "/1.jpg" + '"> <p>' + textt.price + '$</p>  <hr /> <p>' + textt.metal + '</p>   <p>' + textt.maker + '</p> <p>' + textt.id + '</p> <input type="button" id="previewButton" onclick="quickViewButton(this.name)"  name="' + textt.src + '" value="quick View" /> </div>');
}


// Close all the quickView

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

// Create the Blur and the zoom elements with the thumbs

function quickViewButton(name) {
    if ($(".blurEverything").length == 0) {
        $('body').append('<div class="blurEverything"><div id="quickView"><img id="closeblur" src="icons/closeimages.png" alt="close" /><div ><img id="quickViewBigImg" src="' + name + "/1.jpg" + '" />  <img class="zoomImage" src="' + name + "/1.jpg" + '" />  <img class="zoomImage" src="' + name + "/2.jpg" + '" /> <img class="zoomImage" src="' + name + "/3.jpg" + '" /> <img class="zoomImage" src="' + name + "/4.jpg" + '" /> <img class="zoomImage" src="' + name + "/5.jpg" + '" /></div> </div></div>');
    }
    closeImage();
    closeBlur();
}


// Sort the elements by the aside checkbox

var checkBoxChecked = new Array();

var ShowList = [];
var checkBoxPrices = new Array();
var checkBoxTypes = new Array();
var checkBoxMetals = new Array();

function sortByCheckbox() {
    $("aside input[type='checkbox']").change(function () {
        if ($(this).is(':checked')) {
            ShowList = [];
            $(".imageElement").remove();
            if ($(this).hasClass("price")) {
                checkBoxPrices.push($(this).val());
            } else
                if ($(this).hasClass("type")) {
                    checkBoxTypes.push($(this).val());
                } else
                    if ($(this).hasClass("metal")) {
                        checkBoxMetals.push($(this).val());
                    }

            createItems();

        } else {
            //Erase the elements when the checkbox  was unchecked
            ShowList = [];
            $(".imageElement").remove();

            if ($(this).hasClass("price")) {
                checkBoxPrices.splice(checkBoxPrices.indexOf($(this).val()), 1);

            } else if ($(this).hasClass("type")) {
                checkBoxTypes.splice(checkBoxTypes.indexOf($(this).val()), 1);

            } else if ($(this).hasClass("metal")) {
                checkBoxMetals.splice(checkBoxMetals.indexOf($(this).val()), 1);
            }

            createItems();

        }
    });
}

function createItems() {
    for (var i = 0; i < fullList.length; i++) {
        var allrequiredPrices = false;
        var allrequiredType = false;
        var allrequiredMetal = false;
  
        if (checkBoxPrices.length != 0) {
            for (var k = 0; k < checkBoxPrices.length; k++) {
                var withoutPoundd = fullList[i].price;
                var betweenPricee = checkBoxPrices[k].split(",");
                if (parseInt(withoutPoundd) >= parseInt(betweenPricee[0]) && parseInt(withoutPoundd) <= parseInt(betweenPricee[1])) {
                    allrequiredPrices = true;
                    break;
                }
            }
        } else {
            allrequiredPrices = true;
        }


        if (checkBoxTypes.length != 0) {
            for (var k = 0; k < checkBoxTypes.length; k++) {
                if (fullList[i].type == checkBoxTypes[k]) {
                    allrequiredType = true;
                    break;
                }
            }
        } else {
            allrequiredType = true;
        }

        if (checkBoxMetals.length != 0) {
            for (var k = 0; k < checkBoxMetals.length; k++) {
                if (fullList[i].metal == checkBoxMetals[k]) {
                    allrequiredMetal = true;
                    break;
                }
            }
        } else {
            allrequiredMetal = true;
        }

        if (allrequiredMetal && allrequiredPrices && allrequiredType) {
            createProductList(fullList[i]);
        }
    }
}

function returnProperty(allProperties, property) {
    var textFields = allProperties.split("/");
    var fields = textFields[1].split(",");
    return fields[parseInt(property)];
}

function sortByPrice() {
    $("#sortByPrice").change(function () {

        if ($("#sortByPrice").val() == "HighToLow") {
            fullList.sort(function (a, b) {
                return b.price - a.price;
            })
        } else {
            fullList.sort(function (a, b) {
                return a.price - b.price;
            })
        }
        $(".imageElement").remove();
        createItems();
    })
}
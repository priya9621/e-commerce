// $(document).ready(function(){
// })
const baseUrl='http://localhost/e-commerce/';

function add_to_cart(productId,Cost,userId){
  // alert('tyhjbn');
  $.ajax({
        url: baseUrl + "cart",
        type:'POST',
        data:{productId: productId, Cost: Cost, userId: userId},
        beforeSend: function () {
        },
        complete: function () {
        },
        success: function (response) {

          const Jsondata = JSON.parse(response);
          if(Jsondata.status == "success")
            {
              $("#addcount").val(Jsondata.Qty);
              $("#addToCartbtn").hide();
              $("#input_div").show();

            }else{

            }

            // if(response==1){

            // }else{

            // }
        },
  });
}



function minus(productId, userId) {
  // alert('tyhjbn');
  $.ajax({
        url: baseUrl + "decrement", //decrement
        type:'POST',
        data:{productId: productId,  userId: userId},
        beforeSend: function () {},
        complete: function () {},
        success: function (response) {
          //  alert('hjfbjssbc');
          const Jsondata = JSON.parse(response);
          if(Jsondata.status == "success")
            {
              $("#addcount").val(Jsondata.Qty);
              $("#addToCartbtn").hide();
              $("#input_div").show();
            }else{
              $("#addToCartbtn").show();
              $("#input_div").hide();
            }
        },
  });
}




// var baseUrl = "localhost:8080/";
//   $.ajax({
//     url:baseUrl+'cart',
//     type:POST,
//     data:{id:5555555},
//     success:function(response){
//         alert(response);
//     }
//   })

// $("#btnAddToCart").click(function(){
//     // READING TEXT FROM PRAGRAPH/HEADING/DIV
//     var txtVal = $("#pName").text();
//     $("#fieldTxt").val(txtVal);
//     alert(txtVal);
//     // INSERTING THE VALUE IN THE TEXT FIELD
//     // $("#fieldTxt").val("Mi Phone");
//     // READING TEXT FIELD VALUE
//     // var txtVal = $("#fieldTxt").val();
//     // alert(txtVal)
// })
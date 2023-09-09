function showCart(data) {
    let cartModal = $("#dropdown-menu-mini-cart");
    cartModal.html(data);

}

function addActive() {
    let cartModal = $("#dropdown-menu-mini-cart");
    cartModal.addClass('show');
    $("#animate-dropdown").addClass('show');
}

function showNotification(){
    $("#cart-notification").addClass('active');
    setTimeout(function(){
        $('#cart-notification').removeClass('active');
    }, 1300);

}
let count =  $("#cart-count").data('quantity');

$(".add-to-cart").on("click" , function (e) {
    let id = $(this).data('id');
    count++;
    e.preventDefault();

    $.ajax({
        method : 'GET',
        data : {id:id},
        url : '/cart/add',
        success : function () {
            showNotification();
            $("#cart-count").html(count);
        },
        error : function () {
            alert('Oshibka');
        }
    })


})

// show cart
$("#cart-contents").on('click' , function (e) {
    e.preventDefault();
    $.ajax({
        method : "GET",
        url : '/cart/show',
        success : function (data) {
            showCart(data);
        },
        error : function () {
            alert("ERROR");
        }
    })

})

$(document).ajaxComplete(function () {
//delete from cart
    $(".remove").on('click' , function (e) {
       let id = $(this).data('id');
       let qty = $(this).data('count');
       count = count - qty;
        e.preventDefault();
        $.ajax({
            method : "GET",
            data : {id:id},
            url : '/cart/recalc',
            success : function (data) {
                showCart(data);
                addActive();
                $("#cart-count").html(count);
            }
        })
    })

    $(".minus-button").on('click',function (e) {

        let id = $(this).data('id');
        e.preventDefault();
        $.ajax({
            method : 'GET',
            url : '/cart/minus',
            data : {id:id,count:-1},
            success : function (data) {
                return data
            },

            error : function () {
                alert('OSHIBICHKA');
            }
        })
    })

    $(".plus-btn").on('click',function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        let count = 1;

        $.ajax({
            method : 'GET',
            url : '/cart/minus',
            data:{id:id,count:count},
            success : function (data) {

            },

            error : function () {
                alert('OSHIBICHKA');
            }
        })

    })
})

// $(".delete-from-cart").on('click' , function (e) {
//     let id = $(this).data('id');
//     e.preventDefault();
//     alert(id);
//     $.ajax({
//         method : "GET",
//         url : '/cart/remove-from-cart',
//         data : {id:id},
//         success : function (data) {
//             console.log(data)
//             return data
//         }
//     })
// })

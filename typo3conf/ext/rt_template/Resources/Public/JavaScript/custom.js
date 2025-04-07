/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).on('click', '.product_quantity_up', function(e) {
  e.preventDefault();
  var currentVal = parseInt($('#quantity_wanted').val());
  $('#quantity_wanted').val(currentVal + 1).trigger('keyup');
  $('#quantity_wanted').change();
});
// The button to decrement the product value
$(document).on('click', '.product_quantity_down', function(e) {
  e.preventDefault();
  var currentVal = parseInt($('#quantity_wanted').val());
  if (!isNaN(currentVal) && currentVal > 1) {
    $('#quantity_wanted').val(currentVal - 1).trigger('keyup');
  } else {
    $('#quantity_wanted').val(1);
  }
  $('#quantity_wanted').change();
});

$(document).on('click', ".ajax_add_to_cart_button", function(e) {
    ee = e;
    var form = $(e.target.parentElement);
    var serializedObject = form.serializeObject();

    $.ajax({
        async: "true",
        url: form.attr("action"),
        type: "POST",

        data: serializedObject,

        success: function(data)
        {
            handleAddToCartSuccessResponse(form, data);
        }
    });
    
    gtag('event', 'add_to_cart', {
          value: e.target.dataset.price,
          currency: 'EUR',
          items: [
                {
                 item_id: e.target.dataset.uid,
                 item_name: e.target.dataset.title,
                }
          ]
        });
        
    ffbq('track', 'AddToCart', {
        content_ids:e.target.dataset.uid, 
        contents: e.target.dataset.title, 
        currency: "EUR", 
        value: e.target.dataset.price
    });

    e.preventDefault();
})

$("[data-ajax='1']").submit(function(e) {
    ee = e;
    var form = $(this);
    var serializedObject = form.serializeObject();
    if (typeof productPrice !== 'undefined') {
        gtag('event', 'add_to_cart', {
              value: $("#quantity_wanted").val() * productPrice,
              currency: 'EUR',
              items: [
                    {
                     item_id: productId,
                     item_name: productName,
                    }
              ]
            });

        ffbq('track', 'AddToCart', {
            content_ids:productId, 
            contents: productName, 
            currency: "EUR", 
            value: $("#quantity_wanted").val() * productPrice
        });
    }

    e.preventDefault();
});

var hoverTimer;
$(document).on('mouseover', ".top-level-menu-li.simple", function(e) { 
    $('.top-level-menu-li.simple .is-simplemenu').show();
    clearTimeout(hoverTimer);
});

$(document).on('mouseout', ".top-level-menu-li.simple", function(e) { 
    hoverTimer = setTimeout(function(){$('.top-level-menu-li.simple .is-simplemenu').hide();}, 800);
});

var packetaApiKey = 'b47ee3e7e61b24f1';
function initPacketaBtn() {
    $("#packetaOptions").on("click", function(e){
        Packeta.Widget.pick(packetaApiKey, showSelectedPickupPoint);
    });
}
initPacketaBtn();

function deliverySelected(type) {
    if (type == 'balikobox') {
        initPacketaBtn();
        if (getCookie('packetaId')) {
            var spanElement = document.getElementById('packeta-point-info');
            spanElement.innerText = getCookie('packetaText');
        } else {
            Packeta.Widget.pick(packetaApiKey, showSelectedPickupPoint);
        }
    }
}
/*
        This function will receive either a pickup point object, or null if the user
        did not select anything, e.g. if they used the close icon in top-right corner
        of the widget, or if they pressed the escape key.
*/
function showSelectedPickupPoint(point) {
    var spanElement = document.getElementById('packeta-point-info');
    var idElement = document.getElementById('delivery-packeta.id');
    var addressElement = document.getElementById('delivery-packeta.address');
    if (point) {
        var recursiveToString = function(o) {
            return Object.keys(o).map(
                function(k) {
                    if (o[k] === null) {
                        return k + " = null";
                    }

                    return k + " = " + (typeof(o[k]) == "object" ?
                        "<ul><li>" + recursiveToString(o[k]) + "</li></ul>" :
                        o[k].toString().replace(/&/g, '&amp;').replace(/</g, '&lt;')
                    );
                }
            ).join("</li><li>");
        };

        spanElement.innerText = point.name + "\n" + point.zip + " " + point.city
        setCookie('packetaId', point.id);
        setCookie('packetaText', point.name + ", " + point.zip + " " + point.city);
    } else {
        spanElement.innerText = "None";
        idElement.value = "";
    }
};

function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}

function getCookie(name) {
  const value = `; ${document.cookie}`;
  const parts = value.split(`; ${name}=`);
  if (parts.length === 2) return parts.pop().split(';').shift();
}

window.onload = function() {
  var createUser = document.querySelector('#createUser');
  if (createUser) {   
    createUser.addEventListener('change', function(e) {
        console.log(e.target.checked);
        if (e.target.checked) {
            document.querySelector('#couponEmail').value = document.querySelector('#billingAddress-email').value;
            document.querySelector('#couponCode').style.color = 'transparent'
            document.querySelector('#couponCode').value = 'afraRegister10';
            
            let formData = [];
            formInputs = document.querySelectorAll('#form-order input')
            for (i in formInputs) {
                el = formInputs[i];
                console.log(el.id);
                if (el.id) {
                    formData[el.id] = el.value
                }
            };
            formDataJson = JSON.stringify({ ...formData});
            setCookie('formData', formDataJson);
            document.querySelector('#form-coupon').submit();
        } else {
            document.querySelector('.remove-coupon-link a').click()
        }
    }, false);
  }
  
  if (document.querySelector('#form-order')) {
      formCookie = getCookie('formData');
      if (formCookie) {
        formData = JSON.parse(formCookie);
        for (i in formData) {
            if (document.querySelector('#' + i)) {
              document.querySelector('#' + i).value = formData[i]
            }
        }
    }
  }
  
  $("#checkout-step-shipping-method").on("click", ".set-shipping", function(e) {
    var url = $(this).attr("href");
    if (url.indexOf("shippingId%5D=3") > 0) {
        $("#commentShopDelivery").show(500);
        $("#orderItem-comment").prop('required', 'required');
    } else {
        $("#commentShopDelivery").hide(500);
        $("#orderItem-comment").prop('required', '');
    }
  })
  
  $("#billingAddress-email").on("focusout", function(e) {
      console.log(e.target.value);
      
      request = new Request("/fileadmin/ecomail/ecomailAPI.php", {
        method: "POST",
        body: JSON.stringify({"email": e.target.value }),
        headers: {
            "Content-type": "application/json; charset=UTF-8"
        }
      });
      fetch(request);
      
      window.ecotrack('setUserId', e.target.value);
      window.ecotrack('trackPageView');
  })
}

function ffbq(a,b,c) {
    if (typeof fbq !== 'undefined') {
        fbq(a,b,c);
    }
}
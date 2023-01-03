$('#smartcart').smartCart({
    // initial products on cart
cart: [],
// Submit name of the cart parameter
resultName: 'cart_list',
// theme for the cart, related css need to include for other than default theme
theme: 'default',
// combine similar products on cart
combineProducts: true,
// highlight effect on adding/updating product in cart
highlightEffect: true,
// custom templates
cartItemTemplate: '<img class="img-responsive pull-left" src="{product_image}" /><h4 class="list-group-item-heading">{product_name}</h4><p class="list-group-item-text">{product_desc}</p>',
cartItemQtyTemplate: '{display_price} × {display_quantity} = {display_amount}',
// selectors
productContainerSelector: '.sc-product-item',
productElementSelector: '*', // input, textarea, select, div, p
addCartSelector: '.sc-add-to-cart',
// Map the paramters
paramSettings : {
  productPrice: 'product_price',
  productQuantity: 'product_quantity',
  productName: 'product_name',
  productId: 'product_id',
},

// Language variables
lang: {
  cartTitle: "Shopping Cart",
  checkout: 'Checkout',
  clear: 'Clear',
  subtotal: 'Subtotal:',
  cartRemove:'×',
  cartEmpty: 'Cart is Empty!<br />Choose your products'
},

// Submit settings
submitSettings: {
  submitType: 'form', // form, paypal, ajax
  ajaxURL: '', // Ajax submit URL
  ajaxSettings: {} // Ajax extra settings for submit call
},

// currency settings
currencySettings: {
  locales: 'en-US', // A string with a BCP 47 language tag, or an array of such strings
  currencyOptions:  {
      style: 'currency',
      currency: 'USD',
      currencyDisplay: 'symbol'
    } // extra settings for the currency formatter. Refer: https://developer.mozilla.org/en/docs/Web/JavaScript/Reference/Global_Objects/Number/toLocaleString
},

// toolbar settings
toolbarSettings: {
  showToolbar: true,
  showCheckoutButton: true,
  showClearButton: true,
  showCartSummary:true,
  checkoutButtonStyle: 'default', // default, paypal, image
  checkoutButtonImage: '', // image for the checkout button
  toolbarExtraButtons: [] // Extra buttons to show on toolbar, array of jQuery input/buttons elements
},

// debug mode
debug: false
});


$("#smartcart").on("cartEmpty", function(e) {
          // when the cart is empty
        });

        $("#smartcart").on("itemAdded", function(e) {
          // when an item is added on the cart
          // Parameter: object of the product.
        });


        $("#smartcart").on("itemUpdated", function(e) {
          // when an item is updated on the cart
          // Parameter: object of the product.
        });

        $("#smartcart").on("itemRemoved", function(e) {
          // when an item is removed from the cart
          // Parameter: object of the product.
        });


        $("#smartcart").on("quantityUpdated ", function(e) {
          // when an item quantity is updated on the cart
          // Parameter: object of the product.
          // Parameter: Integer: new quantity value.
        });

        $("#smartcart").on("cartSubmitted", function(e) {
          // when the cart is submit
          // Parameter: object of the product.
        });

        $("#smartcart").on("cartCleared", function(e) {
          // when the cart is cleared
        });

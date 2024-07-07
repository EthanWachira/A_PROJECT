<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

jQuery(document).ready(function($) {
    
    $('.add-to-cart-btn').click(function() {
        var productId = $(this).data('product-id');

        $.ajax({
            type: 'POST',
            url: 'addtocart.php',
            data: { product_id: productId }, 
            success: function(response) {
                alert(response); 
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); 
            }
        });
    });
});

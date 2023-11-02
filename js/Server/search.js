$('#search-input').on('keyup', function() {
    var query = $(this).val();
    if(query.length > 2) {
        $.ajax({
            url: '/php/search.php',
            method: 'GET',
            data: { q: query },
            dataType: 'json',
            success: function(data) {
                $('#found-products').empty();
                data.forEach(function(product){
                    $('#found-products').append(`
                        <div class="found-product">
                            <img src="${product.image}" alt="${product.productTitle}">
                            <div class="product-des">
                                <span class="brand">${product.brand}</span>
                                <h5>${product.productTitle}</h5>
                            </div>
                        </div>
                    `);
                });
            }
        });
    } else {
        $('#found-products').empty();
    }
});

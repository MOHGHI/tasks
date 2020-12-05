var querry = {};

$('select[name=category]').change(function () {
    querry['category'] = $(this).val();
    filter();
});

$('select[name=order]').change(function () {
    querry['order'] = $(this).val();
    filter();

});

function filter() {
    $(document).ready(function () {
        $.ajax({
            url: '/',
            method: "GET",
            data: {
                querry
            },
            success: function (data) {
                $(showProductsIn).fadeIn(500).html(data);
                $(".shop__paginator").fadeIn(500).html(splitData[0]);
                if (splitData[2]) {
                    $(".res-sort").text(splitData[2]);
                }

            }
        });
    });
};
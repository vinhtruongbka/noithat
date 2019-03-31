$(document).ready(function($) {
    var engine1 = new Bloodhound({
        remote: {
            url:  base_url()+'/search/product?query=%QUERY%',
            wildcard: '%QUERY%'
        },
        datumTokenizer: Bloodhound.tokenizers.whitespace('query'),
        queryTokenizer: Bloodhound.tokenizers.whitespace
    });
    $(".search-input").typeahead({
        hint: true,
        highlight: true,
        minLength: 1
    }, [
        {
            source: engine1.ttAdapter(),
            name: 'name',
            display: function(data) {
                return data.name;
            },
            templates: {
                empty: [
                    '<div class="header-title">Sản phẩm gợi ý</div><div class="list-group search-results-dropdown"><div class="list-group-item">Không có sản phẩm.</div></div>'
                ],
                header: [
                    '<div class="header-title">Sản phẩm gợi ý</div><div class="list-group search-results-dropdown"></div>'
                ],
                suggestion: function (data) {
                    return '<a href="'+base_url()+'/san-pham/'+data.slug+'-'+data.id+'" class="list-group-item">' + data.name + '</a>';
                }
            }
        }
    ]);

    $(".tt-menu").css("width",'100%');
    $(".twitter-typeahead").css("width",'100%');
    $(".header-title").css("padding-top",'10px');
    $(".list-group").css("margin-bottom",'0px');
});
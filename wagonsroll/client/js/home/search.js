$(document).ready(function() {
    directSearch = $('input#direct-search');
    directSearch.keyup(function() {
        var search = directSearch.val().trim();
        if(search != "") {
            $.get("/k2177281/wagonsroll/service/vehicleService.php?namePattern=" + search, function(results) {
                
                divHints = $('form#fullname-search-form div.hints');
                divHints.empty();
                for (var i = 0; i < results.length; i++)
                {
                    var result = $('<div class="hint">'+results[i]+'</div>');
                    result.click(function(){
                        form = $("form#fullname-search-form");
                        form.find('div.hints').hide();
                        $("input[name=search]").val($(this).text());
                        form.submit();
                    });
                    divHints.append(result);
                }
                if (results.length == 0)
                {
                    divHints.hide();
                }
                else {
                    divHints.show();
                }
            })
        }else {
            divHints.empty();
            divHints.hide();
        }
    })
})
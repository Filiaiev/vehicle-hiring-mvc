// Load inputs saved states
$(document).ready(function() {
    var checkboxes = $('form#filter input[type=checkbox]');
    checkboxes.each(function(){
        this.checked = sessionStorage.getItem(this.id) === 'true' ? true : false;
    })

    // Load input values: numbers and dates
    var valueInputs = $('form#filter input:not([type=checkbox], [type=submit])');
    valueInputs.each(function() {
        this.value = sessionStorage.getItem(this.id);
    })
});

// Handle filter submit
$(document).ready(function() {
    $('form').submit(function () {
        $(this)
            .find('input[name]')
            .filter(function () {
                return $(this).val() == '';
            })
            .prop('name', '');

        // Save checkboxes state
        var checkboxes = $('form#filter input[type=checkbox]');
        checkboxes.each(function(){
            sessionStorage.setItem(this.id, this.checked);
        })

        // Save inputs values, number and dates
        var valueInputs = $('form#filter input:not([type=checkbox], [type=submit])');
        valueInputs.each(function() {
            sessionStorage.setItem(this.id, this.value);
        })
    });
});

$(document).ready(function() {
    $('button#clear-filter-btn').click(function() {
        $('form#filter input').each(function() {
            sessionStorage.removeItem(this.id);
        });
    });
});
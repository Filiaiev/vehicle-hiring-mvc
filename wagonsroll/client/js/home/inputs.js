// Load inputs saved states
$(document).ready(function() {
    var checkboxes = $('form input[type=checkbox]');
    checkboxes.each(function(){
        this.checked = localStorage.getItem(this.id) === 'true' ? true : false;
    })

    // Load input values: numbers and dates
    var valueInputs = $('form input:not([type=checkbox], [type=submit])');
    valueInputs.each(function() {
        this.value = localStorage.getItem(this.id);
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
        var checkboxes = $('form input[type=checkbox]');
        checkboxes.each(function(){
            localStorage.setItem(this.id, this.checked);
        })

        // Save inputs values, number and dates
        var valueInputs = $('form input:not([type=checkbox], [type=submit])');
        valueInputs.each(function() {
            localStorage.setItem(this.id, this.value);
        })
    });
});
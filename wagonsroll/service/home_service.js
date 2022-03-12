// Load inputs saved states
$(document).ready(function() {
    var checkboxes = $('form#filter input[type=checkbox]');
    checkboxes.each(function(){
        this.checked = localStorage.getItem(this.id) === 'true' ? true : false;
    })

    // Load input values, except checkboxes and submit
    var valueInputs = $('form#filter input:not([type=checkbox], [type=submit])');
    valueInputs.each(function() {
        this.value = localStorage.getItem(this.id);
    })
});

// Handle filter submit
$(document).ready(function() {
    $('form#filter').submit(function () {
        $(this)
            .find('input[name]')
            .filter(function () {
                return !this.value;
            })
            .prop('name', '');

        // Save checkboxes state
        var checkboxes = $('form#filter input[type=checkbox]');
        checkboxes.each(function(){
            localStorage.setItem(this.id, this.checked);
        })

        // Save inputs values, except checkboxes and submit
        var valueInputs = $('form#filter input:not([type=checkbox], [type=submit])');
        valueInputs.each(function() {
            localStorage.setItem(this.id, this.value);
        })
    });
});
// Load inputs saved states
$(document).ready(function() {
    var checkboxes = $('form#filter input[type=checkbox]');
    checkboxes.each(function(){
        this.checked = localStorage.getItem(this.id) === 'true' ? true : false;
    })

    // Load input values: numbers and dates
    var valueInputs = $('form#filter input:not([type=checkbox], [type=submit])');
    valueInputs.each(function() {
        if(localStorage.getItem(this.id) !== null) {
            this.value = localStorage.getItem(this.id);
        }
    })
});

// Handle filter submit
$(document).ready(function() {
    $('form#filter').submit(function () {
        $(this)
            .find('input[name]')
            .filter(function () {
                return $(this).val() == '';
            })
            .prop('name', '');

        // Save checkboxes state
        var checkboxes = $('form#filter input[type=checkbox]');
        checkboxes.each(function(){
            localStorage.setItem(this.id, this.checked);
        })

        // Save inputs values, number and dates
        var valueInputs = $('form#filter input:not([type=checkbox], [type=submit])');
        valueInputs.each(function() {
            localStorage.setItem(this.id, this.value);
        })
    });
});

$(document).ready(function() {
    $('button#clear-filter-btn').click(function() {
        $('form#filter input').each(function() {
            localStorage.removeItem(this.id);
        });
    });
});
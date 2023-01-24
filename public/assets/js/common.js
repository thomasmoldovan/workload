var toaster;

$(document).ready(function () {

    // $("[data-bs-toggle='tooltip']").tooltip();

    // Create product page
    // var today = new Date();
    // var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
    // $(".startdate").datetimepicker({
    //     autoclose: true,
    //     minuteStep: 15,
    //     todayHighlight: true,
    //     forceParce: true,
    //     startDate: date,
    //     format: 'yyyy/mm/dd',
    //     startView: 2,
    //     minView: 2,
    //     viewSelect: 2
    // });
    // $(".enddate").datetimepicker({
    //     autoclose: true,
    //     minuteStep: 15,
    //     todayHighlight: true,
    //     forceParce: true,
    //     startDate: date,
    //     format: 'yyyy/mm/dd',
    //     startView: 2,
    //     minView: 2,
    //     viewSelect: 2
    // });
});

function showToast(type, title, message, init = false) {
    if (type != "" && title != "" && message != "") {
        if (init) {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "10000",
                "extendedTimeOut": "3000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        }
        toastr[type](message, title);
    }
}

// Restricts input for the given textbox to the given inputFilter.
function setInputFilter(textbox, inputFilter) {
    ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function (event) {
        textbox.addEventListener(event, function () {
            if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
            } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
            } else {
                this.value = "";
            }
        });
    });
}

// setInputFilter(document.getElementById("intTextBox"), function(value) {
// return /^-?\d*$/.test(value); });// Integer
// setInputFilter(document.getElementById("uintTextBox"), function(value) {
// return /^\d*$/.test(value); });// Integer >= 0
// setInputFilter(document.getElementById("intLimitTextBox"), function(value) {
// return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 500); });// Integer >= 0 and <= 500
// setInputFilter(document.getElementById("floatTextBox"), function(value) {
// return /^-?\d*[.,]?\d*$/.test(value); });// Float (use . or , as decimal separator)
// setInputFilter(document.getElementById("currencyTextBox"), function(value) {
// return /^-?\d*[.,]?\d{0,2}$/.test(value); });// Currency (at most two decimal places)
// setInputFilter(document.getElementById("latinTextBox"), function(value) {
// return /^[a-z]*$/i.test(value); });// A-Z only
// setInputFilter(document.getElementById("hexTextBox"), function(value) {
// return /^[0-9a-f]*$/i.test(value); });// Hexadecimal

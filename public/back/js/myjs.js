$(document).ready(function() {
    $('#class').change(function() {
        var selectedValue = $(this).val();
        if (selectedValue === '৬ষ্ঠ' || selectedValue === '৭ম' || selectedValue === '৮ম' || selectedValue === '৯ম') {
            $('#exam').val('বার্ষিক');
            $('#meritocracy_amount').val('4000');
        } else if (selectedValue === 'এস. এস. সি/ এইচ. এস. সি') {
            $('#exam').val('এস. এস. সি/ এইচ. এস. সি');
            $('#meritocracy_amount').val('5000');
        } else {
            $('#exam').val('');
            $('#meritocracy_amount').val('');
        }
    });
});

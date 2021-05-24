if($('#request-statusid').val() !== '3') // "Отказано"
{
    $('.field-request-reject_msg').hide();
}
$('#request-statusid').on('change', ()=>{ // Скрытие или отображение поля "Причина отказа" в зависимости от выбранного статуса заявки
    if($('#request-statusid').val() == '3') // "Отказано"
    {
        $('.field-request-reject_msg').fadeIn( "slow", function() {
            $('.field-request-reject_msg').show();
        });
    } else // "В обработке", "Принято"
    {
        $('.field-request-reject_msg').fadeOut( "fast", function() {
            $('.field-request-reject_msg').hide();
        });
    }
});
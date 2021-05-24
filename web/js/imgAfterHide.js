if($('#request-statusid').val() !== '2')
{
    $('.field-request-imagefileafter').hide();
}
$('#request-statusid').on('change', ()=>{ // Скрытие или отображение поля "Изображение результата работ" в зависимости от выбранного статуса заявки
    if($('#request-statusid').val() == '2') // "Принято"
    {
        $('.field-request-imagefileafter').fadeIn( "slow", function() {
            $('.field-request-imagefileafter').show();
        });
    } else // "В обработке", "Отказано"
    {
        $('.field-request-imagefileafter').fadeOut( "fast", function() {
            $('.field-request-imagefileafter').hide();
        });
    }
});
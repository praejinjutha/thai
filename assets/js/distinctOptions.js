$("select[name='EdYear'] > option").each(function () {
    $(this).siblings('[value="' + this.value + '"]').remove();
});
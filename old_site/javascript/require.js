$("form").submit(function(e) {

    var ref = $(this).find("[required]");

    $(ref).each(function(){
        if ( $(this).val() == '' )
        {
            alert("Completează câmpurile obligatorii!");

            $(this).focus();

            e.preventDefault();
            return false;
        }
    });  return true;
});
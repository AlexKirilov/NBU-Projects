//Функции обработващи заявките, които пристигат от Menu Bar-a.

$('#MulCol').on('click', function () {
    $('.opp').attr('src', 'php/MulCol.php ');
});

$('#BorRad').on('click', function () {
    $('$enterData').attr('src', '../php/ ');
    document.getElementById("BorRad").style.color = "green";
});

$('#TexSha').on('click', function () {
    $('.enterData').attr('src', '../php/ ');
});

$('#BoxSha').on('click', function () {
    $('.enterData').attr('src', '../php/ ');
});

$('#BoxRes').on('click', function () {
    $('.enterData').attr('src', '../php/ ');
});

$('#BoxSiz').on('click', function () {
    $('.enterData').attr('src', '../php/ ');
});

$('#Transit').on('click', function () {
    $('.enterData').attr('src', '../php/ ');
});

$('#Transfo').on('click', function () {
    $('.enterData').attr('src', '../php/ ');
});

$('#FontFace').on('click', function () {
    $('.enterData').attr('src', '../php/ ');
});

$('#Outline').on('click', function () {
    $('.enterData').attr('src', '../php/ ');
});

$('#RGBA').on('click', function () {
    $('.enterData').attr('src', '../php/ ');
});


/*

Here is a function to get the IP address using a filter for local and LAN IP addresses:

function get_IP_address()
{
    foreach (array('HTTP_CLIENT_IP',
                   'HTTP_X_FORWARDED_FOR',
                   'HTTP_X_FORWARDED',
                   'HTTP_X_CLUSTER_CLIENT_IP',
                   'HTTP_FORWARDED_FOR',
                   'HTTP_FORWARDED',
                   'REMOTE_ADDR') as $key){
        if (array_key_exists($key, $_SERVER) === true){
            foreach (explode(',', $_SERVER[$key]) as $IPaddress){
                $IPaddress = trim($IPaddress); // Just to be safe

                if (filter_var($IPaddress,
                               FILTER_VALIDATE_IP,
                               FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)
                    !== false) {

                    return $IPaddress;
                }
            }
        }
    }
}
*/
/*

DB shte zapisva:
    Data, IPAdress, ime na CSS-a, CSS coda.
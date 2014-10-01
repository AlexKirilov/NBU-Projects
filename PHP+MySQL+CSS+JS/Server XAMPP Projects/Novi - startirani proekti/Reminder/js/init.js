

//Vizulizaciqta v frame na welcome.php page
$('#time').on('click', function () {
    $('#frame').attr('src', '../php/clock.php');
});


/*$('.month').on('click', function () {
    $('#frame').attr('src', '../php/years.php');
});*/


//izvlichane na informaciq za markiran mesec

//Selektirane na denq na Denq
/*function getDayId() {
	var day = document.getElementById('$coordinates');
	$('#frame2').attr('src', '../php/GetSetData.php?idD=day');
	window.alert(day.innerHTML);
}*/

/*
//Izbor na mesec
$('#Jan').on('click', function () {
    $('#frame').attr('src', '../php/years.php?id=01');
    $('#frame2').attr('src', '../php/GetSetData.php?idM=01');
});
$('#Feb').on('click', function () {
    $('#frame').attr('src', '../php/years.php?id=02');
    $('#frame2').attr('src', '../php/GetSetData.php?idM=02');
});
$('#Mar').on('click', function () {
    $('#frame').attr('src', '../php/years.php?id=03');
    $('#frame2').attr('src', '../php/GetSetData.php?idM=03');
});
$('#Apr').on('click', function () {
    $('#frame').attr('src', '../php/years.php?id=04');
    $('#frame2').attr('src', '../php/GetSetData.php?idM=04');
});
$('#May').on('click', function () {
    $('#frame').attr('src', '../php/years.php?id=05');
    $('#frame2').attr('src', '../php/GetSetData.php?idM=05');
});
$('#Jun').on('click', function () {
    $('#frame').attr('src', '../php/years.php?id=06');
    $('#frame2').attr('src', '../php/GetSetData.php?idM=06');
});
$('#Jul').on('click', function () {
    $('#frame').attr('src', '../php/years.php?id=07');
    $('#frame2').attr('src', '../php/GetSetData.php?idM=07');
});
$('#Aug').on('click', function () {
    $('#frame').attr('src', '../php/years.php?id=08');
    $('#frame2').attr('src', '../php/GetSetData.php?idM=08');
});
$('#Sep').on('click', function () {
    $('#frame').attr('src', '../php/years.php?id=09');
    $('#frame2').attr('src', '../php/GetSetData.php?idM=09');
});
$('#Oct').on('click', function () {
    $('#frame').attr('src', '../php/years.php?id=10');
    $('#frame2').attr('src', '../php/GetSetData.php?idM=10');
});
$('#Nov').on('click', function () {
    $('#frame').attr('src', '../php/years.php?id=11');
    $('#frame2').attr('src', '../php/GetSetData.php?idM=11');
});
$('#Dec').on('click', function () {
    $('#frame').attr('src', '../php/years.php?id=12');
    $('#frame2').attr('src', '../php/GetSetData.php?idM=12');
});
*/
//Za Day-ID
/*for (var i = 1; i <= 31; i++) {
	$('#i').on('click', function () {
   		$('#frame2').attr('src', '../php/GetSetData.php?idD=i');
});
}*/
/*
$("#Jan").click(function(e) {
    e.preventDefault();
    $.ajax({
        type:'POST',
        url:'years.php',
        data: { varname: '01'},
        
    });
});

$("#Feb").click(function(e) {
    e.preventDefault();
    $.ajax({
        type:'POST',
        url:'years.php',
        data: { varname: '02'},
        
    });
});*/

$('#day1').on('click', function () {;
    $('#frame2').attr('src', '../php/GetSetData.php?idD=1');
});

$('#day2').on('click', function () {;
    $('#frame2').attr('src', '../php/GetSetData.php?idD=2');
});
$('#day3').on('click', function () {;
    $('#frame2').attr('src', '../php/GetSetData.php?idD=3');
});
$('#day4').on('click', function () {;
    $('#frame2').attr('src', '../php/GetSetData.php?idD=4');
});
$('#day5').on('click', function () {;
    $('#frame2').attr('src', '../php/GetSetData.php?idD=5');
});
$('#day6').on('click', function () {;
    $('#frame2').attr('src', '../php/GetSetData.php?idD=6');
});
$('#day7').on('click', function () {;
    $('#frame2').attr('src', '../php/GetSetData.php?idD=7');
});
$('#day8').on('click', function () {;
    $('#frame2').attr('src', '../php/GetSetData.php?idD=8');
});
$('#day9').on('click', function () {;
    $('#frame2').attr('src', '../php/GetSetData.php?idD=9');
});
$('#day10').on('click', function () {;
    $('#frame2').attr('src', '../php/GetSetData.php?idD=10');
});
$('#day11').on('click', function () {;
    $('#frame2').attr('src', '../php/GetSetData.php?idD=11');
});
$('#day12').on('click', function () {;
    $('#frame2').attr('src', '../php/GetSetData.php?idD=12');
});
$('#day13').on('click', function () {;
    $('#frame2').attr('src', '../php/GetSetData.php?idD=13');
});
$('#day14').on('click', function () {;
    $('#frame2').attr('src', '../php/GetSetData.php?idD=14');
});
$('#day15').on('click', function () {;
    $('#frame2').attr('src', '../php/GetSetData.php?idD=15');
});
$('#day16').on('click', function () {;
    $('#frame2').attr('src', '../php/GetSetData.php?idD=16');
});
$('#day17').on('click', function () {;
    $('#frame2').attr('src', '../php/GetSetData.php?idD=17');
});
$('#day18').on('click', function () {;
    $('#frame2').attr('src', '../php/GetSetData.php?idD=18');
});
$('#day19').on('click', function () {;
    $('#frame2').attr('src', '../php/GetSetData.php?idD=19');
});
$('#day20').on('click', function () {;
    $('#frame2').attr('src', '../php/GetSetData.php?idD=20');
});
$('#day21').on('click', function () {;
    $('#frame2').attr('src', '../php/GetSetData.php?idD=21');
});
$('#day22').on('click', function () {;
    $('#frame2').attr('src', '../php/GetSetData.php?idD=22');
});
$('#day23').on('click', function () {;
    $('#frame2').attr('src', '../php/GetSetData.php?idD=23');
});
$('#day24').on('click', function () {;
    $('#frame2').attr('src', '../php/GetSetData.php?idD=24');
});
$('#day25').on('click', function () {;
    $('#frame2').attr('src', '../php/GetSetData.php?idD=25');
});
$('#day26').on('click', function () {;
    $('#frame2').attr('src', '../php/GetSetData.php?idD=26');
});
$('#day27').on('click', function () {;
    $('#frame2').attr('src', '../php/GetSetData.php?idD=27');
});
$('#day28').on('click', function () {;
    $('#frame2').attr('src', '../php/GetSetData.php?idD=28');
});
$('#day29').on('click', function () {;
    $('#frame2').attr('src', '../php/GetSetData.php?idD=29');
});
$('#day30').on('click', function () {;
    $('#frame2').attr('src', '../php/GetSetData.php?idD=30');
});
$('#day31').on('click', function () {;
    $('#frame2').attr('src', '../php/GetSetData.php?idD=31');
});

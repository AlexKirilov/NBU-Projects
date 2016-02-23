
$('document').ready(function () {

    var id_counter = [0, 0];
    //Toolbar
    var toolbar = new Object;
    toolbar.class = "draggable";
    toolbar.id = "toolbar";
    var createBtns = new Object;
    createBtns.id = 'btnCreater';
    createBtns.txt = "Create Btn";
    var createBtnTxt = new Object;
    createBtnTxt.id = 'btnText';
    createBtnTxt.txt = "Create text fields";
    //Panels where new objects will show
    var panels = new Object;
    panels.f_panel = "<div class='panels' id='fp' ></div>";
    panels.s_panel = "<div class='panels' id='sp' ></div>";
    function render() {
        var cr_toolbar = "<div class='" + toolbar.class + "' id='" + toolbar.id + "'>" +
                "<button id='" + createBtns.id + "'>" + createBtns.txt + "</button>" +
                "<button id='" + createBtnTxt.id + "'>" + createBtnTxt.txt + "</button>" +
                "</div>";
        document.getElementById("main_container").innerHTML = cr_toolbar + panels.f_panel + panels.s_panel;
    }

//Creating toolbar
    render();
    //Obj btn toolbar new Buttons
    function newButtons(id, color) {

        this.class = "new_buttons";
        this.id = id;
        this.idBtn = "btn" + id;
        this.color = color;
        this.btnName = "New Button";
        this.url = "http://google.bg";
        function print_info() {
            return "<div class='" + this.class + "' id='div_btn" + this.id + "' style='z_index:11'>" +
//                    "<a href='#' target='_parent'  id='a" + this.id + "' class='" + this.class + "'>" +
                    "<a href='#"+this.url+"' target='_parent'  id='" + this.idBtn + "'  class='" + this.class + "'>" +
//                    "<button id='" + this.idBtn + "' >" +
                    this.btnName +
//                    "</button>"+
                    "</a></div>" +
                    "<div class='pallete' id='btn_pal" + this.id + "'></div>";
        }

        $("#fp").append(print_info());
        $("#" + this.idBtn).css({'background-color': this.color});
//        $("#" + this.idBtn).draggable();
    }

    //Obj btn toolbar new Txt
    function newTextFields(id, color) {
        this.txtclass = "new_txt draggable";
        this.id = "div_txt" + id;
        this.txt = "Some text";
        this.color = color;
        function print_info() {
            return "<div class='" + this.txtclass + "' id='" + this.id + "' value='b762ae' >" + this.txt + "</div>" +
                    "<div class='pallete' id='pal" + this.id + "'></div>";
        }
        ;
        $("#sp").append(print_info());
        $("#" + this.id).css({'background-color': this.color});
    }

    //Create new obj Button
    $("#btnCreater").on('click', function () {
//        newButtons(id_counter[0], randColor());
        newButtons(id_counter[0]);
        id_counter[0]++;
        $('.new_buttons, a , button').draggable();
        $('.new_buttons>a>button').draggable();
        $('button').draggable();
    });

    //Create new obj TxtField
    $("#btnText").on('click', function () {
//        newTextFields(id_counter[1], randColor());
        newTextFields(id_counter[1]);
        id_counter[1]++;
        $('.draggable').draggable();
    });


    function setBackground(idd, classs) {
        var str = idd.replace(/[^A-z]/g, '');
        var num = idd.replace(/[^0-9]/g, '');
        console.log(str);
        console.log("#btn_pal" + idd);
        if (str === "div_txt") {
            $("#pal" + idd).show();
            $("#pal" + idd).colorpicker({
                showOn: "showPalette"
            });
            $("#pal" + idd).on("change.color", function (event, color) {
                $("#" + idd).css('background-color', color);
                $("#pal" + idd).hide();
            });
        } else if (str === "btn") {
            $("#btn_pal" + num).show();
            $("#btn_pal" + num).colorpicker({
                showOn: "showPalette"
            });
            $("#btn_pal" + num).on("change.color", function (event, color) {
                $("#" + idd).css('background-color', color);
                $("#btn_pal" + num).hide();
            });
        }
        $(".pallete").draggable();
    }

    function getBackground() {

    }
//    function delay(URL) {
//        console.log("Time Delay");
//        setTimeout(function () {
//            window.location = URL;
//            console.log(URL);
//        }, 1000);
//    }

    $(document).on('click', ".new_txt, .new_buttons a", function (e) {
        var classs = $(this).attr('class');
        var res = classs.split(" ");
        var idd = $(this).attr('id');
        var $this = $(this);
        if ($this.hasClass('clicked')) {
            $this.removeClass('clicked');

            $(".pallete").hide();
            //send  id, class
            setBackground(idd, res[0]);
        } else {
            $this.addClass('clicked');
            setTimeout(function () {
                if ($this.hasClass('clicked')) {
                    $this.removeClass('clicked');
                    $(".pallete").hide();
                }
            }, 500);
        }
    });

    $('.draggable').draggable();

    //Random Color
    function randColor() {
        console.log('click color');
        return "#" + ((1 << 24) * Math.random() | 0).toString(16);
    }
});



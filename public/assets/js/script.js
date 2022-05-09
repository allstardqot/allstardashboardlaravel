console.log("Script is loading.......")

  $(".newshideShow").click(function(e) {
    //var keyId = $(this).data('keyid');
    $(".hidepara").toggleClass("active");
});

$('#poolpassword').hide();
$("#poolType").change(function () {
    // alert("The text has been changed.");
    var pollType = $('#poolType').val();
    // alert(pollType);
    if (pollType == 1) {
        $('#poolpassword').show();
    } else {
        $('#poolpassword').hide();

    }

});
function showLoader(){
    $(".loading").addClass("active");
}

function hideLoader(){
    $("div.loading").removeClass("active");

}

// manage Lounge Save Data
// $('#storePost').onclick(function(){
//     $('postForm').submit();
// });



var nextBtn = document.getElementById("NextBtn")
var backBtn = document.getElementById("BackBtn")
$(".create-team-nav").each((i, e) => {
    e.addEventListener("click", (c) => {
        if (c.target.id !== "contact-tab2") {
            return nextBtn.innerHTML = "NEXT";
        } else {
            return nextBtn.innerHTML = "SAVE";
        }
    })
})

$("body").on("click", "#step1_back", function () {
    $.cookie('selected_player', null)
    $("#create_team_main").show()
    $("#manage_squad").hide()
})

$("body").on("click", "#step2_back", function () {
    $.cookie('step', "first");
    $("#create_team_main").hide()
    $("#manage_squad2").hide()
    $("#manage_squad").show()
})

$("body").on("click", "#step3_back", function () {
    $.cookie('step', "second");
    $("#create_team_main").hide()
    $("#manage_squad").hide()
    $("#manage_squad3").hide()
    $("#manage_squad2").show()
})



$("body").on("click", "#managesquad_one_submit", function () {

    var selectId=[];
    var categorie=[];
    $(".playerspot .active").each(function() {
        selectId.push($(this).closest('div').find('.categorie').attr('data-id'));
        //categorie.push($(this).closest('div').find('.categorie').html());
    })
    if(selectId.length<2){
        $.notify("Please select two Substitute.", "info");
    }else{
        var yourArray = $.cookie('selected_player');
        var editId=$.cookie('editId');
        $.cookie('substitude', selectId);
        manageSquadTwo(yourArray,selectId,editId);
    }
})

$('#schedule_fixture').on("change",function() {
    var date = $("#schedule_fixture").val();
    alert(date);
    console.log(date, 'change')
});

$("body").on("click", "#managesquad_two_submit", function () {
    var selectId=[];
    var captain='';
    $(".choose_captain .active").each(function() {
        captain=$(this).closest('div').find('.categorie').attr('data-id');
    })
    if(!captain){
        $.notify("Please select a captain.", "info");
    }else{
    var substitude = $.cookie('substitude');
    //$.cookie('substitude', selectId);
    var yourArray = $.cookie('selected_player');
    var editId=$.cookie('editId');
    manageSquadThree(yourArray,substitude,captain,editId);
    }
})

$("body").on("click", "#managesquad_three_submit", function () {
    var selectId=[];
    var captain='';
    if(!$("#team_name_enter").val()){
        $.notify("Please enter team name.", "info");
    }else{
        var teamName=$("#team_name_enter").val();
        var substitude = $.cookie('substitude');
        var captain=$.cookie('captain');
        var yourArray = $.cookie('selected_player');
        var editId = $.cookie('editId');
        manageSquadFinal(yourArray,substitude,captain,teamName,editId);
    }
})

function manageSquadFinal(yourArray,substitude,captain,teamName,editId) {
    $.ajax({
        url: "create-team",
        method: "GET",
        data: {
            'selected': yourArray,'substitude':substitude,'captain':captain,'teamName':teamName,'editId':editId
        },
        success: function (result) {
            $.cookie('step', "");
            $.cookie('captain',"");
            $.cookie('substitude',"");
            $.cookie('selected_player',"");
            $.cookie('editId',"");
            //history.go(-1);
            window.location = "team";
        }
    });
}

function manageSquadThree(yourArray,substitude,captain,editId) {
    $.ajax({
        url: "manage-squad-thr",
        method: "GET",
        data: {
            'selected': yourArray,'substitude':substitude,'captain':captain,'editId':editId
        },
        success: function (result) {
            $("#create_team_main").hide()
            $("#manage_squad").hide()
            $("#manage_squad2").hide()
            $("#manage_squad3").html(result);
            $("#manage_squad3").show();
            $.cookie('step', "third");
            $.cookie('captain', captain);
        }
    });
}

function manageSquadTwo(yourArray,selectData,editId) {
    $.ajax({
        url: "manage-squad-sec",
        method: "GET",
        data: {
            'selected': yourArray,'selectData':selectData,'editId':editId
        },
        success: function (result) {
            $("#create_team_main").hide()
            $("#manage_squad").hide()
            $("#manage_squad2").html(result);
            $("#manage_squad2").show();
            $.cookie('step', "second");
            $.cookie('selected_player', yourArray);
        }
    });
}

function manageSquad(yourArray,editId) {
    //console.log("werewrwrwerrrrrrrrrrrr"+history.go(-2));
    $.ajax({
        url: "manage-squad",
        method: "GET",
        data: {
            'selected': yourArray,
            'editId':editId
        },
        success: function (result) {
            $("#create_team_main").hide()
            $("#manage_squad").show()
            $("#manage_squad").html(result);
            $.cookie('selected_player', yourArray);
            $.cookie('step', "first");
        }
    });
}

function cookiesCheck() {
    if ($.cookie('selected_player')) {

        var yourArray = $.cookie('selected_player');
        var editId = $.cookie('editId');
        var substitude = $.cookie('substitude');
        var captain = $.cookie('captain', captain);


        if($.cookie('step')=="first"){
            var editId=$("#edit_id").val();
            if(editId){
                $.cookie('editId', editId);
            }
            manageSquad(yourArray,editId);
        }else if($.cookie('step')=="second"){
            manageSquadTwo(yourArray,substitude,editId);
        }else if($.cookie('step')=="third"){
            manageSquadThree(yourArray,substitude,captain,editId);
        }
    } else {
        console.log("cookies not get")

    }
}

nextBtn.addEventListener("click", (e) => {
    e.preventDefault()
    var createTeamBtns = $(".create-team-nav")
    createTeamBtns.each((i, e) => {
        let elem = $("#" + e.id);
        if (elem.hasClass("active")) {
            btnHtml = nextBtn.innerHTML
            if (btnHtml == "SAVE") {
                yourArray = [];
                $("input:checkbox[type=checkbox]:checked").each(function () {
                    yourArray.push($(this).val());
                });
                let selected = $("#selected_count").html();

                if (selected.indexOf('7/7') == -1) {
                    $.notify("Please select 7 Players.", "info");
                } else {
                    var editId=$("#edit_id").val();
                    if(editId){
                        $.cookie('editId', editId);
                    }
                    manageSquad(yourArray,editId);
                }
            }
            if (i === 2) {
                nextBtn.innerHTML = "SAVE"


            }
            // if($("#" + createTeamBtns.eq(i + 1)[0].id)){
            let nextId = $("#" + createTeamBtns.eq(i + 1)[0].id)
            elem.removeClass("active")

            $("." + e.id).removeClass("show active")

            $("." + createTeamBtns.eq(i + 1)[0].id).addClass("show active")
            nextId.addClass("active")
            //}
            return false;
        }
    })
})

backBtn.addEventListener("click", (e) => {
    e.preventDefault()
    var createTeamBtns = $(".create-team-nav")
    createTeamBtns.each((i, e) => {
        if (i === 0) {
            return;
        }
        let elem = $("#" + e.id);
        if (elem.hasClass("active")) {
            if (i !== 2) {
                nextBtn.innerHTML = "NEXT"
            }
            let nextId = $("#" + createTeamBtns.eq(i - 1)[0].id)
            elem.removeClass("active")
            //console.log(nextId.addClass("active"))
            $("." + e.id).removeClass("show active")
            $("." + createTeamBtns.eq(i - 1)[0].id).addClass("show active")
            return false;
        }
    })
})

    // function myAdd() {
    //     var element = document.getElementById("commentArea");
    //     element.classList.toggle("active");
    //  }




    (function ($) {
        $(document).ready(function () {

            $('button').click(function () {
                $('button').removeClass('comments');
                $(this).addClass('active');
            });

            // When the user clicks on div, open the popup
            function myFunction() {
                var popup = document.getElementById("myPopup");
                popup.classList.toggle("show");
            }


        });



    })(jQuery);

function ShowAndHide() {
    var x = document.getElementById('SectionName');
    if (x.style.display == 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}
function ShowAndHide1() {
    var x = document.getElementById('SectionName1');
    if (x.style.display == 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}
function ShowAndHide2() {
    var x = document.getElementById('SectionName2');
    if (x.style.display == 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}
function ShowAndHide3() {
    var x = document.getElementById('SectionName3');
    if (x.style.display == 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}
function ShowAndHide4() {
    var x = document.getElementById('SectionName4');
    if (x.style.display == 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}
function ShowAndHide5() {
    var x = document.getElementById('SectionName5');
    if (x.style.display == 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}
function ShowAndHide6() {
    var x = document.getElementById('SectionName6');
    if (x.style.display == 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}
function ShowAndHide7() {
    var x = document.getElementById('SectionName7');
    if (x.style.display == 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}
function ShowAndHide8() {
    var x = document.getElementById('SectionName8');
    if (x.style.display == 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}
function ShowAndHide9() {
    var x = document.getElementById('SectionName9');
    if (x.style.display == 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}

const slidePage = document.querySelector(".slide-page");
const nextBtnFirst = document.querySelector(".firstNext");
const prevBtnSec = document.querySelector(".prev-1");
const nextBtnSec = document.querySelector(".next-1");
const prevBtnThird = document.querySelector(".prev-2");
const nextBtnThird = document.querySelector(".next-2");
const prevBtnFourth = document.querySelector(".prev-3");
const submitBtn = document.querySelector(".submit");
const progressText = document.querySelectorAll(".step p");
const progressCheck = document.querySelectorAll(".step .check");
const bullet = document.querySelectorAll(".step .bullet");
let current = 1;

nextBtnFirst.addEventListener("click", function (event) {
    event.preventDefault();
    slidePage.style.marginLeft = "-25%";
    bullet[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    current += 1;
});
nextBtnSec.addEventListener("click", function (event) {
    event.preventDefault();
    slidePage.style.marginLeft = "-50%";
    bullet[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    current += 1;
});
nextBtnThird.addEventListener("click", function (event) {
    event.preventDefault();
    slidePage.style.marginLeft = "-75%";
    bullet[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    current += 1;
});
submitBtn.addEventListener("click", function () {
    bullet[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    current += 1;
    setTimeout(function () {
        alert("Your Form Successfully Signed up");
        location.reload();
    }, 800);
});

prevBtnSec.addEventListener("click", function (event) {
    event.preventDefault();
    slidePage.style.marginLeft = "0%";
    bullet[current - 2].classList.remove("active");
    progressCheck[current - 2].classList.remove("active");
    progressText[current - 2].classList.remove("active");
    current -= 1;
});
prevBtnThird.addEventListener("click", function (event) {
    event.preventDefault();
    slidePage.style.marginLeft = "-25%";
    bullet[current - 2].classList.remove("active");
    progressCheck[current - 2].classList.remove("active");
    progressText[current - 2].classList.remove("active");
    current -= 1;
});
prevBtnFourth.addEventListener("click", function (event) {
    event.preventDefault();
    slidePage.style.marginLeft = "-50%";
    bullet[current - 2].classList.remove("active");
    progressCheck[current - 2].classList.remove("active");
    progressText[current - 2].classList.remove("active");
    current -= 1;
});



console.log("Script is loading.......")


$('.dob').datepicker();
$(".newshideShow").click(function (e) {
    //var keyId = $(this).data('keyid');
    $(".hidepara").toggleClass("active");
});



$(function () {
    $("#calendarMenu").datepicker();
});

function set_cookie(name, value) {
    document.cookie = name +'='+ value +'; Path=/;';
  }
  function delete_cookie(name) {
    document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
  }

<<<<<<< HEAD


=======
>>>>>>> fc110dc4a4203bf6552d0e81c577d78c8ed4d31e
$(document).ready(function () {
    $("#closeclaendar").click(function () {
        $(".hasDatepicker").toggleClass("active");
    });
<<<<<<< HEAD
=======
    $("#logout_click").click(function(){
        delete_cookie('playerIdArray');
    });
    $(".remove_common_cookie").click(function(){
        delete_cookie('playerIdArray');
        delete_cookie('selected_player');
        delete_cookie('step');
        delete_cookie('editId');
        delete_cookie('substitude');
    });
>>>>>>> fc110dc4a4203bf6552d0e81c577d78c8ed4d31e
});

$('#poolpassword').hide();
// $('#poolTeamId').hide();

$("#poolType").change(function () {
    // alert("The text has been changed.");
    var pollType = $('#poolType').val();

    if (pollType == 1) {
        $('#poolpassword').show();
        // $('#poolTeamId').show();
    } else {
        $('#poolpassword').hide();
        // $('#poolTeamId').hide();

    }

});
function showLoader() {
    $(".loading").addClass("active");
}

function hideLoader() {
    $("div.loading").removeClass("active");

}

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
        c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
        }
    }
    return "";
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
    //$.cookie('selected_player', null)
    delete_cookie('selected_player')
    $("#create_team_main").show()
    $("#manage_squad").hide()
})

$("body").on("click", "#step2_back", function () {
    //$.cookie('step', "first");
    set_cookie('step', "first");

    $("#create_team_main").hide()
    $("#manage_squad2").hide()
    $("#manage_squad").show()
})

$("body").on("click", "#step3_back", function () {
    //$.cookie('step', "second");
    set_cookie('step', "second");
    $("#create_team_main").hide()
    $("#manage_squad").hide()
    $("#manage_squad3").hide()
    $("#manage_squad2").show()
})

function editManageSquad(id) {
    $.ajax({
        url: "edit-manage-squad",
        method: "GET",
        data: {
            'id': id
        },
        success: function (result) {
            //$.cookie('editId',id);
            set_cookie('editId', id);

            //$.cookie('selected_player', result);
            set_cookie('selected_player', result);

            // alert(window.location);

            manageSquad(result,id);
            window.location="edit-team/"+id;
        }
    });
}

$("body").on("click", "#managesquad_one_submit", function () {

    var selectId = [];
    var categorie = [];
    var msg = '';
    $(".playerspot .active").each(function () {
        msg = '';
        if (selectId.length >= 5) {
            $.notify("Select only 5 players.", "info");
            $(this).removeClass("active");
        } else {
            selectId.push($(this).closest('div').find('.categorie').attr('data-id'));
            if ($.inArray($(this).closest('div').find('.categorie').html(), categorie) == -1) {
                categorie.push($(this).closest('div').find('.categorie').html());
            }
            if (selectId.length >= 5 && $.inArray("Goalkeeper", categorie) == -1) {
                //$.notify("Please choose a goalkeeper.", "info");
                msg = "Please choose a goalkeeper.";
            }
            else if (selectId.length >= 5 && categorie.length < 4) {
                msg = 'Please chose a player to remaning category.';
                //$.notify("Please chose a player to remaning category.", "info");
            } else if (selectId.length < 5) {
                //$.notify("Please chose 5 players.", "info");
                msg = 'Please chose 5 players.';
            }
        }
        //selectId.push($(this).closest('div').find('.categorie').attr('data-id'));
    });
    var allplayer = [];
    var substitude = [];
    $(".playerspot").each(function () {
        allplayer.push($(this).closest('div').find('.categorie').attr('data-id'));
    });
    $.grep(allplayer, function (el) {
        if ($.inArray(el, selectId) == -1) substitude.push(el);
    });
    if (selectId.length === 0) {
        $.notify("Please chose 5 players.", "info");
    } else if (substitude.length < 2 || msg !== '') {
        $.notify(msg, "info");
    } else {

        set_cookie('selected_player', allplayer);
        var yourArray = getCookie('selected_player');
        var editId = getCookie('editId');
        //$.cookie('substitude', substitude);
        set_cookie('substitude', substitude);

        manageSquadTwo(yourArray, substitude, editId);
    }
})

$("body").on("click", "#managesquad_two_submit", function () {
    var selectId = [];
    var captain = '';
    $(".captain_icon").each(function () {
        captain = $(this).closest('div').find('.categorie').attr('data-id');
    })
    if (!captain) {
        $.notify("Please select a captain.", "info");
    } else {
        var substitude = getCookie('substitude');
        //$.cookie('substitude', selectId);
        var yourArray = getCookie('selected_player');
        var editId = getCookie('editId');
        manageSquadThree(yourArray, substitude, captain, editId);
    }
})

$("body").on("click", "#managesquad_three_submit", function () {
    var selectId = [];
    var captain = '';
    if (!$("#team_name_enter").val()) {
        $.notify("Please enter team name.", "info");
    } else {
        var teamName = $("#team_name_enter").val();
        var substitude = getCookie('substitude');
        var captain = getCookie('captain');
        var yourArray = getCookie('selected_player');
        var editId = getCookie('editId');
        manageSquadFinal(yourArray, substitude, captain, teamName, editId);
    }
})

function manageSquadFinal(yourArray, substitude, captain, teamName, editId) {
    $.ajax({
        url: "create-team",
        method: "GET",
        data: {
            'selected': yourArray, 'substitude': substitude, 'captain': captain, 'teamName': teamName, 'editId': editId
        },
        success: function (result) {
            delete_cookie('step');
            delete_cookie('captain');
            delete_cookie('substitude');
            delete_cookie('selected_player');
            delete_cookie('editId');
            delete_cookie('playerIdArray');
            //history.go(-1);
            window.location = "team";
        }
    });
}

function manageSquadThree(yourArray, substitude, captain, editId) {
    $.ajax({
        url: "manage-squad-thr",
        method: "GET",
        data: {
            'selected': yourArray, 'substitude': substitude, 'captain': captain, 'editId': editId
        },
        success: function (result) {
            $("#create_team_main").hide()
            $("#manage_squad").hide()
            $("#manage_squad2").hide()
            $("#manage_squad3").html(result);
            $("#manage_squad3").show();
            //$.cookie('step', "third");
            set_cookie('step', "third");

            //$.cookie('captain', captain);
            set_cookie('captain', captain);

        }
    });
}

function manageSquadTwo(yourArray, selectData, editId) {
    $.ajax({
        url: "manage-squad-sec",
        method: "GET",
        data: {
            'selected': yourArray, 'selectData': selectData, 'editId': editId
        },
        success: function (result) {
            $("#create_team_main").hide()
            $("#manage_squad").hide()
            $("#manage_squad2").html(result);
            $("#manage_squad2").show();
            //$.cookie('step', "second");
            set_cookie('step', "second");

            //$.cookie('selected_player', yourArray);
            set_cookie('selected_player', yourArray);
        }
    });
}

function manageSquad(yourArray, editId) {
    //console.log("werewrwrwerrrrrrrrrrrr"+history.go(-2));
    $.ajax({
        url: "manage-squad",
        method: "GET",
        data: {
            'selected': yourArray,
            'editId': editId
        },
        success: function (result) {
            $("#create_team_main").hide()
            $("#manage_squad").show()
            $("#manage_squad").html(result);
            //$.cookie('selected_player', yourArray);
            set_cookie('selected_player', yourArray);

            //$.cookie('step', "first");
            set_cookie('step', "first");

        }
    });
}

function cookiesCheck() {

        var yourArray = getCookie('selected_player');
        var editId = getCookie('editId');
        var substitude = getCookie('substitude');
        var captain = getCookie('captain', captain);

        if (getCookie('step') == "first") {
            var editId = $("#edit_id").val();
            if (editId) {
                //$.cookie('editId', editId);
                set_cookie('editId', editId);
            }
            manageSquad(yourArray, editId);
        } else if (getCookie('step') == "second") {
            manageSquadTwo(yourArray, substitude, editId);
        } else if (getCookie('step') == "third") {
            manageSquadThree(yourArray, substitude, captain, editId);
        }
}

function removePlayerCookie(){
    delete_cookie('playerIdArray');
    location.reload();
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
                    var editId = $("#edit_id").val();
                    if (editId) {
                        //$.cookie('editId', editId);
                        set_cookie('editId', editId);
                    }
                    manageSquad(yourArray, editId);
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
            nextId.addClass("active")

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



console.log("Script is loading.......")
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
        }else{
            return nextBtn.innerHTML = "SAVE";
        }
    })
})

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
                let selected=$("#selected_count").html();
                if(selected<7){
                    $.notify("Please select 7 Players.","info");
                }else{
                    console.log(selected+"ttttttttttttttttttttttttttttt");
                // $.ajax({
                //     url: "create-team",
                //     method: "GET",
                //     data: {
                //         'searchData': data,'type':type
                //     },
                //     success: function(result) {
                //         $("#myTabContent").html(result);
                //     }
                // });
                }
            }
            if (i === 2) {
                nextBtn.innerHTML = "SAVE"
                

            }

            let nextId = $("#" + createTeamBtns.eq(i + 1)[0].id)
            elem.removeClass("active")

            $("." + e.id).removeClass("show active")
            
            $("." + createTeamBtns.eq(i + 1)[0].id).addClass("show active")
            nextId.addClass("active")
            return false;
        }
    })
})

backBtn.addEventListener("click", (e) => {
    e.preventDefault()
    var createTeamBtns = $(".create-team-nav")
    createTeamBtns.each((i, e) => {
        console.log(i, "dklajfsldkjlk")
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
            console.log(nextId.addClass("active"))
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


$(document).ready(function () {
    $("#hideShow").click(function () {
        $(".commentArea").toggleClass("active");
    });
});

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



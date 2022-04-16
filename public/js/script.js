(function ($) {
  $(document).ready(function () {
    $(".dropdown-toggle").click(function () {
      $(this).children(".fa-arrow-down").toggleClass('rotate-180');
    });
    $(".dropdown-menu").click(function () {
      $(this).siblings().children(".fa-arrow-down").toggleClass('rotate-180');
    });
    $(document).click(function (e) {
      if (!e.target.closest("ul") && $(".fa-arrow-down").hasClass("rotate-180")) {
        $(".fa-arrow-down").removeClass('rotate-180');
      }
    })



    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
      dropdown[i].addEventListener("click", function () {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
          dropdownContent.style.display = "none";
        } else {
          dropdownContent.style.display = "block";
        }
      });
    }



  });



})(jQuery);
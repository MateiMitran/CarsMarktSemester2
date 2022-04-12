$(document).ready(function() {
    // SET BODY WRAPPER HEIGHT
    let bodyHeight = $(document).outerHeight()
    let footerHeight = $('#footer').outerHeight()

    let bodyWrapperHeight = bodyHeight - footerHeight
    $('#body-wrapper').css('min-height', `${bodyWrapperHeight}px`)

    // RESPONSIVE TOP NAV FUNCTIONALITY
    $("#top-nav-ham-menu").click(function() {
        let visible = $("#top-nav ul").hasClass('visible')

        if(visible) {
            $("#top-nav ul").slideUp().removeClass('visible')
        } else {
            $("#top-nav ul").slideDown().addClass('visible')
        }
    })

    // CLOSE MESSAGES
    $("#messages-container ul li i").click(function() {
        let parentLi = $(this).parent()

        $(parentLi).slideUp();
    })

    // AUTOMATICALLY CLOSE SUCCESS MESSAGES AFTER 3 SECONDS
    $("#messages-container #success-messages li").delay(3000).slideUp(500);
})
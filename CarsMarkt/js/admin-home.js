$(document).ready(function () {
  // CHANGE DASHBOARD VIEW WHEN CLICKING ON BUTTON
  $('.dashboard-button').click(function () {
    let page = $(this).attr('page')

    // CHANGE DASHBOARD VIEW
    $('.dashboard-content').fadeOut(100).removeClass('visible').delay(100)
    $(`#${page}`).fadeIn(100).addClass('visible')

    // CHANGE PAGE TITLE
    let title = $(this).text().trim()
    $('#dashboard-wrapper .section-title').text(title)
  })

  $('.button-users').click(function () {
    var item = document.getElementById("user-row");
    var deleteid = $(this).attr('data');
    var confirmalert = confirm("Are you sure?");
    if (confirmalert == true) {
      $.ajax({
        url: 'functionality/remove-user-functionality',
        type: 'POST',
        data: { delete_id: deleteid },
        sucess: function (response) {
          item.parentNode.removeChild(item);
        }
      })
    }
  })

  $('.button-announcement').click(function () {
    var item = document.getElementById("announcement-row");
    var deleteid = $(this).attr('data');
    $.ajax({
      url: 'functionality/remove-announcement-functionality',
      type: 'POST',
      data: { delete_announcement_id: deleteid },
      sucess: function (response) {
        item.parentNode.removeChild(item);
      }
    })

  })
  $(document).ajaxStop(function () {
    window.location.reload();
  });
})

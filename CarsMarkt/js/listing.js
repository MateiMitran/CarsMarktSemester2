$(document).ready(function() {
    // LOAD FIRST LISTING IMAGE ON PAGE LOAD
    let firstImageURL = $('#listing-images-lane .image-thumbnail').eq(0).addClass('selected').attr('image')
    $('#listing-images-wrapper').css('background-image', `url('${firstImageURL}')`)

    // VIEW LISTING IMAGE BY CLICKING ON THUMBNAIL
    $('#listing-images-lane .image-thumbnail').click(function() {
        let imageURL = $(this).attr('image')

        let image = new Image()
        image.src = imageURL

        $('#listing-images-wrapper').css('background-image', `url('${imageURL}')`)
        $('#listing-images-lane .image-thumbnail').removeClass('selected')
        $(this).addClass('selected')
    })
})
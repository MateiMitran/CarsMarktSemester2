function bigSliderWithText(sliderId) {
	let sliderContainerWidth = $(`#${sliderId} .slider-container`).width();
	let itemsCount = $(`#${sliderId} .slider-container .slider .item`).length;
	let slider = $(`#${sliderId} .slider-container .slider`);

	let item = $(`#${sliderId} .slider-container .slider .item`).eq(2);
	let itemWidth = item.width();

	let marginLeft
	let marginRight
	if (itemsCount >= 2) {
		marginLeft = parseInt($(`#${sliderId} .slider-container .item-link`).eq(1).css('margin-left').replace('px', ''));
		marginRight = parseInt($(`#${sliderId} .slider-container .item-link`).eq(1).css('margin-right').replace('px', ''));
	}

	let wholeItem = itemWidth + marginLeft + marginRight;
	let nextSlideButton = $(`#${sliderId} #next-slide`);
	let prevSlideButton = $(`#${sliderId} #previous-slide`);

	let nextCount = 1;

	// SET SLIDER WIDTH
	let cardsPerPage = 3 // Set how many cards you want per page

	slider.css('width', `${(itemsCount * wholeItem)}px`);
	let sliderWidth = slider.outerWidth() + marginLeft + marginRight;

	let maxSlide = ((sliderWidth - sliderContainerWidth) / wholeItem / cardsPerPage);

	let maxSlideShort = parseFloat(maxSlide.toString().substring(0, maxSlide.toString().indexOf(".") + 2));
	let maxSlideRemainder = parseFloat((maxSlide % 1).toString().substring(0, (maxSlide % 1).toString().indexOf(".") + 2));

	let remainderCardsPerPage = parseFloat((1 / cardsPerPage).toString().substring(0, (1 / cardsPerPage).toString().indexOf(".") + 2))

	let leftToSlide = (maxSlideRemainder / remainderCardsPerPage)

	// CHECK NUMBER OF CARDS
	if (itemsCount <= cardsPerPage) {
		nextSlideButton.css('display', 'none')
	}

	// POSITION THE NAVIGATION BUTTONS
	calcPosOfNavButtons()

	// SET MAX-WIDTH OF ITEM-DESC-CONTAINER
	calcItemDescContainerMaxWidth()

	// NEXT SLIDE
	nextSlideButton.click(() => {
		if (nextCount - 1 < maxSlide) {
			if (maxSlideRemainder === 0) {
				if (nextCount + maxSlideRemainder === maxSlideShort) {
					nextSlideButton.css('display', 'none');
				}
			}
			if (nextCount - 1 + maxSlideRemainder === maxSlideShort) {
				nextSlideButton.css('display', 'none');
			}

			if (nextCount < maxSlide - maxSlideRemainder) {
				slider.css('margin-left', `-${cardsPerPage * nextCount * wholeItem}px`);
				showHideButton(prevSlideButton, 'lte', 0);
				
			} else if (nextCount >= maxSlide - maxSlideRemainder) {
				slider.css('margin-left', `-${cardsPerPage * (nextCount - 1) * wholeItem + (leftToSlide * wholeItem)}px`);
			}

			if (nextCount > maxSlide) {
				showHideButton(prevSlideButton, 'lte', 0);
				nextSlideButton.css('display', 'none')
			}
		}

		if (leftToSlide == 0) {
			if (nextCount + maxSlideRemainder === maxSlideShort) {
				nextSlideButton.css('display', 'none');
			}
		}

		nextCount++
	});

	// PREVIOUS SLIDE
	prevSlideButton.click(() => {
		if (nextCount > 1) {
			slider.css( 'margin-left', `-${(nextCount - 2) * cardsPerPage * wholeItem}px`);
			nextCount--;

		} else if (nextCount >= 1) {
			slider.css('margin-left', '0')
		}

		if (nextCount <= 1) {
			prevSlideButton.css('display', 'none');
		}
		nextSlideButton.css('display', 'block');
	});

	// GET CURRENT MARGIN-LEFT VALUE OF THE SLIDER
	function getSliderMargin() {
		return parseInt(slider.css('margin-left').replace('px', ''));
	}

	// SHOW / HIDE SLIDE BUTTON
	function showHideButton(button, comparison, value) {
		if (comparison === 'lte') {
			if (getSliderMargin() <= value) {
				button.css('display', 'block');
			} else {
				button.css('display', 'none');
			}
		} else if (comparison === 'gte') {
			if (getSliderMargin() >= value) {
				button.css('display', 'none');
			} else {
				button.css('display', 'block');
			}
		}
	}

	// CALCULATE POSITION OF NAVIGATION BUTTONS
	function calcPosOfNavButtons() {
		let cardHeight = $(`#${sliderId} .slider-container .slider .item-link`).outerHeight();
		let button = $(`#${sliderId} .slider-navigation-button`)
		let buttonHeight = $('button').outerHeight();

		let position = (cardHeight / 2) - (buttonHeight / 2)
		button.css('top', position)
		button.css('margin', '0')
	}

	// CALCULATE MAX-WIDTH OF ITEM-DESC-CONTAINER
	function calcItemDescContainerMaxWidth() {
		let cardWidth = $(`#${sliderId} .slider-container .slider .item`).outerWidth()
		let itemDescContainer = $(`#${sliderId} .slider-container .slider .item-link .item-desc-container`)

		itemDescContainer.css('max-width', cardWidth)
	}
}
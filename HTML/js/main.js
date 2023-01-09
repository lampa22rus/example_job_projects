//Menu
var bool = true

$('body').ready(function () {
	if (bool) {
		bool = false;
		$(".menu-itemM").toggleClass('activeM').next().animate({
			opacity: 0
		});
	}
	$(".menu-itemM").mousemove(function () {

		$(this).toggleClass('activeM').next().animate({
			opacity: 1
		}, 10);
	});
	$(".menuM").mouseleave(function () {

		$(".menu-itemM").toggleClass('activeM').next().animate({
			opacity: 0
		});
	})
})


//Модальное окно
//var myModal = document.getElementById('myModal')
//var myInput = document.getElementById('myInput')

//myModal.addEventListener('shown.bs.modal', function () {
//	myInput.focus()
//})




//Scroll

//var period = 0;
//i = 0
//function periodBlock() {
//	document.querySelectorAll(".text-center > .nones")[i].style.display = "block";
//	i++;
//	setTimeout(periodBlock(), 1000)
//	if (i == 6) {
//		i = 0;
//		clearInterval(periodBlock());
//	}
//}

var bool3 = false;
window.addEventListener("scroll", srt);
function srt(e) {

	up()
	let a = document.querySelectorAll(".text-center > .nones")

	if (scrollY > 4950 && bool3) {
		bool3 = false
		$('.text-center > .nones').toggle(1000);

	}

	else if (scrollY < 4900 && !bool3) {
		bool3 = true
		$('.text-center > .nones').toggle(1000);
	}

};
//$('html, body').animate({ scrollTop: $('.rebeccapurple').offset().top = $(this).offset().top + a + 'px' }, 1000);



//Слайдер

var slideNow = 1;
var slideCount = $('#slidewrapper').children().length;
var translateWidth = 0;
var slideInterval = 2000;


function nextSlide() {
	if (slideNow == slideCount || slideNow <= 0 || slideNow > slideCount) {
		$('#slidewrapper').css('transform', 'translate(0, 0)');
		slideNow = 1;
	} else {
		translateWidth = -$('#viewport').width() * (slideNow);
		$('#slidewrapper').css({
			'transform': 'translate(' + translateWidth + 'px, 0)',
			'-webkit-transform': 'translate(' + translateWidth + 'px, 0)',
			'-ms-transform': 'translate(' + translateWidth + 'px, 0)',
		});
		slideNow++;
	}
}


$(document).ready(function () {
	var switchInterval = setInterval(nextSlide, slideInterval);

	$('#viewport').hover(function () {
		clearInterval(switchInterval);
	}, function () {
		switchInterval = setInterval(nextSlide, slideInterval);
	});
});

bool1 = true

function prevSlide() {
	if (slideNow == 1 || slideNow <= 0 || slideNow > slideCount) {
		translateWidth = -$('#viewport').width() * (slideCount - 1);
		$('#slidewrapper').css({
			'transform': 'translate(' + translateWidth + 'px, 0)',
			'-webkit-transform': 'translate(' + translateWidth + 'px, 0)',
			'-ms-transform': 'translate(' + translateWidth + 'px, 0)',
		});
		slideNow = slideCount;
	} else {
		translateWidth = -$('#viewport').width() * (slideNow - 2);
		$('#slidewrapper').css({
			'transform': 'translate(' + translateWidth + 'px, 0)',
			'-webkit-transform': 'translate(' + translateWidth + 'px, 0)',
			'-ms-transform': 'translate(' + translateWidth + 'px, 0)',
		});
		slideNow--;
	}
}

$('#next-btn').click(function () {
	nextSlide();
});

$('#prev-btn').click(function () {
	prevSlide();
});


var navBtnId = 0;

$('.slide-nav-btn').click(function () {
	navBtnId = $(this).index();

	if (navBtnId + 1 != slideNow) {
		translateWidth = -$('#viewport').width() * (navBtnId);
		$('#slidewrapper').css({
			'transform': 'translate(' + translateWidth + 'px, 0)',
			'-webkit-transform': 'translate(' + translateWidth + 'px, 0)',
			'-ms-transform': 'translate(' + translateWidth + 'px, 0)',
		});
		slideNow = navBtnId + 1;
	}
});

positions = 0;
// навигация
$(document).ready(function () {



	$(".elementR").mouseenter(function () {
		$(this).click(function () {
			activEl = $(this).index()
			i = 0
			$('.blocknavsR').each(function (elem) {
				if (i == activEl) {
					console.log(activEl)
					$(".elementR").stop();
					if (i == 5) {
						$('html, body').animate({ scrollTop: $('.ups').offset().top = $(this).offset().top + 75 + 'px' }, 500);
						up()
					}
					else if (i == 6) {
						srt()
						$('html, body').animate({ scrollTop: $('.ups').offset().top = $(this).offset().top + 'px' }, 500);
						$('html, body').animate({ scrollTop: $('.ups').offset().top = $(this).offset().top + 100 + 'px' }, 20);
						up()
					}
					else {
						$('html, body').animate({ scrollTop: $('.ups').offset().top = $(this).offset().top + 'px' }, 500);
						up()
					}


				}
				i++
			});
		}); $(".elementR").stop();
		$(this).animate(
			{

				'font-size': '18',
				left: '1735px',
				width: "155px"
			}, 500);


	});
	$(".elementR").mouseleave(function () {

		$(this).animate(
			{
				'font-size': '0',
				left: '1880px',
				width: '10px'
			}, 70);

	});
})

// $(document).ready(function () {
// 	$(this).click(function () {
// 			activEl = $(this).index()
// 			i = 0
// 			$('.blocknavsR').each(function (elem) {
// 			if (i == activEl) {
// 				console.log(activEl)
// 				activEl.stop()
// 				if(activEl==5){
// 					$('html, body').animate({ scrollTop: $('.ups').offset().top = $(this).offset().top +15+ 'px' }, 500);
// 				}
// 				else if(activEl==6){
// 					$('html, body').animate({ scrollTop: $('.ups').offset().top = $(this).offset().top +1000+ 'px' }, 500);
// 				}
// 				else{
// 					$('html, body').animate({ scrollTop: $('.ups').offset().top = $(this).offset().top + 'px' }, 500);
// 				}


// 			}
// 			i++
// 		});
// 	});
// })


$(document).ready(function () {
	$(".upDown").click(function (event) {
		console.log()
		if (bool1 == true) {
			positions = $(document).scrollTop();
			$('html, body').animate({
				'scrollTop': $('.ups').offset().top = 299 + 'px',


			}, 1000);
			$('.upDown').css({
				'transform': 'rotateX(180deg)'
			})

			bool1 = !bool1;
			console.log(positions)
			return;
		}
		if (!bool1) {

			bool1 = true;
			$('html, body').animate({
				scrollTop: $('.ups').offset().top = positions + 'px',

			}, 1000);
			$('.upDown').css({
				'transform': 'rotateX(0deg)'
			})
		}
	});
});



function up() {
	$(document).ready(function () {
		console.log(scrollY)
		if ($(document).scrollTop() < 298) {

			($('.upDown').addClass('none'), 1000)
		} else {
			($('.upDown').removeClass('none'), 1000)
		}


	})
}
//text1 = document.querySelectorAll('.upDown')
//text1.innerHTML = 'x:' + e.pageX + 'y:' + e.pageY;




/* Settings
------------------------------------------------------------------------*/




/* Functions
------------------------------------------------------------------------*/



/* readyEvent
------------------------------------------------------------------------*/
document.addEventListener("DOMContentLoaded", function (e) {
	//retina
$(function () {
	$('.retina-modal').magnificPopup({
	  type: 'image',

	  retina: {
		ratio: 2,
		replaceSrc: function(item, ratio) {
		  return item.src.replace(/\.\w+$/, function(m) { return '@2x' + m; });
			}
			}
		});
	});
	  // inview fadeIn
	  $(".inview_fadeIn ").on(
		"inview",
		function (event, isInView) {
		  if (isInView) {
			$(this).addClass("show");
		  }
		}
	  );
// eachTextAnimeにappeartextというクラス名を付ける定義
function EachTextAnimeControl() {
	$(".st_basic").each(function () {
	  var elemPos = $(this).offset().top - 50;
	  var scroll = $(window).scrollTop();
	  var windowHeight = $(window).height();
	  if (scroll >= elemPos - windowHeight) {
		$(this).addClass("appeartext");
	  } else {
		$(this).removeClass("appeartext");
	  }
	});
  }

  // 画面をスクロールをしたら動かしたい場合の記述
  $(window).scroll(function () {
	EachTextAnimeControl(); /* アニメーション用の関数を呼ぶ*/
  }); // ここまで画面をスクロールをしたら動かしたい場合の記述

  // 画面が読み込まれたらすぐに動かしたい場合の記述
  $(window).on("load", function () {
	//spanタグを追加する
	var element = $(".st_basic");
	element.each(function () {
	  var text = $(this).text();
	  var textbox = "";
	  text.split("").forEach(function (t, i) {
		if (t !== " ") {
		  var n = Math.floor(Math.random() * (i + 1));
		  var s = n / 10 + 0.2;
		  textbox += '<span style="animation-delay:' + s + 's;">' + t + "</span>";
		} else {
		  textbox += t;
		}
	  });
	  $(this).html(textbox);
	});

	EachTextAnimeControl(); /* アニメーション用の関数を呼ぶ*/
  }); // ここまで画面が読み込まれたらすぐに動かしたい場合の記述
	/* load & resize & scroll & firstLoad
	------------------------------------------------------------------------*/
	$w.on({
		// load
		'load': function () {
		},
		//scroll
		'scroll': function () {
		}
	}).superResize({
		//resize
		loadAction: false,
		resizeAfter: function () {
		}
	}).firstLoad({
		//firstLoad
		pc_tab: function () {
		},
		sp: function () {
		}
	});
});
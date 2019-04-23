function scrollToTop() {
    scrollTo(0, 0);
    //        \ここだよ！/
}

var hoge = document.querySelector('goBack');



window.addEventListener('DOMContentLoaded', function() {
    const button = document.getElementById('goBack');
    const goBackAction= () => {
        //console.log('topへ戻る');
        window.scrollTo(0,50);
    };

    button.addEventListener('click', goBackAction, false);

    //console.log('ここだよ');
});


$(function() {
    var TopBtn = $('#PageTopBtn');
    TopBtn.hide();
    // スクロール位置が100でボタンを表示
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            TopBtn.fadeIn();
        }
        else {
            TopBtn.fadeOut();
        }
    });
    // ボタンを押下するとトップへ移動
    TopBtn.click(function() {
        $('body,html').animate({
            scrollTop: 0
        }, 300);
        return false;
    });
});

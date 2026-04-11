(function ($) {
    var pageKey = window.location.pathname;

    function restoreInputs() {
        $('input[id]:not([disabled]):not([readonly])').each(function () {
            var saved = localStorage.getItem(pageKey + ':' + this.id);
            if (saved !== null) {
                this.value = saved;
            }
        });
    }

    $(document).ready(function () {
        restoreInputs();
    });

    $(document).on('change keyup', 'input[id]:not([disabled]):not([readonly])', function () {
        localStorage.setItem(pageKey + ':' + this.id, this.value);
    });

})(jQuery);

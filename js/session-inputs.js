(function ($) {
    var pageKey = window.location.pathname;

    function saveInput(el) {
        if (el.type === 'checkbox') {
            localStorage.setItem(pageKey + ':' + el.id, el.checked ? '1' : '0');
        } else {
            localStorage.setItem(pageKey + ':' + el.id, el.value);
        }
    }

    function restoreInputs() {
        $('input[id]:not([disabled])').each(function () {
            var saved = localStorage.getItem(pageKey + ':' + this.id);
            if (saved !== null) {
                if (this.type === 'checkbox') {
                    this.checked = saved === '1';
                } else {
                    this.value = saved;
                }
            }
        });
    }

    $(document).ready(function () {
        restoreInputs();
    });

    $(document).on('change keyup', 'input[id]:not([disabled])', function () {
        saveInput(this);
    });

})(jQuery);

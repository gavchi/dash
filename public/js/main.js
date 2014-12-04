/**
 * Formatting date
 * @param str
 * @returns {number}
 */
function timestamp(str) {
    return new Date(str).getTime();
}

/**
 * Date format to display
 * @param value
 * @returns {string}
 */
function formatDate(value) {
    var date = new Date(+value);
    var m = date.getMonth() + 1;
    var d = date.getDate();
    return (d <= 9 ? '0' + d : d) + '.' + (m <= 9 ? '0' + m : m);
}

/**
 * Update params site
 */
function setResize() {
    var windowHeight = $(window).height();
    var content = $('.jsContent');
    content.css('min-height', windowHeight - 230); // 230 - height header+footer
}

(function () {
    var windowHeight = $(window).height();
    var header = $('.jsHeader');
    var headerParent = header.closest('.header');
    var content = $('.jsContent');
    var headerLock = true;
    var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ? true : false;
    setResize();
    
    if (isMobile) {
        $('body').addClass('mobile');
    }

    /**
     * Toggle size header
     */
    function toggleHeader() {
        if (headerLock) {
            $(window).scrollTop(0);
            headerParent.addClass('header_out');
            headerLock = false;

            setTimeout(function() {
                headerParent.css('position', 'absolute');
            }, 25); // bug Firefox https://bugzilla.mozilla.org/show_bug.cgi?id=625289
            setTimeout(function() {
                headerParent.removeClass('header_out');
                headerParent.removeClass('header_min');
                content.css('margin-top', '350px');
            }, 500);
        } else {
            headerParent.addClass('header_out');
            content.css('margin-top', '62px');
            headerLock = true;

            setTimeout(function() {
                headerParent.css('position', 'fixed');
            }, 25); // bug Firefox https://bugzilla.mozilla.org/show_bug.cgi?id=625289
            setTimeout(function() {
                headerParent.removeClass('header_out');
                headerParent.addClass('header_min');
            }, 500);
        }
    }
    
    $('.header').click(function () {
        if ($(this).hasClass('header_min')) {
            toggleHeader();
        }
    });
    
    $('.jsHeaderHandle').click(function () {
        toggleHeader();
        return false;
    });

    /**
     *  Сhoice of dates
     */
    var slider = $('.jsSlider');
    var customToolTip = $.Link({
        target: '-tooltip-<div class="tooltip"></div>',
        method: function (value) {
            // The tooltip HTML is 'this', so additional
            // markup can be inserted here.
            $(this).html('<span>' + formatDate(value) + '</span>');
        }
    });

    slider.noUiSlider({
        connect: true,
        range: {
            min: timestamp('2014/01/01'),
            max: timestamp('2015/01/01')
        },
        // Steps of one day
        step: 24 * 60 * 60 * 1000,
        // Two more timestamps indicate the handle starting positions.
        //month/day/year
        start: [timestamp('2014/04/01 12:00'), timestamp('2014/11/09 12:00')],
        // The setDate function will display the current values.
        serialization: {
            lower: [customToolTip],
            upper: [customToolTip]
        }
    });

    slider.change(function () {
        $('.jsDateUpdate').removeClass('btn_update');
    });

    /**
     * Data update, after selecting dates
     */
    $('.jsDateUpdate').click(function () {
        $('.jsDateUpdate').addClass('btn_update');
        $('.jsUpdateContent').addClass('dashboard_update');

        // imitation ajax
        setTimeout(function() {
            $('.jsDateUpdate').removeClass('btn_update');
            $('.jsUpdateContent').removeClass('dashboard_update');
            $('body').removeClass('data-no-update');
        }, 1000);
        
        if (body.hasClass('tour-step')) {
            return true;
        }
        
        return false;
    });

    /*
       Update manually
     */
    // $('body').addClass('data-no-update');
    // $('.jsDataUpdate').click(function () {
    //
    // });

    /**
     * Sort blocks of grid(4 cell in a row)
     * @param cell
     * @returns {index: number, rowIndex: number, rowIndexStart: number, rowIndexEnd: number, cellIndex: number, items: (array|jQuery)}
     */
    function griddable(cell) {
        var index = cell.closest('.dashboard-item').index();
        var rowIndex = index / 4 | 0;
        var rowIndexStart = ((rowIndex + 1) * 4) - 4;
        var rowIndexEnd = ((rowIndex + 1) * 4) - 1;
        var cellIndex = index - rowIndex * 4;
        var items = $('.dashboard-item').map(function(indx, element){
          return $(element);
        });
        return {
            index: index,
            rowIndex: rowIndex,
            rowIndexStart: rowIndexStart,
            rowIndexEnd: rowIndexEnd,
            cellIndex: cellIndex,
            items: items
        };
    }

    /**
     * Opening details cell
     */
    $('.jsDashboard').click(function () {
        var grid = griddable($(this));
        var i = grid.rowIndexStart;
        var cellWidth = 250;
        var cellPadding = 10;
        var cellPaddingBox = cellWidth + cellPadding;
        
        $(this).fadeOut().closest('.dashboard-item').addClass('dashboard-item_open')
            .css('left', -cellWidth * grid.cellIndex - cellPadding * grid.cellIndex);

        switch (grid.cellIndex) {
            case 0:
                for (i; i < grid.rowIndexEnd + 1; i++) {
                    if (i !== grid.index) {
                        grid.items[i].css('left', cellPaddingBox * 3);
                    }
                }
                break;
            case 1:
                for (i; i < grid.rowIndexEnd + 1; i++) {
                    if (i > grid.index) {
                        grid.items[i].css('left', cellPaddingBox * 2);
                    } else if (i < grid.index) {
                        grid.items[i].css('left', -cellPaddingBox * 1);
                    }
                }
                break;
            case 2:
                for (i; i < grid.rowIndexEnd + 1; i++) {
                    if (i > grid.index) {
                        grid.items[i].css('left', cellPaddingBox * 1);
                    } else if (i < grid.index) {
                        grid.items[i].css('left', -cellPaddingBox * 2);
                    }
                }
                break;
            case 3:
                for (i; i < grid.rowIndexEnd + 1; i++) {
                    if (i !== grid.index) {
                        grid.items[i].css('left', -cellPaddingBox * 3);
                    }
                }
                break;
        }

        if ($('body').hasClass('tour-step') && $(this).closest('.dashboard-item').prev().length) {
            $('body').removeClass('tour-step');
        }
    });

    /**
     * Closing details cell
     */
    $('.jsDashboardClose').click(function () {
        var grid = griddable($(this));

        for (var i = grid.rowIndexStart; i < grid.rowIndexEnd + 1; i++) {
            grid.items[i].removeClass('dashboard-item_open').css('left', 0);
        }
        $(this).closest('.dashboard-item').find('.jsDashboard').fadeIn();
    });

    /**
     * Initialization sorting drag and drop
     */
    function initSortable() {
        new Sortable(board, {
            handle: '.dashboard-item__inner',
            draggable: '.dashboard-item',
            onUpdate: function (evt){ 
                // console.log('onUpdate.bar:', evt.item); 
            },
            onStart:function(evt){ 
                $('.dashboard-item').removeClass('dashboard-item_open').css('left', 0).find('.jsDashboard').fadeIn();
                // console.log('onStart.foo:', evt.item);
            },
            onEnd: function(evt){ 
                // console.log('onEnd.foo:', evt.item);
            }
        });
    }

    /**
     * Initialization tips
     */
    function initTips() {
        $('body').addClass('tour-step tour-step-1');
        $(document).click(function () {
            var body = $('body');
            if (body.hasClass('tour-step')) {
                for (var i = 5; i > 0; i--) {
                    if (body.hasClass('tour-step-' + i)) {
                        if (i === 5) {
                            body.removeClass('tour-step-' + i + ' tour-step');
                        } if (i === 4) {
                            if ($('.dashboard__row .dashboard-item:first-child').hasClass('dashboard-item_open')) {
                                body.removeClass('tour-step-' + i).addClass('tour-step-' + (i + 1));
                            } else {
                                body.addClass('tour-step-4_hide');
                            }
                        } else {
                            if ($('.dashboard__row .dashboard-item:first-child').hasClass('dashboard-item_open')) {
                                body.removeClass('tour-step');
                            } else {
                                body.removeClass('tour-step-' + i).addClass('tour-step-' + (i + 1));
                            }
                        }
                    }
                }
            }
        });
    }

    /**
     * Initialization animation at loading page
     * @param windowHeight
     * @param headerParent
     */
    function initCapAnimation(windowHeight, headerParent) {
        var cap = $('.jsCap');
        var interval = 700;
        var headerHeight = 350;
        setTimeout(function() {
            headerParent.css('margin-top', 0);
            cap.css({ 'margin-top': headerHeight });
        }, interval);
        setTimeout(function() {
            cap.css({ 'margin-top': windowHeight });
        }, interval * 2);
        setTimeout(function() {
            headerLock = false;
            cap.hide();
        }, interval * 3);
        setTimeout(function() {
            headerParent.addClass('header_out');
            content.css('margin-top', '62px');
            headerLock = true;
            setTimeout(function() {
                headerParent.removeClass('header_out');
                headerParent.addClass('header_min');
            }, 500);
        }, interval * 5);
    }
    initCapAnimation(windowHeight, headerParent);

    if (!isMobile) {
        initSortable();

        // init TourPage once
        if (localStorage) {
            if (localStorage.getItem('initTips')) return;
            setTimeout(function() {
                initTips();
                localStorage.setItem('initTips', true);
            }, 5400);
        }
    }

})();

$(window).resize(function () {
    setResize();
});
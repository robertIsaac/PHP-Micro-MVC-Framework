(function() {
    "use strict";

    var logErrorURL = ROOT + "errors/jsLog/";

    // --------------------------------------------------------------------------------------------
    // logging ajax errors

    $( document ).ajaxError(function( event, jqxhr, settings, thrownError ) {
        if (jqxhr.status === 0)
        {
            return;
        }
        var errorInfo = {
            status : jqxhr.status,
            statusText : jqxhr.statusText,
            url : settings.url,
            method : settings.type,
            data : settings.data,
            type : 'ajax',
            thrownError : thrownError
        };
        logError(logErrorURL, errorInfo);
        return false;
    });

    // logging javascript errors

    window.onerror = function(msg, url, lineNum, columnNum, error) {
        if (typeof error === 'undefined' || error.message.search('__firefox__') !== -1)
        {
            return;
        }
        var errorInfo = {
            error : error.message,
            stack : error.stack,
            browser:    browser(),
            type : 'JS',
            url: window.location.href
        };
        logError(logErrorURL, errorInfo);
        return false;
    };

    function logError(url, postData) {
		$.post(url, postData).always(function (r) {

        });
    }

    function browser()
    {
        // Opera 8.0+
        var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;

        // Firefox 1.0+
        var isFirefox = typeof InstallTrigger !== 'undefined';

        // Safari 3.0+ "[object HTMLElementConstructor]"
        var isSafari = /constructor/i.test(window.HTMLElement) || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || (typeof safari !== 'undefined' && safari.pushNotification));

        // Internet Explorer 6-11
        var isIE = /*@cc_on!@*/false || !!document.documentMode;

        // Edge 20+
        var isEdge = !isIE && !!window.StyleMedia;

        // Chrome 1+
        var isChrome = !!window.chrome && !!window.chrome.webstore;

        // Blink engine detection
        var isBlink = (isChrome || isOpera) && !!window.CSS;

        if (isOpera)
        {
            return 'Opera';
        }
        if (isFirefox)
        {
            return 'Firefox';
        }
        if (isSafari)
        {
            return 'Safari';
        }
        if (isIE)
        {
            return 'IE';
        }
        if (isEdge)
        {
            return 'Edge';
        }
        if (isChrome)
        {
            return 'Chrome';
        }
        if (isBlink)
        {
            return 'Blink';
        }
    }


})();
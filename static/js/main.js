/*
 * ============================================================================
 * AzokalTheme entry point
 * ============================================================================
 */

var AzokalTheme = {};

AzokalTheme.$window = null;
AzokalTheme.$body = null;


/**
 * On document ready
 * @param  {[type]} event [description]
 * @return {[type]}       [description]
 */
AzokalTheme.onDocumentReady = function(e) {
    var _this = _this;

    // Store temp configuration
    for( var index in temp ){
        AzokalTheme[index] = temp[index];
    }

    AzokalTheme.init();
};


/**
 * Init
 * @return {[type]} [description]
 */
AzokalTheme.init = function(){
    var _this = this;

    // Selectors  
    _this.$window = $(window);
    _this.$body = $('body');
    
    // Events
    // _this.$window.on('resize', $.proxy(_this.resize, _this));
    // _this.$window.trigger('resize');
};


/**
 * Resize
 * @return {[type]} [description]
 */
AzokalTheme.resize = function(){
    var _this = this;

    
};


/*
 * ============================================================================
 * Plug into jQuery standard events
 * ============================================================================
 */
$(document).ready(AzokalTheme.onDocumentReady);
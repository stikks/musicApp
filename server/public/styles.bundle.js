webpackJsonp(["styles"],{

/***/ "./node_modules/raw-loader/index.js!./node_modules/postcss-loader/lib/index.js??embedded!./node_modules/sass-loader/lib/loader.js??ref--8-3!./src/styles.scss":
/***/ (function(module, exports) {

module.exports = "/* You can add global styles to this file, and also import other style files */\n/*! normalize.css v7.0.0 | MIT License | github.com/necolas/normalize.css */\n/* Document\n   ========================================================================== */\n/**\n * 1. Correct the line height in all browsers.\n * 2. Prevent adjustments of font size after orientation changes in\n *    IE on Windows Phone and in iOS.\n */\nhtml {\n  line-height: 1.15;\n  /* 1 */\n  -ms-text-size-adjust: 100%;\n  /* 2 */\n  -webkit-text-size-adjust: 100%;\n  /* 2 */ }\n/* Sections\n   ========================================================================== */\n/**\n * Remove the margin in all browsers (opinionated).\n */\nbody {\n  margin: 0; }\n/**\n * Add the correct display in IE 9-.\n */\narticle,\naside,\nfooter,\nheader,\nnav,\nsection {\n  display: block; }\n/**\n * Correct the font size and margin on `h1` elements within `section` and\n * `article` contexts in Chrome, Firefox, and Safari.\n */\nh1 {\n  font-size: 2em;\n  margin: 0.67em 0; }\n/* Grouping content\n   ========================================================================== */\n/**\n * Add the correct display in IE 9-.\n * 1. Add the correct display in IE.\n */\nfigcaption,\nfigure,\nmain {\n  /* 1 */\n  display: block; }\n/**\n * Add the correct margin in IE 8.\n */\nfigure {\n  margin: 1em 40px; }\n/**\n * 1. Add the correct box sizing in Firefox.\n * 2. Show the overflow in Edge and IE.\n */\nhr {\n  -webkit-box-sizing: content-box;\n          box-sizing: content-box;\n  /* 1 */\n  height: 0;\n  /* 1 */\n  overflow: visible;\n  /* 2 */ }\n/**\n * 1. Correct the inheritance and scaling of font size in all browsers.\n * 2. Correct the odd `em` font sizing in all browsers.\n */\npre {\n  font-family: monospace, monospace;\n  /* 1 */\n  font-size: 1em;\n  /* 2 */ }\n/* Text-level semantics\n   ========================================================================== */\n/**\n * 1. Remove the gray background on active links in IE 10.\n * 2. Remove gaps in links underline in iOS 8+ and Safari 8+.\n */\na {\n  background-color: transparent;\n  /* 1 */\n  -webkit-text-decoration-skip: objects;\n  /* 2 */ }\n/**\n * 1. Remove the bottom border in Chrome 57- and Firefox 39-.\n * 2. Add the correct text decoration in Chrome, Edge, IE, Opera, and Safari.\n */\nabbr[title] {\n  border-bottom: none;\n  /* 1 */\n  text-decoration: underline;\n  /* 2 */\n  -webkit-text-decoration: underline dotted;\n          text-decoration: underline dotted;\n  /* 2 */ }\n/**\n * Prevent the duplicate application of `bolder` by the next rule in Safari 6.\n */\nb,\nstrong {\n  font-weight: inherit; }\n/**\n * Add the correct font weight in Chrome, Edge, and Safari.\n */\nb,\nstrong {\n  font-weight: bolder; }\n/**\n * 1. Correct the inheritance and scaling of font size in all browsers.\n * 2. Correct the odd `em` font sizing in all browsers.\n */\ncode,\nkbd,\nsamp {\n  font-family: monospace, monospace;\n  /* 1 */\n  font-size: 1em;\n  /* 2 */ }\n/**\n * Add the correct font style in Android 4.3-.\n */\ndfn {\n  font-style: italic; }\n/**\n * Add the correct background and color in IE 9-.\n */\nmark {\n  background-color: #ff0;\n  color: #000; }\n/**\n * Add the correct font size in all browsers.\n */\nsmall {\n  font-size: 80%; }\n/**\n * Prevent `sub` and `sup` elements from affecting the line height in\n * all browsers.\n */\nsub,\nsup {\n  font-size: 75%;\n  line-height: 0;\n  position: relative;\n  vertical-align: baseline; }\nsub {\n  bottom: -0.25em; }\nsup {\n  top: -0.5em; }\n/* Embedded content\n   ========================================================================== */\n/**\n * Add the correct display in IE 9-.\n */\naudio,\nvideo {\n  display: inline-block; }\n/**\n * Add the correct display in iOS 4-7.\n */\naudio:not([controls]) {\n  display: none;\n  height: 0; }\n/**\n * Remove the border on images inside links in IE 10-.\n */\nimg {\n  border-style: none; }\n/**\n * Hide the overflow in IE.\n */\nsvg:not(:root) {\n  overflow: hidden; }\n/* Forms\n   ========================================================================== */\n/**\n * 1. Change the font styles in all browsers (opinionated).\n * 2. Remove the margin in Firefox and Safari.\n */\nbutton,\ninput,\noptgroup,\nselect,\ntextarea {\n  font-family: sans-serif;\n  /* 1 */\n  font-size: 100%;\n  /* 1 */\n  line-height: 1.15;\n  /* 1 */\n  margin: 0;\n  /* 2 */ }\n/**\n * Show the overflow in IE.\n * 1. Show the overflow in Edge.\n */\nbutton,\ninput {\n  /* 1 */\n  overflow: visible; }\n/**\n * Remove the inheritance of text transform in Edge, Firefox, and IE.\n * 1. Remove the inheritance of text transform in Firefox.\n */\nbutton,\nselect {\n  /* 1 */\n  text-transform: none; }\n/**\n * 1. Prevent a WebKit bug where (2) destroys native `audio` and `video`\n *    controls in Android 4.\n * 2. Correct the inability to style clickable types in iOS and Safari.\n */\nbutton,\nhtml [type=\"button\"],\n[type=\"reset\"],\n[type=\"submit\"] {\n  -webkit-appearance: button;\n  /* 2 */ }\n/**\n * Remove the inner border and padding in Firefox.\n */\nbutton::-moz-focus-inner,\n[type=\"button\"]::-moz-focus-inner,\n[type=\"reset\"]::-moz-focus-inner,\n[type=\"submit\"]::-moz-focus-inner {\n  border-style: none;\n  padding: 0; }\n/**\n * Restore the focus styles unset by the previous rule.\n */\nbutton:-moz-focusring,\n[type=\"button\"]:-moz-focusring,\n[type=\"reset\"]:-moz-focusring,\n[type=\"submit\"]:-moz-focusring {\n  outline: 1px dotted ButtonText; }\n/**\n * Correct the padding in Firefox.\n */\nfieldset {\n  padding: 0.35em 0.75em 0.625em; }\n/**\n * 1. Correct the text wrapping in Edge and IE.\n * 2. Correct the color inheritance from `fieldset` elements in IE.\n * 3. Remove the padding so developers are not caught out when they zero out\n *    `fieldset` elements in all browsers.\n */\nlegend {\n  -webkit-box-sizing: border-box;\n          box-sizing: border-box;\n  /* 1 */\n  color: inherit;\n  /* 2 */\n  display: table;\n  /* 1 */\n  max-width: 100%;\n  /* 1 */\n  padding: 0;\n  /* 3 */\n  white-space: normal;\n  /* 1 */ }\n/**\n * 1. Add the correct display in IE 9-.\n * 2. Add the correct vertical alignment in Chrome, Firefox, and Opera.\n */\nprogress {\n  display: inline-block;\n  /* 1 */\n  vertical-align: baseline;\n  /* 2 */ }\n/**\n * Remove the default vertical scrollbar in IE.\n */\ntextarea {\n  overflow: auto; }\n/**\n * 1. Add the correct box sizing in IE 10-.\n * 2. Remove the padding in IE 10-.\n */\n[type=\"checkbox\"],\n[type=\"radio\"] {\n  -webkit-box-sizing: border-box;\n          box-sizing: border-box;\n  /* 1 */\n  padding: 0;\n  /* 2 */ }\n/**\n * Correct the cursor style of increment and decrement buttons in Chrome.\n */\n[type=\"number\"]::-webkit-inner-spin-button,\n[type=\"number\"]::-webkit-outer-spin-button {\n  height: auto; }\n/**\n * 1. Correct the odd appearance in Chrome and Safari.\n * 2. Correct the outline style in Safari.\n */\n[type=\"search\"] {\n  -webkit-appearance: textfield;\n  /* 1 */\n  outline-offset: -2px;\n  /* 2 */ }\n/**\n * Remove the inner padding and cancel buttons in Chrome and Safari on macOS.\n */\n[type=\"search\"]::-webkit-search-cancel-button,\n[type=\"search\"]::-webkit-search-decoration {\n  -webkit-appearance: none; }\n/**\n * 1. Correct the inability to style clickable types in iOS and Safari.\n * 2. Change font properties to `inherit` in Safari.\n */\n::-webkit-file-upload-button {\n  -webkit-appearance: button;\n  /* 1 */\n  font: inherit;\n  /* 2 */ }\n/* Interactive\n   ========================================================================== */\n/*\n * Add the correct display in IE 9-.\n * 1. Add the correct display in Edge, IE, and Firefox.\n */\ndetails,\nmenu {\n  display: block; }\n/*\n * Add the correct display in all browsers.\n */\nsummary {\n  display: list-item; }\n/* Scripting\n   ========================================================================== */\n/**\n * Add the correct display in IE 9-.\n */\ncanvas {\n  display: inline-block; }\n/**\n * Add the correct display in IE.\n */\ntemplate {\n  display: none; }\n/* Hidden\n   ========================================================================== */\n/**\n * Add the correct display in IE 10-.\n */\n[hidden] {\n  display: none; }\nbody, html {\n  -webkit-font-smoothing: antialiased;\n  -webkit-tap-highlight-color: transparent;\n  -webkit-touch-callout: none;\n  -webkit-text-size-adjust: 100%;\n  -ms-text-size-adjust: 100%;\n  -moz-osx-font-smoothing: grayscale;\n  width: 100%;\n  height: 100%;\n  position: relative;\n  -webkit-box-sizing: border-box;\n          box-sizing: border-box; }\nhtml {\n  font-size: 62.5%;\n  -ms-touch-action: manipulation;\n      touch-action: manipulation; }\nbody {\n  font-family: Roboto, \"Helvetica Neue\", sans-serif;\n  line-height: 1.42857143;\n  font-size: 1.4rem;\n  margin: 0;\n  overflow: hidden; }\n.app-content {\n  width: 100%;\n  height: 100%;\n  overflow: hidden;\n  position: relative;\n  -webkit-box-sizing: border-box;\n          box-sizing: border-box; }\napp-root {\n  -webkit-box-sizing: inherit;\n          box-sizing: inherit; }\napp-root *, app-root *:before, app-root *:after {\n    -webkit-box-sizing: inherit;\n            box-sizing: inherit; }\n.scroll-container {\n  width: 100%;\n  height: 100%;\n  overflow-y: auto;\n  overflow-x: hidden; }\n.scroll-container.ps {\n    position: relative;\n    overflow: hidden; }\nimg {\n  display: block; }\n.block {\n  display: block; }\na {\n  text-decoration: none;\n  color: #6eac00; }\na.hover-underline {\n    color: inherit; }\na.hover-underline:hover {\n      text-decoration: underline; }\n.hidden {\n  display: none !important;\n  visibility: hidden; }\n.button {\n  color: inherit;\n  background-color: transparent;\n  border: 1px solid transparent;\n  padding: 0 8px;\n  border-radius: 3px;\n  font-size: 1.4rem;\n  font-family: inherit;\n  font-weight: 500;\n  cursor: pointer;\n  min-width: 88px;\n  line-height: 36px;\n  text-transform: uppercase;\n  display: inline-block;\n  text-align: center;\n  -webkit-transition: background-color 0.2s ease-in-out;\n  transition: background-color 0.2s ease-in-out; }\n.button:hover {\n    background-color: rgba(0, 0, 0, 0.12); }\n.button:hover {\n    text-decoration: none; }\n.button:focus {\n    outline: none; }\n.button.primary {\n    background-color: #6eac00;\n    color: #fff;\n    border-color: #6eac00;\n    -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);\n            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26); }\n.button.primary:hover {\n      background-color: #649d00; }\n.button.danger {\n    background-color: #ea6153;\n    color: #fff;\n    border-color: #ea6153;\n    -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);\n            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26); }\n.button.danger:hover {\n      background-color: #e85445; }\n.button.flat {\n    background-color: rgba(158, 158, 158, 0.2);\n    -webkit-box-shadow: none;\n            box-shadow: none;\n    border: none;\n    font-size: 1.1rem;\n    font-weight: 600;\n    line-height: 28px;\n    color: #555; }\n.button.flat:hover {\n      background-color: rgba(158, 158, 158, 0.4); }\n.button:disabled {\n    background-color: #E1E1E1;\n    -webkit-box-shadow: none;\n            box-shadow: none;\n    color: #B7B7B7;\n    cursor: not-allowed;\n    border-color: #E1E1E1; }\n.button:disabled:hover {\n      background-color: #E1E1E1; }\nbutton.no-style {\n  background: none;\n  border: 0;\n  color: inherit;\n  font: inherit;\n  line-height: normal;\n  overflow: visible;\n  padding: 0;\n  border-radius: 0;\n  min-width: initial;\n  -webkit-user-select: none;\n  /* for button */\n  -moz-user-select: none;\n  -ms-user-select: none;\n  outline: none;\n  cursor: pointer; }\nbutton > svg-icon {\n  display: block;\n  pointer-events: none;\n  /* fix edge click on svg icon bug */ }\nweb-player ::-webkit-scrollbar, lyrics-modal ::-webkit-scrollbar, context-menu-playlist-panel ::-webkit-scrollbar {\n  width: 8px;\n  background-color: transparent; }\nweb-player ::-webkit-scrollbar-thumb, lyrics-modal ::-webkit-scrollbar-thumb, context-menu-playlist-panel ::-webkit-scrollbar-thumb {\n  background-color: #353543;\n  border-radius: 3px; }\nweb-player ::-webkit-scrollbar-thumb:hover, lyrics-modal ::-webkit-scrollbar-thumb:hover, context-menu-playlist-panel ::-webkit-scrollbar-thumb:hover {\n    background-color: #414151; }\n.ps {\n  -ms-touch-action: auto;\n  touch-action: auto;\n  overflow: hidden !important;\n  -ms-overflow-style: none; }\n@supports (-ms-overflow-style: none) {\n    .ps {\n      overflow: auto !important; } }\n@media screen and (-ms-high-contrast: active), (-ms-high-contrast: none) {\n    .ps {\n      overflow: auto !important; } }\n.ps.ps--active-x > .ps__scrollbar-x-rail,\n  .ps.ps--active-y > .ps__scrollbar-y-rail {\n    display: block;\n    background-color: transparent; }\n.ps.ps--in-scrolling.ps--x > .ps__scrollbar-x-rail {\n    background-color: trasparent;\n    opacity: 0.9; }\n.ps.ps--in-scrolling.ps--x > .ps__scrollbar-x-rail > .ps__scrollbar-x {\n      background-color: #414151;\n      height: 11px; }\n.ps.ps--in-scrolling.ps--y > .ps__scrollbar-y-rail {\n    background-color: trasparent;\n    opacity: 0.9; }\n.ps.ps--in-scrolling.ps--y > .ps__scrollbar-y-rail > .ps__scrollbar-y {\n      background-color: #414151;\n      width: 8px; }\n.ps > .ps__scrollbar-x-rail {\n    display: none;\n    position: absolute;\n    /* please don't change 'position' */\n    opacity: 0.8;\n    -webkit-transition: background-color .2s linear, opacity .2s linear;\n    transition: background-color .2s linear, opacity .2s linear;\n    bottom: 0px;\n    /* there must be 'bottom' for ps__scrollbar-x-rail */\n    height: 15px; }\n.ps > .ps__scrollbar-x-rail > .ps__scrollbar-x {\n      position: absolute;\n      /* please don't change 'position' */\n      background-color: #353543;\n      border-radius: 3px;\n      -webkit-transition: background-color .2s linear, height .2s linear, width .2s ease-in-out, border-radius .2s ease-in-out;\n      transition: background-color .2s linear, height .2s linear, width .2s ease-in-out, border-radius .2s ease-in-out;\n      bottom: 2px;\n      /* there must be 'bottom' for ps__scrollbar-x */\n      height: 8px; }\n.ps > .ps__scrollbar-x-rail:hover > .ps__scrollbar-x, .ps > .ps__scrollbar-x-rail:active > .ps__scrollbar-x {\n      height: 11px; }\n.ps > .ps__scrollbar-y-rail {\n    display: none;\n    position: absolute;\n    /* please don't change 'position' */\n    opacity: 0.8;\n    -webkit-transition: background-color .2s linear, opacity .2s linear;\n    transition: background-color .2s linear, opacity .2s linear;\n    right: 0;\n    /* there must be 'right' for ps__scrollbar-y-rail */\n    width: 8px; }\n.ps > .ps__scrollbar-y-rail > .ps__scrollbar-y {\n      position: absolute;\n      /* please don't change 'position' */\n      background-color: #353543;\n      border-radius: 3px;\n      -webkit-transition: background-color .2s linear, height .2s linear, width .2s ease-in-out, border-radius .2s ease-in-out;\n      transition: background-color .2s linear, height .2s linear, width .2s ease-in-out, border-radius .2s ease-in-out;\n      right: 0;\n      /* there must be 'right' for ps__scrollbar-y */\n      width: 8px; }\n.ps > .ps__scrollbar-y-rail:hover > .ps__scrollbar-y, .ps > .ps__scrollbar-y-rail:active > .ps__scrollbar-y {\n      width: 8px; }\n.ps:hover.ps--in-scrolling.ps--x > .ps__scrollbar-x-rail {\n    background-color: trasparent;\n    opacity: 0.9; }\n.ps:hover.ps--in-scrolling.ps--x > .ps__scrollbar-x-rail > .ps__scrollbar-x {\n      background-color: #414151;\n      height: 11px; }\n.ps:hover.ps--in-scrolling.ps--y > .ps__scrollbar-y-rail {\n    background-color: trasparent;\n    opacity: 0.9; }\n.ps:hover.ps--in-scrolling.ps--y > .ps__scrollbar-y-rail > .ps__scrollbar-y {\n      background-color: #414151;\n      width: 8px; }\n.ps:hover > .ps__scrollbar-x-rail,\n  .ps:hover > .ps__scrollbar-y-rail {\n    opacity: 0.9; }\n.ps:hover > .ps__scrollbar-x-rail:hover {\n    background-color: trasparent;\n    opacity: 0.9; }\n.ps:hover > .ps__scrollbar-x-rail:hover > .ps__scrollbar-x {\n      background-color: #414151; }\n.ps:hover > .ps__scrollbar-y-rail:hover {\n    background-color: trasparent;\n    opacity: 0.9; }\n.ps:hover > .ps__scrollbar-y-rail:hover > .ps__scrollbar-y {\n      background-color: #414151; }\n.auth-page {\n  width: 100%;\n  height: 100%;\n  display: -webkit-box;\n  display: -ms-flexbox;\n  display: flex;\n  -webkit-box-pack: center;\n      -ms-flex-pack: center;\n          justify-content: center;\n  -webkit-box-align: center;\n      -ms-flex-align: center;\n          align-items: center;\n  background-color: #1e1e26;\n  color: #C2C2CA; }\n.auth-page > .auth-panel {\n    max-width: 90%;\n    width: 400px;\n    padding: 30px 35px;\n    background-color: #23232C;\n    border: 1px solid #2a2a35; }\n.auth-page > .auth-panel > .general-error {\n      padding: 8px 0;\n      color: #F44336;\n      text-align: center; }\n.auth-page > .auth-panel .social-icons {\n      -webkit-box-flex: 0;\n          -ms-flex: 0 0 50%;\n              flex: 0 0 50%;\n      height: 36px;\n      padding: 3px 0 0; }\n.auth-page > .auth-panel .social-icons:empty {\n        display: none; }\n.auth-page > .auth-panel .social-icons > .social-icon {\n        width: 31px;\n        height: 31px;\n        margin-right: 5px; }\n.auth-page > .auth-panel .social-icons > .social-icon > img {\n          width: 31px;\n          height: 31px;\n          vertical-align: middle; }\n.auth-page > .auth-panel > .logo {\n      display: block;\n      width: 100%;\n      margin: 0 auto 30px; }\n.auth-page > .auth-panel > .logo > img {\n        display: block;\n        margin: auto;\n        width: 200px; }\n.auth-page > .auth-panel .input-container {\n      position: relative; }\n.auth-page > .auth-panel .input-container > input {\n        font-size: 1.5rem;\n        font-weight: 500;\n        letter-spacing: .5px;\n        height: 47px;\n        padding: 6px 12px;\n        border: 1px solid #2a2a35;\n        background-color: #353543;\n        color: inherit; }\n.auth-page > .auth-panel .input-container > .error {\n        position: absolute;\n        top: 0;\n        left: 100%;\n        margin: 0;\n        padding: 0 20px;\n        white-space: nowrap;\n        background-color: #F44336;\n        color: #fff;\n        line-height: 45px;\n        max-width: 350px;\n        overflow: hidden;\n        text-overflow: ellipsis; }\n@media only screen and (max-width: 768px) {\n          .auth-page > .auth-panel .input-container > .error {\n            position: static;\n            padding: 0;\n            background-color: inherit;\n            color: #F44336;\n            line-height: initial;\n            max-width: 100%;\n            margin: 8px 0 0; } }\n.auth-page > .auth-panel .input-container > .forgot-password {\n        cursor: pointer;\n        position: absolute;\n        right: 13px;\n        top: 14px; }\n.auth-page > .auth-panel .input-container > .forgot-password:hover {\n          color: #6eac00; }\n.auth-page .login-with-envato {\n    width: 100%;\n    text-align: center; }\n.auth-page .login-with-envato > .primary {\n      width: 100%;\n      border-radius: 5px;\n      line-height: 45px;\n      padding: 0 16px; }\n.auth-page .login-with-envato > .primary > svg-icon {\n        display: inline-block;\n        vertical-align: middle; }\n.input-container {\n  display: block;\n  width: 100%; }\n.input-container > .error {\n    margin-top: 6px;\n    color: #F44336; }\n.input-container > p {\n    color: rgba(0, 0, 0, 0.54);\n    font-size: 1.3rem; }\n.input-container > label {\n    display: block;\n    padding-bottom: 5px; }\n.input-container input, .input-container select, .input-container textarea {\n    width: 100%;\n    height: 38px;\n    color: rgba(0, 0, 0, 0.87);\n    border: 1px solid #E0E0E0;\n    padding: 0 10px;\n    line-height: normal;\n    font-size: 1.4rem;\n    font-family: inherit;\n    background-color: inherit; }\n.input-container input:disabled, .input-container select:disabled, .input-container textarea:disabled {\n      background-color: #eee;\n      color: #999; }\n.input-container > textarea {\n    height: auto;\n    padding: 10px; }\n.many-inputs > .input-container {\n  margin-bottom: 20px; }\n.pretty-checkbox {\n  display: none;\n  cursor: pointer; }\n.pretty-checkbox:focus, .pretty-checkbox:active {\n    outline: none; }\n.pretty-checkbox + label {\n    cursor: pointer;\n    display: inline-block;\n    position: relative;\n    padding-left: 28px;\n    margin-right: 13px;\n    line-height: 20px;\n    max-width: 100%;\n    white-space: nowrap;\n    overflow: hidden;\n    text-overflow: ellipsis;\n    vertical-align: baseline;\n    color: inherit; }\n.pretty-checkbox + label > span {\n      visibility: hidden;\n      width: 0;\n      height: 0;\n      font-size: 0; }\n.pretty-checkbox + label:before, .pretty-checkbox + label:after {\n      content: '';\n      display: inline-block;\n      width: 20px;\n      height: 20px;\n      left: 0;\n      bottom: 0;\n      text-align: center;\n      position: absolute; }\n.pretty-checkbox + label:before {\n      border: 2px solid rgba(0, 0, 0, 0.54);\n      border-radius: 2px;\n      -webkit-transition: all 90ms cubic-bezier(0, 0, 0.2, 0.1);\n      transition: all 90ms cubic-bezier(0, 0, 0.2, 0.1); }\n.pretty-checkbox + label:after {\n      color: #fff; }\n.pretty-checkbox:checked + label:before {\n    background: #6eac00;\n    border-color: transparent; }\n.pretty-checkbox:checked + label:after {\n    content: \"\\2713\";\n    line-height: 21px; }\n.round-close-button {\n  border-radius: 50%;\n  background-color: rgba(0, 0, 0, 0.25);\n  vertical-align: middle;\n  -webkit-transition: background-color 0.2s ease;\n  transition: background-color 0.2s ease;\n  border: none;\n  outline: none;\n  padding: 0 3px;\n  margin-right: 3px;\n  width: 20px;\n  height: 20px;\n  cursor: pointer; }\n.round-close-button:hover {\n    background-color: #F44336; }\n.round-close-button > svg-icon {\n    width: 14px;\n    height: 14px;\n    color: #fff;\n    vertical-align: middle; }\n.context-menu {\n  display: block;\n  background-color: #2a2a35;\n  -webkit-box-shadow: 0 9px 11px -5px rgba(0, 0, 0, 0.2), 0 18px 28px 2px rgba(0, 0, 0, 0.14), 0 7px 34px 6px rgba(0, 0, 0, 0.12);\n          box-shadow: 0 9px 11px -5px rgba(0, 0, 0, 0.2), 0 18px 28px 2px rgba(0, 0, 0, 0.14), 0 7px 34px 6px rgba(0, 0, 0, 0.12);\n  width: 220px;\n  color: #C2C2CA;\n  position: relative;\n  overflow: hidden;\n  z-index: 5; }\n.context-menu > .header {\n    display: -webkit-box;\n    display: -ms-flexbox;\n    display: flex;\n    -webkit-box-align: center;\n        -ms-flex-align: center;\n            align-items: center;\n    padding: 10px 0;\n    margin: 0 10px 10px;\n    border-bottom: 1px solid rgba(255, 255, 255, 0.05); }\n.context-menu > .header > img {\n      width: 60px;\n      height: 60px;\n      -webkit-box-flex: 0;\n          -ms-flex: 0 0 auto;\n              flex: 0 0 auto;\n      -o-object-fit: cover;\n         object-fit: cover;\n      margin-right: 15px; }\n.context-menu > .header > .meta {\n      margin-top: 5px;\n      overflow: hidden;\n      text-overflow: ellipsis; }\n.context-menu > .header > .meta > .primary-name {\n        display: block;\n        width: 100%;\n        white-space: nowrap; }\n.context-menu > .header > .meta > .secondary-name {\n        display: block;\n        color: #898B8C;\n        margin-top: 2px;\n        width: 100%; }\n.context-menu .menu-item {\n    display: -webkit-box;\n    display: -ms-flexbox;\n    display: flex;\n    -webkit-box-align: center;\n        -ms-flex-align: center;\n            align-items: center;\n    padding: 10px;\n    border-left: 5px solid transparent;\n    cursor: pointer;\n    color: inherit; }\n.context-menu .menu-item:hover {\n      border-color: #6eac00;\n      background-color: #353543; }\n.context-menu .menu-item > svg-icon {\n      display: block;\n      margin-left: auto; }\n.modal {\n  display: -webkit-box;\n  display: -ms-flexbox;\n  display: flex;\n  -webkit-box-align: center;\n      -ms-flex-align: center;\n          align-items: center;\n  -webkit-box-pack: center;\n      -ms-flex-pack: center;\n          justify-content: center;\n  position: fixed;\n  top: 0;\n  left: 0;\n  width: 100%;\n  height: 100%;\n  z-index: 12;\n  overflow: visible;\n  -webkit-backface-visibility: hidden;\n          backface-visibility: hidden; }\n.modal.modal-visible .modal-content {\n    -webkit-transform: scale(1);\n            transform: scale(1);\n    opacity: 1; }\n.modal.modal-visible .backdrop {\n    opacity: 1; }\n.modal .modal-content {\n    position: relative;\n    background-color: #fff;\n    width: 530px;\n    max-width: 90%;\n    max-height: 95%;\n    height: auto;\n    padding: 24px;\n    -webkit-box-shadow: 0 1px 8px 0 rgba(0, 0, 0, 0.2), 0 3px 4px 0 rgba(0, 0, 0, 0.14), 0 3px 3px -2px rgba(0, 0, 0, 0.12);\n            box-shadow: 0 1px 8px 0 rgba(0, 0, 0, 0.2), 0 3px 4px 0 rgba(0, 0, 0, 0.14), 0 3px 3px -2px rgba(0, 0, 0, 0.12);\n    color: rgba(0, 0, 0, 0.87);\n    -webkit-transition: all 0.3s;\n    transition: all 0.3s;\n    -webkit-transform: scale(0.8);\n            transform: scale(0.8);\n    opacity: 0;\n    overflow-x: hidden;\n    overflow-y: auto; }\n.modal .modal-content.wider {\n      width: 850px; }\n@media only screen and (max-width: 576px) {\n      .modal .modal-content {\n        max-width: none;\n        min-width: initial;\n        width: 95%; } }\n.modal .modal-content .buttons {\n      text-align: right;\n      margin-top: 35px; }\n.modal .modal-content > .modal-header {\n      display: -webkit-box;\n      display: -ms-flexbox;\n      display: flex;\n      -webkit-box-align: center;\n          -ms-flex-align: center;\n              align-items: center;\n      position: relative;\n      color: rgba(0, 0, 0, 0.87);\n      margin: 0 0 35px; }\n.modal .modal-content > .modal-header > h2 {\n        font-size: 2rem;\n        font-weight: 500;\n        letter-spacing: .005em;\n        -webkit-box-flex: 1;\n            -ms-flex: 1 1 auto;\n                flex: 1 1 auto;\n        margin: 0;\n        line-height: 3.2rem; }\n.modal .close-button {\n    -webkit-box-flex: 0;\n        -ms-flex: 0 0 35px;\n            flex: 0 0 35px;\n    width: 35px;\n    height: 35px;\n    color: rgba(0, 0, 0, 0.5);\n    -webkit-transition: -webkit-transform ease 0.2s;\n    transition: -webkit-transform ease 0.2s;\n    transition: transform ease 0.2s;\n    transition: transform ease 0.2s, -webkit-transform ease 0.2s;\n    z-index: 999; }\n.modal .close-button.absolute-button {\n      position: absolute;\n      top: 10px;\n      right: 10px;\n      width: 50px;\n      height: 50px; }\n.modal .close-button:hover {\n      -webkit-transform: rotate(90deg);\n              transform: rotate(90deg); }\n.modal .backdrop {\n    position: absolute;\n    width: 100%;\n    height: 100%;\n    top: 0;\n    left: 0;\n    background-color: rgba(33, 33, 33, 0.48);\n    opacity: 0;\n    -webkit-transition: opacity ease 0.3s;\n    transition: opacity ease 0.3s; }\n.modal .errors {\n    color: #F44336; }\n.modal .errors > .error {\n      padding: 10px 0; }\n.modal .errors > .error:last-of-type {\n        margin-bottom: 20px; }\n.modal .input-container > input, .modal .input-container > textarea, .modal .input-container select {\n    background-color: transparent; }\n.modal .input-container > .error {\n    color: #F44336; }\n.modal .input-container > p {\n    margin-top: 8px;\n    line-height: 1.5;\n    font-size: 1.4rem;\n    color: rgba(0, 0, 0, 0.54); }\n.modal .no-input-error {\n    padding: 10px 0;\n    color: #F44336; }\n.modal-active {\n  -webkit-filter: blur(4px);\n          filter: blur(4px); }\n.tooltip {\n  background-color: #323232;\n  color: #fff;\n  padding: 5px 10px;\n  font-size: 1.2rem;\n  border-radius: 2px;\n  z-index: 4; }\n.tooltip .tooltip-arrow {\n    width: 0;\n    height: 0;\n    border-style: solid;\n    position: absolute;\n    margin: 5px; }\n.tooltip .tooltip-arrow {\n    border-color: #323232; }\n.tooltip[x-placement^=\"top\"] {\n    margin-bottom: 5px; }\n.tooltip[x-placement^=\"bottom\"] {\n    margin-top: 5px; }\n.tooltip[x-placement^=\"right\"] {\n    margin-left: 5px; }\n.tooltip[x-placement^=\"left\"] {\n    margin-right: 5px; }\n.tooltip[x-placement^=\"top\"] .tooltip-arrow {\n    border-width: 5px 5px 0 5px;\n    border-left-color: transparent;\n    border-right-color: transparent;\n    border-bottom-color: transparent;\n    bottom: -5px;\n    left: calc(50% - 5px);\n    margin-top: 0;\n    margin-bottom: 0; }\n.tooltip[x-placement^=\"bottom\"] .tooltip-arrow {\n    border-width: 0 5px 5px 5px;\n    border-left-color: transparent;\n    border-right-color: transparent;\n    border-top-color: transparent;\n    top: -5px;\n    left: calc(50% - 5px);\n    margin-top: 0;\n    margin-bottom: 0; }\n.tooltip[x-placement^=\"right\"] .tooltip-arrow {\n    border-width: 5px 5px 5px 0;\n    border-left-color: transparent;\n    border-top-color: transparent;\n    border-bottom-color: transparent;\n    left: -5px;\n    top: calc(50% - 5px);\n    margin-left: 0;\n    margin-right: 0; }\n.tooltip[x-placement^=\"left\"] .tooltip-arrow {\n    border-width: 5px 0 5px 5px;\n    border-top-color: transparent;\n    border-right-color: transparent;\n    border-bottom-color: transparent;\n    right: -5px;\n    top: calc(50% - 5px);\n    margin-left: 0;\n    margin-right: 0; }\n"

/***/ }),

/***/ "./node_modules/style-loader/lib/addStyles.js":
/***/ (function(module, exports, __webpack_require__) {

/*
	MIT License http://www.opensource.org/licenses/mit-license.php
	Author Tobias Koppers @sokra
*/

var stylesInDom = {};

var	memoize = function (fn) {
	var memo;

	return function () {
		if (typeof memo === "undefined") memo = fn.apply(this, arguments);
		return memo;
	};
};

var isOldIE = memoize(function () {
	// Test for IE <= 9 as proposed by Browserhacks
	// @see http://browserhacks.com/#hack-e71d8692f65334173fee715c222cb805
	// Tests for existence of standard globals is to allow style-loader
	// to operate correctly into non-standard environments
	// @see https://github.com/webpack-contrib/style-loader/issues/177
	return window && document && document.all && !window.atob;
});

var getElement = (function (fn) {
	var memo = {};

	return function(selector) {
		if (typeof memo[selector] === "undefined") {
			var styleTarget = fn.call(this, selector);
			// Special case to return head of iframe instead of iframe itself
			if (styleTarget instanceof window.HTMLIFrameElement) {
				try {
					// This will throw an exception if access to iframe is blocked
					// due to cross-origin restrictions
					styleTarget = styleTarget.contentDocument.head;
				} catch(e) {
					styleTarget = null;
				}
			}
			memo[selector] = styleTarget;
		}
		return memo[selector]
	};
})(function (target) {
	return document.querySelector(target)
});

var singleton = null;
var	singletonCounter = 0;
var	stylesInsertedAtTop = [];

var	fixUrls = __webpack_require__("./node_modules/style-loader/lib/urls.js");

module.exports = function(list, options) {
	if (typeof DEBUG !== "undefined" && DEBUG) {
		if (typeof document !== "object") throw new Error("The style-loader cannot be used in a non-browser environment");
	}

	options = options || {};

	options.attrs = typeof options.attrs === "object" ? options.attrs : {};

	// Force single-tag solution on IE6-9, which has a hard limit on the # of <style>
	// tags it will allow on a page
	if (!options.singleton && typeof options.singleton !== "boolean") options.singleton = isOldIE();

	// By default, add <style> tags to the <head> element
	if (!options.insertInto) options.insertInto = "head";

	// By default, add <style> tags to the bottom of the target
	if (!options.insertAt) options.insertAt = "bottom";

	var styles = listToStyles(list, options);

	addStylesToDom(styles, options);

	return function update (newList) {
		var mayRemove = [];

		for (var i = 0; i < styles.length; i++) {
			var item = styles[i];
			var domStyle = stylesInDom[item.id];

			domStyle.refs--;
			mayRemove.push(domStyle);
		}

		if(newList) {
			var newStyles = listToStyles(newList, options);
			addStylesToDom(newStyles, options);
		}

		for (var i = 0; i < mayRemove.length; i++) {
			var domStyle = mayRemove[i];

			if(domStyle.refs === 0) {
				for (var j = 0; j < domStyle.parts.length; j++) domStyle.parts[j]();

				delete stylesInDom[domStyle.id];
			}
		}
	};
};

function addStylesToDom (styles, options) {
	for (var i = 0; i < styles.length; i++) {
		var item = styles[i];
		var domStyle = stylesInDom[item.id];

		if(domStyle) {
			domStyle.refs++;

			for(var j = 0; j < domStyle.parts.length; j++) {
				domStyle.parts[j](item.parts[j]);
			}

			for(; j < item.parts.length; j++) {
				domStyle.parts.push(addStyle(item.parts[j], options));
			}
		} else {
			var parts = [];

			for(var j = 0; j < item.parts.length; j++) {
				parts.push(addStyle(item.parts[j], options));
			}

			stylesInDom[item.id] = {id: item.id, refs: 1, parts: parts};
		}
	}
}

function listToStyles (list, options) {
	var styles = [];
	var newStyles = {};

	for (var i = 0; i < list.length; i++) {
		var item = list[i];
		var id = options.base ? item[0] + options.base : item[0];
		var css = item[1];
		var media = item[2];
		var sourceMap = item[3];
		var part = {css: css, media: media, sourceMap: sourceMap};

		if(!newStyles[id]) styles.push(newStyles[id] = {id: id, parts: [part]});
		else newStyles[id].parts.push(part);
	}

	return styles;
}

function insertStyleElement (options, style) {
	var target = getElement(options.insertInto)

	if (!target) {
		throw new Error("Couldn't find a style target. This probably means that the value for the 'insertInto' parameter is invalid.");
	}

	var lastStyleElementInsertedAtTop = stylesInsertedAtTop[stylesInsertedAtTop.length - 1];

	if (options.insertAt === "top") {
		if (!lastStyleElementInsertedAtTop) {
			target.insertBefore(style, target.firstChild);
		} else if (lastStyleElementInsertedAtTop.nextSibling) {
			target.insertBefore(style, lastStyleElementInsertedAtTop.nextSibling);
		} else {
			target.appendChild(style);
		}
		stylesInsertedAtTop.push(style);
	} else if (options.insertAt === "bottom") {
		target.appendChild(style);
	} else if (typeof options.insertAt === "object" && options.insertAt.before) {
		var nextSibling = getElement(options.insertInto + " " + options.insertAt.before);
		target.insertBefore(style, nextSibling);
	} else {
		throw new Error("[Style Loader]\n\n Invalid value for parameter 'insertAt' ('options.insertAt') found.\n Must be 'top', 'bottom', or Object.\n (https://github.com/webpack-contrib/style-loader#insertat)\n");
	}
}

function removeStyleElement (style) {
	if (style.parentNode === null) return false;
	style.parentNode.removeChild(style);

	var idx = stylesInsertedAtTop.indexOf(style);
	if(idx >= 0) {
		stylesInsertedAtTop.splice(idx, 1);
	}
}

function createStyleElement (options) {
	var style = document.createElement("style");

	options.attrs.type = "text/css";

	addAttrs(style, options.attrs);
	insertStyleElement(options, style);

	return style;
}

function createLinkElement (options) {
	var link = document.createElement("link");

	options.attrs.type = "text/css";
	options.attrs.rel = "stylesheet";

	addAttrs(link, options.attrs);
	insertStyleElement(options, link);

	return link;
}

function addAttrs (el, attrs) {
	Object.keys(attrs).forEach(function (key) {
		el.setAttribute(key, attrs[key]);
	});
}

function addStyle (obj, options) {
	var style, update, remove, result;

	// If a transform function was defined, run it on the css
	if (options.transform && obj.css) {
	    result = options.transform(obj.css);

	    if (result) {
	    	// If transform returns a value, use that instead of the original css.
	    	// This allows running runtime transformations on the css.
	    	obj.css = result;
	    } else {
	    	// If the transform function returns a falsy value, don't add this css.
	    	// This allows conditional loading of css
	    	return function() {
	    		// noop
	    	};
	    }
	}

	if (options.singleton) {
		var styleIndex = singletonCounter++;

		style = singleton || (singleton = createStyleElement(options));

		update = applyToSingletonTag.bind(null, style, styleIndex, false);
		remove = applyToSingletonTag.bind(null, style, styleIndex, true);

	} else if (
		obj.sourceMap &&
		typeof URL === "function" &&
		typeof URL.createObjectURL === "function" &&
		typeof URL.revokeObjectURL === "function" &&
		typeof Blob === "function" &&
		typeof btoa === "function"
	) {
		style = createLinkElement(options);
		update = updateLink.bind(null, style, options);
		remove = function () {
			removeStyleElement(style);

			if(style.href) URL.revokeObjectURL(style.href);
		};
	} else {
		style = createStyleElement(options);
		update = applyToTag.bind(null, style);
		remove = function () {
			removeStyleElement(style);
		};
	}

	update(obj);

	return function updateStyle (newObj) {
		if (newObj) {
			if (
				newObj.css === obj.css &&
				newObj.media === obj.media &&
				newObj.sourceMap === obj.sourceMap
			) {
				return;
			}

			update(obj = newObj);
		} else {
			remove();
		}
	};
}

var replaceText = (function () {
	var textStore = [];

	return function (index, replacement) {
		textStore[index] = replacement;

		return textStore.filter(Boolean).join('\n');
	};
})();

function applyToSingletonTag (style, index, remove, obj) {
	var css = remove ? "" : obj.css;

	if (style.styleSheet) {
		style.styleSheet.cssText = replaceText(index, css);
	} else {
		var cssNode = document.createTextNode(css);
		var childNodes = style.childNodes;

		if (childNodes[index]) style.removeChild(childNodes[index]);

		if (childNodes.length) {
			style.insertBefore(cssNode, childNodes[index]);
		} else {
			style.appendChild(cssNode);
		}
	}
}

function applyToTag (style, obj) {
	var css = obj.css;
	var media = obj.media;

	if(media) {
		style.setAttribute("media", media)
	}

	if(style.styleSheet) {
		style.styleSheet.cssText = css;
	} else {
		while(style.firstChild) {
			style.removeChild(style.firstChild);
		}

		style.appendChild(document.createTextNode(css));
	}
}

function updateLink (link, options, obj) {
	var css = obj.css;
	var sourceMap = obj.sourceMap;

	/*
		If convertToAbsoluteUrls isn't defined, but sourcemaps are enabled
		and there is no publicPath defined then lets turn convertToAbsoluteUrls
		on by default.  Otherwise default to the convertToAbsoluteUrls option
		directly
	*/
	var autoFixUrls = options.convertToAbsoluteUrls === undefined && sourceMap;

	if (options.convertToAbsoluteUrls || autoFixUrls) {
		css = fixUrls(css);
	}

	if (sourceMap) {
		// http://stackoverflow.com/a/26603875
		css += "\n/*# sourceMappingURL=data:application/json;base64," + btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap)))) + " */";
	}

	var blob = new Blob([css], { type: "text/css" });

	var oldSrc = link.href;

	link.href = URL.createObjectURL(blob);

	if(oldSrc) URL.revokeObjectURL(oldSrc);
}


/***/ }),

/***/ "./node_modules/style-loader/lib/urls.js":
/***/ (function(module, exports) {


/**
 * When source maps are enabled, `style-loader` uses a link element with a data-uri to
 * embed the css on the page. This breaks all relative urls because now they are relative to a
 * bundle instead of the current page.
 *
 * One solution is to only use full urls, but that may be impossible.
 *
 * Instead, this function "fixes" the relative urls to be absolute according to the current page location.
 *
 * A rudimentary test suite is located at `test/fixUrls.js` and can be run via the `npm test` command.
 *
 */

module.exports = function (css) {
  // get current location
  var location = typeof window !== "undefined" && window.location;

  if (!location) {
    throw new Error("fixUrls requires window.location");
  }

	// blank or null?
	if (!css || typeof css !== "string") {
	  return css;
  }

  var baseUrl = location.protocol + "//" + location.host;
  var currentDir = baseUrl + location.pathname.replace(/\/[^\/]*$/, "/");

	// convert each url(...)
	/*
	This regular expression is just a way to recursively match brackets within
	a string.

	 /url\s*\(  = Match on the word "url" with any whitespace after it and then a parens
	   (  = Start a capturing group
	     (?:  = Start a non-capturing group
	         [^)(]  = Match anything that isn't a parentheses
	         |  = OR
	         \(  = Match a start parentheses
	             (?:  = Start another non-capturing groups
	                 [^)(]+  = Match anything that isn't a parentheses
	                 |  = OR
	                 \(  = Match a start parentheses
	                     [^)(]*  = Match anything that isn't a parentheses
	                 \)  = Match a end parentheses
	             )  = End Group
              *\) = Match anything and then a close parens
          )  = Close non-capturing group
          *  = Match anything
       )  = Close capturing group
	 \)  = Match a close parens

	 /gi  = Get all matches, not the first.  Be case insensitive.
	 */
	var fixedCss = css.replace(/url\s*\(((?:[^)(]|\((?:[^)(]+|\([^)(]*\))*\))*)\)/gi, function(fullMatch, origUrl) {
		// strip quotes (if they exist)
		var unquotedOrigUrl = origUrl
			.trim()
			.replace(/^"(.*)"$/, function(o, $1){ return $1; })
			.replace(/^'(.*)'$/, function(o, $1){ return $1; });

		// already a full url? no change
		if (/^(#|data:|http:\/\/|https:\/\/|file:\/\/\/)/i.test(unquotedOrigUrl)) {
		  return fullMatch;
		}

		// convert the url to a full url
		var newUrl;

		if (unquotedOrigUrl.indexOf("//") === 0) {
		  	//TODO: should we add protocol?
			newUrl = unquotedOrigUrl;
		} else if (unquotedOrigUrl.indexOf("/") === 0) {
			// path should be relative to the base url
			newUrl = baseUrl + unquotedOrigUrl; // already starts with '/'
		} else {
			// path should be relative to current directory
			newUrl = currentDir + unquotedOrigUrl.replace(/^\.\//, ""); // Strip leading './'
		}

		// send back the fixed url(...)
		return "url(" + JSON.stringify(newUrl) + ")";
	});

	// send back the fixed css
	return fixedCss;
};


/***/ }),

/***/ "./src/styles.scss":
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__("./node_modules/raw-loader/index.js!./node_modules/postcss-loader/lib/index.js??embedded!./node_modules/sass-loader/lib/loader.js??ref--8-3!./src/styles.scss");
if(typeof content === 'string') content = [[module.i, content, '']];
// Prepare cssTransformation
var transform;

var options = {"hmr":true}
options.transform = transform
// add the styles to the DOM
var update = __webpack_require__("./node_modules/style-loader/lib/addStyles.js")(content, options);
if(content.locals) module.exports = content.locals;
// Hot Module Replacement
if(false) {
	// When the styles change, update the <style> tags
	if(!content.locals) {
		module.hot.accept("!!../node_modules/raw-loader/index.js!../node_modules/postcss-loader/lib/index.js??embedded!../node_modules/sass-loader/lib/loader.js??ref--8-3!./styles.scss", function() {
			var newContent = require("!!../node_modules/raw-loader/index.js!../node_modules/postcss-loader/lib/index.js??embedded!../node_modules/sass-loader/lib/loader.js??ref--8-3!./styles.scss");
			if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
			update(newContent);
		});
	}
	// When the module is disposed, remove the <style> tags
	module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 2:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("./src/styles.scss");


/***/ })

},[2]);
//# sourceMappingURL=styles.bundle.js.map
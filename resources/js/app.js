const { fromJSON } = require('postcss');

require('bootstrap');
require('./script');
require('./advImages');

window.$=window.jQuery=require('jquery');

document.Dropzone = require('dropzone');
Dropzone.autoDiscover = false;
const {danger, fail, markdown, message, warn} = require('danger');
const {readFileSync} = require('fs');
const includes = require('lodash.includes');
const minimatch = require('minimatch');

warn('message 1');

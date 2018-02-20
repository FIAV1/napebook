
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// Post
require('./postEdit');
require('./postDelete');

// Comment
require('./commentStore');
require('./commentEdit');
require('./commentUpdate');
require('./commentDelete');

// Image Upload
require('./imageUpload');

// Profile
require('./profileEdit');
require('./profileUpdate');

//Like
require('./like');
require('./postLikes');

// Friends
require('./friendsRequest');
require('./friendsPendent');
require('./friendshipManage');

require('./postLoader');
require('./commentLoader');

require('./notifications');


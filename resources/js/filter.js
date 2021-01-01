// Moment js
import Vue from 'vue';
import moment from 'moment';

Vue.filter('timeFormat', function (value) {
    if (!value) return ''
    value = value.toString()
    return moment(value).format("MMM Do YYYY");
})
// Moment js
import Vue from 'vue';
import moment from 'moment';

Vue.filter('timeFormat', function (value) {
    if (!value) return ''
    value = value.toString()
    return moment(value).format("MMM Do YYYY");
})

// Vue sortlength
Vue.filter('sortLength', (text, length, suffix) => {
    if(text.length > length)
    {
        return text.substring(0, length) + suffix;
    }
    else
    {
        return text;
    }
})
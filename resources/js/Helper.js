class Helper {
    constructor () {

    }

    slugify (text) {
        return text.toString().toLowerCase()
            .replace(/\s+/g, '-')
            .replace(/[^\w\-]+/g, '')
            .replace(/\-\-+/g, '-')
            .replace(/^-+/, '')
            .replace(/-+$/, '');
    }

    current_date () {
        var date = new Date();
        return date.getFullYear() + '/' + date.getMonth() + '/' + date.getDate() + ' ' + date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds()
    }

    toTime (seconds) {
        var date = new Date(null);
        date.setSeconds(seconds);
        return date.toISOString().substr(11, 8);
    }

    toSeconds (time) {
        let seconds = time.split(':').reverse().reduce((prev, curr, i) => prev + curr * Math.pow(60, i), 0)

        return seconds
    }

    percent (total, percent) {
        return parseInt((percent * total) / 100);
    }

    viewed (percent, current) {
        if ( current ==  percent )
            return true;
        return false;
    }

    histored (percent, current) {
        if ( current == percent )
            return true;
        return false;
    }
}

export default Helper
var DURATION_IN_SECONDS = {
  epochs: ['year', 'month', 'day', 'hour', 'minute'],
  year:   31536000,
  month:  2592000,
  day:    86400,
  hour:   3600,
  minute: 60
};

function getDuration(seconds) {
  var epoch, interval;

  for (var i = 0; i < DURATION_IN_SECONDS.epochs.length; i++) {
    epoch = DURATION_IN_SECONDS.epochs[i];
    interval = Math.floor(seconds / DURATION_IN_SECONDS[epoch]);
    if (interval >= 1) {
      return { interval: interval, epoch: epoch };
    }
  }

};

function timeSince(date) {
  var seconds = Math.floor((new Date() - new Date(date)) / 1000);
  var duration = getDuration(seconds);
  var suffix  = (duration.interval > 1 || duration.interval === 0) ? 's' : '';
  return duration.interval + ' ' + duration.epoch + suffix;
};

function displayLastScanned() {
  var elements = document.querySelectorAll('[data-last-scanned]');
  Array.prototype.forEach.call(elements, function(el, i){
    let last_scanned = el.getAttribute('data-last-scanned');
    if (last_scanned) {
      el.innerHTML = timeSince(last_scanned);
    }
  });
}

function ready(fn) {
  if (document.readyState != 'loading'){
    fn();
  } else {
    document.addEventListener('DOMContentLoaded', fn);
  }
}

ready(displayLastScanned);

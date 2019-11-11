document.addEventListener('DOMContentLoaded', function (event) {
  // getResults();
  // alert('content.js');

  $(document).on("keypress", function (e) {
    if (e.which == 13) {
      // alert("enter pressed");
      controller();
    }

    if(e.which ==  49)
     {
          sendResults('toPointer');
     } 
  });



  function controller() {
    var step = parseInt($('#step').text());
    var trial = parseInt($('#trial').text());
    var observer_step = parseInt($('#observer_step').text());
    var pointer_step = parseInt($('#pointer_step').text());

      if (step == 2 && observer_step == 1) {
        sendResults('toObserver');
      }
  }
});

function sendResults(message) {
  chrome.runtime.sendMessage({
    output2: message
  });
}


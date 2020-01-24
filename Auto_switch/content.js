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

  document.addEventListener('DOMSubtreeModified', function(event) 
  {
    document.getElementById("confidenceBtn").onclick=function(){
      // alert("fired");
    var baseUrl = "https://www.soundjay.com/button/sounds/button-16.mp3";
    var audio = ["beep-01a.mp3", "beep-02.mp3", "beep-03.mp3", "beep-04.mp3", "beep-05.mp3", "beep-06.mp3", "beep-07.mp3", "beep-08b.mp3", "beep-09.mp3"];
    new Audio(baseUrl).play(); 

     sendResults('toPointer');
    };

    
  });





  function controller() {
    var step = parseInt($('#step').text());
    var trial = parseInt($('#trial').text());
    var observer_step = parseInt($('#observer_step').text());
    var pointer_step = parseInt($('#pointer_step').text());
      console.log("step: " + step+ "observer_step: " + observer_step);
      if (step == 1 && observer_step == 1) {
        sendResults('toObserver');
      }
      else
      {
        console.log("toPointer");
        sendResults('toPointer');
      }
  }
});

function sendResults(message) {
  chrome.runtime.sendMessage({
    output2: message
  });
}


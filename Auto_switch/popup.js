document.addEventListener('DOMContentLoaded', function(event) {
  // getResults();
  // alert('start');
  var resultsButton = document.getElementById('getResults');
  resultsButton.onclick = getResults;
});

function getResults() {

  // var tabId = tabIdForIndex(index)
  // var windowId = windowIdForTabIndex(index)
  var index = 001;
  var tabId = 5302;
  var windowId = 5305;
  // alert('index: ' + index + '\n' + 'tabId: ' + tabId + '\n' + 'windowId: ' + windowId);

  chrome.tabs.update(tabId, {
    highlighted: true,
    active: true
  });
  chrome.windows.update(windowId, {
    focused: true
  });
}

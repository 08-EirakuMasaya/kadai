chrome.runtime.onMessage.addListener(function(request, sender, sendResponse) {
    if (request.method == "getStatus")
      sendResponse({data: localStorage['memo']});
    else
      sendResponse({}); // snub them.
});
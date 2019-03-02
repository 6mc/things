chrome.tabs.getSelected(null, function(tab) { //<-- "tab" has all the information
    console.log(tab.url);       //returns the url
    console.log(tab.title);     //returns the title

    document.getElementById('place').innerHTML=tab.title;
    //Create a New Session if not created
    //Ajax Request to server with session id
    //Ajax will return a session slug
    //On click it will redirect to url/slug page
    //When The page loads it will change its slug so it will be one use url each time
});

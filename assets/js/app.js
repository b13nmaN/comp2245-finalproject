// No refresh js
// assets/js/app.js
document.addEventListener('DOMContentLoaded', function () {

    console.log('DOM fully loaded and parsed');
    // Attach click event listeners to all navigation links
    const navLinks = document.querySelectorAll('.nav-link'); // Assuming your navigation links have a class 'nav-link'
    navLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            const page = this.getAttribute('href'); // Get the href attribute value to know which page to load
            console.log(`${page} clicked`);
            loadPage(page);
            window.history.pushState({page: page}, null, page); // Push a new state to the history stack
        });
    });

    // Listen to popstate event to handle browser navigation
    window.addEventListener('popstate', function (event) {
        if (event.state && event.state.page) {
            loadPage(event.state.page); // Load the page when navigating through history
        }
    });

    // Initial load (you can specify the default page to load)
    // loadPage('pages/home.php');

    // get Requested filter
    document.querySelector('#sales-lead').addEventListener('click', async ()=>{
        await handleFilterRequest('sales-lead')
    })

    document.querySelector('#support').addEventListener('click', async ()=>{
        await handleFilterRequest('support')
    })
});

function loadPage(page) {
    fetch(page)
        .then(response => response.text())
        .then(data => {
            //parse html to get main
            const parser = new DOMParser();
            const doc = parser.parseFromString(data, 'text/html');
            console.log(doc);

            let main = doc.querySelector('main')
            let mainToString = main.innerHTML
            console.log(main);

            // Update the content area with the loaded HTML
            document.querySelector('main').innerHTML = mainToString; // Use querySelector instead of getElementsByClassName
        })
        .catch(error => console.error('Error:', error));

    }

    // handler functions

async function handleFilterRequest(filterType) {
	await fetch('/comp2245-finalproject/index.php/home?filterType=' + filterType)
        .then(response => response.text())
        .then(data => {
            //parse html to get main
            const parser = new DOMParser();
            const doc = parser.parseFromString(data, 'text/html');
            let main = doc.querySelector('table')
            let mainToString = main.innerHTML
            console.log(mainToString);

            // Update the content area with the loaded HTML
            document.querySelector('.filter').innerHTML = mainToString;
            console.log(doc);
        })
}






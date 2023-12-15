// No refresh js
// assets/js/app.js
document.addEventListener('DOMContentLoaded', function () {
    console.log('DOM fully loaded and parsed');
    
    // Attach click event listeners to all navigation links
    const navLinks = [...document.getElementsByTagName('a')]
    console.log(navLinks);
    navLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            // Check if the clicked element has the class "nav-link"
            const page = this.getAttribute('link');
            console.log(`${page} clicked`);
            loadPage(page);
            window.history.pushState({ page: page }, null, page);
        });
    });

    // Listen to popstate event to handle browser navigation
    window.addEventListener('popstate', function (event) {
        if (event.state && event.state.page) {
            console.log(`Navigating to ${event.state.page}`);
            loadPage(event.state.page); // Load the page when navigating through history
        }
    });

    // const successMessage = document.querySelector('#success-message');
    // if (successMessage) {
    //     successMessage.querySelector('#success-message').classList.remove('show');
    // }

    const salesLeadButton = document.querySelector('#sales-lead');
    if (salesLeadButton) {
        salesLeadButton.addEventListener('click', async () => {
            salesLeadButton.classList.add('active');
            await handleFilterRequest('sales-lead');
        });
    }
    
    const supportButton = document.querySelector('#support');
    if (supportButton) {
        supportButton.addEventListener('click', async () => {
            supportButton.classList.add('active');
            await handleFilterRequest('support');
        });
    }
    
    const addContactButton = document.querySelector('.add-contact');
    if (addContactButton) {
        addContactButton.addEventListener('click', () => {
            loadPage('/comp2245-finalproject/index.php/new-contact');
        });
    }
    
    const addUserButton = document.querySelector('.add-user');
    if (addUserButton) {
        addUserButton.addEventListener('click', () => {
            let page = '/comp2245-finalproject/index.php/add-user';
            loadPage(page);
            window.history.pushState({page: page}, null, page);
        });
    }
    
    const viewButtons = document.querySelectorAll('.view-button');
    if (viewButtons) {
        // Add click event listener to each "View" button
        viewButtons.forEach(function (button) {
            button.addEventListener("click", function () {
                // Get the contact ID from the data-contact-id attribute
                let contactId = button.getAttribute("data-contact-id");
                SendContactName(contactId, '/comp2245-finalproject/index.php/contact-details')
            });
        });
    }
    // Get the form element by its className
    let form = document.querySelector("form");

    if(form) {
        form.addEventListener("submit", function(event) {
            console.log("Form submitted");
            event.preventDefault();
            // Get the current page url
            let url = window.location.href;
            // Use the loadPage function with the url as an argument
            loadPage(url);
            setTimeout(() => {
                displayMessage();
            }, 1000);
        });
    }


    const closeButton = document.querySelector('#close-message');
    if (closeButton) {
        closeButton.addEventListener('click', () => {
            document.getElementById('success-message').classList.remove('show');
        });
    }

    
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
function loginPage(page) {
    fetch(page)
        .then(response => response.text())
        .then(data => {
            //parse html to get main
            const parser = new DOMParser();
            const doc = parser.parseFromString(data, 'text/html');
            console.log(doc);

            let main = doc.querySelector('.body')
            let mainToString = main.innerHTML
            console.log(main);
            // Update the content area with the loaded HTML
            document.querySelector('.body').innerHTML = mainToString; // Use querySelector instead of getElementsByClassName
        })
        .catch(error => console.error('Error:', error));
    }
async function handleFilterRequest(filterType) {
    console.log(filterType);
	await fetch('/comp2245-finalproject/index.php/home?filterType=' + filterType)
        .then(response => response.text())
        .then(data => {
            //parse html to get main
            const parser = new DOMParser();
            const doc = parser.parseFromString(data, 'text/html');
            let main = doc.querySelector('main')
            let table = main.querySelector('.table')
            console.log(table);
            let mainToString = table.innerHTML
            console.log(mainToString);

            // Update the content area with the loaded HTML
            document.querySelector('.table').innerHTML = mainToString;
            console.log(doc);
        })
}

async function SendContactName(contactId, url) {
	await fetch('/comp2245-finalproject/index.php/contact-details?contactId=' + contactId)
        .then(response => response.text())
        
        .then(data => {
            console.log('this is the data', data)
            const parser = new DOMParser();
            const doc = parser.parseFromString(data, 'text/html');
            console.log(doc);

            let main = doc.querySelector('main')
            let mainToString = main.innerHTML
            console.log(main);
            // Update the content area with the loaded HTML
            document.querySelector('main').innerHTML = mainToString;
            
        })
}

function displayMessage() {
    // alert('Contact added successfully');
    console.log('display message');
    let successMessage = document.querySelector('#success-message');

    successMessage.style.display = "flex";
    console.log(successMessage);

    setTimeout(() => {
        successMessage.style.display = "none";
    }, 3000);
    
}

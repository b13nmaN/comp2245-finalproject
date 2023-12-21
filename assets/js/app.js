// No refresh js
// assets/js/app.js
document.addEventListener('DOMContentLoaded', function () {
    console.log('DOM fully loaded and parsed');
    
        // Attach click event listeners to all navigation links
    const navLinks = [...document.getElementsByTagName('a')];
    console.log(navLinks);

    navLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();

            // Check if the clicked element has the class "nav-link"
            const page = this.getAttribute('href');
            console.log(`${page} clicked`);

            if (page === 'logout.php') {
                // Handle logout separately
                handleLogout();
            } else {
                loadPage(page);
                window.history.pushState({ page: page }, null, page);
            }
        });
    });

    // Handle logout function
    function handleLogout() {
        // Perform any additional logout logic if needed
        console.log('Logging out...');
        // Redirect to the logout page
        window.location.href = 'logout.php';
    }

    // Listen to popstate event to handle browser navigation
    window.addEventListener('popstate', function (event) {
        if (event.state && event.state.page) {
            console.log(`Navigating to ${event.state.page}`);
            loadPage(event.state.page); // Load the page when navigating through history
        }
    });


    
    document.addEventListener('click', async (event) => {
        const target = event.target;

        switch (true) {
            case target.matches('#sales-lead'):
                target.classList.add('active');
                await handleFilterRequest('sales-lead');
                break;

            case target.matches('#support'):
                target.classList.add('active');
                await handleFilterRequest('support');
                break;

            case target.matches('#assigned-to-me'):
                target.classList.add('active');
                await handleFilterRequest('assigned_to_me');
                break;

            case target.matches('.to-me'):
                let user_id = target.getAttribute("data-user-id");
                let contact_id = target.getAttribute("data-contact-id");
                console.log('this is user id: ', user_id);
                
                await assignToMe(user_id, contact_id);
                break;

            case target.matches('.to-sales-lead'):
                let contact_type = target.getAttribute("data-contact-type");
                let contact_id_ = target.getAttribute("data-contact-id");
                await SwitchToLead(contact_type, contact_id_);
                break;
            case target.matches('.add-contact'):
                loadPage('/comp2245-finalproject/index.php/new-contact'
                , '/comp2245-finalproject/index.php/new-contact');
                break;

            case target.matches('.add-user'):
                let page = '/comp2245-finalproject/index.php/add-user';
                loadPage(page);
                window.history.pushState({ page: page }, null, page);
                break;

            case target.classList.contains('view-button'):
                console.log("View button clicked");
                let contactId = target.getAttribute("data-contact-id");
                SendContactName(contactId);
                break;
        }
    });

    document.addEventListener('submit', function (event) {
        if (event.target.tagName.toLowerCase() === 'form') {
            console.log("Form submitted");
            event.preventDefault();
            
            // Check for empty fields or empty email field
            const form = event.target;
            const inputs = form.querySelectorAll('input, textarea'); ;
            let isEmpty = false;
            let isEmailValid = true;
    
            inputs.forEach(input => {
                if (input.value.trim() === '') {
                    isEmpty = true;
                }
            });
    
            // Check if there is an email field and it is empty or invalid
            const emailInput = form.querySelector('input[name="email"]');
            if (emailInput) {
                const emailValue = emailInput.value.trim();
                if (emailValue === '') {
                    isEmpty = true;
                } else {
                    // Use a regular expression to check for a valid email format
                    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                    isEmailValid = emailRegex.test(emailValue);
                }
            }
    
            if (!isEmpty && isEmailValid) {
                let url = window.location.href;
                if(url.includes('login.php')){
                    submitLoginForm(url);
                    window.location.href = '/comp2245-finalproject/index.php/home';
                } else{
                    submitForm(url);
                }
                
                setTimeout(() => {
                    displayMessage();
                }, 1000);
            } else {
                alert('Fields are empty, or email is empty or invalid. Not displaying success message.');
            }
        }
    });
    


    const closeButton = document.querySelector('#close-message');
    if (closeButton) {
        closeButton.addEventListener('click', () => {
            document.getElementById('success-message').classList.remove('show');
        });
    }

    
});


    //preventing users from going back and forward
   // Add a popstate event listener
    window.addEventListener('popstate', function (event) {
        // Prevent the default behavior (going back or forward)
        history.pushState(null, null, window.location.href);
    });

    // You can also use the pushState method to set the URL
    history.pushState(null, null, window.location.href);


function loadPage(page, url) {
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
            document.querySelector('main').innerHTML = mainToString;
            // Use the History API to change the URL without refreshing
            history.pushState({ page: page }, null, url);
        })
        .catch(error => console.error('Error:', error));
    }
    function submitForm(page) {
        fetch(page, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams(new FormData(document.querySelector('form')))
        })
            .then(response => response.text())
            .then(data => {

                // Parse HTML to get main element
                const parser = new DOMParser();
                const doc = parser.parseFromString(data, 'text/html');
    
                let main = doc.querySelector('main');
                console.log('this is main: ', main);
                
                let mainToString = main.innerHTML;
                document.querySelector('main').innerHTML = mainToString;
            })
            .catch(error => console.error('Error:', error));
    }
    function submitLoginForm(page) {
        fetch(page, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams(new FormData(document.querySelector('form')))
        })
            .then(response => response.text())
            .then(data => {
                // Parse HTML to get main element
                const parser = new DOMParser();
                const doc = parser.parseFromString(data, 'text/html');
    
                    // Check if main has a body element
                let body = doc.querySelector('body');
                    let bodyToString = body.innerHTML;
                    console.log('Main has a body element:', body);
                    document.querySelector('body').innerHTML = bodyToString;
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



async function assignToMe(user_id, contact_id) {
    await fetch(`/comp2245-finalproject/index.php/contact-details?contactId=${contact_id}&userId=${user_id}`)
        .then(response => response.text())
        .then(data => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(data, 'text/html');
            let main = doc.querySelector('main');
            console.log('this is main: ', main);
            let mainToString = main.innerHTML;

            // Update the content area with the loaded HTML
            document.querySelector('main').innerHTML = mainToString;

            // Use the location.href to reload the page with the updated URL
            history.pushState({ contactId: contact_id, userId: user_id }, null, `/comp2245-finalproject/index.php/contact-details?contactId=${contact_id}&userId=${user_id}`);
        });
}
async function SwitchToLead(type, contact_id) {
    await fetch(`/comp2245-finalproject/index.php/contact-details?contactId=${contact_id}&type=${type}`)
        .then(response => response.text())
        .then(data => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(data, 'text/html');
            let main = doc.querySelector('main');
            console.log('this is main: ', main);
            let mainToString = main.innerHTML;

            // Update the content area with the loaded HTML
            document.querySelector('main').innerHTML = mainToString;

            // Use the location.href to reload the page with the updated URL
            history.pushState({ contactId: contact_id, type: type }, null, `/comp2245-finalproject/index.php/contact-details?contactId=${contact_id}&type=${type}`);
        });
}




async function SendContactName(contactId) {
    await fetch('/comp2245-finalproject/index.php/contact-details?contactId=' + contactId)
        .then(response => response.text())
        .then(data => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(data, 'text/html');
            let main = doc.querySelector('main');

            // Set the background color of the main element to white
            main.style.backgroundColor = 'white';

            let mainToString = main.innerHTML;
            history.pushState({ contactId: contactId }, null, '/comp2245-finalproject/index.php/contact-details?contactId=' + contactId);

            // Update the content area with the loaded HTML
            document.querySelector('main').innerHTML = mainToString;
        });
}


function displayMessage() {
    let successMessage = document.getElementById('success-message');

    if (successMessage) {
        console.log(successMessage);
        successMessage.classList.add('show');
        console.log("After");
        
        // Close the message after 3 seconds (adjust the delay as needed)
        setTimeout(() => {
            console.log("timeout");
            successMessage.classList.remove('show');
        }, 2000);
    }
}

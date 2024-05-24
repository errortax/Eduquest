document.addEventListener('DOMContentLoaded', function() {
    const taskForm = document.getElementById('task-form');
    const taskList = document.getElementById('task-list');

    taskForm.addEventListener('submit', function(event) {
        event.preventDefault();
        
        const taskName = document.getElementById('task-name').value;
        const dueDate = document.getElementById('due-date').value;
        
        if (taskName && dueDate) {
            const listItem = document.createElement('li');
            listItem.textContent = `${taskName} - Due: ${dueDate}`;
            taskList.appendChild(listItem);
            
            taskForm.reset();
        }
    });
});
document.addEventListener('DOMContentLoaded', function() {
    const contentData = {
        'intro-to-html': {
            text: 'Welcome to the Introduction to HTML module! In this module, you will dive into the world of HTML, the standard language used to create web pages. You will learn the fundamentals of HTML and how to structure your web pages using various HTML elements. Get ready to embark on an exciting journey of web development! ', 
            
            img: 'https://source.unsplash.com/random/800x600',
            video: 'https://www.youtube.com/watch?v=VIDEO_ID',
            submission: true
        },
        'html-tags-attributes': {
            text: 'In the HTML Tags and Attributes module, you will explore the vast array of HTML tags and attributes at your disposal. Discover how to create headings, paragraphs, links, images, lists, and more. Learn how to use attributes to enhance the functionality and appearance of your web pages. Get ready to unleash the power of HTML!',
            img: 'https://source.unsplash.com/random/800x600',
            video: 'https://www.youtube.com/watch?v=VIDEO_ID',
            submission: false
        },
        'creating-lists-links': {
            text: 'Lists and Links are essential components of any well-structured web page. In this module, you will master the art of creating ordered and unordered lists to organize your content effectively. You will also learn how to create hyperlinks to navigate between pages and enhance user experience. Get ready to create seamless navigation!',
            img: 'https://source.unsplash.com/random/800x600',
            video: 'https://www.youtube.com/watch?v=VIDEO_ID',
            submission: true
        },
        'embedding-images-media': {
            text: 'Visual and multimedia content can bring your web pages to life. In the Embedding Images and Media module, you will learn how to add captivating images using the <img> tag. You will also explore the world of audio and video elements to create engaging and interactive experiences for your users. Get ready to make your web pages visually stunning!',
            img: 'https://source.unsplash.com/random/800x600',
            video: 'https://www.youtube.com/watch?v=VIDEO_ID',
            submission: false
        },
        'building-forms': {
            text: 'Forms are the gateway to user interaction on the web. In the Building Forms module, you will discover how to create user-friendly forms to collect data from your users. Learn how to create text fields, checkboxes, radio buttons, and more. Dive into the world of form validation and create interactive web applications. Get ready to build dynamic web forms!',
            img: 'https://source.unsplash.com/random/800x600',
            video: 'https://www.youtube.com/watch?v=VIDEO_ID',
            submission: true
        }
    };

    window.loadContent = function(moduleId) {
        const contentDiv = document.getElementById('dynamic-content');
        const moduleContent = contentData[moduleId];

        let htmlContent = `<h2>${moduleId.replace(/-/g, ' ')}</h2>`;
        htmlContent += `<p>${moduleContent.text}</p>`;
        htmlContent += `<img src="${moduleContent.img}" alt="${moduleId}">`;

        if (moduleContent.submission) {
            htmlContent += `
                <form onsubmit="handleSubmit(event)">
                    <label for="${moduleId}-submission">Submit your assignment:</label>
                    <textarea id="${moduleId}-submission" name="submission" required></textarea>
                    <button type="submit">Submit</button>
                </form>
            `;
        }

        contentDiv.innerHTML = htmlContent;
        contentDiv.style.display = 'block';
    };

    window.handleSubmit = function(event) {
        event.preventDefault();
        alert('Assignment submitted successfully!');
        // Here you can add additional logic to handle form submission, e.g., sending data to a server.
    };
});

document.getElementById('logout-btn').addEventListener('click', function() {
    // Show confirmation prompt
    var confirmLogout = confirm("Are you sure you want to logout?");
    if (confirmLogout) {
        // Redirect to main page
        window.location.href = "http://localhost/wt/index.html";// Change this to the main page URL
    }
});

document.getElementById('update-btn').addEventListener('click', function() {
    // Show confirmation prompt
    var confirmLogout = confirm("Are you sure you want to update?");
    if (confirmLogout) {
      alert("update successful");
    }
});

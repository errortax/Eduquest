<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML Course - Eduquest</title>
    <link rel="stylesheet" href="html.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">Eduquest</div>
            <ul>
                <li><a href="dashboard.html">Dashboard</a></li>
                <li><a href="courses.html">Courses</a></li>
                <li><a href="profile.html">Profile</a></li>
                <li><a href="settings.html">Settings</a></li>
                <li><a href="index.html">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="course-header">
            <h1>HTML Basics</h1>
            <p>Learn the basics of HTML and create your first web page.</p>
        </section>

        <section class="course-content">
            <h2>Course Modules</h2>
            <div class="module">
                <h3><a href="#" onclick="loadContent('intro-to-html')">Introduction to HTML</a></h3>
                <p>Get started with the basics of HTML, including its structure and essential elements.</p>
            </div>
            <div class="module">
                <h3><a href="#" onclick="loadContent('html-tags-attributes')">HTML Tags and Attributes</a></h3>
                <p>Learn about various HTML tags and how to use attributes to enhance your web pages.</p>
            </div>
            <div class="module">
                <h3><a href="#" onclick="loadContent('creating-lists-links')">Creating Lists and Links</a></h3>
                <p>Discover how to create ordered and unordered lists, as well as hyperlinks.</p>
            </div>
            <div class="module">
                <h3><a href="#" onclick="loadContent('embedding-images-media')">Embedding Images and Media</a></h3>
                <p>Understand how to embed images, audio, and video into your web pages.</p>
            </div>
            <div class="module">
                <h3><a href="#" onclick="loadContent('building-forms')">Building Forms</a></h3>
                <p>Learn how to create forms to collect user input, including text fields, checkboxes, and radio buttons.</p>
            </div>
        </section>

        <section id="dynamic-content" class="dynamic-content">
            <!-- Dynamic content will be loaded here -->
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Eduquest. All rights reserved.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>

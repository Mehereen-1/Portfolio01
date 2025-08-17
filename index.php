<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Portfolio Newspaper</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main class="newspaper-layout">
        <!-- Lead Story -->
        <article>
            <h2>Breaking News: A Developer’s Journey</h2>
            <p>From tinkering with basic HTML pages to building dynamic full-stack applications, 
               this developer’s story is one of persistence, curiosity, and creativity. 
               What started as a hobby evolved into a profession, blending technology with art.</p>
        </article>

        <!-- Project Highlights -->
        <article>
            <h2>Featured Project: Portfolio Website</h2>
            <p>This very newspaper-style portfolio stands as a creative experiment—merging 
               traditional print aesthetics with modern web technologies like HTML, CSS, JavaScript, and PHP. 
               The goal: to present work as if each project is a story worth publishing.</p>
        </article>

        <article>
            <h2>Tech Column: Current Tools</h2>
            <p>Regularly experimenting with frameworks and languages, the toolkit includes React, PHP, and Node.js. 
               The focus is always on building clean, user-friendly experiences while keeping performance in mind.</p>
        </article>

        <!-- Sidebar Column -->
        <aside>
            <h3>Quick Facts</h3>
            <ul>
                <li>💻 Loves clean code & creative design</li>
                <li>📚 Reads about tech & philosophy</li>
                <li>🎨 Enjoys UI/UX sketching</li>
                <li>🌍 Based in Bangladesh</li>
            </ul>
        </aside>

        <!-- Extra Story -->
        <article>
            <h2>Opinion: Why Web Development Feels Like Writing</h2>
            <p>Building websites isn’t just about code—it’s about storytelling. 
               Each function is like a sentence, each component like a paragraph, 
               and together they form an article that users interact with every day.</p>
        </article>

        <!-- Another Story -->
        <article>
            <h2>Upcoming Features</h2>
            <p>Future plans for this portfolio include integrating a blog section, 
               showcasing code snippets like news clippings, and adding interactive project demos 
               to let readers experience the work firsthand.</p>
        </article>
    </main>

    <?php include 'includes/footer.php'; ?>
    <!-- <script src="js/script.js"></script> -->
</body>
</html>

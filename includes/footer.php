<!-- Footer -->
<footer class="footer">
  <div class="footer-content">
    <p><strong>Thanks for stopping by!</strong></p>
    <p>
      <span class="highlight orange">Curious</span> to 
      <span class="highlight blue">collaborate</span>? Let's 
      <span class="highlight purple">make</span> it happen!
    </p>
    
    <div class="footer-icons">
      <a href="mailto:yourmail@example.com">✉️</a>
      <a href="https://www.linkedin.com" target="_blank">in</a>
      <a href="https://www.instagram.com" target="_blank">📷</a>
    </div>

    <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" class="back-to-top">
      ↑ Back To Top
    </button>

    <p class="made-with">
      Made with ❤️ 🎵 🍹 by <span class="author">Mehereen</span> © <span id="year"></span>
    </p>
  </div>
</footer>

<script>
  // Auto update year
  document.getElementById("year").textContent = new Date().getFullYear();
</script>

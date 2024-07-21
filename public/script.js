document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('.nav-link');
    const tabs = document.querySelectorAll('.tab-content');

    links.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault();

            const targetId = this.getAttribute('href').substring(1);
            tabs.forEach(function(tab) {
                tab.classList.remove('active');
            });

            document.getElementById(targetId).classList.add('active');
        });
    });
});
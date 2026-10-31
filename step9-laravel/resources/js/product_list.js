document.addEventListener('DOMContentLoaded', function() {
    const searchForm = document.getElementById('searchForm');

    if (searchForm) {
        searchForm.addEventListener('submit', function (e) {
            e.preventDefault();

            const params = new URLSearchParams(new FormData(this)).toString();
            const url = `${this.action}?${params}`;

            fetch(url, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => response.text())
                .then(html => {
                    document.getElementById('productList').innerHTML = html;
                })
                .catch(error => console.error(error));
        });
    }
});
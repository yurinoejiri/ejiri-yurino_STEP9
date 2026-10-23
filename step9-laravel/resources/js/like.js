document.addEventListener('DOMContentLoaded', function () {
    const likeBtn = document.getElementById('likeBtn');

    if (likeBtn) {
        likeBtn.addEventListener('click', function () {
            console.log('お気に入り！');
            const ProductId = this.getAttribute('data-product-id');
            const url = `/product/${ProductId}/like`;
            const icon = this.querySelector('i');
            const method = icon.classList.contains('fa-solid') ? 'DELETE' : 'POST';

            fetch(url, {
                method: method,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json'
                }
            })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('likesCount').textContent = data.likesCount;
                    icon.classList.toggle('fa-solid', method === 'POST');
                    icon.classList.toggle('fa-regular', method === 'DELETE');
                });
        });
    }
});
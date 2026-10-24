document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('purchaseForm');
    const dialog = document.getElementById('confirmDialog');
    if (!form || !dialog) return;

    const quantityInput = document.getElementById('quantity');
    const price = parseInt(form.dataset.price, 10);

    document.getElementById('openConfirm').addEventListener('click', function () {
        if (!form.reportValidity()) return;
        const qty = parseInt(quantityInput.value, 10);
        document.getElementById('confirmQuantity').textContent = qty;
        document.getElementById('confirmTotal').textContent = (price * qty).toLocaleString();
        dialog.showModal();
    });
    
    document.getElementById('cancelBtn').addEventListener('click', function () {
        dialog.close();
    });

    document.getElementById('submitBtn').addEventListener('click', function() {
        form.submit();
    });
    
})
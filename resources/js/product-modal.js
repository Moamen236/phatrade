document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('productModal');
    const closeBtn = document.getElementsByClassName('close')[0];
    const productCards = document.querySelectorAll('.product-card');

    productCards.forEach(card => {
        card.addEventListener('click', function() {
            const productId = this.dataset.productId;
            const productName = this.dataset.productName;
            const productDescription = this.dataset.productDescription;
            const productImage = this.dataset.productImage;
            const productSpecification = this.dataset.productSpecification;

            document.getElementById('modalProductName').textContent = productName;
            document.getElementById('modalProductDescription').textContent = productDescription;
            document.getElementById('modalProductImage').src = productImage;
            document.getElementById('modalProductSpecification').textContent = productSpecification;

            modal.style.display = "block";
        });
    });

    closeBtn.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}); 
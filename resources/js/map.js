function initMap() {
    const phatradeLocation = { lat: 30.2283, lng: 31.4799 }; // Coordinates for Obour City
    
    const map = new google.maps.Map(document.getElementById("google-map"), {
        zoom: 15,
        center: phatradeLocation,
    });

    const marker = new google.maps.Marker({
        position: phatradeLocation,
        map: map,
        title: "PHATRADE"
    });
}

document.addEventListener('DOMContentLoaded', function() {
    const regions = {
        delta: {
            coordinates: { x: 30.8, y: 31.2 },
            products: ['Jasmine', 'Violet', 'Carnation']
        },
        beniSweif: {
            coordinates: { x: 31.1, y: 29.1 },
            products: ['Basil', 'Chamomile', 'Onion', 'Geranium', 'Parsley']
        },
        fayoum: {
            coordinates: { x: 30.8, y: 29.3 },
            products: ['Marjoram', 'Chamomile', 'Tagette']
        },
        alMinya: {
            coordinates: { x: 30.7, y: 28.1 },
            products: ['Marjoram', 'Coriander']
        },
        asyout: {
            coordinates: { x: 31.2, y: 27.2 },
            products: ['Cumin', 'Fennel']
        },
        aswan: {
            coordinates: { x: 32.9, y: 24.1 },
            products: ['Cassie']
        }
    };

    // Create markers for each region
    Object.entries(regions).forEach(([region, data]) => {
        const marker = document.createElement('div');
        marker.className = 'map-marker';
        marker.setAttribute('data-region', region);
        
        const tooltip = document.createElement('div');
        tooltip.className = 'map-tooltip';
        tooltip.innerHTML = `
            <h4>${region.replace(/([A-Z])/g, ' $1').trim()}</h4>
            <ul>
                ${data.products.map(product => `<li>${product}</li>`).join('')}
            </ul>
        `;
        
        marker.appendChild(tooltip);
        document.querySelector('.map-container').appendChild(marker);
    });

    // Add hover effects
    const markers = document.querySelectorAll('.map-marker');
    markers.forEach(marker => {
        marker.addEventListener('mouseenter', function() {
            this.querySelector('.map-tooltip').classList.add('active');
        });
        
        marker.addEventListener('mouseleave', function() {
            this.querySelector('.map-tooltip').classList.remove('active');
        });
    });
}); 
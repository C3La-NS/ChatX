function openModal(img) {
    // Get the full-size image URL from the data attribute
    var imgUrl = img.getAttribute('data-chxlightbox');
    // Create a new image element with the full-size image URL
    var fullSizeImg = document.createElement('img');
        fullSizeUrl = document.createElement('a');
    fullSizeImg.setAttribute('src', imgUrl);
    fullSizeUrl.setAttribute('href', imgUrl);
    fullSizeUrl.setAttribute('target', '_blank');
    // Create a modal box element and add the full-size image
    var modal = document.createElement('div');
    close = document.createElement('chx_i');
    source = document.createElement('chx_i');
    modal.setAttribute('class', 'modal');
    close.setAttribute('class', 'chxicon-plus');
    source.setAttribute('class', 'chxicon-logout');
    modal.appendChild(fullSizeImg);
    // Add the modal box to the page
    document.body.appendChild(modal);
    modal.appendChild(close);
    fullSizeUrl.appendChild(source);
    modal.appendChild(fullSizeUrl);
    // Keep track of the current scale factor and image position
    var scale = 1.0;
    var position = {
        x: 0,
        y: 0
    };
    // When the user scrolls with the mouse wheel, scale the image
    modal.addEventListener('wheel', function(event) {
        event.preventDefault();
        // Determine the direction and amount of the scroll
        var delta = Math.sign(-event.deltaY);
        var amount = delta * 0.1;
        // Calculate the new scale factor
        scale += amount;
        // Constrain the scale factor to a minimum of 0.1 and a maximum of 3.0
        scale = Math.max(scale, 0.7);
        scale = Math.min(scale, 4.0);
        // Apply the new scale factor to the image
        fullSizeImg.style.transform = `scale(${scale}) translate(${position.x}px, ${position.y}px)`;
    });
    // When the user clicks and drags the image, move it within the modal
    var isDragging = false;
    var lastMousePosition = {
        x: 0,
        y: 0
    };
    fullSizeImg.addEventListener('mousedown', function(event) {
        event.preventDefault();
        // Store the current mouse position and start dragging
        lastMousePosition.x = event.clientX;
        lastMousePosition.y = event.clientY;
        isDragging = true;
    });
    window.addEventListener('mousemove', function(event) {
        if (isDragging) {
            // Calculate the distance the mouse has moved since the last event
            var deltaX = event.clientX - lastMousePosition.x;
            var deltaY = event.clientY - lastMousePosition.y
            // Update the stored mouse position to the current position
            lastMousePosition.x = event.clientX;
            lastMousePosition.y = event.clientY;
            // Update the position of the image within the modal
            position.x += deltaX / scale;
            position.y += deltaY / scale;
            // Apply the new position to the image
            fullSizeImg.style.transform = `scale(${scale}) translate(${position.x}px, ${position.y}px)`;
        }
    });
    window.addEventListener('mouseup', function(event) {
        // Stop dragging
        isDragging = false;
    });
    // When the user clicks anywhere outside image on the modal box, close it
    modal.onclick = function(event) {
        if (event.target.tagName !== 'IMG') {
            modal.parentNode.removeChild(modal);
        }
    };
}
function openModal(img) {
    var imgUrl = img.getAttribute('data-chxlightbox');
    var fullSizeImg = document.createElement('img');
    var fullSizeUrl = document.createElement('a');
    var modal = document.createElement('div');
    var close = document.createElement('chx_i');
    var source = document.createElement('chx_i');

    fullSizeImg.setAttribute('src', imgUrl);
    fullSizeUrl.setAttribute('href', imgUrl);
    fullSizeUrl.setAttribute('target', '_blank');

    modal.setAttribute('class', 'modal');
    close.setAttribute('class', 'chxicon-plus');
    source.setAttribute('class', 'chxicon-logout');

    modal.appendChild(fullSizeImg);
    document.body.appendChild(modal);
    modal.appendChild(close);
    fullSizeUrl.appendChild(source);
    modal.appendChild(fullSizeUrl);

    var scale = 1.0;
    var position = { x: 0, y: 0 };

    var isDragging = false;
    var lastMousePosition = { x: 0, y: 0 };

    fullSizeImg.addEventListener('mousedown', function (event) {
        event.preventDefault();
        lastMousePosition.x = event.clientX;
        lastMousePosition.y = event.clientY;
        isDragging = true;
    });

    window.addEventListener('mousemove', function (event) {
        if (isDragging) {
            var deltaX = event.clientX - lastMousePosition.x;
            var deltaY = event.clientY - lastMousePosition.y
            lastMousePosition.x = event.clientX;
            lastMousePosition.y = event.clientY;
            position.x += deltaX / scale;
            position.y += deltaY / scale;
            fullSizeImg.style.transform = `scale(${scale}) translate(${position.x}px, ${position.y}px)`;
        }
    });

    window.addEventListener('mouseup', function (event) {
        isDragging = false;
    });

    fullSizeImg.addEventListener('wheel', function (event) {
        event.preventDefault();
        var delta = Math.sign(-event.deltaY);
        var amount = delta * 0.1;
        scale += amount;
        scale = Math.max(scale, 0.7);
        scale = Math.min(scale, 4.0);
        fullSizeImg.style.transform = `scale(${scale}) translate(${position.x}px, ${position.y}px)`;
    });

    var initialTouchPosition = { x: 0, y: 0 };
    var initialTouchDistance;

    fullSizeImg.addEventListener('touchstart', function (event) {
        event.preventDefault();
        if (event.touches.length == 2) {
            initialTouchDistance = getTouchDistance(event.touches[0], event.touches[1]);
            initialTouchPosition = {
                x: (event.touches[0].pageX + event.touches[1].pageX) / 2,
                y: (event.touches[0].pageY + event.touches[1].pageY) / 2
            };
        }
    });

    fullSizeImg.addEventListener('touchmove', function (event) {
        event.preventDefault();
        if (event.touches.length == 2 && initialTouchDistance) {
            var newTouchDistance = getTouchDistance(event.touches[0], event.touches[1]);
            var scaleChange = newTouchDistance / initialTouchDistance;
            scale = Math.max(0.7, Math.min(scale * scaleChange, 4.0));
            var currentTouchPosition = {
                x: (event.touches[0].pageX + event.touches[1].pageX) / 2,
                y: (event.touches[0].pageY + event.touches[1].pageY) / 2
            };
            position.x += (currentTouchPosition.x - initialTouchPosition.x) / scale;
            position.y += (currentTouchPosition.y - initialTouchPosition.y) / scale;
            fullSizeImg.style.transform = `scale(${scale}) translate(${position.x}px, ${position.y}px)`;
            initialTouchPosition = currentTouchPosition;
            initialTouchDistance = newTouchDistance;
        }
    });

    fullSizeImg.addEventListener('touchend', function (event) {
        if (event.touches.length < 2) {
            initialTouchDistance = null;
        }
    });

    modal.onclick = function (event) {
        if (event.target.tagName !== 'IMG') {
            closeModal(modal);
        }
    };

    document.addEventListener('keydown', function(event) {
        if (event.which === 27 && modal !== null) {
            closeModal(modal);
        }
    });
}

function getTouchDistance(touch1, touch2) {
    var dx = touch1.pageX - touch2.pageX;
    var dy = touch1.pageY - touch2.pageY;
    return Math.sqrt(dx * dx + dy * dy);
}

function closeModal(modal) {
    if(modal && modal.parentNode) {
        modal.parentNode.removeChild(modal);
    }
}
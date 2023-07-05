const xhr = new XMLHttpRequest();
xhr.open("GET", "./array_history_moderator.php");
xhr.onreadystatechange = function() {
  if (xhr.readyState === 4 && xhr.status === 200) {
    const data = JSON.parse(xhr.responseText);
    const items = [];
    data.forEach(function(item) {
      const html = `<article><div class="third-box"><chx_li><p class="shoutbox-comment"><span class="shoutbox-username"><b data-loggedin="${item.loggedIn}">${item.name}</b></span>${item.text}</p><div class="shoutbox-comment-details"><div class="first-box"><input class="magic-checkbox" type="checkbox" name="deleteShout[]" form="deleteShout" value="${item.id}"><label class="magic-label"></label></div><span class="shoutbox-comment-ago">${item.timeAgo}</span></div></chx_li></div></article>`;
      items.push(html);
    });
    const main = document.createElement("main");
    main.classList.add("list");
    main.innerHTML = items.join("");
    document.querySelector(".shoutbox-content").appendChild(main);
    document.querySelectorAll(".magic-checkbox").forEach(function(checkbox, i) {
      checkbox.id = i + 1;
    });
    document.querySelectorAll(".magic-label").forEach(function(label, i) {
      label.setAttribute("for", i + 1);
    });
  }
    var elements = document.querySelectorAll(".shoutbox-username b[data-loggedin='true']");
    for (var i = 0; i < elements.length; i++) {
        if (elements[i].textContent === sessionName) {
            var closestLi = elements[i].closest("div.third-box");
            if (closestLi) closestLi.setAttribute("id", "chx-my-msg");
        }
    }
    
    
    function lightBoxInitiation() {
        var images = document.querySelectorAll('img[data-chxlightbox]');
        images.forEach(function(image) {
            image.addEventListener('click', function() {
                if (!document.querySelector('.modal')) {
                    openModal(image);
                }
            });
        });
    }
    lightBoxInitiation();

};
xhr.send();

var url = document.location.href.replace(/client\/index\.php|client\//, '');
var appendUrlTo = document.getElementsByClassName('document-url')[0];
appendUrlTo.insertAdjacentHTML('afterbegin', url);
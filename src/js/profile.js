{
  let bucketlistsdata;
  const fillList = data => {
    const $location = document.querySelector('.bucketlistList');
    $location.innerHTML = data.map(bucketlist => {
      return `
      <li>
        <div class="bucketlist__wrapper">
          <a href="index.php?page=detail&id=${bucketlist.id}">
            <div class="bucketlist__name">${bucketlist.name}</div>
            <div class="bucketlist__description"><p>Description:</p>${bucketlist.description}</div>
          </a>
        </div>
      </li>`;
    }).join('');
  };
  const bucketlists = async () => {
    const url = 'index.php?page=bucketlist-api';
    const response = await fetch(url);
    bucketlistsdata = await response.json();
    fillList(bucketlistsdata);
  };
  const init = () => {
    bucketlists();
  };
  init();
}

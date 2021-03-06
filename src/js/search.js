{
  let search;
  const handleSubmitForm = e => {
    e.preventDefault();
    submitWithJS();
  };

  const handleInputField = e => {
    submitWithJS();
  };

  const updateList = bucketlists => {
    console.log(search);
    const $bucketlists = document.querySelector('.bucketlists');
    $bucketlists.innerHTML = '';
    if (search !== 'index.php?page=search-api&searchtext=') {
      if (bucketlists.length !== 0) {
        $bucketlists.innerHTML = bucketlists
          .map(bucketlist => {
            return `
        <li>
        <div class="bucketlist__wrapper">
          <a href="index.php?page=detail&id=${bucketlist.id}">
            <div class="bucketlist__name">${bucketlist.name}</div>
            <div class="bucketlist__description"><p>Description:</p>${bucketlist.description}</div>
          </a>
        </div>
      </li>
      `;
          })
          .join(``);
      } else {
        $bucketlists.innerHTML =
          '<div class="noListsFound"><p>No Bucketlist found</p><div>';
      }
    }
    else {
      $bucketlists.innerHTML =
        '<div class="noListsFound"><p>No Bucketlist found</p><div>';
    }
  };

  const submitWithJS = async () => {
    const $form = document.querySelector('.searchform');
    const data = new FormData($form);
    const entries = [...data.entries()];
    const qs = new URLSearchParams(entries).toString();
    const url = `index.php?page=search-api&${qs}`;
    search = url;
    const response = await fetch(url);
    const bucketlists = await response.json();
    updateList(bucketlists);
    window.history.pushState({}, '', `index.php?page=home&${qs}`);
  };

  const init = () => {
    document.documentElement.classList.add('has-js');
    document
      .querySelectorAll('.formLine')
      .forEach($field => $field.addEventListener('input', handleInputField));
    document
      .querySelector('.searchform')
      .addEventListener('submit', handleSubmitForm);
  };
  init();
}

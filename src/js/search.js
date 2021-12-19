{
  const handleSubmitForm = (e) => {
    e.preventDefault();
    submitWithJS();
  };

  const handleInputField = (e) => {
    submitWithJS();
  };

  const updateList = bucketlists => {
    const $shows = document.querySelector(".bucketlists");
    $shows.innerHTML = bucketlists
      .map(bucketlist => {
        return `
        <li>
          <article class="bucketlist">
          <h2 class="bucketlist_name">${bucketlist.name}</h2>
          </article>
        </li>
      `;
      })
      .join(``);
  };

  const submitWithJS = async () => {
    const $form = document.querySelector(".searchform");
    const data = new FormData($form);
    const entries = [...data.entries()];
    console.log("entries:", entries);
    const qs = new URLSearchParams(entries).toString();
    console.log("querystring", qs);
    const url = `index.php?page=search-api&${qs}`;
    console.log("url", url);

    const response = await fetch(url);
    const shows = await response.json();
    updateList(shows);

    window.history.pushState({}, "", `index.php?page=home&${qs}`);
  };

  const init = () => {
    document.documentElement.classList.add("has-js");
    document
      .querySelectorAll(".formLine")
      .forEach(($field) => $field.addEventListener("input", handleInputField));
    document
      .querySelector(".searchform")
      .addEventListener("submit", handleSubmitForm);
  };
  init();
}

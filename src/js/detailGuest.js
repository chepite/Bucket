{
  let activityData;
  let id;
  const fillList = (data) => {
    const $location = document.querySelector(".activityList");
    //add button for delete in this li
    let url = window.location.href;
    $location.innerHTML = "";
    $location.innerHTML = data
      .map((activity) => {
        return `<li><div>${activity.name} </div></li>`;
      })
      .join("");
  };
  const activities = async () => {
    const url = `index.php?page=detail-api&id=${id}`;
    const response = await fetch(url);
    activityData = await response.json();
    fillList(activityData);
  };

  const init = () => {
    const $like = document.querySelector(".like");
    id = document.querySelector(".idvalue").textContent;

    activities();
  };
  init();
}

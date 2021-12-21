{
  let activityData;
  let id;
  const $createActivityForm = document.querySelector("#addActivityForm");
  const $activitiesList= document.querySelector(".activityList");

  const fillList =(data)=>{
    const $location = document.querySelector(".activityList");
    //add button for delete in this li
    let url = window.location.href;
    $location.innerHTML= "";
    $location.innerHTML = data.map((activity)=>{
      return `<li>
      <div>${activity.name}</div>
      <div>${activity.date}</div>
      <a class="deleteActivity-link delete" href="${url}&action=deleteActivity&Activityid=${activity.id}"> Delete Activity</a>
      </li>`;}).join('');
  }
  const activities = async () => {
    const url = `index.php?page=detail-api&id=${id}`;
    const response = await fetch(url);
    activityData = await response.json();
    fillList(activityData);
  };

  const handleClickDelete = (e) => {
    const confirm = window.confirm(
      "Are you sure you want to delete this bucketlist?"
    );
    if (!confirm) {
      // stop the deletion
      e.preventDefault();
    }
  };




  const handleClickEdit = e => {
    e.preventDefault();
    const $editFormDiv = document.querySelector('.editFormDiv');
    $editFormDiv.classList.toggle('hidden');
  }

  const handleClickThreedot = (e) =>{
    e.preventDefault();
    const $dropdown= document.querySelector('.threedotDropdown');
    $dropdown.classList.toggle("hidden");
  }

  const handleClickNew = (e) =>{
    e.preventDefault();
    const $addForm = document.querySelector(".addActivity");
    $addForm.classList.toggle("hidden");
  }

  //add activities with api
  const initCreateActivityForm = () => {
    $createActivityForm.addEventListener("submit", async (e) => {
      e.preventDefault();
      // get the id from the querystring
      const params = new URLSearchParams(window.location.search);
      const response = await fetch(
        `index.php?page=api-create-rating&id=${params.get("id")}`,
        {
          method: "post",
          body: new FormData($createActivityForm),
        }
      );
      const parsedResponse = await response.json();
      if (parsedResponse.result === "ok") {
        const activity = parsedResponse.data;
        //const $rating = document.querySelector(".ratings__header");
        //$rating.textContent = `RATING (${movie.avgRating}/5 avg)`;
      }
    });
  };



  //end activities with api


  const init = () =>{
    //add activities with api
    if ($createActivityForm) {
      initCreateActivityForm();
    }
    //end add api
    id = document.querySelector(".idvalue").textContent;
    const $editLink = document.querySelector('.edit-link');
    $editLink.addEventListener("click", handleClickEdit);
    const $Dellink = document.querySelector(`.delete-link`);
    $Dellink.addEventListener(`click`, handleClickDelete);
    const $threedot= document.querySelector(".threedot");
    $threedot.addEventListener("click", handleClickThreedot);
    const $addNew = document.querySelector(".addActivityLink");
    $addNew.addEventListener("click", handleClickNew);
    activities();



  }
  init();
}

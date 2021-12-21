{
  let activityData;
  let id;
  const fillList =(data)=>{
    const $location = document.querySelector(".activityList");
    //add button for delete in this li
    let url = window.location.href;
    $location.innerHTML= "";
    $location.innerHTML = data.map((activity)=>{
      return `<li><div>${activity.name}   <a
                    class="deleteActivity-link delete"
                    href="${url}&action=deleteActivity&Activityid=${activity.id}"> Delete Activity
                </a></div></li>`;}).join('');
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
  const init = () =>{
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

{
  let activityData;

  const fillList =(data)=>{
    const $location = document.querySelector(".activityList");
    //add button for delete in this li
    $location.innerHTML = data.map((activity)=>{
      return `<li>${activity.name}</li>`}).join("");
  }
  const activities = async () => {
    const url = "index.php?page=detail-api";
    const response = await fetch(url);
    activityData = await response.json();
    fillList(activityData);
  };




  const handleClickDelete = (e) => {
    const confirm = window.confirm(
      "Are you sure you want to delete this show?"
    );
    if (!confirm) {
      // stop the deletion
      e.preventDefault();
    }
  };

  const handleClickEdit = (e)=>{
    e.preventDefault();
    const $editFormDiv= document.querySelector(".editFormDiv")
  }







  const init = () =>{
    const $editLink = document.querySelector('.edit-link');
    $editLink.addEventListener("click", handleClickEdit);
    const $Dellink = document.querySelector(`.delete-link`);
    $Dellink.addEventListener(`click`, handleClickDelete);
    activities();
  }
  init();
}

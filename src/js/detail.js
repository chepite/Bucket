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




  const init = () =>{
    activities();
  }
  init();
}

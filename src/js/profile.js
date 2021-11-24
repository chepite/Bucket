{
  let bucketlistsdata;
  const fillList=(data)=>{
    const $location = document.querySelector(".bucketlistList");
    $location.innerHTML = data.map((bucketlist)=>{
      return `<li><a>${bucketlist.name}<a></li>`
    }).join("");
  }
  const bucketlists = async ()=>{
    const url= "index.php?page=bucketlist-api";
    const response = await fetch(url);
    bucketlistsdata = await response.json();
    fillList(bucketlistsdata);
  }
  const init =()=>{
    bucketlists();
  }
  init();
}

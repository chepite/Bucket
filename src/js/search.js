{
  const fillList = (data) => {
    console.log(data);
  };
  const getData = async () => {
    const url = "index.php?page=search-api";
    const response = await fetch(url);
    let data = await response.json();
    fillList(data);
  };

  const init = () => {
    console.log("search");
    getData();
  };
  init();
}

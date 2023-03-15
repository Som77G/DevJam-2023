const newsList = document.getElementById('news-list');
let newsItems = [
  'Breaking news item',
  'Another breaking news item',
  'Third breaking news item',
  'Fourth breaking news item',
  'Fifth breaking news item'
];
let index = 0;

setInterval(() => {
  index = (index + 1) % newsItems.length;
  const newNewsItem = document.createElement('li');
  newNewsItem.innerHTML = `<a href="#">${newsItems[index]}</a>`;
  newsList.appendChild(newNewsItem);
  setTimeout(() => {
    newsList.removeChild(newsList.firstChild);
  }, 10000); // remove the oldest news item after 10 seconds
}, 3000); // add a new news item every 3 seconds

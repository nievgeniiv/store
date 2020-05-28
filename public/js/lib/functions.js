function getRequest(link, handler) {
  axios.get(link)
    .then(
      (response) => {
        handler(response.data);
      })
    .catch(function (error) {
    })
}

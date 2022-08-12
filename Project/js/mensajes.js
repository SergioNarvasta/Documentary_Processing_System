window.addEventListener("load", function () {
  function animateMessageBox(messageBox, duration = 31500) {
    messageBox.classList.add("show");
    setTimeout(function () {
      messageBox.classList.remove("show");
      messageBox.classList.add("hide");
    }, duration);
  }

  const queryParams = new URLSearchParams(location.search);
  const params = Object.fromEntries(queryParams.entries());

  const includeMessage = !!params.error;
  const isErrorMessage = params.error === "true";
  const messageClass = isErrorMessage ? "error" : "success";
  const defaultMessage = isErrorMessage
    ? "Ocurrio un error inesperado"
    : "Proceso realizado con exito";

  const messageContent = params.m || defaultMessage;

  const container = document.querySelector(".message-container");

  if (container && includeMessage) {
    container.textContent = messageContent;

    container.classList.add(messageClass);
    animateMessageBox(container, 2000);

    window.history.pushState({}, document.title, location.pathname);
  }
});

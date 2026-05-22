/**
 * マウスカーソル
 */
let cursor = () => {
  if(!navigator.userAgent.match(/(iPhone|iPad|iPod|Android)/)){
    const body = document.body;
    const cursor = document.createElement("div");
    const stalker = document.createElement("div");
    cursor.id = "cursor";
    stalker.id = "stalker";
    body.appendChild(cursor);
    body.appendChild(stalker);
    body.addEventListener("mousemove", function(e) {
      cursor.style.left = e.clientX + "px";
      cursor.style.top = e.clientY + "px";
      stalker.style.left = e.clientX + "px";
      stalker.style.top = e.clientY + "px";
    }, false);
    const cursorId = $('#cursor');
    const stalkerId = $('#stalker');
    $("a,button").on("mouseenter", function() {
      cursorId.addClass("active");
      stalkerId.addClass("active");
    });
    $("a,button").on("mouseleave", function() {
      cursorId.removeClass("active");
      stalkerId.removeClass("active");
    });
  }
}

/**
 * 初期化
 */
let init = () => {
  cursor();
}

export default { init, cursor };
function canvas() {
  $("canvas").attr("id", "canvas");
  $("#down").removeClass("hidden");
}

function hidden() {
  $("#output").empty();
  $("#down").addClass("hidden");
}

$("button").on("click", function () {
  hidden();
  var text = $("#qr_input").val();
  var file = $("#qr_img")[0].files[0];
  var uploadImgSrc;
  if (text == "") {
    alert("URLや検索したい語句を入力してください");
  } else if (!file) {
    $("#output").qrcode({ text: text, width: 300, height: 300 });
    canvas();
  } else {
    $("#output").qrcode({ text: text, width: 300, height: 300 });
    $("canvas").attr("id", "canvas");
    $("#down").removeClass("hidden");
    previewImage(file);
  }
});

function download() {
  var canvas = document.getElementById("canvas");
  var link = document.getElementById("link");
  link.href = canvas.toDataURL('image/png');
  link.download = 'qrcode.png';
  link.click();
}

function previewImage(file) {
  var file = document.getElementById("qr_img");
  const fileReader = new FileReader();
  fileReader.onload = (function () {
    console.log(fileReader.result);
    uploadImgSrc = fileReader.result;
    canvasDraw();
  });
  fileReader.readAsDataURL(file.files[0]);
}

function canvasDraw() {
  var canvas = document.getElementById("canvas");
  var ctx = canvas.getContext("2d");
  var img = new Image();
  img.src = uploadImgSrc;
  img.onload = function () {
    var originalWidth = img.naturalWidth;
    var originalHeight = img.naturalHeight;
    if (originalWidth > originalHeight) {
      img.width = 140;
      img.height = originalHeight * (img.width / originalWidth);
    } else if (originalWidth < originalHeight) {
      img.height = 140;
      img.width = originalWidth * (img.height / originalHeight);
    } else {
      img.height = 130;
      img.width = 130;
    }

    // 画像の縁取りを行いたかったのですが、QRコード読み込み精度が落ちたため、断念。
    // ctx.fillStyle = "gray";
    // ctx.fillRect((canvas.width - img.width * 1.05) / 2, (canvas.height - img.height * 1.05) / 2, img.width * 1.05, img.height * 1.05);

    ctx.drawImage(img, 0, 0, originalWidth, originalHeight,
      (canvas.width - img.width) / 2,
      (canvas.height - img.height) / 2,
      img.width, img.height);
  }
}

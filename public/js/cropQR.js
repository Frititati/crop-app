var isEqualJson = (obj1,obj2)=>{
  keys1 = Object.keys(obj1);
  keys2 = Object.keys(obj2);

  //return true when the two json has same length and all the properties has same value key by key
  return keys1.length === keys2.length && Object.keys(obj1).every(key=>obj1[key]==obj2[key]);
}


const constraints = {
  audio: false,
  video: {
    facingMode: 'environment',
    width: 300,
    height: 300
  }
};

var video = document.createElement("video");
var canvasElement = document.getElementById("canvas");
var canvas = canvasElement.getContext("2d");
var loadingMessage = document.getElementById("loadingMessage");
var outputContainer = document.getElementById("output");
var outputMessage = document.getElementById("outputMessage");
var outputData = document.getElementById("outputData");

function drawLine(begin, end, color) {
  canvas.beginPath();
  canvas.moveTo(begin.x, begin.y);
  canvas.lineTo(end.x, end.y);
  canvas.lineWidth = 4;
  canvas.strokeStyle = color;
  canvas.stroke();
}

// Use facingMode: environment to attemt to get the front camera on phones
navigator.mediaDevices.getUserMedia(constraints).then(function (stream) {
  video.srcObject = stream;
  video.setAttribute("playsinline", true); // required to tell iOS safari we don't want fullscreen
  video.play();
    outputMessage.hidden = true;
    requestAnimationFrame(tick);
});

var form_submitted = false;

function tick() {
  loadingMessage.innerText = "⌛ Loading video..."
  if (video.readyState === video.HAVE_ENOUGH_DATA) {
      loadingMessage.hidden = true;
      canvasElement.hidden = false;
    outputContainer.hidden = false;

    canvasElement.height = video.videoHeight;
    canvasElement.width = video.videoWidth;
    canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);
    var imageData = canvas.getImageData(0, 0, canvasElement.width, canvasElement.height);
    var code = jsQR(imageData.data, imageData.width, imageData.height, {
      inversionAttempts: "dontInvert",
    });
    if (code) {
      drawLine(code.location.topLeftCorner, code.location.topRightCorner, "#FF3B58");
      drawLine(code.location.topRightCorner, code.location.bottomRightCorner, "#FF3B58");
      drawLine(code.location.bottomRightCorner, code.location.bottomLeftCorner, "#FF3B58");
      drawLine(code.location.bottomLeftCorner, code.location.topLeftCorner, "#FF3B58");
      // outputData.parentElement.hidden = false;
      //outputData.innerText = code.data;
      var code_decoded = {};
      console.log(code.data);
      // try {
      //   code_decoded = JSON.parse(code.data);
      //   if (code_decoded.app != "crop_demo"){
      //     throw Error;
      //   }
      // } catch (err) {
      //   if (err instanceof SyntaxError) {
      //     alert("Questo QR non funziona con Crop");
      //   }
      // }
      // if (isEqualJson(qr_example, code_decoded)) {
      //   outputData.innerText = "Found QR";
      //   window.location.replace("./conferma-crop-coin.html");
      // }
      if (!form_submitted) {
        document.getElementById("form_qr_code").value = code.data;
        document.getElementById("scanning_form").submit();
        form_submitted = true;
      }
    } else {
    }
  }
  requestAnimationFrame(tick);
}

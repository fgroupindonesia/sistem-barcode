<script type="text/javascript" src="https://unpkg.com/@zxing/library@latest"></script>
<h1>Testing Web Scanner </h1>
<video id="webcam-preview"></video>
<p id="result"></p>

<script>
// this code works on mobile only if 
// (1) we set unsafely check flags on chrome browser (in android kiwi browser looks fine)
// or 
// (2) set a https certificate for certain domain that implementing the SSL
// because web cam or camera (live) data is needed to implement Https access only.

  const codeReader = new ZXing.BrowserQRCodeReader();

  codeReader.decodeFromVideoDevice(null, 'webcam-preview', (result, err) => {
    if (result) {
      // properly decoded qr code
      //alert('Found QR code!' + result)
      document.getElementById('result').textContent = result.text
	  document.getElementById('webcam-preview').style = "display:none;";
	  
	   codeReader.stopContinuousDecode();
    }

    if (err) {
      // As long as this error belongs into one of the following categories
      // the code reader is going to continue as excepted. Any other error
      // will stop the decoding loop.
      //
      // Excepted Exceptions:
      //
      //  - NotFoundException
      //  - ChecksumException
      //  - FormatException

      if (err instanceof ZXing.NotFoundException) {
        //alert('No QR code found.')
      }

      if (err instanceof ZXing.ChecksumException) {
        //alert('A code was found, but it\'s read value was not valid.')
      }

      if (err instanceof ZXing.FormatException) {
        //alert('A code was found, but it was in a invalid format.')
      }
    }
  })
</script>
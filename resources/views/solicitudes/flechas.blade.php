<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Dibujando con el mouse</title>
  </head>
  <body>
  <canvas id="area_de_dibujo" width="375" height="220" style="border: 1px solid black; padding: 50 auto;"></canvas>
  <div style="font-weight: bold; text-decoration: underline; border: 1px solid black; padding: 10px; text-align: center; width: 190;">Grafica de doblez con mouse.</div>    <script>
      var canvas = document.getElementById("area_de_dibujo");
      var ctx = canvas.getContext("2d");
      var painting = false;
      var startX, startY, endX, endY;
      var longitudTubo = '{{$longitudTubo}}';
      var angulos = '{{$angulos}}';
      ctx.font = "12px Arial";

      ctx.textAlign = "center";

      canvas.addEventListener("mousedown", startPainting);
      canvas.addEventListener("mousemove", paint);
      canvas.addEventListener("mouseup", stopPainting);

      function startPainting(e) {
        painting = true;
        startX = e.clientX - canvas.offsetLeft;
        startY = e.clientY - canvas.offsetTop;
      }

      function paint(e) {
        if (!painting) return;
        endX = e.clientX - canvas.offsetLeft;
        endY = e.clientY - canvas.offsetTop;
      }

      function stopPainting() {
        painting = false;
        ctx.beginPath();
        ctx.moveTo(startX, startY);
        ctx.lineTo(endX, endY);
        ctx.stroke();
      }
    </script>
  </body>
</html>

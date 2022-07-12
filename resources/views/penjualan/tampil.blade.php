<html>
<head>
  <title>Test HTML2PDF</title>
  <style>
@page { margin: 0px; }
body {
  font-family: sans-serif;
  font-size: 10pt;
  margin: 0px;
}
div.cert {
  width: 1122px;
  position: absolute;
  top: 0;
  left: 0;
}
div.cert img {
  width: 100%;
}
div.content {
  position: absolute;
  top: {$this->setup->pdfTopMargin}px;
  left: 0;
  line-height: 1.2em;
  text-align: center;
}
.lg {
  font-size: 20pt;
}
.med {
  font-size: 16pt;
}
.sml {
  font-size: 8pt
}
.bld {
  font-weight: bold;
}
  </style>
</head>
<body>
  <div class="cert">
    <img src="{$bgImage}" alt="" />
  </div>
  {$tpl}
</body>
</html>
ENDHTML;
        set_time_limit(300);
        ini_set('memory_limit', '-1');
        $dompdf = new Dompdf(array('enable_remote' => true));
        $dompdf->setPaper($paperSize, $paperOrientation);
        $dompdf->loadHtml($html);
        $dompdf->render();
        return $dompdf;
    }
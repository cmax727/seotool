<?php 
    function render($file) {
        if (is_file($file)) {
            ob_start();
            include($file);
            $content = ob_get_contents();
            ob_end_clean();
        } else {
            throw new RuntimeException(sprintf('Cant find view file %s!', $file));
        }
        return $content;
    }
    session_start();
    $pdfName = $_SESSION['pdfName'];
    if (!is_file($pdfName.'.pdf')) {
        file_put_contents($pdfName.'.html', render('pdf.php'));
        //$command = "./wkhtmltopdf -T 20 -R 0 -L 0 -B 20 --header-html pdfHeader.html --header-spacing 20 --footer-html pdfHeader.html --footer-spacing 0 --viewport-size 1280x1024 {$pdfName}.html {$pdfName}.pdf";
        if ($_SESSION['logo'] == 'nativerank') {
            $command = "./phantomjs pdf.js {$pdfName}.html {$pdfName}.pdf NativeRank.com \"1 800-520-8850\"";
        } else {
            $command = "./phantomjs pdf.js {$pdfName}.html {$pdfName}.pdf LocalSEO.com \"1 800-520-8850\"";
        }

        exec($command);
    }
    header($_SERVER["SERVER_PROTOCOL"] . " 200 OK");
    header("Cache-Control: public"); // needed for i.e.
    header("Content-Type: application/pdf");
    header("Content-Transfer-Encoding: Binary");
    header("Content-Length:".filesize($pdfName.'.pdf'));
    $url =  parse_url($_SESSION['url']);
        if ($_SESSION['logo'] == 'nativerank') {
            header("Content-Disposition: attachment; filename=\"{$url['host']} NativeRank Analysis.pdf\"");
        } else {
            header("Content-Disposition: attachment; filename=\"{$url['host']} LocalSEO Analysis.pdf\"");
        }
    readfile($pdfName.'.pdf');
    die();
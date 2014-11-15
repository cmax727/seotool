var page = require('webpage').create(),
    system = require('system');

if (system.args.length < 3) {
    console.log('Usage: printheaderfooter.js URL filename');
    phantom.exit(1);
} else {
    var address = system.args[1];
    var output = system.args[2];
    var logo = system.args[3];
    var phone = system.args[4];
    page.viewportSize = { width: 1280, height: 1024 };
    page.paperSize = {
        format: 'A4',
        header: {
            height: "0.5cm",
            contents: phantom.callback(function(pageNum, numPages) {
                return "<html class='en'>"+
                    "<head></head>"+
                    "<body style='margin:0 !important;float:left !important;width:770px; color:#000 !important;background-color: #EBEBEC !important;'>"+
                    "<span style='float:left !important; color: #C90D0D !important; font-weight: 700 !important; font-family: Alef,sans-serif !important;'>"+logo+"</span>"+
                    "<span style='float:right !important; color: #C90D0D !important; font-weight: 700 !important; font-family: Alef,sans-serif !important;padding-left: 24px !important;'>"+phone+"</span></body></html>";
            })
        },
        footer: {
            height: "0.5cm",
            contents: phantom.callback(function(pageNum, numPages) {
                return "<html class='en'>"+
                    "<head></head>"+
                    "<body style='margin:0 !important;float:left !important;width:770px; color:#000 !important;background-color: #EBEBEC !important;'>"+
                    "<span style='float:left !important; color: #C90D0D !important; font-weight: 700 !important; font-family: Alef,sans-serif !important;'>"+logo+"</span>"+
                    "<span style='float:right !important; color: #C90D0D !important; font-weight: 700 !important; font-family: Alef,sans-serif !important;padding-left: 24px !important;'>"+phone+"</span></body></html>";
            })
        }
    };
    page.open(address, function (status) {
        if (status !== 'success') {
            console.log('Unable to load the address!');
        } else {                
            window.setTimeout(function () {
                page.render(output);
                phantom.exit();
            }, 200);
        }
    });
}
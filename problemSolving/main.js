$(document).ready(function() {
    console.log('ready!');
    $('.vertText').on('click', function(e) {
        document.getElementById(e.target.id + '_Choice').scrollIntoView({behavior: "smooth"});
        // $('#content').slideToggle(500, function() {
        //    console.log(e.target.id + '_Choice');
            
        //});
    });
});
function sendReq(probNum, var1, var2, var3) {
    $.ajax({
        method: 'POST',
        url: 'server.php',
        data: {
            probNum: probNum,
            var1: var1 || null,
            var2: var2 || null,
            var3: var3 || null,
        },
        success: (res) => {
            console.log(res);
            swal({
                title: res,
                icon: 'success'
            });
        },
        error: (req) => {
            console.log(req.resposeText); 
        }
    });
}
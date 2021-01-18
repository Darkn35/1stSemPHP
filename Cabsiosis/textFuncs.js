var sPage = 0;
$(document).ready(function() {
    let currentDay = new Date();
    let cTime = currentDay.getHours() + ':' + currentDay.getMinutes() + ':' + currentDay.getSeconds();
    $.ajax({
        method: 'POST',
        url: 'main.php',
        data: {
            user: 'guest',
            month: currentDay.getMonth() + 1,
            day: currentDay.getDate(),
            year: currentDay.getFullYear(),
            time: cTime
        },
        success: function(data) {
            console.log(data);
        }
    })
   
    var changePage = new CustomEvent('changePage');
    let enabled = true;
    let isBgOn = true;
    let mainTitle = '';
    let name = '';
    let desc = '';
    let ach = '';
    let pf = '';
    let imgOpacity = '';
    $('html').on('mousewheel DOMMouseScroll wheel', function(e) {
        if (enabled) {
            if (typeof e.originalEvent.detail == 'number' && e.originalEvent.detail !== 0) {
                if (e.originalEvent.detail > 0) { sPage += 1; }
                else { sPage -= 1; }
                coolDown();
            }
            else if (typeof e.originalEvent.wheelDelta == 'number') {
                if (e.originalEvent.wheelDelta < 0) { sPage += 1; }
                else { sPage -= 1; }
                coolDown();
            }
        }
    });
    function coolDown() {
        enabled = false;

        if (sPage > 4) { sPage = 0; }
        else if (sPage < 0) { sPage = 4; }

        $('#forms').css('display', 'none');
        window.dispatchEvent(changePage);
        switch(sPage) {
            case 0:
                mainTitle = 'Welcome to our Site';
                $('#sceneBG').fadeIn(250);
                $('#descLeft').slideUp();
                $('#descRight').slideUp();
                imgOpacity = '0';
                pf = '';
                name = '';
                desc = '';
                ach = ''
                break;
            case 1:
                mainTitle = 'JP Sio';
                imgOpacity = '1';
                pf = 'pics/jpPic.jpg';
                name = 'JP Sio';
                desc = 'Photographer';
                ach = "I'm a photographer and videographer that is currently studying in CIIT SHS. I've worked with brands and businesses that are satisfied with my work."
                break;
            case 2:
                mainTitle = 'Ron Sison';
                pf = 'pics/ronPic.jpg';
                name = 'Ron Sison';
                desc = 'Game Developer';
                ach = "I'm a grade 12 student at CIIT SHS, studying programming since I aspire to create games that people will enjoy. I know the basics of C++, C#, Java and Unity, I also know how to make websites."
                break;
            case 3:
                mainTitle = 'Jans Caballegan';
                pf = 'pics/jansPic.jpg';
                name = 'Jans Caballegan';
                desc = 'Web App Developer';
                ach = "I'm a Node.JS Web App Dev in ElectronJS and also do 3D Modelling using Blender. I am currently studying Laravel, React, Vue, ASP.Net. I aspire to be a Full Stack Web Dev in the future.";
                break;
            case 4:
                mainTitle = 'Dashboard';
                $('#sceneBG').fadeIn(250);
                $('#descLeft').slideUp();
                $('#descRight').slideUp();
                $('#forms').css('display', 'grid');
                imgOpacity = '0';
                pf = '';
                name = '';
                desc = '';
                ach = ''
                break;
                
        }
        $('#text').html(mainTitle);
        $('#pf').css('opacity', imgOpacity);
        $('#pf').attr('src', pf);
        $('#name').html(name);
        $('#desc').html(desc);
        $('#ach').html(ach);
        setTimeout(function(){ enabled = true; }, 1000);
    }

    function changeBG() {
        $('#sceneBG').fadeToggle(250);
        $('#descLeft').toggle('slide', function() {
            $('#descRight').toggle('slide');
        });
    }

    $('#username').on('click', function() { console.log('!'); })
    window.addEventListener('bgEvent', changeBG);
});
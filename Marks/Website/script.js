function OpenDoc()
    {
        if (confirm("Вы хотите отправить отзыв?"))
            {
                location.replace("feedback.php");
            }
    }
    
function MainPage()
    {
        if (confirm("Вы хотите вернуться на главную?"))
            {
                location.assign("Stamps.php");
            }
    }

function GoBack()
    {
        if (confirm("Вы хотите вернуться на предыдущую страницу?"))
            {
                history.back();
            }
    }     
    
function WinOpen(obj)
    {
        var NewWindow=window.open('','NewWindow');
        var hstr="<html><head><title>Обратная связь</title><style type=\"text/css\">@import: url(\"style.css\");</style><script type=\"text/javascript\" src=\"script.js\"></script></head><body>";
        NewWindow.document.writeln(hstr);
        NewWindow.document.writeln("<h2>Ваше сообщение: </h2>");
        NewWindow.document.writeln("<div>Имя: " + obj.name.value + "</div>" + "<div>Почта: " + obj.email.value + "</div>" + "<div>Комментарий: " + obj.comment.value + "</div><br/>");
        NewWindow.document.writeln("<button type=\"button\" class=\"btn btn-light\" onClick=\"javascript:void(0); OpenDoc();\">Отправить</button>");
        var fstr="</body></html>";
        NewWindow.document.writeln(fstr);
    }

var p1=310;
var sp1=10;

$(function()
    {

        $('.a1').hide().fadeIn(3000);
        
        $('.slide').hide().slideDown(3000);
        
    });
        
    $(function()
    {
        $('.img1').fadeOut(3000, function()
        {
            $('.img1').attr('src', 'img2.jpg').fadeIn(1000);
            
            $('.img1').fadeOut(3000, function()
            {
            
                $('.img1').attr('src', 'img3.jpg').fadeIn(1000);
                
                $('.img1').fadeOut(3000, function()
                {
                
                    $('.img1').attr('src', 'img4.jpg').fadeIn(1000);
                    
                    $('.img1').fadeOut(3000, function()
                    {
                        $('.img1').attr('src', 'img1.jpg').fadeIn(1000);
                    });
                });
            });
        });
    });

    $( document ).ready(function(){
    $("button").click(function(){ // задаем функцию при нажатиии на элемент <button>
	    $("p").filter(".contacts").html('tokiyashi000@gmail.com'); // устанавливаем новое содержимое элементов <p>
	  });
    });

$(function(){!function(){var brainvest={init:function(){this.firstaccess(),this.menu(),this.setDate(),this.toTop(".toTop"),this.carrossel(),this.navgComoinvestir(1,$()),this.nicescroll(),this.fullscreen(),this.rszWindow()},firstaccess:function(){var _host=location.hostname.indexOf("brainvest")>-1?location.hostname+"/":location.hostname+"/brainvest/",_path=location.pathname.substring(location.pathname.lastIndexOf("/"));$("main.inicial ul li a, main header nav.s_language a").click(function(e){$.cookie("language",$(this).attr("lang"),{expires:15,path:"/"}),window.location.href="http://"+_host+$.cookie("language")+_path}),void 0!=$.cookie("language")&&"undefined"!=$.cookie("language")&&$("main.inicial").length>0&&(window.location.href="http://"+_host+$.cookie("language")+"/")},loadJson:function(){$.ajax({url:"js/"+$.cookie("language")+".js",dataType:"json",success:function(json){console.log("Foi "+json[0].home.highlight),brainvest.loadJsonContent()},error:function(r){console.log("Deu Erro")}})},loadJsonContent:function(argument){},fullscreen:function(){"true"==$.cookie("fullscreen")?$("html").addClass("full"):$("html").removeClass("full"),$("section.carrossel > div").lenght>0&&($("section.carrossel > div").data("owlCarousel").destroy(),setTimeout(function(){brainvest.carrossel()},500))},setDate:function(){var _lng=$("html").attr("lang");switch(_lng){case"pt-br":$("main section.comoInvestir ul li span.as").html("dados de "+brainvest.currDate());break;case"en":$("main section.comoInvestir ul li span.as").html("as of "+brainvest.currDate());break;case"fr":$("main section.comoInvestir ul li span.as").html("informations de  "+brainvest.currDate());break;default:$("main section.comoInvestir ul li span.as").html("from "+brainvest.currDate())}},menu:function(){var _c;$("main header nav.menu a").unbind("click").unbind("hover").click(function(){if($(this).hasClass("s_fullscreen")&&($("html").hasClass("full")?($("html").removeClass("full"),$.cookie("fullscreen",!1,{expires:1,path:"/"})):($("html").addClass("full"),$.cookie("fullscreen",!0,{expires:1,path:"/"})),$("section.carrossel > div").data("owlCarousel").destroy(),setTimeout(function(){brainvest.carrossel()},500)),$(window).width()<=600){if($("main header nav.s_menu, main header nav.s_language, main header nav.s_navg, main header nav.s_acesso").hide(),$(this).hasClass("active"))return void $(this).removeClass("active");$("main header nav a").removeClass("active"),$(this).addClass("active"),$("main header nav."+$(this).attr("data-menu")).show()}}).hover(function(){$(window).width()>600&&(clearInterval(_c),$("main header nav.s_menu, main header nav.s_language, main header nav.s_navg, main header nav.s_acesso").hide(),$("main header nav a").removeClass("active"),$("main header nav."+$(this).attr("data-menu")).show(),$(this).addClass("active"))},function(){$(window).width()>600&&(_c=setInterval(function(){$("main header nav a").removeClass("active"),$("main header nav.s_menu, main header nav.s_language, main header nav.s_navg, main header nav.s_acesso").hide()},500))}),$("main header nav").not(".menu").hover(function(){$(this).find("a").hover(function(){$(this).addClass("active")},function(){$(this).removeClass("active")}),$(window).width()>600&&clearInterval(_c)},function(){$(window).width()>600&&(_c=setTimeout(function(){$("main header nav.s_menu, main header nav.s_language, main header nav.s_navg, main header nav.s_acesso").hide(),$("main header nav a").removeClass("active")},500))})},toTop:function(elem){var offset=1,duration=500;jQuery(window).scroll(function(){$("body main").attr("id")||(jQuery(this).scrollTop()>offset?$("body main").addClass("internal"):$("body main").removeClass("internal"))}),jQuery(elem).click(function(event){return event.preventDefault(),jQuery("html, body").animate({scrollTop:0},duration),!1})},carrossel:function(){var owl=$("section.carrossel > div");return owl.owlCarousel({autoplay:!0,smartSpeed:600,loop:!0,margin:0,nav:!1,responsive:{0:{items:1},600:{items:1},1e3:{items:1}}}),owl.length?void owl.owlCarousel({slideSpeed:1500,paginationSpeed:1e3,singleItem:!0,autoPlay:4e3}):-1},navgComoinvestir:function(p,b){var _curr=p;if(b.hide(),_curr>0){var els=$("main.internal#como-investir section.passos article");els.hide();var total=els.length,curr=els.parent().find("#passo-0"+p);total>0&&total>=_curr&&curr.fadeIn("fast",function(){1==_curr?$("main.internal#como-investir section.passos > nav a:first-child").hide():$("main.internal#como-investir section.passos > nav a:first-child").show(),total>_curr?$("main.internal#como-investir section.passos > nav a:last-child").show():$("main.internal#como-investir section.passos > nav a:last-child").hide()})}$("main.internal#como-investir section.passos > nav a:first-child").click(function(){_curr--,brainvest.navgComoinvestir(_curr,$(this))}),$("main.internal#como-investir section.passos > nav a:last-child").click(function(){_curr++,brainvest.navgComoinvestir(_curr,$(this))}),$("main.internal#como-investir section.passos article.passo-04 aside > div > p a").click(function(){$(this).parent().next("div").fadeIn("fast",function(){$(this).find(">a").click(function(){$(this).parent().fadeOut("fast")})})}),$("main.internal#como-investir section.passos article.passo-05 aside > div:first-child a").click(function(){$(this).next("div").fadeIn("fast",function(){$(this).find(">a").click(function(){$(this).parent().fadeOut("fast")})})})},nicescroll:function(){var _el=$("main.internal#time section.quem-e > div.team dl dd p");_el.length>0&&$(window).width()>1024&&_el.niceScroll({styler:"fb",cursorwidth:"3px",cursorcolor:"#4c5246",cursorborderradius:"0px",background:"#c8c1b9",scrollspeed:100})},rszWindow:function(){$(window).resize(function(){$(window).width()<1024||brainvest.fullscreen(),$("main header nav.s_menu, main header nav.s_language, main header nav.s_navg, main header nav.s_acesso").hide(),$("main header nav a").removeClass("active"),brainvest.menu()})},currDate:function(){var today=new Date,dd=today.getDate(),mm=today.getMonth()+1,yyyy=today.getFullYear();return 10>dd&&(dd="0"+dd),10>mm&&(mm="0"+mm),today=dd+"/"+mm+"/"+yyyy}};brainvest.init()}()});
$(function(){!function(){var validateEmail=function(email){var re=/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;return re.test(email)},validateInput=function(val){var re=/^[^]+$/;return re.test(val)},brainvest={init:function(){this.firstaccess(),this.menu(),this.setDate(),this.toTop(".toTop"),this.carrossel(),this.navgComoinvestir(1,$()),this.fullscreen(),this.rszWindow()},firstaccess:function(){var _host=location.hostname.indexOf("brainvest")>-1?location.hostname+"/":location.hostname+":8080/edsa-brainvest/",_path=location.pathname.substring(location.pathname.lastIndexOf("/")),_beta=location.pathname.indexOf("beta")>-1?"beta/":"";$("main.inicial ul li a, main header nav.s_language a").click(function(e){$.cookie("lang",$(this).attr("lang"),{expires:15,path:"/"}),window.location.href="http://"+_host+_beta+$.cookie("lang")+_path}),void 0!=$.cookie("lang")&&"undefined"!=$.cookie("lang")&&$("main.inicial").length>0&&(window.location.href="http://"+_host+$.cookie("lang")+"/")},loadJson:function(){$.ajax({url:"../js/"+$.cookie("lang")+".js",dataType:"json",success:function(json){console.log("Foi "+json[0].home.highlight),brainvest.loadJsonContent()},error:function(r){console.log("Deu Erro")}})},loadJsonContent:function(argument){},fullscreen:function(){"true"==$.cookie("fullscreen")?$("html").addClass("full"):$("html").removeClass("full"),$("section.carrossel > div").lenght>0&&($("section.carrossel > div").data("owlCarousel").destroy(),setTimeout(function(){brainvest.carrossel()},500))},setDate:function(){var _lng=$("html").attr("lang");switch(_lng){case"pt-br":$("main section.comoInvestir ul li span.as").html("dados de "+brainvest.currDate());break;case"en":$("main section.comoInvestir ul li span.as").html("as of "+brainvest.currDate());break;case"fr":$("main section.comoInvestir ul li span.as").html("Au "+brainvest.currDate());break;default:$("main section.comoInvestir ul li span.as").html("desde el "+brainvest.currDate())}},menu:function(){var _c;$("main header nav.menu a").unbind("click").unbind("hover").click(function(){if($(this).hasClass("s_fullscreen")&&($("html").hasClass("full")?($("html").removeClass("full"),$.cookie("fullscreen",!1,{expires:1,path:"/"})):($("html").addClass("full"),$.cookie("fullscreen",!0,{expires:1,path:"/"})),$("section.carrossel > div").data("owlCarousel").destroy(),setTimeout(function(){brainvest.carrossel()},500)),$(window).width()<=600){if($("main header nav.s_menu, main header nav.s_language, main header nav.s_navg, main header nav.s_acesso").hide(),$(this).hasClass("active"))return void $(this).removeClass("active");$("main header nav a").removeClass("active"),$(this).addClass("active"),$("main header nav."+$(this).attr("data-menu")).show()}}).hover(function(){$(window).width()>600&&(clearInterval(_c),$("main header nav.s_menu, main header nav.s_language, main header nav.s_navg, main header nav.s_acesso").hide(),$("main header nav a").removeClass("active"),$("main header nav."+$(this).attr("data-menu")).show(),$(this).addClass("active"))},function(){$(window).width()>600&&(_c=setInterval(function(){$("main header nav a").removeClass("active"),$("main header nav.s_menu, main header nav.s_language, main header nav.s_navg, main header nav.s_acesso").hide()},500))}),$("main header nav").not(".menu").hover(function(){$(this).find("a").hover(function(){$(this).addClass("active")},function(){$(this).removeClass("active")}),$(window).width()>600&&clearInterval(_c)},function(){$(window).width()>600&&(_c=setTimeout(function(){$("main header nav.s_menu, main header nav.s_language, main header nav.s_navg, main header nav.s_acesso").hide(),$("main header nav a").removeClass("active")},500))}),$("a.restrict").unbind("click").click(function(){$("section.sys").fadeIn(),setTimeout(function(){$("section.carrossel > div").trigger("stop.owl.autoplay")},1e3)}),$("section.sys a.close").unbind("click").click(function(){$("section.sys").fadeOut(function(){$("section.sys form fieldset > em").hide(),setTimeout(function(){$("section.carrossel > div").trigger("play.owl.autoplay")},1e3)})}),_isLogged=$("section.sys form fieldset.logged"),_isLogged.length&&($("a.restrict").click(),brainvest.nicescroll()),brainvest.admActions()},toTop:function(elem){var offset=1,duration=500;jQuery(window).scroll(function(){$("body main").attr("id")||(jQuery(this).scrollTop()>offset?$("body main").addClass("internal"):$("body main").removeClass("internal"))}),jQuery(elem).click(function(event){return event.preventDefault(),jQuery("html, body").animate({scrollTop:0},duration),!1})},carrossel:function(){var owl=$("section.carrossel > div");if(owl.length)return owl.owlCarousel({autoplay:!0,smartSpeed:600,loop:!0,margin:0,nav:!1,responsive:{0:{items:1},600:{items:1},1e3:{items:1}}}),owl.length?void owl.owlCarousel({slideSpeed:1500,paginationSpeed:1e3,singleItem:!0,autoPlay:4e3}):-1},navgComoinvestir:function(p,b){var _curr=p;if(b.hide(),_curr>0){var els=$("main.internal#como-investir section.passos article");els.hide();var total=els.length,curr=els.parent().find("#passo-0"+p);total>0&&total>=_curr&&curr.fadeIn("fast",function(){1==_curr?$("main.internal#como-investir section.passos > nav a:first-child").hide():$("main.internal#como-investir section.passos > nav a:first-child").show(),total>_curr?$("main.internal#como-investir section.passos > nav a:last-child").show():$("main.internal#como-investir section.passos > nav a:last-child").hide()})}$("main.internal#como-investir section.passos > nav a:first-child").click(function(){_curr--,brainvest.navgComoinvestir(_curr,$(this))}),$("main.internal#como-investir section.passos > nav a:last-child").click(function(){_curr++,brainvest.navgComoinvestir(_curr,$(this))}),$("main.internal#como-investir section.passos article.passo-04 aside > div > p a").click(function(){$(this).parent().next("div").fadeIn("fast",function(){$(this).find(">a").click(function(){$(this).parent().fadeOut("fast")})})}),$("main.internal#como-investir section.passos article.passo-05 aside > div:first-child a").click(function(){$(this).next("div").fadeIn("fast",function(){$(this).find(">a").click(function(){$(this).parent().fadeOut("fast")})})})},nicescroll:function(){var _el=$("main.internal#time section.quem-e > div.team dl dd p");_el.length>0&&$(window).width()>1024&&_el.niceScroll({styler:"fb",cursorwidth:"3px",cursorcolor:"#4c5246",cursorborderradius:"0px",background:"#c8c1b9",scrollspeed:100});var _elb=$("section.sys form fieldset.logged section article ul");_elb.length>0&&$(window).width()>1024&&_elb.niceScroll({styler:"fb",cursorwidth:"3px",cursorcolor:"#aca495",cursorborder:"px",cursorborderradius:"0px",background:"#f7f5f5",scrollspeed:100})},rszWindow:function(){$(window).resize(function(){$(window).width()<1024||brainvest.fullscreen(),$("main header nav.s_menu, main header nav.s_language, main header nav.s_navg, main header nav.s_acesso").hide(),$("main header nav a").removeClass("active"),brainvest.menu()})},currDate:function(){var today=new Date,dd=today.getDate(),mm=today.getMonth()+1,yyyy=today.getFullYear();return 10>dd&&(dd="0"+dd),10>mm&&(mm="0"+mm),today=dd+"/"+mm+"/"+yyyy},getLogin:function(){var e,p,$form=$("form#system");return e=$("form#system input[name=usr_email]"),p=$("form#system input[name=usr_password]"),validateInput(e.val())?validateEmail(e.val())?validateInput(p.val())?void $form.submit():(alert("Por favor, informe sua senha de acesso."),void p.focus()):(alert(e.val()+" parece não ser um e-mail válido. Tente novamente."),void e.focus()):(alert("Por favor, informe seu e-mail de acesso."),void e.focus())},rememberUser:function(){var e,$form=$("form#system");return e=$("form#system input[name=usr_email]"),validateInput(e.val())?validateEmail(e.val())?($form.find("input[name=formType]").val("remember"),void $form.submit()):(alert(e.val()+" parece não ser um e-mail válido. Tente novamente."),void e.focus()):(alert("Por favor, informe o e-mail cadastrado."),void e.focus())},admActions:function(){var _s;$form=$("form"),_navADM=$("section.sys form fieldset nav.nav-adm a"),_navADM.length>0&&_navADM.hover(function(e){clearTimeout(_s),_navADM.next("ul").addClass("active")},function(e){_s=setTimeout(function(){_navADM.next("ul").removeClass("active")},1e3)}),_nav=$("section.sys form fieldset.logged section nav a"),_li=$("section.sys form fieldset.logged section article ul li"),_li.length>0&&_li.find("a").click(function(e){$(this).closest("ul").hasClass("align")?(_li.removeClass("active"),$(this).parent().addClass("active"),$("input[name=img_align]").val($(this).attr("class")),_nav.eq(1).click()):$(this).hasClass("desc")&&(_li.removeClass("reading").next("div").hide(),$(this).parent().addClass("reading").next("div").show())}),_nav.click(function(e){if(_aClass=$(this).closest("article"),_aClass.hasClass("add-article"))switch(_nav.removeClass("active"),_i=$(this).index(),_i){case 0:$(this).addClass("active").closest("nav").next("textarea").css("display","inline-block").next("pre").hide().next("figure").hide();break;case 1:_img=$(this).closest("form").find("input[name=img_path]").val(),_imgClass=$(this).closest("form").find("input[name=img_align]").val(),_img="<img class='"+_imgClass+"' src='"+_img+"' title='' />",console.log(_imgClass.indexOf("bottom")),_imgClass.indexOf("bottom")>-1?$(this).addClass("active").closest("nav").next("textarea").hide().next("pre").css("display","inline-block").html($(this).closest("nav").next("textarea").val()+" "+_img).next("figure").hide():$(this).addClass("active").closest("nav").next("textarea").hide().next("pre").css("display","inline-block").html(_img+" "+$(this).closest("nav").next("textarea").val()).next("figure").hide();var _elb=$("section.sys form fieldset.logged.admin section article.add-article pre");_elb.length>0&&$(window).width()>1024&&_elb.niceScroll({styler:"fb",cursorwidth:"3px",cursorcolor:"#aca495",cursorborder:"px",cursorborderradius:"0px",background:"#f7f5f5",scrollspeed:100});break;case 2:$(this).addClass("active").closest("nav").next("textarea").hide().next("pre").hide().next("figure").css("display","inline-block")}else _nav.removeClass("active").closest("section").find("article:not(.add-article)").hide(),$(this).addClass("active").closest("section").find("article:not(.add-article)").eq($(this).index()).css("display","inline-block")}),$("input[name=search]").length&&$("input[name=search]").keyup(function(){$(".userlist li").show(),_s=$(this).val(),$(".userlist li").each(function(){-1==$(this).find("span").html().toLowerCase().indexOf(_s)&&$(this).fadeOut("fast")})}),$("input[name=complement]").length&&(_maxl=100,$(".crts").html(_maxl),$("input[name=complement]").keyup(function(){$(".crts").html(eval(_maxl-$(this).val().length))})),$("section.sys form fieldset.logged section article ul.reports li a.desc, section.sys form fieldset.logged section article ul.article li a.desc").click(function(){_t=$(this),_t.closest("ul").hasClass("article")?f="i":f="r",1!=$("input[name=usrtype]").val()&&$.ajax({url:"usr_actions.php?f="+f+"&id="+_t.attr("id")+"&upID="+$("input[name=usrID]").val(),type:"POST",dataType:"html",success:function(data){console.log(data),_t.parent().addClass("read").removeClass("reading")},error:function(r){console.log("error"+r)}})});var o,oList;$("section.sys form fieldset.logged.admin section article.add-file select option").click(function(){o=0,oList=[],$(".btn.delete").removeClass("disabled");$(this).val();$("section.sys form fieldset.logged.admin section article.add-file select option").each(function(){$(this).is(":checked")&&(oList.push($(this).val()),o++)})}),$(".btn.delete").click(function(){if(o>0){var r=confirm("Tem certeza que deseja excluir "+(1==o?"o item selecionado":"os "+o+" itens selecionados"));if(1==r){for(var x=0;x<oList.length;x++)$.ajax({url:"usr_actions.php?f=d&id="+oList[x]+"&upID="+$("input[name=uID]").val(),type:"POST",dataType:"html",success:function(data){console.log($(this).val()+" e "+oList[x])},error:function(r){console.log("error"+r)}});location.reload()}else txt="You pressed Cancel!"}}),$("input[name=allusers]").click(function(e){$(this).is(":checked")?$("select.userstosend option").prop("selected",!0):$("select.userstosend option").prop("selected",!1)}),$(".userlist li span").click(function(e){$(this).prev("input").is(":checked")?$(this).prev("input").prop("checked",!1):$(this).prev("input").prop("checked",!0)}),$("input[name=tabActive]").length&&$("input[name=tabActive]").val()>0?_nav.eq($("input[name=tabActive]").val()).click():(_nav.eq(0).click(),setTimeout(function(){"pt-br"==$("html").attr("lang")&&$("section.carrossel > div").trigger("stop.owl.autoplay")},1e3)),$("a.btn.go").click(function(e){if(e.preventDefault(),$(this).hasClass("login"))brainvest.getLogin();else if($(this).hasClass("remember"))brainvest.rememberUser();else{if($("input[name=file_src]").length&&0===$("input[name=img_path]").val().length)return void alert("Você deve selecionar o arquivo.");if($("input[name=title]").length&&0===$("input[name=title]").val().length)return void alert("Você deve digitar um título para identificar o arquivo.");if($("select.userstosend").length&&!$("select.userstosend").find("option:checked").length)return void alert("Selecione pelos 1 usuário que irá receber o arquivo.");$form.submit()}}),$("a.lnks").click(function(e){e.preventDefault(),$(this).hasClass("remember")?($("form#system input[name=usr_password]").hide(),$(this).removeClass("remember").addClass("back").html("voltar"),$("a.btn.go").removeClass("login").addClass("remember"),$("form#system input[name=usr_email]").focus()):($("form#system input[name=usr_password]").show(),$(this).removeClass("back").addClass("remember").html("não lembro a senha"),$("a.btn.go").removeClass("remember").addClass("login"),$("form#system input[name=usr_email]").focus())}),$("a.trash").click(function(e){e.preventDefault();var r=confirm("Tem certeza que deseja excluir esse item?");1==r&&($form.find("input[name=formType]").val("delete"),$form.prepend('<input type="hidden" name="uID" value="'+$(this).attr("id")+'">'),$form.submit())}),$("input[name=image_src], input[name=file_src]").unbind("click").click(function(){$("input[type=file]").click().unbind("change").change(function(){var _t=$("input[name=type]").val();$(this);if(!(window.File&&window.FileReader&&window.FileList&&window.Blob))return alert("Seu navegador não dá suporte para carregar a imagem. Utilize outro navegador."),!1;if(!$("#file").val())return!1;var fsize=$("#file")[0].files[0].size,ftype=$("#file")[0].files[0].type;if(console.log(fsize),"a"===_t||"i"===_t){switch(ftype){case"application/x-zip-compressed":break;case"application/pdf":break;default:return alert("Tipo de arquivo não suportado.<br>Selecione arquivos com a extensão .zip ou .pdf de até 5MB."),!1}if(fsize>5242880)return alert("O arquivo selecionado ultrapassa o tamanho permitido.<br>Selecione um arquivo de até 5MB."),!1}else{switch(ftype){case"image/jpg":break;case"image/jpeg":break;case"image/png":break;case"image/gif":break;default:return alert("Tipo de arquivo não suportado.<br>Selecione arquivos com a extensão .jpg/jpeg, png ou .gif de até 500KB."),!1}if(fsize>524288)return alert("O arquivo selecionado ultrapassa o tamanho permitido.<br>Selecione um arquivo de até 500KB."),!1}"r"===_t?($("figure").html("<p>Aguarde, o seu arquivo está sendo carregado.</p>"),_nav.eq(2).click()):$("section.sys form fieldset.logged.admin section article.add-file p.loading").show(),$form.attr("enctype","multipart/form-data").attr("action","ajax_php_file.php").on("submit",function(e){e.preventDefault();var file_data=$("#file").prop("files")[0],form_data=new FormData;form_data.append("file",file_data),form_data.append("type",_t),console.log(form_data),$.ajax({type:"POST",url:$(this).attr("action"),dataType:"text",data:form_data,cache:!1,contentType:!1,processData:!1,success:function(data){console.log("success: "+data),"r"===_t?$("figure").html('<img src="'+data+'" title="" />'):($("section.sys form fieldset.logged.admin section article.add-file p.loading").hide(),$("section.sys form fieldset.logged.admin section article.add-file input[name=title]").css("display","inline-block"),$("section.sys form fieldset.logged.admin section article.add-file label, section.sys form fieldset.logged.admin section article.add-file select, section.sys form fieldset.logged.admin section article.add-file em").css("display","block"),$(".btn.go.send").show()),$("input[name=image_src], input[name=file_src], input[name=img_path]").val(data),$form.removeAttr("enctype").attr("action","sys_action.php")},error:function(data){console.log("error"+data),$("figure").html("<p>Houve algum erro. Tente novamente.</p>")}})}),$form.submit().unbind("submit")})}),$("input[name=date]").length>0&&$("input[name=date]").mask("00/00/0000"),void 0==$(".add-file input[name=title]").attr("display")}};brainvest.init()}()});
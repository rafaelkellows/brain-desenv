$(function(){ 
	(function() {
		var validateEmail = function(email){
		  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		  return re.test(email);
		}
		var validateInput = function(val){
		  var re = /^[^]+$/;
		  return re.test(val);
		};

		var brainvest = {
	        init: function() {
	        this.firstaccess();
	        //this.loadJson();
            this.menu();
            this.setDate();
            this.toTop('.toTop');
            this.carrossel();
            this.navgComoinvestir(1,$());
            this.fullscreen();
            this.rszWindow();
	        },
	        firstaccess : function(){
	        	var _host = (location.hostname.indexOf('brainvest') > -1) ? location.hostname+'/' : location.hostname+':8080/edsa-brainvest/' ;
	        	var _path = location.pathname.substring(location.pathname.lastIndexOf('/'));
	        	var _beta = (location.pathname.indexOf('beta') > -1) ? 'beta/' : '' ;
	        	
	        	//Click Event
	        	$('main.inicial ul li a, main header nav.s_language a').click(function(e){
					$.cookie("lang", $(this).attr('lang'), {expires:15, path:"/"});
		        	window.location.href = 'http://'+_host+_beta+$.cookie('lang') +_path;
	        	});
				//Redirect Event
		        if( $.cookie('lang') != undefined && $.cookie('lang') != "undefined" && $('main.inicial').length > 0){
		        	//console.log('asdas');
		        	window.location.href = 'http://'+_host+$.cookie('lang') +'/';
			        //window.location.href = 'http://'+_host+'pt_br/';
					//$.cookie("lang", 'pt_br', {expires:15, path:"/"});
		        }
	        },
	        loadJson : function () {
	        	//if(!$.cookie("lang")) return;
				$.ajax({
					url : '../js/'+$.cookie("lang")+'.js',
					dataType : 'json',
					success : function(json) { 
						console.log('Foi ' + json[0].home.highlight);
						brainvest.loadJsonContent();
					},
					error : function(r) { 
						console.log('Deu Erro');
					}
				});
	        },
	        loadJsonContent : function (argument) {
	        	
	        },
	        fullscreen : function(){
	            if( $.cookie('fullscreen') == "true" ){
	            	$('html').addClass('full');
	            }else{
	            	$('html').removeClass('full');
	            }
	            if( $("section.carrossel > div").lenght > 0 ){
					$("section.carrossel > div").data('owlCarousel').destroy();
					setTimeout(function(){brainvest.carrossel();},500);
				}
	        },
	        setDate : function(){
	        	var _lng = $('html').attr('lang'); 
				switch (_lng)
				{
                 case "pt-br":
             		$('main section.comoInvestir ul li span.as').html( 'dados de '+ brainvest.currDate() );
                    break;
                 case "en":
             		$('main section.comoInvestir ul li span.as').html( 'as of '+ brainvest.currDate() );
                    break;
                 case "fr":
             		$('main section.comoInvestir ul li span.as').html( 'Au '+ brainvest.currDate() );
                    break;
                 default:
             		$('main section.comoInvestir ul li span.as').html( 'desde el '+ brainvest.currDate() );
                    break;
             }
	        },
	        menu: function() {
        		var _opnd, _c;
	        	$('main header nav.menu a').unbind('click').unbind('hover').click(function(){
	        		//To Full Screen Mode
	        		if($(this).hasClass('s_fullscreen')){
	        			if( $('html').hasClass('full') ){
	        				$('html').removeClass('full');
	        				$.cookie("fullscreen", false, {expires:1, path:"/"});
	        			}else{
	        				$('html').addClass('full');
	        				$.cookie("fullscreen", true, {expires:1, path:"/"});
	        			}
						$("section.carrossel > div").data('owlCarousel').destroy();
						setTimeout(function(){brainvest.carrossel();},500);
	        		}
	        		// less than 600 pixels width
	        		if( $(window).width() <= 600 ){
	        			$('main header nav.s_menu, main header nav.s_language, main header nav.s_navg, main header nav.s_acesso').hide();
	        			
	        			if( $(this).hasClass('active') ){
			        		$(this).removeClass('active');
			        		return;
		        		}else{
			        		$('main header nav a').removeClass('active');
			        		$(this).addClass('active');
							$('main header nav.'+$(this).attr('data-menu')).show();
		        		}
	        		}
	        	}).hover(
	        		function(){	        			
	        			if( $(window).width() > 600 ){
		        			clearInterval(_c);
		        			$('main header nav.s_menu, main header nav.s_language, main header nav.s_navg, main header nav.s_acesso').hide();
			        		$('main header nav a').removeClass('active');
		        			$('main header nav.'+$(this).attr('data-menu')).show();
	        				$(this).addClass('active');
        				}
	        		},
	        		function(){
	        			if( $(window).width() > 600 ){
		        			_c = setInterval(function(){
				        		$('main header nav a').removeClass('active');
		        				$('main header nav.s_menu, main header nav.s_language, main header nav.s_navg, main header nav.s_acesso').hide();
		        			}, 500);
	        			}
	        		}
	        	);
	        	$('main header nav').not('.menu').hover(
	        		function(){ 
	        			$(this).find('a').hover(function(){$(this).addClass('active');},function(){$(this).removeClass('active');})
	        			if( $(window).width() > 600 ){
	        				clearInterval(_c);
	        			}
	        		},
	        		function(){
	        			if( $(window).width() > 600 ){
		        			_c = setTimeout(function(){
		        				$('main header nav.s_menu, main header nav.s_language, main header nav.s_navg, main header nav.s_acesso').hide();
								$('main header nav a').removeClass('active');
		        			}, 500);
	        			}
	        		}
	        	);
	        	// ADM Acess

	        	$('a.restrict').unbind('click').click(function(){
	        		$("section.sys").fadeIn();
					setTimeout(function(){
						$('section.carrossel > div').trigger('stop.owl.autoplay');           
					},1000)
	        	});
    			$("section.sys a.close").unbind('click').click(function(){
    				$("section.sys").fadeOut(function(){
    					$('section.sys form fieldset > em').hide();
						setTimeout(function(){
							$('section.carrossel > div').trigger('play.owl.autoplay');           
						},1000)
    				});
    			});
	        	_isLogged = $("section.sys form fieldset.logged");
	        	if(_isLogged.length){
		        	$('a.restrict').click();
		        	brainvest.nicescroll();
	        	};
	        	brainvest.admActions();
	        },
	        toTop : function(elem){
		        var offset = 1;
		        var duration = 500;
		        jQuery(window).scroll(function() {
					if( !$('body main').attr('id') ){ //&& $(window).width() > 1024 
						if (jQuery(this).scrollTop() > offset) {
							$('body main').addClass('internal');
						} else {
							$('body main').removeClass('internal');
						}
					}
				});
		        jQuery(elem).click(function(event) {
					event.preventDefault();
					jQuery('html, body').animate({scrollTop: 0}, duration);
					return false;
		        })
	        },
	        carrossel: function() {
				var owl = $("section.carrossel > div"); 
				if(!owl.length) return;
				owl.owlCarousel({
					autoplay:true,
					smartSpeed: 600,
				    loop:true,
				    margin:0,
				    nav:false,
				    responsive:{
				        0:{
				            items:1
				        },
				        600:{
				            items:1
				        },
				        1000:{
				            items:1
				        }
				    }
				})
				if(!owl.length) return -1;
				owl.owlCarousel({
					slideSpeed : 1500,
					paginationSpeed : 1000,
					singleItem:true,
					autoPlay:4000
				}); 
	        },
	        navgComoinvestir : function(p,b){
	        	var _curr = p;
	        	b.hide();
	        	if(_curr > 0){
	        		var els = $('main.internal#como-investir section.passos article');
						els.hide();
	        		var total = els.length;
	        		var curr = els.parent().find('#passo-0'+p);
	        		if(total > 0  && _curr <= total){
	        			curr.fadeIn('fast', function(){ 
		        			( _curr == 1 ) ? $('main.internal#como-investir section.passos > nav a:first-child').hide() : $('main.internal#como-investir section.passos > nav a:first-child').show();
		        			( _curr < total ) ? $('main.internal#como-investir section.passos > nav a:last-child').show() : $('main.internal#como-investir section.passos > nav a:last-child').hide();
	        			});
	        		}
	        	}
	        	
	        	//Click Event
	        	$('main.internal#como-investir section.passos > nav a:first-child').click(function(){
	        		_curr--;
	        		brainvest.navgComoinvestir(_curr, $(this));
	        	});
	        	$('main.internal#como-investir section.passos > nav a:last-child').click(function(){
	        		_curr++;
	        		brainvest.navgComoinvestir(_curr, $(this));
	        	});

	        	//Close Button - Passo 04
	        	$('main.internal#como-investir section.passos article.passo-04 aside > div > p a').click(function(){
	        		$(this).parent().next('div').fadeIn('fast', function(){
						$(this).find('>a').click(function(){
		        			$(this).parent().fadeOut('fast');
		        		});
	        		});
	        	});
	        	//Close Button - Passo 05
	        	$('main.internal#como-investir section.passos article.passo-05 aside > div:first-child a').click(function(){
	        		$(this).next('div').fadeIn('fast', function(){
						$(this).find('>a').click(function(){
		        			$(this).parent().fadeOut('fast');
		        		});
	        		});
	        	});
	        },
	        nicescroll : function(){
			    var _el = $("main.internal#time section.quem-e > div.team dl dd p");
		    	if(_el.length > 0 && $(window).width() > 1024){
				    _el.niceScroll({
				      styler:"fb", 
				      cursorwidth: "3px",
				      cursorcolor:"#4c5246",
				      cursorborderradius: "0px",
				      background: "#c8c1b9",
				      scrollspeed: 100
				    });
				}
			    var _elb = $("section.sys form fieldset.logged section article ul");
		    	if(_elb.length > 0 && $(window).width() > 1024){
				    _elb.niceScroll({
				      styler:"fb", 
				      cursorwidth: "3px",
				      cursorcolor:"#aca495",
				      cursorborder: "px",
				      cursorborderradius: "0px",
				      background: "#f7f5f5",
				      scrollspeed: 100
				    });
				}
	        },
	        rszWindow : function () {
				$(window).resize(function() {
					if ($(window).width() < 1024){
						//$('html').removeClass('full').find('main').removeClass('internal');
						//$('html main').removeClass('internal');
					}else{
						brainvest.fullscreen();
					}
		        	$('main header nav.s_menu, main header nav.s_language, main header nav.s_navg, main header nav.s_acesso').hide();
					$('main header nav a').removeClass('active');
					brainvest.menu();
				});
	        },
	        currDate : function(){
				var today = new Date();
				var dd = today.getDate();
				var mm = today.getMonth()+1; //January is 0!
				var yyyy = today.getFullYear();
				if(dd<10) { dd='0'+dd } 
				if(mm<10) { mm='0'+mm } 
				today = dd+'/'+mm+'/'+yyyy;
				return today;
	        },
	        getLogin : function(){
				var $form = $('form#system'), e, p;
	        	e = $('form#system input[name=usr_email]'), p = $('form#system input[name=usr_password]');
					
				if( !validateInput(e.val()) ){
					alert("Por favor, informe seu e-mail de acesso.");
					e.focus();
					return;
				}
				if( !validateEmail(e.val()) ){
					alert(e.val()+ " parece não ser um e-mail válido. Tente novamente.");
					e.focus();
					return;
				}
				if( !validateInput(p.val()) ){
					alert("Por favor, informe sua senha de acesso.");
					p.focus();
					return;
				}
				$form.submit();
	        },
	        rememberUser : function(){
				var $form = $('form#system'), e;
	        	e = $('form#system input[name=usr_email]');

				if( !validateInput(e.val()) ){
					alert("Por favor, informe o e-mail cadastrado.");
					e.focus();
					return;
				}
				if( !validateEmail(e.val()) ){
					alert(e.val()+ " parece não ser um e-mail válido. Tente novamente.");
					e.focus();
					return;
				}
				$form.find('input[name=formType]').val('remember');
				$form.submit();
	        },
	        admActions : function(){
	        	var _s;
	        	$form = $('form');
	        	_navADM = $('section.sys form fieldset nav.nav-adm a');
	        	if(_navADM.length > 0){
	        		_navADM.hover(
	        			function(e){
	        				clearTimeout(_s);
	        				_navADM.next('ul').addClass('active');
	        			},
	        			function(e){
	        				_s = setTimeout(
	        					function(){ _navADM.next('ul').removeClass('active'); }
	        				,1000)
	        			}
	        		)
	        	};
	        	// TABS
	        	_nav = $('section.sys form fieldset.logged section nav a');
	        	_li = $('section.sys form fieldset.logged section article ul li');
	        	if(_li.length > 0){
					_li.find('a').click(function(e){
						if($(this).closest('ul').hasClass('align')){
							_li.removeClass('active');
							$(this).parent().addClass('active');
							$('input[name=img_align]').val($(this).attr('class'));
							_nav.eq(1).click();
						}else{
							if($(this).hasClass('desc')){
								_li.removeClass('reading').next('div').hide();
								$(this).parent().addClass('reading').next('div').show();
							}
						}
					});
					//_li.eq(0).find('a').click();
	        	}
	        	_nav.click(function(e){
	        		_aClass = $(this).closest('article');
	        		if(_aClass.hasClass('add-article')){
		        		_nav.removeClass('active');
		        		_i = $(this).index();
						switch (_i){
		                 case 0:
			        		$(this).addClass('active').closest('nav').next('textarea').css('display','inline-block').next('pre').hide().next('figure').hide();
		                    break;
		                 case 1:
		                 	_img = $(this).closest('form').find('input[name=img_path]').val();
		                 	_imgClass = $(this).closest('form').find('input[name=img_align]').val();
		                 	_img = "<img class='"+_imgClass+"' src='"+_img+"' title='' />";
		                 	console.log(_imgClass.indexOf('bottom'));
		                 	if(_imgClass.indexOf('bottom')>-1){
				        		$(this).addClass('active').closest('nav').next('textarea').hide().next('pre').css('display','inline-block').html($(this).closest('nav').next('textarea').val()+' '+_img).next('figure').hide();
		                 	}else{
				        		$(this).addClass('active').closest('nav').next('textarea').hide().next('pre').css('display','inline-block').html(_img+' '+$(this).closest('nav').next('textarea').val()).next('figure').hide();
		                 	}
						    var _elb = $("section.sys form fieldset.logged.admin section article.add-article pre");
					    	if(_elb.length > 0 && $(window).width() > 1024){
							    _elb.niceScroll({
							      styler:"fb", 
							      cursorwidth: "3px",
							      cursorcolor:"#aca495",
							      cursorborder: "px",
							      cursorborderradius: "0px",
							      background: "#f7f5f5",
							      scrollspeed: 100
							    });
							}
		                    break;
		                 case 2:
			        		$(this).addClass('active').closest('nav').next('textarea').hide().next('pre').hide().next('figure').css('display','inline-block');
		                    break;
		             	}
	        		}else{	
		        		_nav.removeClass('active').closest('section').find('article:not(.add-article)').hide();
		        		$(this).addClass('active').closest('section').find('article:not(.add-article)').eq($(this).index()).css('display','inline-block');
	        		}
	        	});
	        	if( $('input[name=search]').length ){

	        		$('input[name=search]').keyup(function(){
			        	//if( $('input[name=search]').val().length > 3){
			        		$('.userlist li').show();
			        		_s = $(this).val();      			
			        		$('.userlist li').each(function(){
			        			if( $(this).find('span').html().toLowerCase().indexOf(_s) == -1 ){
			        				$(this).fadeOut('fast');
			        			}
			        		});
			        	//}
	        		});
	    		}
	        	if( $('input[name=complement]').length ){
	        		_maxl = 100; 
					$('.crts').html(_maxl);
					$('input[name=complement]').keyup(function(){
						//console.log( eval(_maxl - $(this).val().length) );
						$('.crts').html(eval(_maxl - $(this).val().length));
					});
	        	}
	    		
	        	$('section.sys form fieldset.logged section article ul.reports li a.desc, section.sys form fieldset.logged section article ul.article li a.desc').click(function(){
	        		_t = $(this);
	        		if (_t.closest('ul').hasClass('article')){
	        			f = 'i';
	        		}else{
						f = 'r';
	        		}
	        		if( $('input[name=usrtype]').val()==1) return;
					$.ajax({
						url : 'usr_actions.php?f='+f+'&id='+_t.attr('id')+'&upID='+$('input[name=usrID]').val(),
						type:'POST',
						dataType : 'html',	
						success : function(data) {
							console.log(data);
							_t.parent().addClass('read').removeClass('reading');
						},
						error : function(r) { 
						    console.log('error'+r);
						}
					});
	        	});

        		var o,oList;
	        	$('section.sys form fieldset.logged.admin section article.add-file select option').click(function(){
	        		o=0;oList=[];
	        		$(".btn.delete").removeClass('disabled');
	        		var val = $(this).val();
	        		$('section.sys form fieldset.logged.admin section article.add-file select option').each(function(){
						if($(this).is(':checked') ){
			        		oList.push($(this).val());
							o++;
						}
	        		});
	        	});
				$(".btn.delete").click(function(){
					if( o>0 ){
						var r = confirm("Tem certeza que deseja excluir "+((o==1) ? "o item selecionado" : "os "+ o +" itens selecionados" ));
						if (r == true) {
						    for(var x=0; x < oList.length; x++){
								$.ajax({
									url : 'usr_actions.php?f=d&id='+oList[x]+'&upID='+$('input[name=uID]').val(),
									type:'POST',
									dataType : 'html',	
									success : function(data) {
										console.log( $(this).val() +' e '+ oList[x]);
									},
									error : function(r) { 
									    console.log('error'+r);
									}
								});
						    }
						    location.reload();
						} else {
						    txt = "You pressed Cancel!";
					}
					}
				});
				$('input[name=allusers]').click(function(e){
					if($(this).is(':checked') ){
						$('select.userstosend option').prop('selected', true);
					}else{
						$('select.userstosend option').prop('selected', false);
					}
				});
				$('.userlist li span').click(function(e){
					if( $(this).prev('input').is(':checked') ){
						$(this).prev('input').prop('checked', false);
					}else{
						$(this).prev('input').prop('checked', true);
					}
				});

				if( $('input[name=tabActive]').length && $('input[name=tabActive]').val() > 0 ){
		        	_nav.eq($('input[name=tabActive]').val()).click();
	    		}else{
		        	_nav.eq(0).click();
					setTimeout(function(){
						if( $('html').attr('lang') == "pt-br"){
							$('section.carrossel > div').trigger('stop.owl.autoplay');           
						}
					},1000)
	    		}

	        	$('a.btn.go').click(function(e){
	        		e.preventDefault();
	        		if($(this).hasClass('login')){
	        			brainvest.getLogin();
	        		}else{
	        			if($(this).hasClass('remember')){
	        				brainvest.rememberUser();
	        			}else{
	        				if($('input[name=file_src]').length){
								if($('input[name=img_path]').val().length === 0){
	        						alert("Você deve selecionar o arquivo.");
	        						return;
								}
	        				}
	        				if($('input[name=title]').length){
								if($('input[name=title]').val().length === 0){
	        						alert("Você deve digitar um título para identificar o arquivo.");
	        						return;
								}
	        				}
	        				if($('select.userstosend').length){
	        					if(!$('select.userstosend').find('option:checked').length){
	        						alert("Selecione pelos 1 usuário que irá receber o arquivo.");
	        						return;
	        					}
	        				}
	        				$form.submit();
	        			}
	        		}
	        	});
	        	$('a.lnks').click(function(e){
	        		e.preventDefault();
	        		if($(this).hasClass('remember')){
		        		$('form#system input[name=usr_password]').hide();
		        		$(this).removeClass('remember').addClass('back').html('voltar');
		        		$('a.btn.go').removeClass('login').addClass('remember');
						$('form#system input[name=usr_email]').focus();
	        		}else{
		        		$('form#system input[name=usr_password]').show();
		        		$(this).removeClass('back').addClass('remember').html('não lembro a senha');
		        		$('a.btn.go').removeClass('remember').addClass('login');
		        		$('form#system input[name=usr_email]').focus();
	        		}
	        	});
	        	$('a.trash').click(function(e){
	        		e.preventDefault();
					var r = confirm("Tem certeza que deseja excluir esse item?");
					if (r == true) {
						$form.find('input[name=formType]').val('delete');
						$form.prepend('<input type="hidden" name="uID" value="'+$(this).attr('id')+'">');
					    $form.submit();
					} else {
					    return;
					}
	        	})
	        	$('input[name=image_src], input[name=file_src]').unbind('click').click(function(){
	        		$('input[type=file]').click().unbind('change').change(function(){
	        			var _t = $('input[name=type]').val(),
	        				_this = $(this);
					   	if (window.File && window.FileReader && window.FileList && window.Blob){
							//Nenhuma imagem selecionada
							if( !$('#file').val() ){
								return false;
							}
							
							var fsize = $('#file')[0].files[0].size; //get file size
							var ftype = $('#file')[0].files[0].type; // get file type

							console.log(fsize);
							//allow file types 
							if(_t === 'a' || _t === 'i'){
								switch(ftype){
	      							//Compressed
									case 'application/x-zip-compressed':
										break;
									//PDF
									case 'application/pdf':
										break;
						            default:
										alert("Tipo de arquivo não suportado.<br>Selecione arquivos com a extensão .zip ou .pdf de até 5MB.");
										return false;
						        }
								
								//Allowed file size is less than ... |  1 MB = (1.048.576) | 1 (Gb)	1.073.741.824
								if(fsize>5242880){
									alert("O arquivo selecionado ultrapassa o tamanho permitido.<br>Selecione um arquivo de até 5MB.");
									return false;
								}
							}else{
								switch(ftype){
									case 'image/jpg': 
						                break;
									case 'image/jpeg': 
						                break;
									case 'image/png': 
						                break;
									case 'image/gif': 
						                break;
						            default:
										alert("Tipo de arquivo não suportado.<br>Selecione arquivos com a extensão .jpg/jpeg, png ou .gif de até 500KB.");
										return false;
						        }
								
								//Allowed file size is less than ... |  1 MB = (1048576)
								if(fsize>524288){
									alert("O arquivo selecionado ultrapassa o tamanho permitido.<br>Selecione um arquivo de até 500KB.");
									return false;
								}
							}
						}
						else{
							alert("Seu navegador não dá suporte para carregar a imagem. Utilize outro navegador.");
							return false;
						}

		                if(_t==='r'){
							$('figure').html('<p>Aguarde, o seu arquivo está sendo carregado.</p>');
		        			_nav.eq(2).click();
						}else{
							$('section.sys form fieldset.logged.admin section article.add-file p.loading').show();
						}			        	
						$form
							.attr("enctype","multipart/form-data").attr('action','ajax_php_file.php')
							.on('submit',(function(e) {
					        e.preventDefault();
					        var file_data = $('#file').prop('files')[0];   
							var form_data = new FormData();
					        form_data.append('file', file_data);
					        form_data.append('type', _t);
							//alert(form_data);                        
							console.log(form_data);
							//return;
					        $.ajax({
					            type:'POST',
					            url: $(this).attr('action'),
					            dataType: 'text',
					            data:form_data,
					            cache:false,
					            contentType: false,
					            processData: false,
					            success:function(data){
					                console.log("success: "+data);
					                if(_t==='r'){
										$('figure').html('<img src="'+data+'" title="" />');
									}else{
										$('section.sys form fieldset.logged.admin section article.add-file p.loading').hide();
										$('section.sys form fieldset.logged.admin section article.add-file input[name=title]').css('display','inline-block');
										$('section.sys form fieldset.logged.admin section article.add-file label, section.sys form fieldset.logged.admin section article.add-file select, section.sys form fieldset.logged.admin section article.add-file em').css('display','block');
										$('.btn.go.send').show();
									}
									$('input[name=image_src], input[name=file_src], input[name=img_path]').val(data);
									$form.removeAttr("enctype").attr('action','sys_action.php');
					            },
					            error: function(data){
					                console.log("error"+data);
			        				$('figure').html('<p>Houve algum erro. Tente novamente.</p>');
					            }
					        });

					    }));

					    $form.submit().unbind('submit');






	        		});
	        	});
				if($('input[name=date]').length > 0){
					$('input[name=date]').mask('00/00/0000');
				}
	        	

	        	//alert($('.add-user input[name="rnd_password"]').length);
	        	if($('.add-file input[name=title]').attr('display')==undefined){
	        		//$('.btn.go.send').hide();
	        	}
	        }
    	}
		brainvest.init();

	})();
});
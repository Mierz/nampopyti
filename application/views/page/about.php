<!DOCTYPE html>
            <html lang="ru">
            <head>
                    <meta charset="utf-8">
                    <meta name="robots" content="all" />
                    <meta name="revisit-after" content="3 days" />
                    <meta name="description" content="Социальный проект объединяющий попутчиков разных категорий, предоставляющий огромную сеть необходимых Вам маршрутов по всей стране" />
                    <meta name="keywords" content="попутчик, маршрутное такси, найти попутчика, совместные поездки, междугородние перевозки, carpool" />
                    <title>'.$title.' - Нам по пути</title>
                    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
                <script src="/js/bootstrap.min.js"></script>
                    <link href="/css/bootstrap.min.css" rel="stylesheet">
                    <link href="/css/style.css" rel="stylesheet">
            </head>
            <body>

            <div class="container test_main">
                    <div class="row-fluid visible-desktop">
                            <div class="span4">
                                    <a href="/"><img src="/img/logo.png"></a>
                                    <div class="description-text">сервис объединяющий водителей и пассажиров</div>
                            </div>
                            <div class="span3">
                                    &nbsp;
                            </div>
                            <div class="span5" style="margin-top:30px;">			
                                    <div class="pull-right" id="navlink">
                                        </div>
		</div>
                    </div>

                    <div class="row hr">
                    <h3>О сервисе</h3>
                    </div>

                    <div class="row-fluid" style="padding-top:20px;">
                            <div class="span12" style="text-align:justify;">	
                                    <p>Социальный проект <b><a href="/">nampopyti</a></b> создан с целью объединения попутчиков всех категорий. Мгновенное предоставление маршрутов по необходимому Вам направлению не только от частных лиц, а и предприятий которые занимаются регулярными перевозками.</p><p>Каждый день кому-то не хватает билета , каждый день кто-то в пути со свободными местами и желанием разделить не только расходы на дорогу, но и впечатления от поездки. Социальная сеть <b><a href="/">nampopyti.com</a></b> поможет потратив минимум времени извлечь максимум выгоды создав огромную сеть маршрутов по всей стране, где каждый сможет найти свой маршрут!</p><p>Совместные поездки, дадут возможность более комфортно добираться до необходимого пункта назначения разгрузив при этом общественный транспорт, дав возможность развитию carpool и поддержку этой невероятно полезной системы и в нашей стране, позволив тем самым снизить нагрузки на транспортные системы городов, стоимость проезда, ведь это наш воздух и наше время.</p> 
                                    <p>На шоссе должны быть выделенные полосы для машин с пассажирами, более свободными, чем другие. Некоторые компании предоставляют специальные места парковки, а кроме того, с точки зрения коллектива, найти место для одной машины легче, чем для всех машин участников. Социальный проект <b><a href="/">nampopyti.com</a></b> будет активно сотрудничать с такими компаниями, поднимая этот вопрос на уровне законопроектов, развивая в стране новый вид взаимоотношений между попутчиками всех категорий!</p>
                            </div>
                    </div>
                    <div class="hFooter"></div>
            </div>
                <div class="container mrg-bot">
                    <div class="row-fluid visible-desktop">
                            <div class="footer">			
                                    <div class="span3 f-driver-block">
                                    <p><b>Для водителей</b></p>
                                    <p>Наш сервис позволит набрать пассажиров в режиме онлайн разделив не только расходы, а и впечатления от поездки</p>
                                    </div>
                                    <div class="span3 f-pass-block">
                                    <p><b>Для пассажиров</b></p>
                                    <p>Наш сервис поможет найти выезжающий транспорт по необходимому Вам маршруту</p>
                                    </div>
                                    <div class="span3 f-map">
                                    <p><b>Карта сайта:</b></p>
                                    <ul>
                                            <li><a href="/page/about/">О сервисе</a></li>
                                            <li><a href="/page/rules/">Правила пользования сайтом</a></li>
                                            <li><a href="/page/agreement/">Конфиденциальное соглашение</a></li>
                                            <li><a href="/page/contacts/">Контакты</a></li>
                                    </ul>
                                    </div>
                                    <div class="span3 r-bottom">
                                            <div class="mrg-top-logo"><a href="http://nampopyti.com/"><img src="/img/footer-logo.png" alt="Нам по пути" /></a></div>
                                            <p class="social"><b>Мы в социальных сетях:</b></p>
                                            <p><a href="http://vk.com/public57041209" target="_blank"><img src="/img/vk2.png" alt="Мы Вконтакте" /></a></p>
                                    </div>
                            </div>
                    </div>
                    <div class="row-fluid m-top">
                            <div class="copy">
                                    <p>Все права принадлежат <a href="/">nampopyti.com</a> &copy; 2014</p>
                            </div>
                    </div>	
            </div><!-- Login form -->
            <div id="login-form" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3>Авторизация</h3>
              </div>
              <div class="modal-body">
                <h5>Вы можете войти используя стандартную форму:</h5>
                    <form action="/user/login" id="login_form" method="post" >
                    <div class="control-group">
                                    <label class="control-label" for="inputEmail">Почта</label>
                                    <div class="controls">
                                      <input input type="text" name="email" validate="required|email" maxlength="30" id="inputEmail" placeholder="Почта" />
                                    </div>
                              </div>
                              <div class="control-group">
                                    <label class="control-label" for="inputPassword">Пароль</label>
                                    <div class="controls">
                                      <input type="password" name="password" validate="required" maxlength="15" id="inputPassword" placeholder="Пароль" />
                                    </div>
                              </div>
                              <div class="control-group">
                                    <div class="controls">				  
                                      <button type="submit" class="btn">Войти</button>
                                      &nbsp;<a href="/user/lostpassword/">Забыл пароль?</a>
                                    </div>
                              </div>
                    </form>
                    <h5>Или войти через социальные сети:</h5>
                    <a href="/user/auth/vk"><img src="/img/vk.png" alt="Войти через Вконтакте" /></a>
                    <a href="/user/auth/facebook"><img src="/img/facebook.png"  alt="Войти через Facebook" /></a>
              </div>  
            </div>
            <script type="text/javascript">
            (function (d, w, c) {
                (w[c] = w[c] || []).push(function() {
                    try {
                        w.yaCounter22058734 = new Ya.Metrika({id:22058734,
                                webvisor:true,
                                clickmap:true,
                                trackLinks:true,
                                accurateTrackBounce:true});
                    } catch(e) { }
                });

                var n = d.getElementsByTagName("script")[0],
                    s = d.createElement("script"),
                    f = function () { n.parentNode.insertBefore(s, n); };
                s.type = "text/javascript";
                s.async = true;
                s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

                if (w.opera == "[object Opera]") {
                    d.addEventListener("DOMContentLoaded", f, false);
                } else { f(); }
            })(document, window, "yandex_metrika_callbacks");
            </script>
            <noscript><div><img src="//mc.yandex.ru/watch/22058734" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
            <!-- /Yandex.Metrika counter -->	
            </body>
            </html>
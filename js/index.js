/**
 * js for plain
 * plain (https://runtua.cn)
 * @author godme
 * license MIT
 */

// prettier-ignore
var c = document.getElementsByTagName("canvas")[0], x = c.getContext("2d"), pr = window.devicePixelRatio || 1, w = window.innerWidth, h = window.innerHeight, f = 90, q, m = Math, r = 0, u = m.PI * 2, v = m.cos, z = m.random;
c.width = w * pr;
c.height = h * pr;
x.scale(pr, pr);
x.globalAlpha = 0.6;
function i() {
  x.clearRect(0, 0, w, h);
  q = [{ x: 0, y: h * 0.7 + f }, { x: 0, y: h * 0.7 - f }];
  while (q[1].x < w + f) {
    d(q[0], q[1]);
  }
}
function d(i, j) {
  x.beginPath();
  x.moveTo(i.x, i.y);
  x.lineTo(j.x, j.y);
  var k = j.x + (z() * 2 - 0.25) * f,
    n = y(j.y);
  x.lineTo(k, n);
  x.closePath();
  r -= u / -50;
  x.fillStyle =
    "#" +
    (
      ((v(r) * 127 + 128) << 16) |
      ((v(r + u / 3) * 127 + 128) << 8) |
      (v(r + (u / 3) * 2) * 127 + 128)
    ).toString(16);
  x.fill();
  q[0] = q[1];
  q[1] = { x: k, y: n };
}
function y(p) {
  var t = p + (z() * 2 - 1.1) * f;
  return t > h || t < 0 ? y(p) : t;
}

function ribbons() {
  document.onclick = i;
  document.ontouchstart = i;
  i();
}

const pjaxContainer = "#pjax",
  pjaxTimeout = 30000,
  hostname = location.hostname;

$("a:not([href*='" + hostname + "'])").attr("target", "_blank");
$(document).pjax("a[target!=_blank]", pjaxContainer, {
  fragment: pjaxContainer,
  timeout: pjaxTimeout
});

$(document).on("pjax:start", function() {
  $(pjaxContainer).animate({ opacity: 0.3 }, "fast");
});

$(document).on("pjax:end", function() {
  $("a:not([href*='" + hostname + "'])").attr("target", "_blank");
  $(pjaxContainer).animate({ opacity: 1 }, "fast");
  if (typeof Prism !== "undefined") Prism.highlightAll();
  if (!isMobile()) imageView();
  checkRobot();
});

$(document).on("pjax:timeout", function() {
  alert("network timeout,please try again later.");
});

$(document).on("pjax:error", function() {
  alert("unknown error! please try again later.");
});

$("#top, #back-to-top").click(function() {
  $("html, body").animate({ scrollTop: 0 }, 500);
});

function checkRobot() {
  let robot = document.getElementById("robot");
  let replyButton = document.getElementsByClassName("submit")[0];
  if (robot) {
    robot.addEventListener("change", function() {
      if (this.checked) {
        replyButton.disabled = false;
      } else {
        replyButton.disabled = true;
      }
    });
  }
}
checkRobot();

let oldTopValue = 0;
let startScroll = null;
$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    $("#back-to-top").show();
    if (startScroll == null) {
      startScroll = setInterval(Scroll, 2000);
    }
  }
});

function Scroll() {
  let newTopValue = $("html").scrollTop();
  if (oldTopValue !== newTopValue) {
    oldTopValue = newTopValue;
    $("#back-to-top").show();
  } else {
    clearInterval(startScroll);
    startScroll = null;
    $("#back-to-top").hide();
  }
}

function imageView() {
  $("#main img").click(function() {
    $(".imageView > img")[0].src = this.src;
    $(".imageView").show();
  });
  $(".imageView").click(function() {
    $(".imageView").toggle();
  });
}

function isMobile() {
  const Agents = navigator.userAgent,
    mobileAgents = [
      "Android",
      "iPhone",
      "SymbianOS",
      "Windows Phone",
      "iPad",
      "iPod"
    ];
  for (var agents of mobileAgents) {
    while (Agents.includes(agents)) {
      return true;
    }
  }
}

const liveTimeConfig = new Date($("#live-time").text() || null);
function liveTime() {
  const start = liveTimeConfig || new Date("2017/11/02 11:31:29"),
    live = Math.floor(new Date().getTime() - start.getTime()),
    m = 24 * 60 * 60 * 1000;

  let liveDay = live / m,
    mliveDay = Math.floor(liveDay);

  let liveHour = (liveDay - mliveDay) * 24,
    mliveHour = Math.floor(liveHour);

  let liveMin = (liveHour - mliveHour) * 60,
    mliveMin = Math.floor((liveHour - mliveHour) * 60);

  let liveSec = Math.floor((liveMin - mliveMin) * 60);
  $("#live-time").text(
    "(●'◡'●) 被续 " +
      mliveDay +
      " 天 " +
      mliveHour +
      " 小时 " +
      mliveMin +
      " 分 " +
      liveSec +
      " 秒"
  );
}
if (
  !$("#live-time")
    .text()
    .trim()
) {
  setInterval(liveTime, 1000);
}

if (!isMobile()) {
  imageView();
}

//版权信息，勿删。↓↓↓↓
console.info(
  " %c Theme %c https://github.com/ShiYiYa/Plain",
  "color: #fadfa3; background: #030307; padding:5px 0;",
  "background: #fadfa3;padding:5px 5px 5px 0;"
);
console.info(
  " %c Theme's Author %c https://runtua.cn",
  "color: #fadfa3; background: #030307; padding:5px 0;",
  "background: #fadfa3;padding:5px 5px 5px 0;"
);
console.info(
  " %c " + $("#logo").text() + " %c " + location.origin,
  "color: #fadfa3; background: #030307; padding:5px 0;",
  "background: #fadfa3;padding:5px 5px 5px 0;"
);

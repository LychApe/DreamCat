function A(e) {
  return typeof e == "function";
}
function H(e) {
  return typeof e == "string";
}
function Z(e) {
  return typeof e == "number";
}
function pe(e) {
  return typeof e == "boolean";
}
function $(e) {
  return typeof e > "u";
}
function wt(e) {
  return e === null;
}
function Tt(e) {
  return e instanceof Window;
}
function _t(e) {
  return e instanceof Document;
}
function tt(e) {
  return e instanceof Element;
}
function ge(e) {
  return e instanceof Node;
}
function $e() {
  return !!window.document.documentMode;
}
function Qt(e) {
  return A(e) || Tt(e) ? !1 : Z(e.length);
}
function U(e) {
  return typeof e == "object" && e !== null;
}
function dt(e) {
  return _t(e) ? e.documentElement : e;
}
function ot(e) {
  return e.replace(/^-ms-/, "ms-").replace(/-([a-z])/g, (t, i) => i.toUpperCase());
}
function Gt(e) {
  return e.replace(/[A-Z]/g, (t) => "-" + t.toLowerCase());
}
function pt(e, t) {
  return window.getComputedStyle(e).getPropertyValue(Gt(t));
}
function Kt(e) {
  return pt(e, "box-sizing") === "border-box";
}
function yt(e, t, i) {
  const s = t === "width" ? ["Left", "Right"] : ["Top", "Bottom"];
  return [0, 1].reduce((n, r, a) => {
    let l = i + s[a];
    return i === "border" && (l += "Width"), n + parseFloat(pt(e, l) || "0");
  }, 0);
}
function gt(e, t) {
  if (t === "width" || t === "height") {
    const i = e.getBoundingClientRect()[t];
    return Kt(e) ? `${i}px` : `${i - yt(e, t, "border") - yt(e, t, "padding")}px`;
  }
  return pt(e, t);
}
function Zt(e, t) {
  const i = document.createElement(t);
  return i.innerHTML = e, [].slice.call(i.childNodes);
}
function te() {
  return !1;
}
const ve = [
  "animationIterationCount",
  "columnCount",
  "fillOpacity",
  "flexGrow",
  "flexShrink",
  "fontWeight",
  "gridArea",
  "gridColumn",
  "gridColumnEnd",
  "gridColumnStart",
  "gridRow",
  "gridRowEnd",
  "gridRowStart",
  "lineHeight",
  "opacity",
  "order",
  "orphans",
  "widows",
  "zIndex",
  "zoom"
];
function m(e, t) {
  if (Qt(e)) {
    for (let i = 0; i < e.length; i += 1)
      if (t.call(e[i], i, e[i]) === !1)
        return e;
  } else {
    const i = Object.keys(e);
    for (let s = 0; s < i.length; s += 1)
      if (t.call(e[i[s]], i[s], e[i[s]]) === !1)
        return e;
  }
  return e;
}
class O {
  constructor(t) {
    return this.length = 0, t ? (m(t, (i, s) => {
      this[i] = s;
    }), this.length = t.length, this) : this;
  }
}
function be() {
  const e = function(t) {
    if (!t)
      return new O();
    if (t instanceof O)
      return t;
    if (A(t))
      return /complete|loaded|interactive/.test(document.readyState) && document.body ? t.call(document, e) : document.addEventListener("DOMContentLoaded", () => t.call(document, e), !1), new O([document]);
    if (H(t)) {
      const i = t.trim();
      if (i[0] === "<" && i[i.length - 1] === ">") {
        let r = "div";
        return m({
          li: "ul",
          tr: "tbody",
          td: "tr",
          th: "tr",
          tbody: "table",
          option: "select"
        }, (l, c) => {
          if (i.indexOf(`<${l}`) === 0)
            return r = c, !1;
        }), new O(Zt(i, r));
      }
      if (!(t[0] === "#" && !t.match(/[ .<>:~]/)))
        return new O(document.querySelectorAll(t));
      const n = document.getElementById(t.slice(1));
      return n ? new O([n]) : new O();
    }
    return Qt(t) && !ge(t) ? new O(t) : new O([t]);
  };
  return e.fn = O.prototype, e;
}
const o = be();
setTimeout(() => o("body").addClass("mdui-loaded"));
const d = {
  $: o
};
o.fn.each = function(e) {
  return m(this, e);
};
function W(e, t) {
  return e !== t && dt(e).contains(t);
}
function St(e, t) {
  return m(t, (i, s) => {
    e.push(s);
  }), e;
}
o.fn.get = function(e) {
  return e === void 0 ? [].slice.call(this) : this[e >= 0 ? e : e + this.length];
};
o.fn.find = function(e) {
  const t = [];
  return this.each((i, s) => {
    St(t, o(s.querySelectorAll(e)).get());
  }), new O(t);
};
const G = {};
let xe = 1;
function et(e) {
  const t = "_mduiEventId";
  return e[t] || (e[t] = ++xe), e[t];
}
function kt(e) {
  const t = e.split(".");
  return {
    type: t[0],
    ns: t.slice(1).sort().join(" ")
  };
}
function ee(e) {
  return new RegExp("(?:^| )" + e.replace(" ", " .* ?") + "(?: |$)");
}
function Ce(e, t, i, s) {
  const n = kt(t);
  return (G[et(e)] || []).filter((r) => r && (!n.type || r.type === n.type) && (!n.ns || ee(n.ns).test(r.ns)) && (!i || et(r.func) === et(i)) && (!s || r.selector === s));
}
function we(e, t, i, s, n) {
  const r = et(e);
  G[r] || (G[r] = []);
  let a = !1;
  U(s) && s.useCapture && (a = !0), t.split(" ").forEach((l) => {
    if (!l)
      return;
    const c = kt(l);
    function h(f, b) {
      i.apply(
        b,
        // @ts-ignore
        f._detail === void 0 ? [f] : [f].concat(f._detail)
      ) === !1 && (f.preventDefault(), f.stopPropagation());
    }
    function u(f) {
      f._ns && !ee(f._ns).test(c.ns) || (f._data = s, n ? o(e).find(n).get().reverse().forEach((b) => {
        (b === f.target || W(b, f.target)) && h(f, b);
      }) : h(f, e));
    }
    const g = {
      type: c.type,
      ns: c.ns,
      func: i,
      selector: n,
      id: G[r].length,
      proxy: u
    };
    G[r].push(g), e.addEventListener(g.type, u, a);
  });
}
function ye(e, t, i, s) {
  const n = G[et(e)] || [], r = (a) => {
    delete n[a.id], e.removeEventListener(a.type, a.proxy, !1);
  };
  t ? t.split(" ").forEach((a) => {
    a && Ce(e, a, i, s).forEach((l) => r(l));
  }) : n.forEach((a) => r(a));
}
o.fn.trigger = function(e, t) {
  const i = kt(e);
  let s;
  const n = {
    bubbles: !0,
    cancelable: !0
  };
  return ["click", "mousedown", "mouseup", "mousemove"].indexOf(i.type) > -1 ? s = new MouseEvent(i.type, n) : (n.detail = t, s = new CustomEvent(i.type, n)), s._detail = t, s._ns = i.ns, this.each(function() {
    this.dispatchEvent(s);
  });
};
function v(e, t, ...i) {
  return i.unshift(t), m(i, (s, n) => {
    m(n, (r, a) => {
      $(a) || (e[r] = a);
    });
  }), e;
}
function At(e) {
  if (!U(e) && !Array.isArray(e))
    return "";
  const t = [];
  function i(s, n) {
    let r;
    U(n) ? m(n, (a, l) => {
      Array.isArray(n) && !U(l) ? r = "" : r = a, i(`${s}[${r}]`, l);
    }) : (n == null || n === "" ? r = "=" : r = `=${encodeURIComponent(n)}`, t.push(encodeURIComponent(s) + r));
  }
  return Array.isArray(e) ? m(e, function() {
    i(this.name, this.value);
  }) : m(e, i), t.join("&");
}
const it = {}, N = {
  ajaxStart: "start.mdui.ajax",
  ajaxSuccess: "success.mdui.ajax",
  ajaxError: "error.mdui.ajax",
  ajaxComplete: "complete.mdui.ajax"
};
function at(e) {
  return ["GET", "HEAD"].indexOf(e) >= 0;
}
function Ht(e, t) {
  return `${e}&${t}`.replace(/[&?]{1,2}/, "?");
}
function Ee(e) {
  const t = {
    url: "",
    method: "GET",
    data: "",
    processData: !0,
    async: !0,
    cache: !0,
    username: "",
    password: "",
    headers: {},
    xhrFields: {},
    statusCode: {},
    dataType: "text",
    contentType: "application/x-www-form-urlencoded",
    timeout: 0,
    global: !0
  };
  return m(it, (i, s) => {
    [
      "beforeSend",
      "success",
      "error",
      "complete",
      "statusCode"
    ].indexOf(i) < 0 && !$(s) && (t[i] = s);
  }), v({}, t, e);
}
function Oe(e) {
  let t = !1;
  const i = {}, s = Ee(e);
  let n = s.url || window.location.toString();
  const r = s.method.toUpperCase();
  let a = s.data;
  const l = s.processData, c = s.async, h = s.cache, u = s.username, g = s.password, f = s.headers, b = s.xhrFields, I = s.statusCode, _ = s.dataType, S = s.contentType, L = s.timeout, y = s.global;
  a && (at(r) || l) && !H(a) && !(a instanceof ArrayBuffer) && !(a instanceof Blob) && !(a instanceof Document) && !(a instanceof FormData) && (a = At(a)), a && at(r) && (n = Ht(n, a), a = null);
  function w(x, P, C, ...p) {
    y && o(document).trigger(x, P);
    let vt, F;
    C && (C in it && (vt = it[C](...p)), s[C] && (F = s[C](...p)), C === "beforeSend" && (vt === !1 || F === !1) && (t = !0));
  }
  function j() {
    let x;
    return new Promise((P, C) => {
      at(r) && !h && (n = Ht(n, `_=${Date.now()}`));
      const p = new XMLHttpRequest();
      p.open(r, n, c, u, g), (S || a && !at(r) && S !== !1) && p.setRequestHeader("Content-Type", S), _ === "json" && p.setRequestHeader("Accept", "application/json, text/javascript"), f && m(f, (R, D) => {
        $(D) || p.setRequestHeader(R, D + "");
      }), /^([\w-]+:)?\/\/([^/]+)/.test(n) && RegExp.$2 !== window.location.host || p.setRequestHeader("X-Requested-With", "XMLHttpRequest"), b && m(b, (R, D) => {
        p[R] = D;
      }), i.xhr = p, i.options = s;
      let F;
      if (p.onload = function() {
        F && clearTimeout(F);
        const R = p.status >= 200 && p.status < 300 || p.status === 304 || p.status === 0;
        let D;
        if (R)
          if (p.status === 204 || r === "HEAD" ? x = "nocontent" : p.status === 304 ? x = "notmodified" : x = "success", _ === "json") {
            try {
              D = r === "HEAD" ? void 0 : JSON.parse(p.responseText), i.data = D;
            } catch {
              x = "parsererror", w(N.ajaxError, i, "error", p, x), C(new Error(x));
            }
            x !== "parsererror" && (w(N.ajaxSuccess, i, "success", D, x, p), P(D));
          } else
            D = r === "HEAD" ? void 0 : p.responseType === "text" || p.responseType === "" ? p.responseText : p.response, i.data = D, w(N.ajaxSuccess, i, "success", D, x, p), P(D);
        else
          x = "error", w(N.ajaxError, i, "error", p, x), C(new Error(x));
        m([it.statusCode, I], (me, rt) => {
          rt && rt[p.status] && (R ? rt[p.status](D, x, p) : rt[p.status](p, x));
        }), w(N.ajaxComplete, i, "complete", p, x);
      }, p.onerror = function() {
        F && clearTimeout(F), w(N.ajaxError, i, "error", p, p.statusText), w(N.ajaxComplete, i, "complete", p, "error"), C(new Error(p.statusText));
      }, p.onabort = function() {
        let R = "abort";
        F && (R = "timeout", clearTimeout(F)), w(N.ajaxError, i, "error", p, R), w(N.ajaxComplete, i, "complete", p, R), C(new Error(R));
      }, w(N.ajaxStart, i, "beforeSend", p), t) {
        C(new Error("cancel"));
        return;
      }
      L > 0 && (F = setTimeout(() => {
        p.abort();
      }, L)), p.send(a);
    });
  }
  return j();
}
o.ajax = Oe;
function Te(e) {
  return v(it, e);
}
o.ajaxSetup = Te;
o.contains = W;
const M = "_mduiElementDataStorage";
function Lt(e, t) {
  e[M] || (e[M] = {}), m(t, (i, s) => {
    e[M][ot(i)] = s;
  });
}
function V(e, t, i) {
  if (U(t))
    return Lt(e, t), t;
  if (!$(i))
    return Lt(e, { [t]: i }), i;
  if ($(t))
    return e[M] ? e[M] : {};
  if (t = ot(t), e[M] && t in e[M])
    return e[M][t];
}
o.data = V;
o.each = m;
o.extend = function(...e) {
  return e.length === 1 ? (m(e[0], (t, i) => {
    this[t] = i;
  }), this) : v(e.shift(), e.shift(), ...e);
};
function st(e, t) {
  let i;
  const s = [];
  return m(e, (n, r) => {
    i = t.call(window, r, n), i != null && s.push(i);
  }), [].concat(...s);
}
o.map = st;
o.merge = St;
o.param = At;
function ie(e, t) {
  if (!e[M])
    return;
  const i = (s) => {
    s = ot(s), e[M][s] && (e[M][s] = null, delete e[M][s]);
  };
  $(t) ? (e[M] = null, delete e[M]) : H(t) ? t.split(" ").filter((s) => s).forEach((s) => i(s)) : m(t, (s, n) => i(n));
}
o.removeData = ie;
function $t(e) {
  const t = [];
  return m(e, (i, s) => {
    t.indexOf(s) === -1 && t.push(s);
  }), t;
}
o.unique = $t;
o.fn.add = function(e) {
  return new O($t(St(this.get(), o(e).get())));
};
m(["add", "remove", "toggle"], (e, t) => {
  o.fn[`${t}Class`] = function(i) {
    return t === "remove" && !arguments.length ? this.each((s, n) => {
      n.setAttribute("class", "");
    }) : this.each((s, n) => {
      if (!tt(n))
        return;
      const r = (A(i) ? i.call(n, s, n.getAttribute("class") || "") : i).split(" ").filter((a) => a);
      m(r, (a, l) => {
        n.classList[t](l);
      });
    });
  };
});
m(["insertBefore", "insertAfter"], (e, t) => {
  o.fn[t] = function(i) {
    const s = e ? o(this.get().reverse()) : this, n = o(i), r = [];
    return n.each((a, l) => {
      l.parentNode && s.each((c, h) => {
        const u = a ? h.cloneNode(!0) : h, g = e ? l.nextSibling : l;
        r.push(u), l.parentNode.insertBefore(u, g);
      });
    }), o(e ? r.reverse() : r);
  };
});
function _e(e) {
  return H(e) && (e[0] !== "<" || e[e.length - 1] !== ">");
}
m(["before", "after"], (e, t) => {
  o.fn[t] = function(...i) {
    return e === 1 && (i = i.reverse()), this.each((s, n) => {
      const r = A(i[0]) ? [i[0].call(n, s, n.innerHTML)] : i;
      m(r, (a, l) => {
        let c;
        _e(l) ? c = o(Zt(l, "div")) : s && tt(l) ? c = o(l.cloneNode(!0)) : c = o(l), c[e ? "insertAfter" : "insertBefore"](n);
      });
    });
  };
});
o.fn.off = function(e, t, i) {
  return U(e) ? (m(e, (s, n) => {
    this.off(s, t, n);
  }), this) : ((t === !1 || A(t)) && (i = t, t = void 0), i === !1 && (i = te), this.each(function() {
    ye(this, e, i, t);
  }));
};
o.fn.on = function(e, t, i, s, n) {
  if (U(e))
    return H(t) || (i = i || t, t = void 0), m(e, (r, a) => {
      this.on(r, t, i, a, n);
    }), this;
  if (i == null && s == null ? (s = t, i = t = void 0) : s == null && (H(t) ? (s = i, i = void 0) : (s = i, i = t, t = void 0)), s === !1)
    s = te;
  else if (!s)
    return this;
  if (n) {
    const r = this, a = s;
    s = function(l) {
      return r.off(l.type, t, s), a.apply(this, arguments);
    };
  }
  return this.each(function() {
    we(this, e, s, i, t);
  });
};
m(N, (e, t) => {
  o.fn[e] = function(i) {
    return this.on(t, (s, n) => {
      i(s, n.xhr, n.options, n.data);
    });
  };
});
o.fn.map = function(e) {
  return new O(st(this, (t, i) => e.call(t, i, t)));
};
o.fn.clone = function() {
  return this.map(function() {
    return this.cloneNode(!0);
  });
};
o.fn.is = function(e) {
  let t = !1;
  if (A(e))
    return this.each((s, n) => {
      e.call(n, s, n) && (t = !0);
    }), t;
  if (H(e))
    return this.each((s, n) => {
      if (_t(n) || Tt(n))
        return;
      (n.matches || n.msMatchesSelector).call(n, e) && (t = !0);
    }), t;
  const i = o(e);
  return this.each((s, n) => {
    i.each((r, a) => {
      n === a && (t = !0);
    });
  }), t;
};
o.fn.remove = function(e) {
  return this.each((t, i) => {
    i.parentNode && (!e || o(i).is(e)) && i.parentNode.removeChild(i);
  });
};
m(["prepend", "append"], (e, t) => {
  o.fn[t] = function(...i) {
    return this.each((s, n) => {
      const r = n.childNodes, a = r.length, l = a ? r[e ? a - 1 : 0] : document.createElement("div");
      a || n.appendChild(l);
      let c = A(i[0]) ? [i[0].call(n, s, n.innerHTML)] : i;
      s && (c = c.map((h) => H(h) ? h : o(h).clone())), o(l)[e ? "after" : "before"](...c), a || n.removeChild(l);
    });
  };
});
m(["appendTo", "prependTo"], (e, t) => {
  o.fn[t] = function(i) {
    const s = [], n = o(i).map((a, l) => {
      const c = l.childNodes, h = c.length;
      if (h)
        return c[e ? 0 : h - 1];
      const u = document.createElement("div");
      return l.appendChild(u), s.push(u), u;
    }), r = this[e ? "insertBefore" : "insertAfter"](n);
    return o(s).remove(), r;
  };
});
m(["attr", "prop", "css"], (e, t) => {
  function i(n, r, a) {
    if (!$(a))
      switch (e) {
        // attr
        case 0:
          wt(a) ? n.removeAttribute(r) : n.setAttribute(r, a);
          break;
        // prop
        case 1:
          n[r] = a;
          break;
        // css
        default:
          r = ot(r), n.style[r] = Z(a) ? `${a}${ve.indexOf(r) > -1 ? "" : "px"}` : a;
          break;
      }
  }
  function s(n, r) {
    switch (e) {
      // attr
      case 0:
        const a = n.getAttribute(r);
        return wt(a) ? void 0 : a;
      // prop
      case 1:
        return n[r];
      // css
      default:
        return gt(n, r);
    }
  }
  o.fn[t] = function(n, r) {
    if (U(n))
      return m(n, (a, l) => {
        this[t](a, l);
      }), this;
    if (arguments.length === 1) {
      const a = this[0];
      return tt(a) ? s(a, n) : void 0;
    }
    return this.each((a, l) => {
      i(l, n, A(r) ? r.call(l, a, s(l, n)) : r);
    });
  };
});
o.fn.children = function(e) {
  const t = [];
  return this.each((i, s) => {
    m(s.childNodes, (n, r) => {
      tt(r) && (!e || o(r).is(e)) && t.push(r);
    });
  }), new O($t(t));
};
o.fn.slice = function(...e) {
  return new O([].slice.apply(this, e));
};
o.fn.eq = function(e) {
  const t = e === -1 ? this.slice(e) : this.slice(e, +e + 1);
  return new O(t);
};
function It(e, t, i, s, n) {
  const r = [];
  let a;
  return e.each((l, c) => {
    for (a = c[i]; a && tt(a); ) {
      if (t === 2) {
        if (s && o(a).is(s))
          break;
        (!n || o(a).is(n)) && r.push(a);
      } else if (t === 0) {
        (!s || o(a).is(s)) && r.push(a);
        break;
      } else
        (!s || o(a).is(s)) && r.push(a);
      a = a[i];
    }
  }), new O($t(r));
}
m(["", "s", "sUntil"], (e, t) => {
  o.fn[`parent${t}`] = function(i, s) {
    const n = e ? o(this.get().reverse()) : this;
    return It(n, e, "parentNode", i, s);
  };
});
o.fn.closest = function(e) {
  if (this.is(e))
    return this;
  const t = [];
  return this.parents().each((i, s) => {
    if (o(s).is(e))
      return t.push(s), !1;
  }), new O(t);
};
const Se = /^(?:{[\w\W]*\}|\[[\w\W]*\])$/;
function ke(e) {
  return e === "true" ? !0 : e === "false" ? !1 : e === "null" ? null : e === +e + "" ? +e : Se.test(e) ? JSON.parse(e) : e;
}
function Pt(e, t, i) {
  if ($(i) && e.nodeType === 1) {
    const s = "data-" + Gt(t);
    if (i = e.getAttribute(s), H(i))
      try {
        i = ke(i);
      } catch {
      }
    else
      i = void 0;
  }
  return i;
}
o.fn.data = function(e, t) {
  if ($(e)) {
    if (!this.length)
      return;
    const i = this[0], s = V(i);
    if (i.nodeType !== 1)
      return s;
    const n = i.attributes;
    let r = n.length;
    for (; r--; )
      if (n[r]) {
        let a = n[r].name;
        a.indexOf("data-") === 0 && (a = ot(a.slice(5)), s[a] = Pt(i, a, s[a]));
      }
    return s;
  }
  if (U(e))
    return this.each(function() {
      V(this, e);
    });
  if (arguments.length === 2 && $(t))
    return this;
  if (!$(t))
    return this.each(function() {
      V(this, e, t);
    });
  if (this.length)
    return Pt(this[0], e, V(this[0], e));
};
o.fn.empty = function() {
  return this.each(function() {
    this.innerHTML = "";
  });
};
o.fn.extend = function(e) {
  return m(e, (t, i) => {
    o.fn[t] = i;
  }), this;
};
o.fn.filter = function(e) {
  if (A(e))
    return this.map((i, s) => e.call(s, i, s) ? s : void 0);
  if (H(e))
    return this.map((i, s) => o(s).is(e) ? s : void 0);
  const t = o(e);
  return this.map((i, s) => t.get().indexOf(s) > -1 ? s : void 0);
};
o.fn.first = function() {
  return this.eq(0);
};
o.fn.has = function(e) {
  const t = H(e) ? this.find(e) : o(e), { length: i } = t;
  return this.map(function() {
    for (let s = 0; s < i; s += 1)
      if (W(this, t[s]))
        return this;
  });
};
o.fn.hasClass = function(e) {
  return this[0].classList.contains(e);
};
function se(e, t, i, s, n, r) {
  const a = (l) => yt(e, t.toLowerCase(), l) * r;
  return s === 2 && n && (i += a("margin")), Kt(e) ? ($e() && r === 1 && (i += a("border"), i += a("padding")), s === 0 && (i -= a("border")), s === 1 && (i -= a("border"), i -= a("padding"))) : (s === 0 && (i += a("padding")), s === 2 && (i += a("border"), i += a("padding"))), i;
}
function ne(e, t, i, s) {
  const n = `client${t}`, r = `scroll${t}`, a = `offset${t}`, l = `inner${t}`;
  if (Tt(e))
    return i === 2 ? e[l] : dt(document)[n];
  if (_t(e)) {
    const h = dt(e);
    return Math.max(
      // @ts-ignore
      e.body[r],
      h[r],
      // @ts-ignore
      e.body[a],
      h[a],
      h[n]
    );
  }
  const c = parseFloat(pt(e, t.toLowerCase()) || "0");
  return se(e, t, c, i, s, 1);
}
function Ae(e, t, i, s, n, r) {
  let a = A(r) ? r.call(e, t, ne(e, i, s, n)) : r;
  if (a == null)
    return;
  const l = o(e), c = i.toLowerCase();
  if (["auto", "inherit", ""].indexOf(a) > -1) {
    l.css(c, a);
    return;
  }
  const h = a.toString().replace(/\b[0-9.]*/, ""), u = parseFloat(a);
  a = se(e, i, u, s, n, -1) + (h || "px"), l.css(c, a);
}
m(["Width", "Height"], (e, t) => {
  m([`inner${t}`, t.toLowerCase(), `outer${t}`], (i, s) => {
    o.fn[s] = function(n, r) {
      const a = arguments.length && (i < 2 || !pe(n)), l = n === !0 || r === !0;
      return a ? this.each((c, h) => Ae(h, c, t, i, l, n)) : this.length ? ne(this[0], t, i, l) : void 0;
    };
  });
});
o.fn.hide = function() {
  return this.each(function() {
    this.style.display = "none";
  });
};
m(["val", "html", "text"], (e, t) => {
  const s = {
    0: "value",
    1: "innerHTML",
    2: "textContent"
  }[e];
  function n(a) {
    if (e === 2)
      return st(a, (c) => dt(c)[s]).join("");
    if (!a.length)
      return;
    const l = a[0];
    return e === 0 && o(l).is("select[multiple]") ? st(o(l).find("option:checked"), (c) => c.value) : l[s];
  }
  function r(a, l) {
    if ($(l)) {
      if (e !== 0)
        return;
      l = "";
    }
    e === 1 && tt(l) && (l = l.outerHTML), a[s] = l;
  }
  o.fn[t] = function(a) {
    return arguments.length ? this.each((l, c) => {
      const h = A(a) ? a.call(c, l, n(o(c))) : a;
      e === 0 && Array.isArray(h) ? o(c).is("select[multiple]") ? st(o(c).find("option"), (u) => u.selected = h.indexOf(u.value) > -1) : c.checked = h.indexOf(c.value) > -1 : r(c, h);
    }) : n(this);
  };
});
o.fn.index = function(e) {
  return arguments.length ? H(e) ? o(e).get().indexOf(this[0]) : this.get().indexOf(o(e)[0]) : this.eq(0).parent().children().get().indexOf(this[0]);
};
o.fn.last = function() {
  return this.eq(-1);
};
m(["", "All", "Until"], (e, t) => {
  o.fn[`next${t}`] = function(i, s) {
    return It(this, e, "nextElementSibling", i, s);
  };
});
o.fn.not = function(e) {
  const t = this.filter(e);
  return this.map((i, s) => t.index(s) > -1 ? void 0 : s);
};
o.fn.offsetParent = function() {
  return this.map(function() {
    let e = this.offsetParent;
    for (; e && o(e).css("position") === "static"; )
      e = e.offsetParent;
    return e || document.documentElement;
  });
};
function lt(e, t) {
  return parseFloat(e.css(t));
}
o.fn.position = function() {
  if (!this.length)
    return;
  const e = this.eq(0);
  let t, i = {
    left: 0,
    top: 0
  };
  if (e.css("position") === "fixed")
    t = e[0].getBoundingClientRect();
  else {
    t = e.offset();
    const s = e.offsetParent();
    i = s.offset(), i.top += lt(s, "border-top-width"), i.left += lt(s, "border-left-width");
  }
  return {
    top: t.top - i.top - lt(e, "margin-top"),
    left: t.left - i.left - lt(e, "margin-left")
  };
};
function oe(e) {
  if (!e.getClientRects().length)
    return { top: 0, left: 0 };
  const t = e.getBoundingClientRect(), i = e.ownerDocument.defaultView;
  return {
    top: t.top + i.pageYOffset,
    left: t.left + i.pageXOffset
  };
}
function Ie(e, t, i) {
  const s = o(e), n = s.css("position");
  n === "static" && s.css("position", "relative");
  const r = oe(e), a = s.css("top"), l = s.css("left");
  let c, h;
  if ((n === "absolute" || n === "fixed") && (a + l).indexOf("auto") > -1) {
    const f = s.position();
    c = f.top, h = f.left;
  } else
    c = parseFloat(a), h = parseFloat(l);
  const g = A(t) ? t.call(e, i, v({}, r)) : t;
  s.css({
    top: g.top != null ? g.top - r.top + c : void 0,
    left: g.left != null ? g.left - r.left + h : void 0
  });
}
o.fn.offset = function(e) {
  return arguments.length ? this.each(function(t) {
    Ie(this, e, t);
  }) : this.length ? oe(this[0]) : void 0;
};
o.fn.one = function(e, t, i, s) {
  return this.on(e, t, i, s, !0);
};
m(["", "All", "Until"], (e, t) => {
  o.fn[`prev${t}`] = function(i, s) {
    const n = e ? o(this.get().reverse()) : this;
    return It(n, e, "previousElementSibling", i, s);
  };
});
o.fn.removeAttr = function(e) {
  const t = e.split(" ").filter((i) => i);
  return this.each(function() {
    m(t, (i, s) => {
      this.removeAttribute(s);
    });
  });
};
o.fn.removeData = function(e) {
  return this.each(function() {
    ie(this, e);
  });
};
o.fn.removeProp = function(e) {
  return this.each(function() {
    try {
      delete this[e];
    } catch {
    }
  });
};
o.fn.replaceWith = function(e) {
  return this.each((t, i) => {
    let s = e;
    A(s) ? s = s.call(i, t, i.innerHTML) : t && !H(s) && (s = o(s).clone()), o(i).before(s);
  }), this.remove();
};
o.fn.replaceAll = function(e) {
  return o(e).map((t, i) => (o(i).replaceWith(t ? this.clone() : this), this.get()));
};
o.fn.serializeArray = function() {
  const e = [];
  return this.each((t, i) => {
    const s = i instanceof HTMLFormElement ? i.elements : [i];
    o(s).each((n, r) => {
      const a = o(r), l = r.type, c = r.nodeName.toLowerCase();
      if (c !== "fieldset" && r.name && !r.disabled && ["input", "select", "textarea", "keygen"].indexOf(c) > -1 && ["submit", "button", "image", "reset", "file"].indexOf(l) === -1 && (["radio", "checkbox"].indexOf(l) === -1 || r.checked)) {
        const h = a.val();
        (Array.isArray(h) ? h : [h]).forEach((g) => {
          e.push({
            name: r.name,
            value: g
          });
        });
      }
    });
  }), e;
};
o.fn.serialize = function() {
  return At(this.serializeArray());
};
const bt = {};
function De(e) {
  let t, i;
  return bt[e] || (t = document.createElement(e), document.body.appendChild(t), i = gt(t, "display"), t.parentNode.removeChild(t), i === "none" && (i = "block"), bt[e] = i), bt[e];
}
o.fn.show = function() {
  return this.each(function() {
    this.style.display === "none" && (this.style.display = ""), gt(this, "display") === "none" && (this.style.display = De(this.nodeName));
  });
};
o.fn.siblings = function(e) {
  return this.prevAll(e).add(this.nextAll(e));
};
o.fn.toggle = function() {
  return this.each(function() {
    gt(this, "display") === "none" ? o(this).show() : o(this).hide();
  });
};
o.fn.reflow = function() {
  return this.each(function() {
    return this.clientLeft;
  });
};
o.fn.transition = function(e) {
  return Z(e) && (e = `${e}ms`), this.each(function() {
    this.style.webkitTransitionDuration = e, this.style.transitionDuration = e;
  });
};
o.fn.transitionEnd = function(e) {
  const t = this, i = ["webkitTransitionEnd", "transitionend"];
  function s(n) {
    n.target === this && (e.call(this, n), m(i, (r, a) => {
      t.off(a, s);
    }));
  }
  return m(i, (n, r) => {
    t.on(r, s);
  }), this;
};
o.fn.transformOrigin = function(e) {
  return this.each(function() {
    this.style.webkitTransformOrigin = e, this.style.transformOrigin = e;
  });
};
o.fn.transform = function(e) {
  return this.each(function() {
    this.style.webkitTransform = e, this.style.transform = e;
  });
};
const re = {};
function Et(e, t, i, s) {
  let n = V(s, "_mdui_mutation");
  n || (n = [], V(s, "_mdui_mutation", n)), n.indexOf(e) === -1 && (n.push(e), t.call(s, i, s));
}
o.fn.mutation = function() {
  return this.each((e, t) => {
    const i = o(t);
    m(re, (s, n) => {
      i.is(s) && Et(s, n, e, t), i.find(s).each((r, a) => {
        Et(s, n, r, a);
      });
    });
  });
};
o.showOverlay = function(e) {
  let t = o(".mdui-overlay");
  t.length ? (t.data("_overlay_is_deleted", !1), $(e) || t.css("z-index", e)) : ($(e) && (e = 2e3), t = o('<div class="mdui-overlay">').appendTo(document.body).reflow().css("z-index", e));
  let i = t.data("_overlay_level") || 0;
  return t.data("_overlay_level", ++i).addClass("mdui-overlay-show");
};
o.hideOverlay = function(e = !1) {
  const t = o(".mdui-overlay");
  if (!t.length)
    return;
  let i = e ? 1 : t.data("_overlay_level");
  if (i > 1) {
    t.data("_overlay_level", --i);
    return;
  }
  t.data("_overlay_level", 0).removeClass("mdui-overlay-show").data("_overlay_is_deleted", !0).transitionEnd(() => {
    t.data("_overlay_is_deleted") && t.remove();
  });
};
o.lockScreen = function() {
  const e = o("body"), t = e.width();
  let i = e.data("_lockscreen_level") || 0;
  e.addClass("mdui-locked").width(t).data("_lockscreen_level", ++i);
};
o.unlockScreen = function(e = !1) {
  const t = o("body");
  let i = e ? 1 : t.data("_lockscreen_level");
  if (i > 1) {
    t.data("_lockscreen_level", --i);
    return;
  }
  t.data("_lockscreen_level", 0).removeClass("mdui-locked").width("");
};
o.throttle = function(e, t = 16) {
  let i = null;
  return function(...s) {
    wt(i) && (i = setTimeout(() => {
      e.apply(this, s), i = null;
    }, t));
  };
};
const xt = {};
o.guid = function(e) {
  if (!$(e) && !$(xt[e]))
    return xt[e];
  function t() {
    return Math.floor((1 + Math.random()) * 65536).toString(16).substring(1);
  }
  const i = "_" + t() + t() + "-" + t() + "-" + t() + "-" + t() + "-" + t() + t() + t();
  return $(e) || (xt[e] = i), i;
};
d.mutation = function(e, t) {
  if ($(e) || $(t)) {
    o(document).mutation();
    return;
  }
  re[e] = t, o(e).each((i, s) => Et(e, t, i, s));
};
function q(e, t, i, s, n) {
  n || (n = {}), n.inst = s;
  const r = `${e}.mdui.${t}`;
  typeof jQuery < "u" && jQuery(i).trigger(r, n);
  const a = o(i);
  a.trigger(r, n);
  const l = {
    bubbles: !0,
    cancelable: !0,
    detail: n
  }, c = new CustomEvent(r, l);
  c._detail = n, a[0].dispatchEvent(c);
}
const Me = {
  accordion: !1
};
class ae {
  constructor(t, i = {}) {
    this.options = v({}, Me);
    const s = `mdui-${this.getNamespace()}-item`;
    this.classItem = s, this.classItemOpen = `${s}-open`, this.classHeader = `${s}-header`, this.classBody = `${s}-body`, this.$element = o(t).first(), v(this.options, i), this.bindEvent();
  }
  /**
   * 绑定事件
   */
  bindEvent() {
    const t = this;
    this.$element.on("click", `.${this.classHeader}`, function() {
      const s = o(this).parent();
      t.getItems().each((r, a) => {
        s.is(a) && t.toggle(a);
      });
    }), this.$element.on(
      "click",
      `[mdui-${this.getNamespace()}-item-close]`,
      function() {
        const s = o(this).parents(`.${t.classItem}`).first();
        t.close(s);
      }
    );
  }
  /**
   * 指定 item 是否处于打开状态
   * @param $item
   */
  isOpen(t) {
    return t.hasClass(this.classItemOpen);
  }
  /**
   * 获取所有 item
   */
  getItems() {
    return this.$element.children(`.${this.classItem}`);
  }
  /**
   * 获取指定 item
   * @param item
   */
  getItem(t) {
    return Z(t) ? this.getItems().eq(t) : o(t).first();
  }
  /**
   * 触发组件事件
   * @param name 事件名
   * @param $item 事件触发的目标 item
   */
  triggerEvent(t, i) {
    q(t, this.getNamespace(), i, this);
  }
  /**
   * 动画结束回调
   * @param $content body 元素
   * @param $item item 元素
   */
  transitionEnd(t, i) {
    this.isOpen(i) ? (t.transition(0).height("auto").reflow().transition(""), this.triggerEvent("opened", i)) : (t.height(""), this.triggerEvent("closed", i));
  }
  /**
   * 打开指定面板项
   * @param item 面板项的索引号、或 CSS 选择器、或 DOM 元素、或 JQ 对象
   */
  open(t) {
    const i = this.getItem(t);
    if (this.isOpen(i))
      return;
    this.options.accordion && this.$element.children(`.${this.classItemOpen}`).each((n, r) => {
      const a = o(r);
      a.is(i) || this.close(a);
    });
    const s = i.children(`.${this.classBody}`);
    s.height(s[0].scrollHeight).transitionEnd(() => this.transitionEnd(s, i)), this.triggerEvent("open", i), i.addClass(this.classItemOpen);
  }
  /**
   * 关闭指定面板项
   * @param item 面板项的索引号、或 CSS 选择器、或 DOM 元素、或 JQ 对象
   */
  close(t) {
    const i = this.getItem(t);
    if (!this.isOpen(i))
      return;
    const s = i.children(`.${this.classBody}`);
    this.triggerEvent("close", i), i.removeClass(this.classItemOpen), s.transition(0).height(s[0].scrollHeight).reflow().transition("").height("").transitionEnd(() => this.transitionEnd(s, i));
  }
  /**
   * 切换指定面板项的打开状态
   * @param item 面板项的索引号、或 CSS 选择器、或 DOM 元素、或 JQ 对象
   */
  toggle(t) {
    const i = this.getItem(t);
    this.isOpen(i) ? this.close(i) : this.open(i);
  }
  /**
   * 打开所有面板项
   */
  openAll() {
    this.getItems().each((t, i) => this.open(i));
  }
  /**
   * 关闭所有面板项
   */
  closeAll() {
    this.getItems().each((t, i) => this.close(i));
  }
}
class He extends ae {
  getNamespace() {
    return "collapse";
  }
}
d.Collapse = He;
function z(e, t) {
  const i = o(e).attr(t);
  return i ? new Function(
    "",
    `var json = ${i}; return JSON.parse(JSON.stringify(json));`
  )() : {};
}
const Rt = "mdui-collapse";
o(() => {
  d.mutation(`[${Rt}]`, function() {
    new d.Collapse(this, z(this, Rt));
  });
});
const T = o(document), E = o(window);
o("body");
const ft = "touchstart mousedown", le = "touchmove mousemove", Dt = "touchend mouseup", ce = "touchcancel mouseleave", Mt = "touchend touchmove touchcancel";
let ut = 0;
function nt(e) {
  return !(ut && [
    "mousedown",
    "mouseup",
    "mousemove",
    "click",
    "mouseover",
    "mouseout",
    "mouseenter",
    "mouseleave"
  ].indexOf(e.type) > -1);
}
function K(e) {
  e.type === "touchstart" ? ut += 1 : ["touchmove", "touchend", "touchcancel"].indexOf(e.type) > -1 && setTimeout(function() {
    ut && (ut -= 1);
  }, 500);
}
function Ct(e, t) {
  if (e instanceof MouseEvent && e.button === 2)
    return;
  const i = typeof TouchEvent < "u" && e instanceof TouchEvent && e.touches.length ? e.touches[0] : e, s = i.pageX, n = i.pageY, r = t.offset(), a = t.innerHeight(), l = t.innerWidth(), c = {
    x: s - r.left,
    y: n - r.top
  }, h = Math.max(
    Math.pow(Math.pow(a, 2) + Math.pow(l, 2), 0.5),
    48
  ), u = `translate3d(${-c.x + l / 2}px,${-c.y + a / 2}px, 0) scale(1)`;
  o(
    `<div class="mdui-ripple-wave" style="width:${h}px;height:${h}px;margin-top:-${h / 2}px;margin-left:-${h / 2}px;left:${c.x}px;top:${c.y}px;"></div>`
  ).data("_ripple_wave_translate", u).prependTo(t).reflow().transform(u);
}
function Le(e) {
  if (!e.length || e.data("_ripple_wave_removed"))
    return;
  e.data("_ripple_wave_removed", !0);
  let t = setTimeout(() => e.remove(), 400);
  const i = e.data("_ripple_wave_translate");
  e.addClass("mdui-ripple-wave-fill").transform(i.replace("scale(1)", "scale(1.01)")).transitionEnd(() => {
    clearTimeout(t), e.addClass("mdui-ripple-wave-out").transform(i.replace("scale(1)", "scale(1.01)")), t = setTimeout(() => e.remove(), 700), setTimeout(() => {
      e.transitionEnd(() => {
        clearTimeout(t), e.remove();
      });
    }, 0);
  });
}
function Ot() {
  const e = o(this);
  e.children(".mdui-ripple-wave").each((t, i) => {
    Le(o(i));
  }), e.off(`${le} ${Dt} ${ce}`, Ot);
}
function Pe(e) {
  if (!nt(e) || (K(e), e.target === document))
    return;
  const t = o(e.target), i = t.hasClass("mdui-ripple") ? t : t.parents(".mdui-ripple").first();
  if (i.length && !(i.prop("disabled") || !$(i.attr("disabled"))))
    if (e.type === "touchstart") {
      let s = !1, n = setTimeout(() => {
        n = 0, Ct(e, i);
      }, 200);
      const r = () => {
        n && (clearTimeout(n), n = 0, Ct(e, i)), s || (s = !0, Ot.call(i));
      }, a = () => {
        n && (clearTimeout(n), n = 0), r();
      };
      i.on("touchmove", a).on("touchend touchcancel", r);
    } else
      Ct(e, i), i.on(`${le} ${Dt} ${ce}`, Ot);
}
o(() => {
  T.on(ft, Pe).on(Mt, K);
});
const Re = {
  overlay: !1,
  swipe: !1
};
class Ne {
  constructor(t, i = {}) {
    this.options = v({}, Re), this.overlay = !1, this.$element = o(t).first(), v(this.options, i), this.position = this.$element.hasClass("mdui-drawer-right") ? "right" : "left", this.$element.hasClass("mdui-drawer-close") ? this.state = "closed" : this.$element.hasClass("mdui-drawer-open") ? this.state = "opened" : this.isDesktop() ? this.state = "opened" : this.state = "closed", E.on(
      "resize",
      o.throttle(() => {
        this.isDesktop() ? (this.overlay && !this.options.overlay && (o.hideOverlay(), this.overlay = !1, o.unlockScreen()), this.$element.hasClass("mdui-drawer-close") || (this.state = "opened")) : !this.overlay && this.state === "opened" && (this.$element.hasClass("mdui-drawer-open") ? (o.showOverlay(), this.overlay = !0, o.lockScreen(), o(".mdui-overlay").one("click", () => this.close())) : this.state = "closed");
      }, 100)
    ), this.$element.find("[mdui-drawer-close]").each((s, n) => {
      o(n).on("click", () => this.close());
    }), this.swipeSupport();
  }
  /**
   * 是否是桌面设备
   */
  isDesktop() {
    return E.width() >= 1024;
  }
  /**
   * 滑动手势支持
   */
  swipeSupport() {
    const t = this;
    let i, s, n, r, a = null, l = !1;
    const c = o("body"), h = 24;
    function u(y) {
      const j = `translate(${-1 * (t.position === "right" ? -1 : 1) * y}px, 0) !important;`;
      t.$element.css(
        "cssText",
        `transform: ${j}; transition: initial !important;;`
      );
    }
    function g() {
      t.$element[0].style.transform = "", t.$element[0].style.webkitTransform = "", t.$element[0].style.transition = "", t.$element[0].style.webkitTransition = "";
    }
    function f() {
      return t.$element.width() + 10;
    }
    function b(y) {
      return Math.min(
        Math.max(
          a === "closing" ? r - y : f() + r - y,
          0
        ),
        f()
      );
    }
    function I(y) {
      if (a) {
        let w = y.changedTouches[0].pageX;
        t.position === "right" && (w = c.width() - w);
        const j = b(w) / f();
        l = !1;
        const x = a;
        a = null, x === "opening" ? j < 0.92 ? (g(), t.open()) : g() : j > 0.08 ? (g(), t.close()) : g(), o.unlockScreen();
      } else
        l = !1;
      c.off({
        // eslint-disable-next-line @typescript-eslint/no-use-before-define
        touchmove: _,
        touchend: I,
        // eslint-disable-next-line @typescript-eslint/no-use-before-define
        touchcancel: _
      });
    }
    function _(y) {
      let w = y.touches[0].pageX;
      t.position === "right" && (w = c.width() - w);
      const j = y.touches[0].pageY;
      if (a)
        u(b(w));
      else if (l) {
        const x = Math.abs(w - s), P = Math.abs(j - n), C = 8;
        x > C && P <= C ? (r = w, a = t.state === "opened" ? "closing" : "opening", o.lockScreen(), u(b(w))) : x <= C && P > C && I();
      }
    }
    function S(y) {
      s = y.touches[0].pageX, t.position === "right" && (s = c.width() - s), n = y.touches[0].pageY, !(t.state !== "opened" && (s > h || i !== S)) && (l = !0, c.on({
        touchmove: _,
        touchend: I,
        touchcancel: _
      }));
    }
    function L() {
      i || (c.on("touchstart", S), i = S);
    }
    this.options.swipe && L();
  }
  /**
   * 触发组件事件
   * @param name
   */
  triggerEvent(t) {
    q(t, "drawer", this.$element, this);
  }
  /**
   * 动画结束回调
   */
  transitionEnd() {
    this.$element.hasClass("mdui-drawer-open") ? (this.state = "opened", this.triggerEvent("opened")) : (this.state = "closed", this.triggerEvent("closed"));
  }
  /**
   * 是否处于打开状态
   */
  isOpen() {
    return this.state === "opening" || this.state === "opened";
  }
  /**
   * 打开抽屉栏
   */
  open() {
    this.isOpen() || (this.state = "opening", this.triggerEvent("open"), this.options.overlay || o("body").addClass(`mdui-drawer-body-${this.position}`), this.$element.removeClass("mdui-drawer-close").addClass("mdui-drawer-open").transitionEnd(() => this.transitionEnd()), (!this.isDesktop() || this.options.overlay) && (this.overlay = !0, o.showOverlay().one("click", () => this.close()), o.lockScreen()));
  }
  /**
   * 关闭抽屉栏
   */
  close() {
    this.isOpen() && (this.state = "closing", this.triggerEvent("close"), this.options.overlay || o("body").removeClass(`mdui-drawer-body-${this.position}`), this.$element.addClass("mdui-drawer-close").removeClass("mdui-drawer-open").transitionEnd(() => this.transitionEnd()), this.overlay && (o.hideOverlay(), this.overlay = !1, o.unlockScreen()));
  }
  /**
   * 切换抽屉栏打开/关闭状态
   */
  toggle() {
    this.isOpen() ? this.close() : this.open();
  }
  /**
   * 返回当前抽屉栏的状态。共包含四种状态：`opening`、`opened`、`closing`、`closed`
   */
  getState() {
    return this.state;
  }
}
d.Drawer = Ne;
const Nt = "mdui-drawer";
o(() => {
  d.mutation(`[${Nt}]`, function() {
    const e = o(this), t = z(this, Nt), i = t.target;
    delete t.target;
    const s = o(i).first(), n = new d.Drawer(s, t);
    e.on("click", () => n.toggle());
  });
});
const J = {};
function X(e, t) {
  if ($(J[e]) && (J[e] = []), $(t))
    return J[e];
  J[e].push(t);
}
function he(e) {
  if ($(J[e]) || !J[e].length)
    return;
  J[e].shift()();
}
const je = {
  history: !0,
  overlay: !0,
  modal: !1,
  closeOnEsc: !0,
  closeOnCancel: !0,
  closeOnConfirm: !0,
  destroyOnClosed: !1
};
let k = null;
const Y = "_mdui_dialog";
let Q = !1, B;
class Fe {
  constructor(t, i = {}) {
    this.options = v({}, je), this.state = "closed", this.append = !1, this.$element = o(t).first(), W(document.body, this.$element[0]) || (this.append = !0, o("body").append(this.$element)), v(this.options, i), this.$element.find("[mdui-dialog-cancel]").each((s, n) => {
      o(n).on("click", () => {
        this.triggerEvent("cancel"), this.options.closeOnCancel && this.close();
      });
    }), this.$element.find("[mdui-dialog-confirm]").each((s, n) => {
      o(n).on("click", () => {
        this.triggerEvent("confirm"), this.options.closeOnConfirm && this.close();
      });
    }), this.$element.find("[mdui-dialog-close]").each((s, n) => {
      o(n).on("click", () => this.close());
    });
  }
  /**
   * 触发组件事件
   * @param name
   */
  triggerEvent(t) {
    q(t, "dialog", this.$element, this);
  }
  /**
   * 窗口宽度变化，或对话框内容变化时，调整对话框位置和对话框内的滚动条
   */
  readjust() {
    if (!k)
      return;
    const t = k.$element, i = t.children(".mdui-dialog-title"), s = t.children(".mdui-dialog-content"), n = t.children(".mdui-dialog-actions");
    t.height(""), s.height("");
    const r = t.height();
    t.css({
      top: `${(E.height() - r) / 2}px`,
      height: `${r}px`
    }), s.innerHeight(
      r - (i.innerHeight() || 0) - (n.innerHeight() || 0)
    );
  }
  /**
   * hashchange 事件触发时关闭对话框
   */
  hashchangeEvent() {
    window.location.hash.substring(1).indexOf("mdui-dialog") < 0 && k.close(!0);
  }
  /**
   * 点击遮罩层关闭对话框
   * @param event
   */
  overlayClick(t) {
    o(t.target).hasClass("mdui-overlay") && k && k.close();
  }
  /**
   * 动画结束回调
   */
  transitionEnd() {
    this.$element.hasClass("mdui-dialog-open") ? (this.state = "opened", this.triggerEvent("opened")) : (this.state = "closed", this.triggerEvent("closed"), this.$element.hide(), !X(Y).length && !k && Q && (o.unlockScreen(), Q = !1), E.off("resize", o.throttle(this.readjust, 100)), this.options.destroyOnClosed && this.destroy());
  }
  /**
   * 打开指定对话框
   */
  doOpen() {
    if (k = this, Q || (o.lockScreen(), Q = !0), this.$element.show(), this.readjust(), E.on("resize", o.throttle(this.readjust, 100)), this.state = "opening", this.triggerEvent("open"), this.$element.addClass("mdui-dialog-open").transitionEnd(() => this.transitionEnd()), B || (B = o.showOverlay(5100)), this.options.modal ? B.off("click", this.overlayClick) : B.on("click", this.overlayClick), B.css("opacity", this.options.overlay ? "" : 0), this.options.history) {
      let t = window.location.hash.substring(1);
      t.indexOf("mdui-dialog") > -1 && (t = t.replace(/[&?]?mdui-dialog/g, "")), t ? window.location.hash = `${t}${t.indexOf("?") > -1 ? "&" : "?"}mdui-dialog` : window.location.hash = "mdui-dialog", E.on("hashchange", this.hashchangeEvent);
    }
  }
  /**
   * 当前对话框是否为打开状态
   */
  isOpen() {
    return this.state === "opening" || this.state === "opened";
  }
  /**
   * 打开对话框
   */
  open() {
    if (!this.isOpen()) {
      if (k && (k.state === "opening" || k.state === "opened") || X(Y).length) {
        X(Y, () => this.doOpen());
        return;
      }
      this.doOpen();
    }
  }
  /**
   * 关闭对话框
   */
  close(t = !1) {
    setTimeout(() => {
      this.isOpen() && (k = null, this.state = "closing", this.triggerEvent("close"), !X(Y).length && B && (o.hideOverlay(), B = null, o(".mdui-overlay").css("z-index", 2e3)), this.$element.removeClass("mdui-dialog-open").transitionEnd(() => this.transitionEnd()), this.options.history && !X(Y).length && (t || window.history.back(), E.off("hashchange", this.hashchangeEvent)), setTimeout(() => {
        he(Y);
      }, 100));
    });
  }
  /**
   * 切换对话框打开/关闭状态
   */
  toggle() {
    this.isOpen() ? this.close() : this.open();
  }
  /**
   * 获取对话框状态。共包含四种状态：`opening`、`opened`、`closing`、`closed`
   */
  getState() {
    return this.state;
  }
  /**
   * 销毁对话框
   */
  destroy() {
    this.append && this.$element.remove(), !X(Y).length && !k && (B && (o.hideOverlay(), B = null), Q && (o.unlockScreen(), Q = !1));
  }
  /**
   * 对话框内容变化时，需要调用该方法来调整对话框位置和滚动条高度
   */
  handleUpdate() {
    this.readjust();
  }
}
T.on("keydown", (e) => {
  k && k.options.closeOnEsc && k.state === "opened" && e.keyCode === 27 && k.close();
});
d.Dialog = Fe;
const jt = "mdui-dialog", Ft = "_mdui_dialog";
o(() => {
  T.on("click", `[${jt}]`, function() {
    const e = z(this, jt), t = e.target;
    delete e.target;
    const i = o(t).first();
    let s = i.data(Ft);
    s || (s = new d.Dialog(i, e), i.data(Ft, s)), s.open();
  });
});
const Be = {
  text: "",
  bold: !1,
  close: !0,
  // eslint-disable-next-line @typescript-eslint/no-empty-function
  onClick: () => {
  }
}, We = {
  title: "",
  content: "",
  buttons: [],
  stackedButtons: !1,
  cssClass: "",
  history: !0,
  overlay: !0,
  modal: !1,
  closeOnEsc: !0,
  destroyOnClosed: !0,
  // eslint-disable-next-line @typescript-eslint/no-empty-function
  onOpen: () => {
  },
  // eslint-disable-next-line @typescript-eslint/no-empty-function
  onOpened: () => {
  },
  // eslint-disable-next-line @typescript-eslint/no-empty-function
  onClose: () => {
  },
  // eslint-disable-next-line @typescript-eslint/no-empty-function
  onClosed: () => {
  }
};
d.dialog = function(e) {
  e = v({}, We, e), m(e.buttons, (n, r) => {
    e.buttons[n] = v({}, Be, r);
  });
  let t = "";
  e.buttons?.length && (t = `<div class="mdui-dialog-actions${e.stackedButtons ? " mdui-dialog-actions-stacked" : ""}">`, m(e.buttons, (n, r) => {
    t += `<a href="javascript:void(0)" class="mdui-btn mdui-ripple mdui-text-color-primary ${r.bold ? "mdui-btn-bold" : ""}">${r.text}</a>`;
  }), t += "</div>");
  const i = `<div class="mdui-dialog ${e.cssClass}">` + (e.title ? `<div class="mdui-dialog-title">${e.title}</div>` : "") + (e.content ? `<div class="mdui-dialog-content">${e.content}</div>` : "") + t + "</div>", s = new d.Dialog(i, {
    history: e.history,
    overlay: e.overlay,
    modal: e.modal,
    closeOnEsc: e.closeOnEsc,
    destroyOnClosed: e.destroyOnClosed
  });
  return e.buttons?.length && s.$element.find(".mdui-dialog-actions .mdui-btn").each((n, r) => {
    o(r).on("click", () => {
      e.buttons[n].onClick(s), e.buttons[n].close && s.close();
    });
  }), s.$element.on("open.mdui.dialog", () => {
    e.onOpen(s);
  }).on("opened.mdui.dialog", () => {
    e.onOpened(s);
  }).on("close.mdui.dialog", () => {
    e.onClose(s);
  }).on("closed.mdui.dialog", () => {
    e.onClosed(s);
  }), s.open(), s;
};
const Ue = {
  confirmText: "ok",
  history: !0,
  modal: !1,
  closeOnEsc: !0,
  closeOnConfirm: !0
};
d.alert = function(e, t, i, s) {
  return A(t) && (s = i, i = t, t = ""), $(i) && (i = () => {
  }), $(s) && (s = {}), s = v({}, Ue, s), d.dialog({
    title: t,
    content: e,
    buttons: [
      {
        text: s.confirmText,
        bold: !1,
        close: s.closeOnConfirm,
        onClick: i
      }
    ],
    cssClass: "mdui-dialog-alert",
    history: s.history,
    modal: s.modal,
    closeOnEsc: s.closeOnEsc
  });
};
const qe = {
  confirmText: "ok",
  cancelText: "cancel",
  history: !0,
  modal: !1,
  closeOnEsc: !0,
  closeOnCancel: !0,
  closeOnConfirm: !0
};
d.confirm = function(e, t, i, s, n) {
  return A(t) && (n = s, s = i, i = t, t = ""), $(i) && (i = () => {
  }), $(s) && (s = () => {
  }), $(n) && (n = {}), n = v({}, qe, n), d.dialog({
    title: t,
    content: e,
    buttons: [
      {
        text: n.cancelText,
        bold: !1,
        close: n.closeOnCancel,
        onClick: s
      },
      {
        text: n.confirmText,
        bold: !1,
        close: n.closeOnConfirm,
        onClick: i
      }
    ],
    cssClass: "mdui-dialog-confirm",
    history: n.history,
    modal: n.modal,
    closeOnEsc: n.closeOnEsc
  });
};
const ze = {
  reInit: !1,
  domLoadedEvent: !1
};
function Ye(e, t = {}) {
  t = v({}, ze, t);
  const i = e.target, s = o(i), n = e.type, r = s.val(), a = s.attr("type") || "";
  if (["checkbox", "button", "submit", "range", "radio", "image"].indexOf(
    a
  ) > -1)
    return;
  const l = s.parent(".mdui-textfield");
  if (n === "focus" && l.addClass("mdui-textfield-focus"), n === "blur" && l.removeClass("mdui-textfield-focus"), (n === "blur" || n === "input") && (r ? l.addClass("mdui-textfield-not-empty") : l.removeClass("mdui-textfield-not-empty")), i.disabled ? l.addClass("mdui-textfield-disabled") : l.removeClass("mdui-textfield-disabled"), (n === "input" || n === "blur") && !t.domLoadedEvent && i.validity && (i.validity.valid ? l.removeClass("mdui-textfield-invalid-html5") : l.addClass("mdui-textfield-invalid-html5")), s.is("textarea")) {
    const h = r;
    let u = !1;
    h.replace(/[\r\n]/g, "") === "" && (s.val(" " + h), u = !0), s.outerHeight("");
    const g = s.outerHeight(), f = i.scrollHeight;
    f > g && s.outerHeight(f), u && s.val(h);
  }
  t.reInit && l.find(".mdui-textfield-counter").remove();
  const c = s.attr("maxlength");
  c && ((t.reInit || t.domLoadedEvent) && o(
    `<div class="mdui-textfield-counter"><span class="mdui-textfield-counter-inputed"></span> / ${c}</div>`
  ).appendTo(l), l.find(".mdui-textfield-counter-inputed").text(r.length.toString())), (l.find(".mdui-textfield-helper").length || l.find(".mdui-textfield-error").length || c) && l.addClass("mdui-textfield-has-bottom");
}
o(() => {
  T.on(
    "input focus blur",
    ".mdui-textfield-input",
    { useCapture: !0 },
    Ye
  ), T.on(
    "click",
    ".mdui-textfield-expandable .mdui-textfield-icon",
    function() {
      o(this).parents(".mdui-textfield").addClass("mdui-textfield-expanded").find(".mdui-textfield-input")[0].focus();
    }
  ), T.on(
    "click",
    ".mdui-textfield-expanded .mdui-textfield-close",
    function() {
      o(this).parents(".mdui-textfield").removeClass("mdui-textfield-expanded").find(".mdui-textfield-input").val("");
    }
  ), d.mutation(".mdui-textfield", function() {
    o(this).find(".mdui-textfield-input").trigger("input", {
      domLoadedEvent: !0
    });
  });
});
d.updateTextFields = function(e) {
  ($(e) ? o(".mdui-textfield") : o(e)).each((i, s) => {
    o(s).find(".mdui-textfield-input").trigger("input", {
      reInit: !0
    });
  });
};
const Xe = {
  confirmText: "ok",
  cancelText: "cancel",
  history: !0,
  modal: !1,
  closeOnEsc: !0,
  closeOnCancel: !0,
  closeOnConfirm: !0,
  type: "text",
  maxlength: 0,
  defaultValue: "",
  confirmOnEnter: !1
};
d.prompt = function(e, t, i, s, n) {
  A(t) && (n = s, s = i, i = t, t = ""), $(i) && (i = () => {
  }), $(s) && (s = () => {
  }), $(n) && (n = {}), n = v({}, Xe, n);
  const r = '<div class="mdui-textfield">' + (e ? `<label class="mdui-textfield-label">${e}</label>` : "") + (n.type === "text" ? `<input class="mdui-textfield-input" type="text" value="${n.defaultValue}" ${n.maxlength ? 'maxlength="' + n.maxlength + '"' : ""}/>` : "") + (n.type === "textarea" ? `<textarea class="mdui-textfield-input" ${n.maxlength ? 'maxlength="' + n.maxlength + '"' : ""}>${n.defaultValue}</textarea>` : "") + "</div>", a = (c) => {
    const h = c.$element.find(".mdui-textfield-input").val();
    s(h, c);
  }, l = (c) => {
    const h = c.$element.find(".mdui-textfield-input").val();
    i(h, c);
  };
  return d.dialog({
    title: t,
    content: r,
    buttons: [
      {
        text: n.cancelText,
        bold: !1,
        close: n.closeOnCancel,
        onClick: a
      },
      {
        text: n.confirmText,
        bold: !1,
        close: n.closeOnConfirm,
        onClick: l
      }
    ],
    cssClass: "mdui-dialog-prompt",
    history: n.history,
    modal: n.modal,
    closeOnEsc: n.closeOnEsc,
    onOpen: (c) => {
      const h = c.$element.find(".mdui-textfield-input");
      d.updateTextFields(h), h[0].focus(), n.type !== "textarea" && n.confirmOnEnter === !0 && h.on("keydown", (u) => {
        if (u.keyCode === 13) {
          const g = c.$element.find(".mdui-textfield-input").val();
          return i(g, c), n.closeOnConfirm && c.close(), !1;
        }
      }), n.type === "textarea" && h.on("input", () => c.handleUpdate()), n.maxlength && c.handleUpdate();
    }
  });
};
const Ve = {
  position: "auto",
  align: "auto",
  gutter: 16,
  fixed: !1,
  covered: "auto",
  subMenuTrigger: "hover",
  subMenuDelay: 200
};
class Je {
  constructor(t, i, s = {}) {
    if (this.options = v({}, Ve), this.state = "closed", this.$anchor = o(t).first(), this.$element = o(i).first(), !this.$anchor.parent().is(this.$element.parent()))
      throw new Error("anchorSelector and menuSelector must be siblings");
    v(this.options, s), this.isCascade = this.$element.hasClass("mdui-menu-cascade"), this.isCovered = this.options.covered === "auto" ? !this.isCascade : this.options.covered, this.$anchor.on("click", () => this.toggle()), T.on("click touchstart", (r) => {
      const a = o(r.target);
      this.isOpen() && !a.is(this.$element) && !W(this.$element[0], a[0]) && !a.is(this.$anchor) && !W(this.$anchor[0], a[0]) && this.close();
    });
    const n = this;
    T.on("click", ".mdui-menu-item", function() {
      const r = o(this);
      !r.find(".mdui-menu").length && r.attr("disabled") === void 0 && n.close();
    }), this.bindSubMenuEvent(), E.on(
      "resize",
      o.throttle(() => this.readjust(), 100)
    );
  }
  /**
   * 是否为打开状态
   */
  isOpen() {
    return this.state === "opening" || this.state === "opened";
  }
  /**
   * 触发组件事件
   * @param name
   */
  triggerEvent(t) {
    q(t, "menu", this.$element, this);
  }
  /**
   * 调整主菜单位置
   */
  readjust() {
    let t, i, s, n;
    const r = E.height(), a = E.width(), l = this.options.gutter, c = this.isCovered, h = this.options.fixed;
    let u, g;
    const f = this.$element.width(), b = this.$element.height(), I = this.$anchor[0].getBoundingClientRect(), _ = I.top, S = I.left, L = I.height, y = I.width, w = r - _ - L, j = a - S - y, x = this.$anchor[0].offsetTop, P = this.$anchor[0].offsetLeft;
    if (this.options.position === "auto" ? w + (c ? L : 0) > b + l ? s = "bottom" : _ + (c ? L : 0) > b + l ? s = "top" : s = "center" : s = this.options.position, this.options.align === "auto" ? j + y > f + l ? n = "left" : S + y > f + l ? n = "right" : n = "center" : n = this.options.align, s === "bottom")
      g = "0", i = (c ? 0 : L) + (h ? _ : x);
    else if (s === "top")
      g = "100%", i = (c ? L : 0) + (h ? _ - b : x - b);
    else {
      g = "50%";
      let C = b;
      this.isCascade || b + l * 2 > r && (C = r - l * 2, this.$element.height(C)), i = (r - C) / 2 + (h ? 0 : x - _);
    }
    if (this.$element.css("top", `${i}px`), n === "left")
      u = "0", t = h ? S : P;
    else if (n === "right")
      u = "100%", t = h ? S + y - f : P + y - f;
    else {
      u = "50%";
      let C = f;
      f + l * 2 > a && (C = a - l * 2, this.$element.width(C)), t = (a - C) / 2 + (h ? 0 : P - S);
    }
    this.$element.css("left", `${t}px`), this.$element.transformOrigin(`${u} ${g}`);
  }
  /**
   * 调整子菜单的位置
   * @param $submenu
   */
  readjustSubmenu(t) {
    const i = t.parent(".mdui-menu-item");
    let s, n, r, a;
    const l = E.height(), c = E.width();
    let h, u;
    const g = t.width(), f = t.height(), b = i[0].getBoundingClientRect(), I = b.width, _ = b.height, S = b.left, L = b.top;
    l - L > f ? r = "bottom" : L + _ > f ? r = "top" : r = "bottom", c - S - I > g ? a = "left" : S > g ? a = "right" : a = "left", r === "bottom" ? (u = "0", s = "0") : r === "top" && (u = "100%", s = -f + _), t.css("top", `${s}px`), a === "left" ? (h = "0", n = I) : a === "right" && (h = "100%", n = -g), t.css("left", `${n}px`), t.transformOrigin(`${h} ${u}`);
  }
  /**
   * 打开子菜单
   * @param $submenu
   */
  openSubMenu(t) {
    this.readjustSubmenu(t), t.addClass("mdui-menu-open").parent(".mdui-menu-item").addClass("mdui-menu-item-active");
  }
  /**
   * 关闭子菜单，及其嵌套的子菜单
   * @param $submenu
   */
  closeSubMenu(t) {
    t.removeClass("mdui-menu-open").addClass("mdui-menu-closing").transitionEnd(() => t.removeClass("mdui-menu-closing")).parent(".mdui-menu-item").removeClass("mdui-menu-item-active"), t.find(".mdui-menu").each((i, s) => {
      const n = o(s);
      n.removeClass("mdui-menu-open").addClass("mdui-menu-closing").transitionEnd(() => n.removeClass("mdui-menu-closing")).parent(".mdui-menu-item").removeClass("mdui-menu-item-active");
    });
  }
  /**
   * 切换子菜单状态
   * @param $submenu
   */
  toggleSubMenu(t) {
    t.hasClass("mdui-menu-open") ? this.closeSubMenu(t) : this.openSubMenu(t);
  }
  /**
   * 绑定子菜单事件
   */
  bindSubMenuEvent() {
    const t = this;
    if (this.$element.on("click", ".mdui-menu-item", function(i) {
      const s = o(this), n = o(i.target);
      if (s.attr("disabled") !== void 0 || n.is(".mdui-menu") || n.is(".mdui-divider") || !n.parents(".mdui-menu-item").first().is(s))
        return;
      const r = s.children(".mdui-menu");
      s.parent(".mdui-menu").children(".mdui-menu-item").each((a, l) => {
        const c = o(l).children(".mdui-menu");
        c.length && (!r.length || !c.is(r)) && t.closeSubMenu(c);
      }), r.length && t.toggleSubMenu(r);
    }), this.options.subMenuTrigger === "hover") {
      let i = null, s = null;
      this.$element.on(
        "mouseover mouseout",
        ".mdui-menu-item",
        function(n) {
          const r = o(this), a = n.type, l = o(
            n.relatedTarget
          );
          if (r.attr("disabled") !== void 0)
            return;
          if (a === "mouseover") {
            if (!r.is(l) && W(r[0], l[0]))
              return;
          } else if (a === "mouseout" && (r.is(l) || W(r[0], l[0])))
            return;
          const c = r.children(".mdui-menu");
          if (a === "mouseover") {
            if (c.length) {
              const h = c.data("timeoutClose.mdui.menu");
              if (h && clearTimeout(h), c.hasClass("mdui-menu-open"))
                return;
              clearTimeout(s), i = s = setTimeout(
                () => t.openSubMenu(c),
                t.options.subMenuDelay
              ), c.data("timeoutOpen.mdui.menu", i);
            }
          } else if (a === "mouseout" && c.length) {
            const h = c.data("timeoutOpen.mdui.menu");
            h && clearTimeout(h), i = setTimeout(
              () => t.closeSubMenu(c),
              t.options.subMenuDelay
            ), c.data("timeoutClose.mdui.menu", i);
          }
        }
      );
    }
  }
  /**
   * 动画结束回调
   */
  transitionEnd() {
    this.$element.removeClass("mdui-menu-closing"), this.state === "opening" && (this.state = "opened", this.triggerEvent("opened")), this.state === "closing" && (this.state = "closed", this.triggerEvent("closed"), this.$element.css({
      top: "",
      left: "",
      width: "",
      position: "fixed"
    }));
  }
  /**
   * 切换菜单状态
   */
  toggle() {
    this.isOpen() ? this.close() : this.open();
  }
  /**
   * 打开菜单
   */
  open() {
    this.isOpen() || (this.state = "opening", this.triggerEvent("open"), this.readjust(), this.$element.css("position", this.options.fixed ? "fixed" : "absolute").addClass("mdui-menu-open").transitionEnd(() => this.transitionEnd()));
  }
  /**
   * 关闭菜单
   */
  close() {
    this.isOpen() && (this.state = "closing", this.triggerEvent("close"), this.$element.find(".mdui-menu").each((t, i) => {
      this.closeSubMenu(o(i));
    }), this.$element.removeClass("mdui-menu-open").addClass("mdui-menu-closing").transitionEnd(() => this.transitionEnd()));
  }
}
d.Menu = Je;
const Bt = "mdui-menu", Wt = "_mdui_menu";
o(() => {
  T.on("click", `[${Bt}]`, function() {
    const e = o(this);
    let t = e.data(Wt);
    if (!t) {
      const i = z(this, Bt), s = i.target;
      delete i.target, t = new d.Menu(e, s, i), e.data(Wt, t), t.toggle();
    }
  });
});
const Qe = {
  message: "",
  timeout: 4e3,
  position: "bottom",
  buttonText: "",
  buttonColor: "",
  closeOnButtonClick: !0,
  closeOnOutsideClick: !0,
  // eslint-disable-next-line @typescript-eslint/no-empty-function
  onClick: () => {
  },
  // eslint-disable-next-line @typescript-eslint/no-empty-function
  onButtonClick: () => {
  },
  // eslint-disable-next-line @typescript-eslint/no-empty-function
  onOpen: () => {
  },
  // eslint-disable-next-line @typescript-eslint/no-empty-function
  onOpened: () => {
  },
  // eslint-disable-next-line @typescript-eslint/no-empty-function
  onClose: () => {
  },
  // eslint-disable-next-line @typescript-eslint/no-empty-function
  onClosed: () => {
  }
};
let ct = null;
const Ut = "_mdui_snackbar";
class Ge {
  constructor(t) {
    this.options = v({}, Qe), this.state = "closed", this.timeoutId = null, v(this.options, t);
    let i = "", s = "";
    this.options.buttonColor.indexOf("#") === 0 || this.options.buttonColor.indexOf("rgb") === 0 ? i = `style="color:${this.options.buttonColor}"` : this.options.buttonColor !== "" && (s = `mdui-text-color-${this.options.buttonColor}`), this.$element = o(
      `<div class="mdui-snackbar"><div class="mdui-snackbar-text">${this.options.message}</div>` + (this.options.buttonText ? `<a href="javascript:void(0)" class="mdui-snackbar-action mdui-btn mdui-ripple mdui-ripple-white ${s}" ${i}>${this.options.buttonText}</a>` : "") + "</div>"
    ).appendTo(document.body), this.setPosition("close"), this.$element.reflow().addClass(`mdui-snackbar-${this.options.position}`);
  }
  /**
   * 点击 Snackbar 外面的区域关闭
   * @param event
   */
  closeOnOutsideClick(t) {
    const i = o(t.target);
    !i.hasClass("mdui-snackbar") && !i.parents(".mdui-snackbar").length && ct.close();
  }
  /**
   * 设置 Snackbar 的位置
   * @param state
   */
  setPosition(t) {
    const i = this.$element[0].clientHeight, s = this.options.position;
    let n, r;
    s === "bottom" || s === "top" ? n = "-50%" : n = "0", t === "open" ? r = "0" : (s === "bottom" && (r = i), s === "top" && (r = -i), (s === "left-top" || s === "right-top") && (r = -i - 24), (s === "left-bottom" || s === "right-bottom") && (r = i + 24)), this.$element.transform(`translate(${n},${r}px`);
  }
  /**
   * 打开 Snackbar
   */
  open() {
    if (!(this.state === "opening" || this.state === "opened")) {
      if (ct) {
        X(Ut, () => this.open());
        return;
      }
      ct = this, this.state = "opening", this.options.onOpen(this), this.setPosition("open"), this.$element.transitionEnd(() => {
        this.state === "opening" && (this.state = "opened", this.options.onOpened(this), this.options.buttonText && this.$element.find(".mdui-snackbar-action").on("click", () => {
          this.options.onButtonClick(this), this.options.closeOnButtonClick && this.close();
        }), this.$element.on("click", (t) => {
          o(t.target).hasClass("mdui-snackbar-action") || this.options.onClick(this);
        }), this.options.closeOnOutsideClick && T.on(ft, this.closeOnOutsideClick), this.options.timeout && (this.timeoutId = setTimeout(() => this.close(), this.options.timeout)));
      });
    }
  }
  /**
   * 关闭 Snackbar
   */
  close() {
    this.state === "closing" || this.state === "closed" || (this.timeoutId && clearTimeout(this.timeoutId), this.options.closeOnOutsideClick && T.off(ft, this.closeOnOutsideClick), this.state = "closing", this.options.onClose(this), this.setPosition("close"), this.$element.transitionEnd(() => {
      this.state === "closing" && (ct = null, this.state = "closed", this.options.onClosed(this), this.$element.remove(), he(Ut));
    }));
  }
}
d.snackbar = function(e, t = {}) {
  H(e) ? t.message = e : t = e;
  const i = new Ge(t);
  return i.open(), i;
};
function ue(e) {
  const t = e.data(), i = t._slider_$track, s = t._slider_$fill, n = t._slider_$thumb, r = t._slider_$input, a = t._slider_min, l = t._slider_max, c = t._slider_disabled, h = t._slider_discrete, u = t._slider_$thumbText, g = r.val(), f = (g - a) / (l - a) * 100;
  s.width(`${f}%`), i.width(`${100 - f}%`), c && (s.css("padding-right", "6px"), i.css("padding-left", "6px")), n.css("left", `${f}%`), h && u.text(g), f === 0 ? e.addClass("mdui-slider-zero") : e.removeClass("mdui-slider-zero");
}
function de(e) {
  const t = o('<div class="mdui-slider-track"></div>'), i = o('<div class="mdui-slider-fill"></div>'), s = o('<div class="mdui-slider-thumb"></div>'), n = e.find('input[type="range"]'), r = n[0].disabled, a = e.hasClass("mdui-slider-discrete");
  r ? e.addClass("mdui-slider-disabled") : e.removeClass("mdui-slider-disabled"), e.find(".mdui-slider-track").remove(), e.find(".mdui-slider-fill").remove(), e.find(".mdui-slider-thumb").remove(), e.append(t).append(i).append(s);
  let l = o();
  a && (l = o("<span></span>"), s.empty().append(l)), e.data("_slider_$track", t), e.data("_slider_$fill", i), e.data("_slider_$thumb", s), e.data("_slider_$input", n), e.data("_slider_min", n.attr("min")), e.data("_slider_max", n.attr("max")), e.data("_slider_disabled", r), e.data("_slider_discrete", a), e.data("_slider_$thumbText", l), ue(e);
}
const ht = '.mdui-slider input[type="range"]';
o(() => {
  T.on("input change", ht, function() {
    const e = o(this).parent();
    ue(e);
  }), T.on(ft, ht, function(e) {
    if (!nt(e) || (K(e), this.disabled))
      return;
    o(this).parent().addClass("mdui-slider-focus");
  }), T.on(Dt, ht, function(e) {
    if (!nt(e) || this.disabled)
      return;
    o(this).parent().removeClass("mdui-slider-focus");
  }), T.on(Mt, ht, K), d.mutation(".mdui-slider", function() {
    de(o(this));
  });
});
d.updateSliders = function(e) {
  ($(e) ? o(".mdui-slider") : o(e)).each((i, s) => {
    de(o(s));
  });
};
const Ke = {
  tolerance: 5,
  offset: 0,
  initialClass: "mdui-headroom",
  pinnedClass: "mdui-headroom-pinned-top",
  unpinnedClass: "mdui-headroom-unpinned-top"
};
class Ze {
  constructor(t, i = {}) {
    this.options = v({}, Ke), this.state = "pinned", this.isEnable = !1, this.lastScrollY = 0, this.rafId = 0, this.$element = o(t).first(), v(this.options, i);
    const s = this.options.tolerance;
    Z(s) && (this.options.tolerance = {
      down: s,
      up: s
    }), this.enable();
  }
  /**
   * 滚动时的处理
   */
  onScroll() {
    this.rafId = window.requestAnimationFrame(() => {
      const t = window.pageYOffset, i = t > this.lastScrollY ? "down" : "up", s = this.options.tolerance[i], r = Math.abs(t - this.lastScrollY) >= s;
      t > this.lastScrollY && t >= this.options.offset && r ? this.unpin() : (t < this.lastScrollY && r || t <= this.options.offset) && this.pin(), this.lastScrollY = t;
    });
  }
  /**
   * 触发组件事件
   * @param name
   */
  triggerEvent(t) {
    q(t, "headroom", this.$element, this);
  }
  /**
   * 动画结束的回调
   */
  transitionEnd() {
    this.state === "pinning" && (this.state = "pinned", this.triggerEvent("pinned")), this.state === "unpinning" && (this.state = "unpinned", this.triggerEvent("unpinned"));
  }
  /**
   * 使元素固定住
   */
  pin() {
    this.state === "pinning" || this.state === "pinned" || !this.$element.hasClass(this.options.initialClass) || (this.triggerEvent("pin"), this.state = "pinning", this.$element.removeClass(this.options.unpinnedClass).addClass(this.options.pinnedClass).transitionEnd(() => this.transitionEnd()));
  }
  /**
   * 使元素隐藏
   */
  unpin() {
    this.state === "unpinning" || this.state === "unpinned" || !this.$element.hasClass(this.options.initialClass) || (this.triggerEvent("unpin"), this.state = "unpinning", this.$element.removeClass(this.options.pinnedClass).addClass(this.options.unpinnedClass).transitionEnd(() => this.transitionEnd()));
  }
  /**
   * 启用 headroom 插件
   */
  enable() {
    this.isEnable || (this.isEnable = !0, this.state = "pinned", this.$element.addClass(this.options.initialClass).removeClass(this.options.pinnedClass).removeClass(this.options.unpinnedClass), this.lastScrollY = window.pageYOffset, E.on("scroll", () => this.onScroll()));
  }
  /**
   * 禁用 headroom 插件
   */
  disable() {
    this.isEnable && (this.isEnable = !1, this.$element.removeClass(this.options.initialClass).removeClass(this.options.pinnedClass).removeClass(this.options.unpinnedClass), E.off("scroll", () => this.onScroll()), window.cancelAnimationFrame(this.rafId));
  }
  /**
   * 获取当前状态。共包含四种状态：`pinning`、`pinned`、`unpinning`、`unpinned`
   */
  getState() {
    return this.state;
  }
}
d.Headroom = Ze;
o(() => {
  T.on("click", ".mdui-bottom-nav>a", function() {
    const e = o(this), t = e.parent();
    t.children("a").each((i, s) => {
      const n = e.is(s);
      n && q("change", "bottomNav", t[0], void 0, {
        index: i
      }), n ? o(s).addClass("mdui-bottom-nav-active") : o(s).removeClass("mdui-bottom-nav-active");
    });
  }), d.mutation(".mdui-bottom-nav-scroll-hide", function() {
    new d.Headroom(this, {
      pinnedClass: "mdui-headroom-pinned-down",
      unpinnedClass: "mdui-headroom-unpinned-down"
    });
  });
});
class fe {
  constructor(t) {
    this.$thRow = o(), this.$tdRows = o(), this.$thCheckbox = o(), this.$tdCheckboxs = o(), this.selectable = !1, this.selectedRow = 0, this.$element = o(t).first(), this.init();
  }
  /**
   * 初始化表格
   */
  init() {
    this.$thRow = this.$element.find("thead tr"), this.$tdRows = this.$element.find("tbody tr"), this.selectable = this.$element.hasClass("mdui-table-selectable"), this.updateThCheckbox(), this.updateTdCheckbox(), this.updateNumericCol();
  }
  /**
   * 生成 checkbox 的 HTML 结构
   * @param tag 标签名
   */
  createCheckboxHTML(t) {
    return `<${t} class="mdui-table-cell-checkbox"><label class="mdui-checkbox"><input type="checkbox"/><i class="mdui-checkbox-icon"></i></label></${t}>`;
  }
  /**
   * 更新表头 checkbox 的状态
   */
  updateThCheckboxStatus() {
    const t = this.$thCheckbox[0], i = this.selectedRow, s = this.$tdRows.length;
    t.checked = i === s, t.indeterminate = !!i && i !== s;
  }
  /**
   * 更新表格行的 checkbox
   */
  updateTdCheckbox() {
    const t = "mdui-table-row-selected";
    this.$tdRows.each((i, s) => {
      const n = o(s);
      if (n.find(".mdui-table-cell-checkbox").remove(), !this.selectable)
        return;
      const r = o(this.createCheckboxHTML("td")).prependTo(n).find('input[type="checkbox"]');
      n.hasClass(t) && (r[0].checked = !0, this.selectedRow++), this.updateThCheckboxStatus(), r.on("change", () => {
        r[0].checked ? (n.addClass(t), this.selectedRow++) : (n.removeClass(t), this.selectedRow--), this.updateThCheckboxStatus();
      }), this.$tdCheckboxs = this.$tdCheckboxs.add(r);
    });
  }
  /**
   * 更新表头的 checkbox
   */
  updateThCheckbox() {
    this.$thRow.find(".mdui-table-cell-checkbox").remove(), this.selectable && (this.$thCheckbox = o(this.createCheckboxHTML("th")).prependTo(this.$thRow).find('input[type="checkbox"]').on("change", () => {
      const t = this.$thCheckbox[0].checked;
      this.selectedRow = t ? this.$tdRows.length : 0, this.$tdCheckboxs.each((i, s) => {
        s.checked = t;
      }), this.$tdRows.each((i, s) => {
        t ? o(s).addClass("mdui-table-row-selected") : o(s).removeClass("mdui-table-row-selected");
      });
    }));
  }
  /**
   * 更新数值列
   */
  updateNumericCol() {
    const t = "mdui-table-col-numeric";
    this.$thRow.find("th").each((i, s) => {
      const n = o(s).hasClass(t);
      this.$tdRows.each((r, a) => {
        const l = o(a).find("td").eq(i);
        n ? l.addClass(t) : l.removeClass(t);
      });
    });
  }
}
const mt = "_mdui_table";
o(() => {
  d.mutation(".mdui-table", function() {
    const e = o(this);
    e.data(mt) || e.data(mt, new fe(e));
  });
});
d.updateTables = function(e) {
  ($(e) ? o(".mdui-table") : o(e)).each((i, s) => {
    const n = o(s), r = n.data(mt);
    r ? r.init() : n.data(mt, new fe(n));
  });
};
class ti extends ae {
  getNamespace() {
    return "panel";
  }
}
d.Panel = ti;
const qt = "mdui-panel";
o(() => {
  d.mutation(`[${qt}]`, function() {
    new d.Panel(this, z(this, qt));
  });
});
o(() => {
  d.mutation(".mdui-appbar-scroll-hide", function() {
    new d.Headroom(this);
  }), d.mutation(".mdui-appbar-scroll-toolbar-hide", function() {
    new d.Headroom(this, {
      pinnedClass: "mdui-headroom-pinned-toolbar",
      unpinnedClass: "mdui-headroom-unpinned-toolbar"
    });
  });
});
const zt = "mdui-headroom";
o(() => {
  d.mutation(`[${zt}]`, function() {
    new d.Headroom(this, z(this, zt));
  });
});
const ei = {
  trigger: "click",
  loop: !1
};
class ii {
  constructor(t, i = {}) {
    this.options = v({}, ei), this.activeIndex = -1, this.$element = o(t).first(), v(this.options, i), this.$tabs = this.$element.children("a"), this.$indicator = o('<div class="mdui-tab-indicator"></div>').appendTo(
      this.$element
    );
    const s = window.location.hash;
    s && this.$tabs.each((n, r) => o(r).attr("href") === s ? (this.activeIndex = n, !1) : !0), this.activeIndex === -1 && this.$tabs.each((n, r) => o(r).hasClass("mdui-tab-active") ? (this.activeIndex = n, !1) : !0), this.$tabs.length && this.activeIndex === -1 && (this.activeIndex = 0), this.setActive(), E.on(
      "resize",
      o.throttle(() => this.setIndicatorPosition(), 100)
    ), this.$tabs.each((n, r) => {
      this.bindTabEvent(r);
    });
  }
  /**
   * 指定选项卡是否已禁用
   * @param $tab
   */
  isDisabled(t) {
    return t.attr("disabled") !== void 0;
  }
  /**
   * 绑定在 Tab 上点击或悬浮的事件
   * @param tab
   */
  bindTabEvent(t) {
    const i = o(t), s = () => {
      if (this.isDisabled(i))
        return !1;
      this.activeIndex = this.$tabs.index(t), this.setActive();
    };
    i.on("click", s), this.options.trigger === "hover" && i.on("mouseenter", s), i.on("click", () => {
      if ((i.attr("href") || "").indexOf("#") === 0)
        return !1;
    });
  }
  /**
   * 触发组件事件
   * @param name
   * @param $element
   * @param parameters
   */
  triggerEvent(t, i, s = {}) {
    q(t, "tab", i, this, s);
  }
  /**
   * 设置激活状态的选项卡
   */
  setActive() {
    this.$tabs.each((t, i) => {
      const s = o(i), n = s.attr("href") || "";
      t === this.activeIndex && !this.isDisabled(s) ? (s.hasClass("mdui-tab-active") || (this.triggerEvent("change", this.$element, {
        index: this.activeIndex,
        id: n.substr(1)
      }), this.triggerEvent("show", s), s.addClass("mdui-tab-active")), o(n).show(), this.setIndicatorPosition()) : (s.removeClass("mdui-tab-active"), o(n).hide());
    });
  }
  /**
   * 设置选项卡指示器的位置
   */
  setIndicatorPosition() {
    if (this.activeIndex === -1) {
      this.$indicator.css({
        left: 0,
        width: 0
      });
      return;
    }
    const t = this.$tabs.eq(this.activeIndex);
    if (this.isDisabled(t))
      return;
    const i = t.offset();
    this.$indicator.css({
      left: `${i.left + this.$element[0].scrollLeft - this.$element[0].getBoundingClientRect().left}px`,
      width: `${t.innerWidth()}px`
    });
  }
  /**
   * 切换到下一个选项卡
   */
  next() {
    this.activeIndex !== -1 && (this.$tabs.length > this.activeIndex + 1 ? this.activeIndex++ : this.options.loop && (this.activeIndex = 0), this.setActive());
  }
  /**
   * 切换到上一个选项卡
   */
  prev() {
    this.activeIndex !== -1 && (this.activeIndex > 0 ? this.activeIndex-- : this.options.loop && (this.activeIndex = this.$tabs.length - 1), this.setActive());
  }
  /**
   * 显示指定索引号、或指定id的选项卡
   * @param index 索引号、或id
   */
  show(t) {
    this.activeIndex !== -1 && (Z(t) ? this.activeIndex = t : this.$tabs.each((i, s) => {
      if (s.id === t)
        return this.activeIndex = i, !1;
    }), this.setActive());
  }
  /**
   * 在父元素的宽度变化时，需要调用该方法重新调整指示器位置
   * 在添加或删除选项卡时，需要调用该方法
   */
  handleUpdate() {
    const t = this.$tabs, i = this.$element.children("a"), s = t.get(), n = i.get();
    if (!i.length) {
      this.activeIndex = -1, this.$tabs = i, this.setIndicatorPosition();
      return;
    }
    i.each((r, a) => {
      s.indexOf(a) < 0 && (this.bindTabEvent(a), this.activeIndex === -1 ? this.activeIndex = 0 : r <= this.activeIndex && this.activeIndex++);
    }), t.each((r, a) => {
      n.indexOf(a) < 0 && (r < this.activeIndex ? this.activeIndex-- : r === this.activeIndex && (this.activeIndex = 0));
    }), this.$tabs = i, this.setActive();
  }
}
d.Tab = ii;
const Yt = "mdui-tab";
o(() => {
  d.mutation(`[${Yt}]`, function() {
    new d.Tab(this, z(this, Yt));
  });
});
const si = {
  position: "auto",
  delay: 0,
  content: ""
};
class ni {
  constructor(t, i = {}) {
    this.options = v({}, si), this.state = "closed", this.timeoutId = null, this.$target = o(t).first(), v(this.options, i), this.$element = o(
      `<div class="mdui-tooltip" id="${o.guid()}">${this.options.content}</div>`
    ).appendTo(document.body);
    const s = this;
    this.$target.on("touchstart mouseenter", function(n) {
      s.isDisabled(this) || nt(n) && (K(n), s.open());
    }).on("touchend mouseleave", function(n) {
      s.isDisabled(this) || nt(n) && s.close();
    }).on(Mt, function(n) {
      s.isDisabled(this) || K(n);
    });
  }
  /**
   * 元素是否已禁用
   * @param element
   */
  isDisabled(t) {
    return t.disabled || o(t).attr("disabled") !== void 0;
  }
  /**
   * 是否是桌面设备
   */
  isDesktop() {
    return E.width() > 1024;
  }
  /**
   * 设置 Tooltip 的位置
   */
  setPosition() {
    let t, i;
    const s = this.$target[0].getBoundingClientRect(), n = this.isDesktop() ? 14 : 24, r = this.$element[0].offsetWidth, a = this.$element[0].offsetHeight;
    let l = this.options.position;
    switch (l === "auto" && (s.top + s.height + n + a + 2 < E.height() ? l = "bottom" : n + a + 2 < s.top ? l = "top" : n + r + 2 < s.left ? l = "left" : s.width + n + r + 2 < E.width() - s.left ? l = "right" : l = "bottom"), l) {
      case "bottom":
        t = -1 * (r / 2), i = s.height / 2 + n, this.$element.transformOrigin("top center");
        break;
      case "top":
        t = -1 * (r / 2), i = -1 * (a + s.height / 2 + n), this.$element.transformOrigin("bottom center");
        break;
      case "left":
        t = -1 * (r + s.width / 2 + n), i = -1 * (a / 2), this.$element.transformOrigin("center right");
        break;
      case "right":
        t = s.width / 2 + n, i = -1 * (a / 2), this.$element.transformOrigin("center left");
        break;
    }
    const c = this.$target.offset();
    this.$element.css({
      top: `${c.top + s.height / 2}px`,
      left: `${c.left + s.width / 2}px`,
      "margin-left": `${t}px`,
      "margin-top": `${i}px`
    });
  }
  /**
   * 触发组件事件
   * @param name
   */
  triggerEvent(t) {
    q(t, "tooltip", this.$target, this);
  }
  /**
   * 动画结束回调
   */
  transitionEnd() {
    this.$element.hasClass("mdui-tooltip-open") ? (this.state = "opened", this.triggerEvent("opened")) : (this.state = "closed", this.triggerEvent("closed"));
  }
  /**
   * 当前 tooltip 是否为打开状态
   */
  isOpen() {
    return this.state === "opening" || this.state === "opened";
  }
  /**
   * 执行打开 tooltip
   */
  doOpen() {
    this.state = "opening", this.triggerEvent("open"), this.$element.addClass("mdui-tooltip-open").transitionEnd(() => this.transitionEnd());
  }
  /**
   * 打开 Tooltip
   * @param options 允许每次打开时设置不同的参数
   */
  open(t) {
    if (this.isOpen())
      return;
    const i = v({}, this.options);
    t && v(this.options, t), i.content !== this.options.content && this.$element.html(this.options.content), this.setPosition(), this.options.delay ? this.timeoutId = setTimeout(() => this.doOpen(), this.options.delay) : (this.timeoutId = null, this.doOpen());
  }
  /**
   * 关闭 Tooltip
   */
  close() {
    this.timeoutId && (clearTimeout(this.timeoutId), this.timeoutId = null), this.isOpen() && (this.state = "closing", this.triggerEvent("close"), this.$element.removeClass("mdui-tooltip-open").transitionEnd(() => this.transitionEnd()));
  }
  /**
   * 切换 Tooltip 的打开状态
   */
  toggle() {
    this.isOpen() ? this.close() : this.open();
  }
  /**
   * 获取 Tooltip 状态。共包含四种状态：`opening`、`opened`、`closing`、`closed`
   */
  getState() {
    return this.state;
  }
}
d.Tooltip = ni;
const Xt = "mdui-tooltip", Vt = "_mdui_tooltip";
o(() => {
  T.on("touchstart mouseover", `[${Xt}]`, function() {
    const e = o(this);
    let t = e.data(Vt);
    t || (t = new d.Tooltip(
      this,
      z(this, Xt)
    ), e.data(Vt, t));
  });
});
const oi = {
  position: "auto",
  gutter: 16
};
class ri {
  constructor(t, i = {}) {
    this.$element = o(), this.options = v({}, oi), this.size = 0, this.$selected = o(), this.$menu = o(), this.$items = o(), this.selectedIndex = 0, this.selectedText = "", this.selectedValue = "", this.state = "closed", this.$native = o(t).first(), this.$native.hide(), v(this.options, i), this.uniqueID = o.guid(), this.handleUpdate(), T.on("click touchstart", (s) => {
      const n = o(s.target);
      this.isOpen() && !n.is(this.$element) && !W(this.$element[0], n[0]) && this.close();
    });
  }
  /**
   * 调整菜单位置
   */
  readjustMenu() {
    const t = E.height(), i = this.$element.height(), s = this.$items.first(), n = s.height(), r = parseInt(s.css("margin-top")), a = this.$element.innerWidth() + 0.01;
    let l = n * this.size + r * 2;
    const c = this.$element[0].getBoundingClientRect().top;
    let h, u;
    if (this.options.position === "bottom")
      u = i, h = "0px";
    else if (this.options.position === "top")
      u = -l - 1, h = "100%";
    else {
      const g = t - this.options.gutter * 2;
      l > g && (l = g), u = -(r + this.selectedIndex * n + (n - i) / 2);
      const f = -(r + (this.size - 1) * n + (n - i) / 2);
      u < f && (u = f);
      const b = c + u;
      b < this.options.gutter ? u = -(c - this.options.gutter) : b + l + this.options.gutter > t && (u = -(c + l + this.options.gutter - t)), h = `${this.selectedIndex * n + n / 2 + r}px`;
    }
    this.$element.innerWidth(a), this.$menu.innerWidth(a).height(l).css({
      "margin-top": u + "px",
      "transform-origin": "center " + h + " 0"
    });
  }
  /**
   * select 是否为打开状态
   */
  isOpen() {
    return this.state === "opening" || this.state === "opened";
  }
  /**
   * 对原生 select 组件进行了修改后，需要调用该方法
   */
  handleUpdate() {
    this.isOpen() && this.close(), this.selectedValue = this.$native.val();
    const t = [];
    this.$items = o(), this.$native.find("option").each((s, n) => {
      const r = n.textContent || "", a = n.value, l = n.disabled, c = this.selectedValue === a;
      t.push({
        value: a,
        text: r,
        disabled: l,
        selected: c,
        index: s
      }), c && (this.selectedText = r, this.selectedIndex = s), this.$items = this.$items.add(
        '<div class="mdui-select-menu-item mdui-ripple"' + (l ? " disabled" : "") + (c ? " selected" : "") + `>${r}</div>`
      );
    }), this.$selected = o(
      `<span class="mdui-select-selected">${this.selectedText}</span>`
    ), this.$element = o(
      `<div class="mdui-select mdui-select-position-${this.options.position}" style="${this.$native.attr("style")}" id="${this.uniqueID}"></div>`
    ).show().append(this.$selected), this.$menu = o('<div class="mdui-select-menu"></div>').appendTo(this.$element).append(this.$items), o(`#${this.uniqueID}`).remove(), this.$native.after(this.$element), this.size = parseInt(this.$native.attr("size") || "0"), this.size <= 0 && (this.size = this.$items.length, this.size > 8 && (this.size = 8));
    const i = this;
    this.$items.on("click", function() {
      if (i.state === "closing")
        return;
      const s = o(this), n = s.index(), r = t[n];
      r.disabled || (i.$selected.text(r.text), i.$native.val(r.value), i.$items.removeAttr("selected"), s.attr("selected", ""), i.selectedIndex = r.index, i.selectedValue = r.value, i.selectedText = r.text, i.$native.trigger("change"), i.close());
    }), this.$element.on("click", (s) => {
      const n = o(s.target);
      n.is(".mdui-select-menu") || n.is(".mdui-select-menu-item") || this.toggle();
    });
  }
  /**
   * 动画结束的回调
   */
  transitionEnd() {
    this.$element.removeClass("mdui-select-closing"), this.state === "opening" && (this.state = "opened", this.triggerEvent("opened"), this.$menu.css("overflow-y", "auto")), this.state === "closing" && (this.state = "closed", this.triggerEvent("closed"), this.$element.innerWidth(""), this.$menu.css({
      "margin-top": "",
      height: "",
      width: ""
    }));
  }
  /**
   * 触发组件事件
   * @param name
   */
  triggerEvent(t) {
    q(t, "select", this.$native, this);
  }
  /**
   * 切换下拉菜单的打开状态
   */
  toggle() {
    this.isOpen() ? this.close() : this.open();
  }
  /**
   * 打开下拉菜单
   */
  open() {
    this.isOpen() || (this.state = "opening", this.triggerEvent("open"), this.readjustMenu(), this.$element.addClass("mdui-select-open"), this.$menu.transitionEnd(() => this.transitionEnd()));
  }
  /**
   * 关闭下拉菜单
   */
  close() {
    this.isOpen() && (this.state = "closing", this.triggerEvent("close"), this.$menu.css("overflow-y", ""), this.$element.removeClass("mdui-select-open").addClass("mdui-select-closing"), this.$menu.transitionEnd(() => this.transitionEnd()));
  }
  /**
   * 获取当前菜单的状态。共包含四种状态：`opening`、`opened`、`closing`、`closed`
   */
  getState() {
    return this.state;
  }
}
d.Select = ri;
const Jt = "mdui-select";
o(() => {
  d.mutation(`[${Jt}]`, function() {
    new d.Select(this, z(this, Jt));
  });
});
globalThis.mdui = d;
export {
  d as default
};
//# sourceMappingURL=mdui-lite.js.map

(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/prism"],{

/***/ "./node_modules/webpack/buildin/global.js":
/*!***********************************!*\
  !*** (webpack)/buildin/global.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

var g;

// This works in non-strict mode
g = (function() {
	return this;
})();

try {
	// This works if eval is allowed (see CSP)
	g = g || new Function("return this")();
} catch (e) {
	// This works if the window reference is available
	if (typeof window === "object") g = window;
}

// g can still be undefined, but nothing to do about it...
// We return undefined, instead of nothing here, so it's
// easier to handle this case. if(!global) { ...}

module.exports = g;


/***/ }),

/***/ "./resources/js/prism.js":
/*!*******************************!*\
  !*** ./resources/js/prism.js ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(global) {/* PrismJS 1.16.0
https://prismjs.com/download.html#themes=prism&languages=markup+css+clike+javascript+c+csharp+bash+batch+cpp+css-extras+markup-templating+less+java+php+javadoclike+json+markdown+phpdoc+php-extras+sql+python+js-extras+sass+stylus+javadoc&plugins=toolbar */
var _self = "undefined" != typeof window ? window : "undefined" != typeof WorkerGlobalScope && self instanceof WorkerGlobalScope ? self : {},
    Prism = function (g) {
  var c = /\blang(?:uage)?-([\w-]+)\b/i,
      a = 0,
      C = {
    manual: g.Prism && g.Prism.manual,
    disableWorkerMessageHandler: g.Prism && g.Prism.disableWorkerMessageHandler,
    util: {
      encode: function encode(e) {
        return e instanceof M ? new M(e.type, C.util.encode(e.content), e.alias) : Array.isArray(e) ? e.map(C.util.encode) : e.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/\u00a0/g, " ");
      },
      type: function type(e) {
        return Object.prototype.toString.call(e).slice(8, -1);
      },
      objId: function objId(e) {
        return e.__id || Object.defineProperty(e, "__id", {
          value: ++a
        }), e.__id;
      },
      clone: function n(e, t) {
        var r,
            a,
            i = C.util.type(e);

        switch (t = t || {}, i) {
          case "Object":
            if (a = C.util.objId(e), t[a]) return t[a];

            for (var o in r = {}, t[a] = r, e) {
              e.hasOwnProperty(o) && (r[o] = n(e[o], t));
            }

            return r;

          case "Array":
            return a = C.util.objId(e), t[a] ? t[a] : (r = [], t[a] = r, e.forEach(function (e, a) {
              r[a] = n(e, t);
            }), r);

          default:
            return e;
        }
      }
    },
    languages: {
      extend: function extend(e, a) {
        var n = C.util.clone(C.languages[e]);

        for (var t in a) {
          n[t] = a[t];
        }

        return n;
      },
      insertBefore: function insertBefore(n, e, a, t) {
        var r = (t = t || C.languages)[n],
            i = {};

        for (var o in r) {
          if (r.hasOwnProperty(o)) {
            if (o == e) for (var l in a) {
              a.hasOwnProperty(l) && (i[l] = a[l]);
            }
            a.hasOwnProperty(o) || (i[o] = r[o]);
          }
        }

        var s = t[n];
        return t[n] = i, C.languages.DFS(C.languages, function (e, a) {
          a === s && e != n && (this[e] = i);
        }), i;
      },
      DFS: function e(a, n, t, r) {
        r = r || {};
        var i = C.util.objId;

        for (var o in a) {
          if (a.hasOwnProperty(o)) {
            n.call(a, o, a[o], t || o);
            var l = a[o],
                s = C.util.type(l);
            "Object" !== s || r[i(l)] ? "Array" !== s || r[i(l)] || (r[i(l)] = !0, e(l, n, o, r)) : (r[i(l)] = !0, e(l, n, null, r));
          }
        }
      }
    },
    plugins: {},
    highlightAll: function highlightAll(e, a) {
      C.highlightAllUnder(document, e, a);
    },
    highlightAllUnder: function highlightAllUnder(e, a, n) {
      var t = {
        callback: n,
        selector: 'code[class*="language-"], [class*="language-"] code, code[class*="lang-"], [class*="lang-"] code'
      };
      C.hooks.run("before-highlightall", t);

      for (var r, i = e.querySelectorAll(t.selector), o = 0; r = i[o++];) {
        C.highlightElement(r, !0 === a, t.callback);
      }
    },
    highlightElement: function highlightElement(e, a, n) {
      for (var t, r = "none", i = e; i && !c.test(i.className);) {
        i = i.parentNode;
      }

      i && (r = (i.className.match(c) || [, "none"])[1].toLowerCase(), t = C.languages[r]), e.className = e.className.replace(c, "").replace(/\s+/g, " ") + " language-" + r, e.parentNode && (i = e.parentNode, /pre/i.test(i.nodeName) && (i.className = i.className.replace(c, "").replace(/\s+/g, " ") + " language-" + r));

      var o = {
        element: e,
        language: r,
        grammar: t,
        code: e.textContent
      },
          l = function l(e) {
        o.highlightedCode = e, C.hooks.run("before-insert", o), o.element.innerHTML = o.highlightedCode, C.hooks.run("after-highlight", o), C.hooks.run("complete", o), n && n.call(o.element);
      };

      if (C.hooks.run("before-sanity-check", o), o.code) {
        if (C.hooks.run("before-highlight", o), o.grammar) {
          if (a && g.Worker) {
            var s = new Worker(C.filename);
            s.onmessage = function (e) {
              l(e.data);
            }, s.postMessage(JSON.stringify({
              language: o.language,
              code: o.code,
              immediateClose: !0
            }));
          } else l(C.highlight(o.code, o.grammar, o.language));
        } else l(C.util.encode(o.code));
      } else C.hooks.run("complete", o);
    },
    highlight: function highlight(e, a, n) {
      var t = {
        code: e,
        grammar: a,
        language: n
      };
      return C.hooks.run("before-tokenize", t), t.tokens = C.tokenize(t.code, t.grammar), C.hooks.run("after-tokenize", t), M.stringify(C.util.encode(t.tokens), t.language);
    },
    matchGrammar: function matchGrammar(e, a, n, t, r, i, o) {
      for (var l in n) {
        if (n.hasOwnProperty(l) && n[l]) {
          if (l == o) return;
          var s = n[l];
          s = "Array" === C.util.type(s) ? s : [s];

          for (var g = 0; g < s.length; ++g) {
            var c = s[g],
                u = c.inside,
                h = !!c.lookbehind,
                f = !!c.greedy,
                d = 0,
                m = c.alias;

            if (f && !c.pattern.global) {
              var p = c.pattern.toString().match(/[imuy]*$/)[0];
              c.pattern = RegExp(c.pattern.source, p + "g");
            }

            c = c.pattern || c;

            for (var y = t, v = r; y < a.length; v += a[y].length, ++y) {
              var k = a[y];
              if (a.length > e.length) return;

              if (!(k instanceof M)) {
                if (f && y != a.length - 1) {
                  if (c.lastIndex = v, !(x = c.exec(e))) break;

                  for (var b = x.index + (h ? x[1].length : 0), w = x.index + x[0].length, A = y, P = v, O = a.length; A < O && (P < w || !a[A].type && !a[A - 1].greedy); ++A) {
                    (P += a[A].length) <= b && (++y, v = P);
                  }

                  if (a[y] instanceof M) continue;
                  N = A - y, k = e.slice(v, P), x.index -= v;
                } else {
                  c.lastIndex = 0;
                  var x = c.exec(k),
                      N = 1;
                }

                if (x) {
                  h && (d = x[1] ? x[1].length : 0);
                  w = (b = x.index + d) + (x = x[0].slice(d)).length;
                  var j = k.slice(0, b),
                      S = k.slice(w),
                      E = [y, N];
                  j && (++y, v += j.length, E.push(j));

                  var _ = new M(l, u ? C.tokenize(x, u) : x, m, x, f);

                  if (E.push(_), S && E.push(S), Array.prototype.splice.apply(a, E), 1 != N && C.matchGrammar(e, a, n, y, v, !0, l), i) break;
                } else if (i) break;
              }
            }
          }
        }
      }
    },
    tokenize: function tokenize(e, a) {
      var n = [e],
          t = a.rest;

      if (t) {
        for (var r in t) {
          a[r] = t[r];
        }

        delete a.rest;
      }

      return C.matchGrammar(e, n, a, 0, 0, !1), n;
    },
    hooks: {
      all: {},
      add: function add(e, a) {
        var n = C.hooks.all;
        n[e] = n[e] || [], n[e].push(a);
      },
      run: function run(e, a) {
        var n = C.hooks.all[e];
        if (n && n.length) for (var t, r = 0; t = n[r++];) {
          t(a);
        }
      }
    },
    Token: M
  };

  function M(e, a, n, t, r) {
    this.type = e, this.content = a, this.alias = n, this.length = 0 | (t || "").length, this.greedy = !!r;
  }

  if (g.Prism = C, M.stringify = function (e, a) {
    if ("string" == typeof e) return e;
    if (Array.isArray(e)) return e.map(function (e) {
      return M.stringify(e, a);
    }).join("");
    var n = {
      type: e.type,
      content: M.stringify(e.content, a),
      tag: "span",
      classes: ["token", e.type],
      attributes: {},
      language: a
    };

    if (e.alias) {
      var t = Array.isArray(e.alias) ? e.alias : [e.alias];
      Array.prototype.push.apply(n.classes, t);
    }

    C.hooks.run("wrap", n);
    var r = Object.keys(n.attributes).map(function (e) {
      return e + '="' + (n.attributes[e] || "").replace(/"/g, "&quot;") + '"';
    }).join(" ");
    return "<" + n.tag + ' class="' + n.classes.join(" ") + '"' + (r ? " " + r : "") + ">" + n.content + "</" + n.tag + ">";
  }, !g.document) return g.addEventListener && (C.disableWorkerMessageHandler || g.addEventListener("message", function (e) {
    var a = JSON.parse(e.data),
        n = a.language,
        t = a.code,
        r = a.immediateClose;
    g.postMessage(C.highlight(t, C.languages[n], n)), r && g.close();
  }, !1)), C;
  var e = document.currentScript || [].slice.call(document.getElementsByTagName("script")).pop();
  return e && (C.filename = e.src, C.manual || e.hasAttribute("data-manual") || ("loading" !== document.readyState ? window.requestAnimationFrame ? window.requestAnimationFrame(C.highlightAll) : window.setTimeout(C.highlightAll, 16) : document.addEventListener("DOMContentLoaded", C.highlightAll))), C;
}(_self);

 true && module.exports && (module.exports = Prism), "undefined" != typeof global && (global.Prism = Prism);
Prism.languages.markup = {
  comment: /<!--[\s\S]*?-->/,
  prolog: /<\?[\s\S]+?\?>/,
  doctype: /<!DOCTYPE[\s\S]+?>/i,
  cdata: /<!\[CDATA\[[\s\S]*?]]>/i,
  tag: {
    pattern: /<\/?(?!\d)[^\s>\/=$<%]+(?:\s(?:\s*[^\s>\/=]+(?:\s*=\s*(?:"[^"]*"|'[^']*'|[^\s'">=]+(?=[\s>]))|(?=[\s/>])))+)?\s*\/?>/i,
    greedy: !0,
    inside: {
      tag: {
        pattern: /^<\/?[^\s>\/]+/i,
        inside: {
          punctuation: /^<\/?/,
          namespace: /^[^\s>\/:]+:/
        }
      },
      "attr-value": {
        pattern: /=\s*(?:"[^"]*"|'[^']*'|[^\s'">=]+)/i,
        inside: {
          punctuation: [/^=/, {
            pattern: /^(\s*)["']|["']$/,
            lookbehind: !0
          }]
        }
      },
      punctuation: /\/?>/,
      "attr-name": {
        pattern: /[^\s>\/]+/,
        inside: {
          namespace: /^[^\s>\/:]+:/
        }
      }
    }
  },
  entity: /&#?[\da-z]{1,8};/i
}, Prism.languages.markup.tag.inside["attr-value"].inside.entity = Prism.languages.markup.entity, Prism.hooks.add("wrap", function (a) {
  "entity" === a.type && (a.attributes.title = a.content.replace(/&amp;/, "&"));
}), Object.defineProperty(Prism.languages.markup.tag, "addInlined", {
  value: function value(a, e) {
    var s = {};
    s["language-" + e] = {
      pattern: /(^<!\[CDATA\[)[\s\S]+?(?=\]\]>$)/i,
      lookbehind: !0,
      inside: Prism.languages[e]
    }, s.cdata = /^<!\[CDATA\[|\]\]>$/i;
    var n = {
      "included-cdata": {
        pattern: /<!\[CDATA\[[\s\S]*?\]\]>/i,
        inside: s
      }
    };
    n["language-" + e] = {
      pattern: /[\s\S]+/,
      inside: Prism.languages[e]
    };
    var i = {};
    i[a] = {
      pattern: RegExp("(<__[\\s\\S]*?>)(?:<!\\[CDATA\\[[\\s\\S]*?\\]\\]>\\s*|[\\s\\S])*?(?=<\\/__>)".replace(/__/g, a), "i"),
      lookbehind: !0,
      greedy: !0,
      inside: n
    }, Prism.languages.insertBefore("markup", "cdata", i);
  }
}), Prism.languages.xml = Prism.languages.extend("markup", {}), Prism.languages.html = Prism.languages.markup, Prism.languages.mathml = Prism.languages.markup, Prism.languages.svg = Prism.languages.markup;
!function (s) {
  var t = /("|')(?:\\(?:\r\n|[\s\S])|(?!\1)[^\\\r\n])*\1/;
  s.languages.css = {
    comment: /\/\*[\s\S]*?\*\//,
    atrule: {
      pattern: /@[\w-]+[\s\S]*?(?:;|(?=\s*\{))/,
      inside: {
        rule: /@[\w-]+/
      }
    },
    url: {
      pattern: RegExp("url\\((?:" + t.source + "|[^\n\r()]*)\\)", "i"),
      inside: {
        "function": /^url/i,
        punctuation: /^\(|\)$/
      }
    },
    selector: RegExp("[^{}\\s](?:[^{};\"']|" + t.source + ")*?(?=\\s*\\{)"),
    string: {
      pattern: t,
      greedy: !0
    },
    property: /[-_a-z\xA0-\uFFFF][-\w\xA0-\uFFFF]*(?=\s*:)/i,
    important: /!important\b/i,
    "function": /[-a-z0-9]+(?=\()/i,
    punctuation: /[(){};:,]/
  }, s.languages.css.atrule.inside.rest = s.languages.css;
  var e = s.languages.markup;
  e && (e.tag.addInlined("style", "css"), s.languages.insertBefore("inside", "attr-value", {
    "style-attr": {
      pattern: /\s*style=("|')(?:\\[\s\S]|(?!\1)[^\\])*\1/i,
      inside: {
        "attr-name": {
          pattern: /^\s*style/i,
          inside: e.tag.inside
        },
        punctuation: /^\s*=\s*['"]|['"]\s*$/,
        "attr-value": {
          pattern: /.+/i,
          inside: s.languages.css
        }
      },
      alias: "language-css"
    }
  }, e.tag));
}(Prism);
Prism.languages.clike = {
  comment: [{
    pattern: /(^|[^\\])\/\*[\s\S]*?(?:\*\/|$)/,
    lookbehind: !0
  }, {
    pattern: /(^|[^\\:])\/\/.*/,
    lookbehind: !0,
    greedy: !0
  }],
  string: {
    pattern: /(["'])(?:\\(?:\r\n|[\s\S])|(?!\1)[^\\\r\n])*\1/,
    greedy: !0
  },
  "class-name": {
    pattern: /((?:\b(?:class|interface|extends|implements|trait|instanceof|new)\s+)|(?:catch\s+\())[\w.\\]+/i,
    lookbehind: !0,
    inside: {
      punctuation: /[.\\]/
    }
  },
  keyword: /\b(?:if|else|while|do|for|return|in|instanceof|function|new|try|throw|catch|finally|null|break|continue)\b/,
  "boolean": /\b(?:true|false)\b/,
  "function": /\w+(?=\()/,
  number: /\b0x[\da-f]+\b|(?:\b\d+\.?\d*|\B\.\d+)(?:e[+-]?\d+)?/i,
  operator: /--?|\+\+?|!=?=?|<=?|>=?|==?=?|&&?|\|\|?|\?|\*|\/|~|\^|%/,
  punctuation: /[{}[\];(),.:]/
};
Prism.languages.javascript = Prism.languages.extend("clike", {
  "class-name": [Prism.languages.clike["class-name"], {
    pattern: /(^|[^$\w\xA0-\uFFFF])[_$A-Z\xA0-\uFFFF][$\w\xA0-\uFFFF]*(?=\.(?:prototype|constructor))/,
    lookbehind: !0
  }],
  keyword: [{
    pattern: /((?:^|})\s*)(?:catch|finally)\b/,
    lookbehind: !0
  }, {
    pattern: /(^|[^.])\b(?:as|async(?=\s*(?:function\b|\(|[$\w\xA0-\uFFFF]|$))|await|break|case|class|const|continue|debugger|default|delete|do|else|enum|export|extends|for|from|function|get|if|implements|import|in|instanceof|interface|let|new|null|of|package|private|protected|public|return|set|static|super|switch|this|throw|try|typeof|undefined|var|void|while|with|yield)\b/,
    lookbehind: !0
  }],
  number: /\b(?:(?:0[xX](?:[\dA-Fa-f](?:_[\dA-Fa-f])?)+|0[bB](?:[01](?:_[01])?)+|0[oO](?:[0-7](?:_[0-7])?)+)n?|(?:\d(?:_\d)?)+n|NaN|Infinity)\b|(?:\b(?:\d(?:_\d)?)+\.?(?:\d(?:_\d)?)*|\B\.(?:\d(?:_\d)?)+)(?:[Ee][+-]?(?:\d(?:_\d)?)+)?/,
  "function": /#?[_$a-zA-Z\xA0-\uFFFF][$\w\xA0-\uFFFF]*(?=\s*(?:\.\s*(?:apply|bind|call)\s*)?\()/,
  operator: /-[-=]?|\+[+=]?|!=?=?|<<?=?|>>?>?=?|=(?:==?|>)?|&[&=]?|\|[|=]?|\*\*?=?|\/=?|~|\^=?|%=?|\?|\.{3}/
}), Prism.languages.javascript["class-name"][0].pattern = /(\b(?:class|interface|extends|implements|instanceof|new)\s+)[\w.\\]+/, Prism.languages.insertBefore("javascript", "keyword", {
  regex: {
    pattern: /((?:^|[^$\w\xA0-\uFFFF."'\])\s])\s*)\/(\[(?:[^\]\\\r\n]|\\.)*]|\\.|[^/\\\[\r\n])+\/[gimyus]{0,6}(?=\s*($|[\r\n,.;})\]]))/,
    lookbehind: !0,
    greedy: !0
  },
  "function-variable": {
    pattern: /#?[_$a-zA-Z\xA0-\uFFFF][$\w\xA0-\uFFFF]*(?=\s*[=:]\s*(?:async\s*)?(?:\bfunction\b|(?:\((?:[^()]|\([^()]*\))*\)|[_$a-zA-Z\xA0-\uFFFF][$\w\xA0-\uFFFF]*)\s*=>))/,
    alias: "function"
  },
  parameter: [{
    pattern: /(function(?:\s+[_$A-Za-z\xA0-\uFFFF][$\w\xA0-\uFFFF]*)?\s*\(\s*)(?!\s)(?:[^()]|\([^()]*\))+?(?=\s*\))/,
    lookbehind: !0,
    inside: Prism.languages.javascript
  }, {
    pattern: /[_$a-z\xA0-\uFFFF][$\w\xA0-\uFFFF]*(?=\s*=>)/i,
    inside: Prism.languages.javascript
  }, {
    pattern: /(\(\s*)(?!\s)(?:[^()]|\([^()]*\))+?(?=\s*\)\s*=>)/,
    lookbehind: !0,
    inside: Prism.languages.javascript
  }, {
    pattern: /((?:\b|\s|^)(?!(?:as|async|await|break|case|catch|class|const|continue|debugger|default|delete|do|else|enum|export|extends|finally|for|from|function|get|if|implements|import|in|instanceof|interface|let|new|null|of|package|private|protected|public|return|set|static|super|switch|this|throw|try|typeof|undefined|var|void|while|with|yield)(?![$\w\xA0-\uFFFF]))(?:[_$A-Za-z\xA0-\uFFFF][$\w\xA0-\uFFFF]*\s*)\(\s*)(?!\s)(?:[^()]|\([^()]*\))+?(?=\s*\)\s*\{)/,
    lookbehind: !0,
    inside: Prism.languages.javascript
  }],
  constant: /\b[A-Z](?:[A-Z_]|\dx?)*\b/
}), Prism.languages.insertBefore("javascript", "string", {
  "template-string": {
    pattern: /`(?:\\[\s\S]|\${(?:[^{}]|{(?:[^{}]|{[^}]*})*})+}|[^\\`])*`/,
    greedy: !0,
    inside: {
      interpolation: {
        pattern: /\${(?:[^{}]|{(?:[^{}]|{[^}]*})*})+}/,
        inside: {
          "interpolation-punctuation": {
            pattern: /^\${|}$/,
            alias: "punctuation"
          },
          rest: Prism.languages.javascript
        }
      },
      string: /[\s\S]+/
    }
  }
}), Prism.languages.markup && Prism.languages.markup.tag.addInlined("script", "javascript"), Prism.languages.js = Prism.languages.javascript;
Prism.languages.c = Prism.languages.extend("clike", {
  "class-name": {
    pattern: /(\b(?:enum|struct)\s+)\w+/,
    lookbehind: !0
  },
  keyword: /\b(?:_Alignas|_Alignof|_Atomic|_Bool|_Complex|_Generic|_Imaginary|_Noreturn|_Static_assert|_Thread_local|asm|typeof|inline|auto|break|case|char|const|continue|default|do|double|else|enum|extern|float|for|goto|if|int|long|register|return|short|signed|sizeof|static|struct|switch|typedef|union|unsigned|void|volatile|while)\b/,
  operator: />>=?|<<=?|->|([-+&|:])\1|[?:~]|[-+*/%&|^!=<>]=?/,
  number: /(?:\b0x(?:[\da-f]+\.?[\da-f]*|\.[\da-f]+)(?:p[+-]?\d+)?|(?:\b\d+\.?\d*|\B\.\d+)(?:e[+-]?\d+)?)[ful]*/i
}), Prism.languages.insertBefore("c", "string", {
  macro: {
    pattern: /(^\s*)#\s*[a-z]+(?:[^\r\n\\]|\\(?:\r\n|[\s\S]))*/im,
    lookbehind: !0,
    alias: "property",
    inside: {
      string: {
        pattern: /(#\s*include\s*)(?:<.+?>|("|')(?:\\?.)+?\2)/,
        lookbehind: !0
      },
      directive: {
        pattern: /(#\s*)\b(?:define|defined|elif|else|endif|error|ifdef|ifndef|if|import|include|line|pragma|undef|using)\b/,
        lookbehind: !0,
        alias: "keyword"
      }
    }
  },
  constant: /\b(?:__FILE__|__LINE__|__DATE__|__TIME__|__TIMESTAMP__|__func__|EOF|NULL|SEEK_CUR|SEEK_END|SEEK_SET|stdin|stdout|stderr)\b/
}), delete Prism.languages.c["boolean"];
Prism.languages.csharp = Prism.languages.extend("clike", {
  keyword: /\b(?:abstract|add|alias|as|ascending|async|await|base|bool|break|byte|case|catch|char|checked|class|const|continue|decimal|default|delegate|descending|do|double|dynamic|else|enum|event|explicit|extern|false|finally|fixed|float|for|foreach|from|get|global|goto|group|if|implicit|in|int|interface|internal|into|is|join|let|lock|long|namespace|new|null|object|operator|orderby|out|override|params|partial|private|protected|public|readonly|ref|remove|return|sbyte|sealed|select|set|short|sizeof|stackalloc|static|string|struct|switch|this|throw|true|try|typeof|uint|ulong|unchecked|unsafe|ushort|using|value|var|virtual|void|volatile|where|while|yield)\b/,
  string: [{
    pattern: /@("|')(?:\1\1|\\[\s\S]|(?!\1)[^\\])*\1/,
    greedy: !0
  }, {
    pattern: /("|')(?:\\.|(?!\1)[^\\\r\n])*?\1/,
    greedy: !0
  }],
  "class-name": [{
    pattern: /\b[A-Z]\w*(?:\.\w+)*\b(?=\s+\w+)/,
    inside: {
      punctuation: /\./
    }
  }, {
    pattern: /(\[)[A-Z]\w*(?:\.\w+)*\b/,
    lookbehind: !0,
    inside: {
      punctuation: /\./
    }
  }, {
    pattern: /(\b(?:class|interface)\s+[A-Z]\w*(?:\.\w+)*\s*:\s*)[A-Z]\w*(?:\.\w+)*\b/,
    lookbehind: !0,
    inside: {
      punctuation: /\./
    }
  }, {
    pattern: /((?:\b(?:class|interface|new)\s+)|(?:catch\s+\())[A-Z]\w*(?:\.\w+)*\b/,
    lookbehind: !0,
    inside: {
      punctuation: /\./
    }
  }],
  number: /\b0x[\da-f]+\b|(?:\b\d+\.?\d*|\B\.\d+)f?/i,
  operator: />>=?|<<=?|[-=]>|([-+&|?])\1|~|[-+*/%&|^!=<>]=?/,
  punctuation: /\?\.?|::|[{}[\];(),.:]/
}), Prism.languages.insertBefore("csharp", "class-name", {
  "generic-method": {
    pattern: /\w+\s*<[^>\r\n]+?>\s*(?=\()/,
    inside: {
      "function": /^\w+/,
      "class-name": {
        pattern: /\b[A-Z]\w*(?:\.\w+)*\b/,
        inside: {
          punctuation: /\./
        }
      },
      keyword: Prism.languages.csharp.keyword,
      punctuation: /[<>(),.:]/
    }
  },
  preprocessor: {
    pattern: /(^\s*)#.*/m,
    lookbehind: !0,
    alias: "property",
    inside: {
      directive: {
        pattern: /(\s*#)\b(?:define|elif|else|endif|endregion|error|if|line|pragma|region|undef|warning)\b/,
        lookbehind: !0,
        alias: "keyword"
      }
    }
  }
}), Prism.languages.dotnet = Prism.languages.cs = Prism.languages.csharp;
!function (e) {
  var t = "\\b(?:BASH|BASHOPTS|BASH_ALIASES|BASH_ARGC|BASH_ARGV|BASH_CMDS|BASH_COMPLETION_COMPAT_DIR|BASH_LINENO|BASH_REMATCH|BASH_SOURCE|BASH_VERSINFO|BASH_VERSION|COLORTERM|COLUMNS|COMP_WORDBREAKS|DBUS_SESSION_BUS_ADDRESS|DEFAULTS_PATH|DESKTOP_SESSION|DIRSTACK|DISPLAY|EUID|GDMSESSION|GDM_LANG|GNOME_KEYRING_CONTROL|GNOME_KEYRING_PID|GPG_AGENT_INFO|GROUPS|HISTCONTROL|HISTFILE|HISTFILESIZE|HISTSIZE|HOME|HOSTNAME|HOSTTYPE|IFS|INSTANCE|JOB|LANG|LANGUAGE|LC_ADDRESS|LC_ALL|LC_IDENTIFICATION|LC_MEASUREMENT|LC_MONETARY|LC_NAME|LC_NUMERIC|LC_PAPER|LC_TELEPHONE|LC_TIME|LESSCLOSE|LESSOPEN|LINES|LOGNAME|LS_COLORS|MACHTYPE|MAILCHECK|MANDATORY_PATH|NO_AT_BRIDGE|OLDPWD|OPTERR|OPTIND|ORBIT_SOCKETDIR|OSTYPE|PAPERSIZE|PATH|PIPESTATUS|PPID|PS1|PS2|PS3|PS4|PWD|RANDOM|REPLY|SECONDS|SELINUX_INIT|SESSION|SESSIONTYPE|SESSION_MANAGER|SHELL|SHELLOPTS|SHLVL|SSH_AUTH_SOCK|TERM|UID|UPSTART_EVENTS|UPSTART_INSTANCE|UPSTART_JOB|UPSTART_SESSION|USER|WINDOWID|XAUTHORITY|XDG_CONFIG_DIRS|XDG_CURRENT_DESKTOP|XDG_DATA_DIRS|XDG_GREETER_DATA_DIR|XDG_MENU_PREFIX|XDG_RUNTIME_DIR|XDG_SEAT|XDG_SEAT_PATH|XDG_SESSION_DESKTOP|XDG_SESSION_ID|XDG_SESSION_PATH|XDG_SESSION_TYPE|XDG_VTNR|XMODIFIERS)\\b",
      n = {
    environment: {
      pattern: RegExp("\\$" + t),
      alias: "constant"
    },
    variable: [{
      pattern: /\$?\(\([\s\S]+?\)\)/,
      greedy: !0,
      inside: {
        variable: [{
          pattern: /(^\$\(\([\s\S]+)\)\)/,
          lookbehind: !0
        }, /^\$\(\(/],
        number: /\b0x[\dA-Fa-f]+\b|(?:\b\d+\.?\d*|\B\.\d+)(?:[Ee]-?\d+)?/,
        operator: /--?|-=|\+\+?|\+=|!=?|~|\*\*?|\*=|\/=?|%=?|<<=?|>>=?|<=?|>=?|==?|&&?|&=|\^=?|\|\|?|\|=|\?|:/,
        punctuation: /\(\(?|\)\)?|,|;/
      }
    }, {
      pattern: /\$\((?:\([^)]+\)|[^()])+\)|`[^`]+`/,
      greedy: !0,
      inside: {
        variable: /^\$\(|^`|\)$|`$/
      }
    }, {
      pattern: /\$\{[^}]+\}/,
      greedy: !0,
      inside: {
        operator: /:[-=?+]?|[!\/]|##?|%%?|\^\^?|,,?/,
        punctuation: /[\[\]]/,
        environment: {
          pattern: RegExp("(\\{)" + t),
          lookbehind: !0,
          alias: "constant"
        }
      }
    }, /\$(?:\w+|[#?*!@$])/],
    entity: /\\(?:[abceEfnrtv\\"]|O?[0-7]{1,3}|x[0-9a-fA-F]{1,2}|u[0-9a-fA-F]{4}|U[0-9a-fA-F]{8})/
  };
  e.languages.bash = {
    shebang: {
      pattern: /^#!\s*\/.*/,
      alias: "important"
    },
    comment: {
      pattern: /(^|[^"{\\$])#.*/,
      lookbehind: !0
    },
    "function-name": [{
      pattern: /(\bfunction\s+)\w+(?=(?:\s*\(?:\s*\))?\s*\{)/,
      lookbehind: !0,
      alias: "function"
    }, {
      pattern: /\b\w+(?=\s*\(\s*\)\s*\{)/,
      alias: "function"
    }],
    "for-or-select": {
      pattern: /(\b(?:for|select)\s+)\w+(?=\s+in\s)/,
      alias: "variable",
      lookbehind: !0
    },
    "assign-left": {
      pattern: /(^|[\s;|&]|[<>]\()\w+(?=\+?=)/,
      inside: {
        environment: {
          pattern: RegExp("(^|[\\s;|&]|[<>]\\()" + t),
          lookbehind: !0,
          alias: "constant"
        }
      },
      alias: "variable",
      lookbehind: !0
    },
    string: [{
      pattern: /((?:^|[^<])<<-?\s*)(\w+?)\s*(?:\r?\n|\r)(?:[\s\S])*?(?:\r?\n|\r)\2/,
      lookbehind: !0,
      greedy: !0,
      inside: n
    }, {
      pattern: /((?:^|[^<])<<-?\s*)(["'])(\w+)\2\s*(?:\r?\n|\r)(?:[\s\S])*?(?:\r?\n|\r)\3/,
      lookbehind: !0,
      greedy: !0
    }, {
      pattern: /(["'])(?:\\[\s\S]|\$\([^)]+\)|`[^`]+`|(?!\1)[^\\])*\1/,
      greedy: !0,
      inside: n
    }],
    environment: {
      pattern: RegExp("\\$?" + t),
      alias: "constant"
    },
    variable: n.variable,
    "function": {
      pattern: /(^|[\s;|&]|[<>]\()(?:add|apropos|apt|aptitude|apt-cache|apt-get|aspell|automysqlbackup|awk|basename|bash|bc|bconsole|bg|bzip2|cal|cat|cfdisk|chgrp|chkconfig|chmod|chown|chroot|cksum|clear|cmp|column|comm|cp|cron|crontab|csplit|curl|cut|date|dc|dd|ddrescue|debootstrap|df|diff|diff3|dig|dir|dircolors|dirname|dirs|dmesg|du|egrep|eject|env|ethtool|expand|expect|expr|fdformat|fdisk|fg|fgrep|file|find|fmt|fold|format|free|fsck|ftp|fuser|gawk|git|gparted|grep|groupadd|groupdel|groupmod|groups|grub-mkconfig|gzip|halt|head|hg|history|host|hostname|htop|iconv|id|ifconfig|ifdown|ifup|import|install|ip|jobs|join|kill|killall|less|link|ln|locate|logname|logrotate|look|lpc|lpr|lprint|lprintd|lprintq|lprm|ls|lsof|lynx|make|man|mc|mdadm|mkconfig|mkdir|mke2fs|mkfifo|mkfs|mkisofs|mknod|mkswap|mmv|more|most|mount|mtools|mtr|mutt|mv|nano|nc|netstat|nice|nl|nohup|notify-send|npm|nslookup|op|open|parted|passwd|paste|pathchk|ping|pkill|pnpm|popd|pr|printcap|printenv|ps|pushd|pv|quota|quotacheck|quotactl|ram|rar|rcp|reboot|remsync|rename|renice|rev|rm|rmdir|rpm|rsync|scp|screen|sdiff|sed|sendmail|seq|service|sftp|sh|shellcheck|shuf|shutdown|sleep|slocate|sort|split|ssh|stat|strace|su|sudo|sum|suspend|swapon|sync|tac|tail|tar|tee|time|timeout|top|touch|tr|traceroute|tsort|tty|umount|uname|unexpand|uniq|units|unrar|unshar|unzip|update-grub|uptime|useradd|userdel|usermod|users|uudecode|uuencode|v|vdir|vi|vim|virsh|vmstat|wait|watch|wc|wget|whereis|which|who|whoami|write|xargs|xdg-open|yarn|yes|zenity|zip|zsh|zypper)(?=$|[)\s;|&])/,
      lookbehind: !0
    },
    keyword: {
      pattern: /(^|[\s;|&]|[<>]\()(?:if|then|else|elif|fi|for|while|in|case|esac|function|select|do|done|until)(?=$|[)\s;|&])/,
      lookbehind: !0
    },
    builtin: {
      pattern: /(^|[\s;|&]|[<>]\()(?:\.|:|break|cd|continue|eval|exec|exit|export|getopts|hash|pwd|readonly|return|shift|test|times|trap|umask|unset|alias|bind|builtin|caller|command|declare|echo|enable|help|let|local|logout|mapfile|printf|read|readarray|source|type|typeset|ulimit|unalias|set|shopt)(?=$|[)\s;|&])/,
      lookbehind: !0,
      alias: "class-name"
    },
    "boolean": {
      pattern: /(^|[\s;|&]|[<>]\()(?:true|false)(?=$|[)\s;|&])/,
      lookbehind: !0
    },
    "file-descriptor": {
      pattern: /\B&\d\b/,
      alias: "important"
    },
    operator: {
      pattern: /\d?<>|>\||\+=|==?|!=?|=~|<<[<-]?|[&\d]?>>|\d?[<>]&?|&[>&]?|\|[&|]?|<=?|>=?/,
      inside: {
        "file-descriptor": {
          pattern: /^\d/,
          alias: "important"
        }
      }
    },
    punctuation: /\$?\(\(?|\)\)?|\.\.|[{}[\];\\]/,
    number: {
      pattern: /(^|\s)(?:[1-9]\d*|0)(?:[.,]\d+)?\b/,
      lookbehind: !0
    }
  };

  for (var a = ["comment", "function-name", "for-or-select", "assign-left", "string", "environment", "function", "keyword", "builtin", "boolean", "file-descriptor", "operator", "punctuation", "number"], r = n.variable[1].inside, s = 0; s < a.length; s++) {
    r[a[s]] = e.languages.bash[a[s]];
  }

  e.languages.shell = e.languages.bash;
}(Prism);
!function (e) {
  var r = /%%?[~:\w]+%?|!\S+!/,
      t = {
    pattern: /\/[a-z?]+(?=[ :]|$):?|-[a-z]\b|--[a-z-]+\b/im,
    alias: "attr-name",
    inside: {
      punctuation: /:/
    }
  },
      n = /"[^"]*"/,
      i = /(?:\b|-)\d+\b/;
  Prism.languages.batch = {
    comment: [/^::.*/m, {
      pattern: /((?:^|[&(])[ \t]*)rem\b(?:[^^&)\r\n]|\^(?:\r\n|[\s\S]))*/im,
      lookbehind: !0
    }],
    label: {
      pattern: /^:.*/m,
      alias: "property"
    },
    command: [{
      pattern: /((?:^|[&(])[ \t]*)for(?: ?\/[a-z?](?:[ :](?:"[^"]*"|\S+))?)* \S+ in \([^)]+\) do/im,
      lookbehind: !0,
      inside: {
        keyword: /^for\b|\b(?:in|do)\b/i,
        string: n,
        parameter: t,
        variable: r,
        number: i,
        punctuation: /[()',]/
      }
    }, {
      pattern: /((?:^|[&(])[ \t]*)if(?: ?\/[a-z?](?:[ :](?:"[^"]*"|\S+))?)* (?:not )?(?:cmdextversion \d+|defined \w+|errorlevel \d+|exist \S+|(?:"[^"]*"|\S+)?(?:==| (?:equ|neq|lss|leq|gtr|geq) )(?:"[^"]*"|\S+))/im,
      lookbehind: !0,
      inside: {
        keyword: /^if\b|\b(?:not|cmdextversion|defined|errorlevel|exist)\b/i,
        string: n,
        parameter: t,
        variable: r,
        number: i,
        operator: /\^|==|\b(?:equ|neq|lss|leq|gtr|geq)\b/i
      }
    }, {
      pattern: /((?:^|[&()])[ \t]*)else\b/im,
      lookbehind: !0,
      inside: {
        keyword: /^else\b/i
      }
    }, {
      pattern: /((?:^|[&(])[ \t]*)set(?: ?\/[a-z](?:[ :](?:"[^"]*"|\S+))?)* (?:[^^&)\r\n]|\^(?:\r\n|[\s\S]))*/im,
      lookbehind: !0,
      inside: {
        keyword: /^set\b/i,
        string: n,
        parameter: t,
        variable: [r, /\w+(?=(?:[*\/%+\-&^|]|<<|>>)?=)/],
        number: i,
        operator: /[*\/%+\-&^|]=?|<<=?|>>=?|[!~_=]/,
        punctuation: /[()',]/
      }
    }, {
      pattern: /((?:^|[&(])[ \t]*@?)\w+\b(?:[^^&)\r\n]|\^(?:\r\n|[\s\S]))*/im,
      lookbehind: !0,
      inside: {
        keyword: /^\w+\b/i,
        string: n,
        parameter: t,
        label: {
          pattern: /(^\s*):\S+/m,
          lookbehind: !0,
          alias: "property"
        },
        variable: r,
        number: i,
        operator: /\^/
      }
    }],
    operator: /[&@]/,
    punctuation: /[()']/
  };
}();
Prism.languages.cpp = Prism.languages.extend("c", {
  "class-name": {
    pattern: /(\b(?:class|enum|struct)\s+)\w+/,
    lookbehind: !0
  },
  keyword: /\b(?:alignas|alignof|asm|auto|bool|break|case|catch|char|char16_t|char32_t|class|compl|const|constexpr|const_cast|continue|decltype|default|delete|do|double|dynamic_cast|else|enum|explicit|export|extern|float|for|friend|goto|if|inline|int|int8_t|int16_t|int32_t|int64_t|uint8_t|uint16_t|uint32_t|uint64_t|long|mutable|namespace|new|noexcept|nullptr|operator|private|protected|public|register|reinterpret_cast|return|short|signed|sizeof|static|static_assert|static_cast|struct|switch|template|this|thread_local|throw|try|typedef|typeid|typename|union|unsigned|using|virtual|void|volatile|wchar_t|while)\b/,
  number: {
    pattern: /(?:\b0b[01']+|\b0x(?:[\da-f']+\.?[\da-f']*|\.[\da-f']+)(?:p[+-]?[\d']+)?|(?:\b[\d']+\.?[\d']*|\B\.[\d']+)(?:e[+-]?[\d']+)?)[ful]*/i,
    greedy: !0
  },
  operator: />>=?|<<=?|->|([-+&|:])\1|[?:~]|[-+*/%&|^!=<>]=?|\b(?:and|and_eq|bitand|bitor|not|not_eq|or|or_eq|xor|xor_eq)\b/,
  "boolean": /\b(?:true|false)\b/
}), Prism.languages.insertBefore("cpp", "string", {
  "raw-string": {
    pattern: /R"([^()\\ ]{0,16})\([\s\S]*?\)\1"/,
    alias: "string",
    greedy: !0
  }
});
Prism.languages.css.selector = {
  pattern: Prism.languages.css.selector,
  inside: {
    "pseudo-element": /:(?:after|before|first-letter|first-line|selection)|::[-\w]+/,
    "pseudo-class": /:[-\w]+/,
    "class": /\.[-:.\w]+/,
    id: /#[-:.\w]+/,
    attribute: {
      pattern: /\[(?:[^[\]"']|("|')(?:\\(?:\r\n|[\s\S])|(?!\1)[^\\\r\n])*\1)*\]/,
      greedy: !0,
      inside: {
        punctuation: /^\[|\]$/,
        "case-sensitivity": {
          pattern: /(\s)[si]$/i,
          lookbehind: !0,
          alias: "keyword"
        },
        namespace: {
          pattern: /^(\s*)[-*\w\xA0-\uFFFF]*\|(?!=)/,
          lookbehind: !0,
          inside: {
            punctuation: /\|$/
          }
        },
        attribute: {
          pattern: /^(\s*)[-\w\xA0-\uFFFF]+/,
          lookbehind: !0
        },
        value: [/("|')(?:\\(?:\r\n|[\s\S])|(?!\1)[^\\\r\n])*\1/, {
          pattern: /(=\s*)[-\w\xA0-\uFFFF]+(?=\s*$)/,
          lookbehind: !0
        }],
        operator: /[|~*^$]?=/
      }
    },
    "n-th": [{
      pattern: /(\(\s*)[+-]?\d*[\dn](?:\s*[+-]\s*\d+)?(?=\s*\))/,
      lookbehind: !0,
      inside: {
        number: /[\dn]+/,
        operator: /[+-]/
      }
    }, {
      pattern: /(\(\s*)(?:even|odd)(?=\s*\))/i,
      lookbehind: !0
    }],
    punctuation: /[()]/
  }
}, Prism.languages.insertBefore("css", "property", {
  variable: {
    pattern: /(^|[^-\w\xA0-\uFFFF])--[-_a-z\xA0-\uFFFF][-\w\xA0-\uFFFF]*/i,
    lookbehind: !0
  }
}), Prism.languages.insertBefore("css", "function", {
  operator: {
    pattern: /(\s)[+\-*\/](?=\s)/,
    lookbehind: !0
  },
  hexcode: /#[\da-f]{3,8}/i,
  entity: /\\[\da-f]{1,8}/i,
  unit: {
    pattern: /(\d)(?:%|[a-z]+)/,
    lookbehind: !0
  },
  number: /-?[\d.]+/
});
!function (h) {
  function v(e, n) {
    return "___" + e.toUpperCase() + n + "___";
  }

  Object.defineProperties(h.languages["markup-templating"] = {}, {
    buildPlaceholders: {
      value: function value(a, r, e, o) {
        if (a.language === r) {
          var c = a.tokenStack = [];
          a.code = a.code.replace(e, function (e) {
            if ("function" == typeof o && !o(e)) return e;

            for (var n, t = c.length; -1 !== a.code.indexOf(n = v(r, t));) {
              ++t;
            }

            return c[t] = e, n;
          }), a.grammar = h.languages.markup;
        }
      }
    },
    tokenizePlaceholders: {
      value: function value(p, k) {
        if (p.language === k && p.tokenStack) {
          p.grammar = h.languages[k];
          var m = 0,
              d = Object.keys(p.tokenStack);
          !function e(n) {
            for (var t = 0; t < n.length && !(m >= d.length); t++) {
              var a = n[t];

              if ("string" == typeof a || a.content && "string" == typeof a.content) {
                var r = d[m],
                    o = p.tokenStack[r],
                    c = "string" == typeof a ? a : a.content,
                    i = v(k, r),
                    u = c.indexOf(i);

                if (-1 < u) {
                  ++m;
                  var g = c.substring(0, u),
                      l = new h.Token(k, h.tokenize(o, p.grammar), "language-" + k, o),
                      s = c.substring(u + i.length),
                      f = [];
                  g && f.push.apply(f, e([g])), f.push(l), s && f.push.apply(f, e([s])), "string" == typeof a ? n.splice.apply(n, [t, 1].concat(f)) : a.content = f;
                }
              } else a.content && e(a.content);
            }

            return n;
          }(p.tokens);
        }
      }
    }
  });
}(Prism);
Prism.languages.less = Prism.languages.extend("css", {
  comment: [/\/\*[\s\S]*?\*\//, {
    pattern: /(^|[^\\])\/\/.*/,
    lookbehind: !0
  }],
  atrule: {
    pattern: /@[\w-]+?(?:\([^{}]+\)|[^(){};])*?(?=\s*\{)/i,
    inside: {
      punctuation: /[:()]/
    }
  },
  selector: {
    pattern: /(?:@\{[\w-]+\}|[^{};\s@])(?:@\{[\w-]+\}|\([^{}]*\)|[^{};@])*?(?=\s*\{)/,
    inside: {
      variable: /@+[\w-]+/
    }
  },
  property: /(?:@\{[\w-]+\}|[\w-])+(?:\+_?)?(?=\s*:)/i,
  operator: /[+\-*\/]/
}), Prism.languages.insertBefore("less", "property", {
  variable: [{
    pattern: /@[\w-]+\s*:/,
    inside: {
      punctuation: /:/
    }
  }, /@@?[\w-]+/],
  "mixin-usage": {
    pattern: /([{;]\s*)[.#](?!\d)[\w-]+.*?(?=[(;])/,
    lookbehind: !0,
    alias: "function"
  }
});
!function (e) {
  var t = /\b(?:abstract|continue|for|new|switch|assert|default|goto|package|synchronized|boolean|do|if|private|this|break|double|implements|protected|throw|byte|else|import|public|throws|case|enum|instanceof|return|transient|catch|extends|int|short|try|char|final|interface|static|void|class|finally|long|strictfp|volatile|const|float|native|super|while|var|null|exports|module|open|opens|provides|requires|to|transitive|uses|with)\b/,
      a = /\b[A-Z](?:\w*[a-z]\w*)?\b/;
  e.languages.java = e.languages.extend("clike", {
    "class-name": [a, /\b[A-Z]\w*(?=\s+\w+\s*[;,=())])/],
    keyword: t,
    "function": [e.languages.clike["function"], {
      pattern: /(\:\:)[a-z_]\w*/,
      lookbehind: !0
    }],
    number: /\b0b[01][01_]*L?\b|\b0x[\da-f_]*\.?[\da-f_p+-]+\b|(?:\b\d[\d_]*\.?[\d_]*|\B\.\d[\d_]*)(?:e[+-]?\d[\d_]*)?[dfl]?/i,
    operator: {
      pattern: /(^|[^.])(?:<<=?|>>>?=?|->|([-+&|])\2|[?:~]|[-+*/%&|^!=<>]=?)/m,
      lookbehind: !0
    }
  }), e.languages.insertBefore("java", "class-name", {
    annotation: {
      alias: "punctuation",
      pattern: /(^|[^.])@\w+/,
      lookbehind: !0
    },
    namespace: {
      pattern: /(\b(?:exports|import(?:\s+static)?|module|open|opens|package|provides|requires|to|transitive|uses|with)\s+)[a-z]\w*(\.[a-z]\w*)+/,
      lookbehind: !0,
      inside: {
        punctuation: /\./
      }
    },
    generics: {
      pattern: /<(?:[\w\s,.&?]|<(?:[\w\s,.&?]|<(?:[\w\s,.&?]|<[\w\s,.&?]*>)*>)*>)*>/,
      inside: {
        "class-name": a,
        keyword: t,
        punctuation: /[<>(),.:]/,
        operator: /[?&|]/
      }
    }
  });
}(Prism);
!function (n) {
  n.languages.php = n.languages.extend("clike", {
    keyword: /\b(?:__halt_compiler|abstract|and|array|as|break|callable|case|catch|class|clone|const|continue|declare|default|die|do|echo|else|elseif|empty|enddeclare|endfor|endforeach|endif|endswitch|endwhile|eval|exit|extends|final|finally|for|foreach|function|global|goto|if|implements|include|include_once|instanceof|insteadof|interface|isset|list|namespace|new|or|parent|print|private|protected|public|require|require_once|return|static|switch|throw|trait|try|unset|use|var|while|xor|yield)\b/i,
    "boolean": {
      pattern: /\b(?:false|true)\b/i,
      alias: "constant"
    },
    constant: [/\b[A-Z_][A-Z0-9_]*\b/, /\b(?:null)\b/i],
    comment: {
      pattern: /(^|[^\\])(?:\/\*[\s\S]*?\*\/|\/\/.*)/,
      lookbehind: !0
    }
  }), n.languages.insertBefore("php", "string", {
    "shell-comment": {
      pattern: /(^|[^\\])#.*/,
      lookbehind: !0,
      alias: "comment"
    }
  }), n.languages.insertBefore("php", "comment", {
    delimiter: {
      pattern: /\?>$|^<\?(?:php(?=\s)|=)?/i,
      alias: "important"
    }
  }), n.languages.insertBefore("php", "keyword", {
    variable: /\$+(?:\w+\b|(?={))/i,
    "package": {
      pattern: /(\\|namespace\s+|use\s+)[\w\\]+/,
      lookbehind: !0,
      inside: {
        punctuation: /\\/
      }
    }
  }), n.languages.insertBefore("php", "operator", {
    property: {
      pattern: /(->)[\w]+/,
      lookbehind: !0
    }
  });
  var e = {
    pattern: /{\$(?:{(?:{[^{}]+}|[^{}]+)}|[^{}])+}|(^|[^\\{])\$+(?:\w+(?:\[.+?]|->\w+)*)/,
    lookbehind: !0,
    inside: {
      rest: n.languages.php
    }
  };
  n.languages.insertBefore("php", "string", {
    "nowdoc-string": {
      pattern: /<<<'([^']+)'(?:\r\n?|\n)(?:.*(?:\r\n?|\n))*?\1;/,
      greedy: !0,
      alias: "string",
      inside: {
        delimiter: {
          pattern: /^<<<'[^']+'|[a-z_]\w*;$/i,
          alias: "symbol",
          inside: {
            punctuation: /^<<<'?|[';]$/
          }
        }
      }
    },
    "heredoc-string": {
      pattern: /<<<(?:"([^"]+)"(?:\r\n?|\n)(?:.*(?:\r\n?|\n))*?\1;|([a-z_]\w*)(?:\r\n?|\n)(?:.*(?:\r\n?|\n))*?\2;)/i,
      greedy: !0,
      alias: "string",
      inside: {
        delimiter: {
          pattern: /^<<<(?:"[^"]+"|[a-z_]\w*)|[a-z_]\w*;$/i,
          alias: "symbol",
          inside: {
            punctuation: /^<<<"?|[";]$/
          }
        },
        interpolation: e
      }
    },
    "single-quoted-string": {
      pattern: /'(?:\\[\s\S]|[^\\'])*'/,
      greedy: !0,
      alias: "string"
    },
    "double-quoted-string": {
      pattern: /"(?:\\[\s\S]|[^\\"])*"/,
      greedy: !0,
      alias: "string",
      inside: {
        interpolation: e
      }
    }
  }), delete n.languages.php.string, n.hooks.add("before-tokenize", function (e) {
    if (/<\?/.test(e.code)) {
      n.languages["markup-templating"].buildPlaceholders(e, "php", /<\?(?:[^"'/#]|\/(?![*/])|("|')(?:\\[\s\S]|(?!\1)[^\\])*\1|(?:\/\/|#)(?:[^?\n\r]|\?(?!>))*|\/\*[\s\S]*?(?:\*\/|$))*?(?:\?>|$)/gi);
    }
  }), n.hooks.add("after-tokenize", function (e) {
    n.languages["markup-templating"].tokenizePlaceholders(e, "php");
  });
}(Prism);
!function (p) {
  var a = p.languages.javadoclike = {
    parameter: {
      pattern: /(^\s*(?:\/{3}|\*|\/\*\*)\s*@(?:param|arg|arguments)\s+)\w+/m,
      lookbehind: !0
    },
    keyword: {
      pattern: /(^\s*(?:\/{3}|\*|\/\*\*)\s*|\{)@[a-z][a-zA-Z-]+\b/m,
      lookbehind: !0
    },
    punctuation: /[{}]/
  };
  Object.defineProperty(a, "addSupport", {
    value: function value(a, e) {
      "string" == typeof a && (a = [a]), a.forEach(function (a) {
        !function (a, e) {
          var n = "doc-comment",
              t = p.languages[a];

          if (t) {
            var r = t[n];

            if (!r) {
              var i = {
                "doc-comment": {
                  pattern: /(^|[^\\])\/\*\*[^/][\s\S]*?(?:\*\/|$)/,
                  alias: "comment"
                }
              };
              r = (t = p.languages.insertBefore(a, "comment", i))[n];
            }

            if (r instanceof RegExp && (r = t[n] = {
              pattern: r
            }), Array.isArray(r)) for (var o = 0, s = r.length; o < s; o++) {
              r[o] instanceof RegExp && (r[o] = {
                pattern: r[o]
              }), e(r[o]);
            } else e(r);
          }
        }(a, function (a) {
          a.inside || (a.inside = {}), a.inside.rest = e;
        });
      });
    }
  }), a.addSupport(["java", "javascript", "php"], a);
}(Prism);
Prism.languages.json = {
  property: {
    pattern: /"(?:\\.|[^\\"\r\n])*"(?=\s*:)/,
    greedy: !0
  },
  string: {
    pattern: /"(?:\\.|[^\\"\r\n])*"(?!\s*:)/,
    greedy: !0
  },
  comment: /\/\/.*|\/\*[\s\S]*?(?:\*\/|$)/,
  number: /-?\d+\.?\d*(e[+-]?\d+)?/i,
  punctuation: /[{}[\],]/,
  operator: /:/,
  "boolean": /\b(?:true|false)\b/,
  "null": {
    pattern: /\bnull\b/,
    alias: "keyword"
  }
};
!function (s) {
  function n(n, e) {
    return n = n.replace(/<inner>/g, "(?:\\\\.|[^\\\\\\n\r]|(?:\r?\n|\r)(?!\r?\n|\r))"), e && (n = n + "|" + n.replace(/_/g, "\\*")), RegExp("((?:^|[^\\\\])(?:\\\\{2})*)(?:" + n + ")");
  }

  var e = "(?:\\\\.|``.+?``|`[^`\r\\n]+`|[^\\\\|\r\\n`])+",
      t = "\\|?__(?:\\|__)+\\|?(?:(?:\r?\n|\r)|$)".replace(/__/g, e),
      a = "\\|?[ \t]*:?-{3,}:?[ \t]*(?:\\|[ \t]*:?-{3,}:?[ \t]*)+\\|?(?:\r?\n|\r)";
  s.languages.markdown = s.languages.extend("markup", {}), s.languages.insertBefore("markdown", "prolog", {
    blockquote: {
      pattern: /^>(?:[\t ]*>)*/m,
      alias: "punctuation"
    },
    table: {
      pattern: RegExp("^" + t + a + "(?:" + t + ")*", "m"),
      inside: {
        "table-data-rows": {
          pattern: RegExp("^(" + t + a + ")(?:" + t + ")*$"),
          lookbehind: !0,
          inside: {
            "table-data": {
              pattern: RegExp(e),
              inside: s.languages.markdown
            },
            punctuation: /\|/
          }
        },
        "table-line": {
          pattern: RegExp("^(" + t + ")" + a + "$"),
          lookbehind: !0,
          inside: {
            punctuation: /\||:?-{3,}:?/
          }
        },
        "table-header-row": {
          pattern: RegExp("^" + t + "$"),
          inside: {
            "table-header": {
              pattern: RegExp(e),
              alias: "important",
              inside: s.languages.markdown
            },
            punctuation: /\|/
          }
        }
      }
    },
    code: [{
      pattern: /(^[ \t]*(?:\r?\n|\r))(?: {4}|\t).+(?:(?:\r?\n|\r)(?: {4}|\t).+)*/m,
      lookbehind: !0,
      alias: "keyword"
    }, {
      pattern: /``.+?``|`[^`\r\n]+`/,
      alias: "keyword"
    }, {
      pattern: /^```[\s\S]*?^```$/m,
      greedy: !0,
      inside: {
        "code-block": {
          pattern: /^(```.*(?:\r?\n|\r))[\s\S]+?(?=(?:\r?\n|\r)^```$)/m,
          lookbehind: !0
        },
        "code-language": {
          pattern: /^(```).+/,
          lookbehind: !0
        },
        punctuation: /```/
      }
    }],
    title: [{
      pattern: /\S.*(?:\r?\n|\r)(?:==+|--+)(?=[ \t]*$)/m,
      alias: "important",
      inside: {
        punctuation: /==+$|--+$/
      }
    }, {
      pattern: /(^\s*)#+.+/m,
      lookbehind: !0,
      alias: "important",
      inside: {
        punctuation: /^#+|#+$/
      }
    }],
    hr: {
      pattern: /(^\s*)([*-])(?:[\t ]*\2){2,}(?=\s*$)/m,
      lookbehind: !0,
      alias: "punctuation"
    },
    list: {
      pattern: /(^\s*)(?:[*+-]|\d+\.)(?=[\t ].)/m,
      lookbehind: !0,
      alias: "punctuation"
    },
    "url-reference": {
      pattern: /!?\[[^\]]+\]:[\t ]+(?:\S+|<(?:\\.|[^>\\])+>)(?:[\t ]+(?:"(?:\\.|[^"\\])*"|'(?:\\.|[^'\\])*'|\((?:\\.|[^)\\])*\)))?/,
      inside: {
        variable: {
          pattern: /^(!?\[)[^\]]+/,
          lookbehind: !0
        },
        string: /(?:"(?:\\.|[^"\\])*"|'(?:\\.|[^'\\])*'|\((?:\\.|[^)\\])*\))$/,
        punctuation: /^[\[\]!:]|[<>]/
      },
      alias: "url"
    },
    bold: {
      pattern: n("__(?:(?!_)<inner>|_(?:(?!_)<inner>)+_)+__", !0),
      lookbehind: !0,
      greedy: !0,
      inside: {
        content: {
          pattern: /(^..)[\s\S]+(?=..$)/,
          lookbehind: !0,
          inside: {}
        },
        punctuation: /\*\*|__/
      }
    },
    italic: {
      pattern: n("_(?:(?!_)<inner>|__(?:(?!_)<inner>)+__)+_", !0),
      lookbehind: !0,
      greedy: !0,
      inside: {
        content: {
          pattern: /(^.)[\s\S]+(?=.$)/,
          lookbehind: !0,
          inside: {}
        },
        punctuation: /[*_]/
      }
    },
    strike: {
      pattern: n("(~~?)(?:(?!~)<inner>)+?\\2", !1),
      lookbehind: !0,
      greedy: !0,
      inside: {
        content: {
          pattern: /(^~~?)[\s\S]+(?=\1$)/,
          lookbehind: !0,
          inside: {}
        },
        punctuation: /~~?/
      }
    },
    url: {
      pattern: n('!?\\[(?:(?!\\])<inner>)+\\](?:\\([^\\s)]+(?:[\t ]+"(?:\\\\.|[^"\\\\])*")?\\)| ?\\[(?:(?!\\])<inner>)+\\])', !1),
      lookbehind: !0,
      greedy: !0,
      inside: {
        variable: {
          pattern: /(\[)[^\]]+(?=\]$)/,
          lookbehind: !0
        },
        content: {
          pattern: /(^!?\[)[^\]]+(?=\])/,
          lookbehind: !0,
          inside: {}
        },
        string: {
          pattern: /"(?:\\.|[^"\\])*"(?=\)$)/
        }
      }
    }
  }), ["url", "bold", "italic", "strike"].forEach(function (e) {
    ["url", "bold", "italic", "strike"].forEach(function (n) {
      e !== n && (s.languages.markdown[e].inside.content.inside[n] = s.languages.markdown[n]);
    });
  }), s.hooks.add("after-tokenize", function (n) {
    "markdown" !== n.language && "md" !== n.language || !function n(e) {
      if (e && "string" != typeof e) for (var t = 0, a = e.length; t < a; t++) {
        var i = e[t];

        if ("code" === i.type) {
          var r = i.content[1],
              o = i.content[3];

          if (r && o && "code-language" === r.type && "code-block" === o.type && "string" == typeof r.content) {
            var l = "language-" + r.content.trim().split(/\s+/)[0].toLowerCase();
            o.alias ? "string" == typeof o.alias ? o.alias = [o.alias, l] : o.alias.push(l) : o.alias = [l];
          }
        } else n(i.content);
      }
    }(n.tokens);
  }), s.hooks.add("wrap", function (n) {
    if ("code-block" === n.type) {
      for (var e = "", t = 0, a = n.classes.length; t < a; t++) {
        var i = n.classes[t],
            r = /language-(.+)/.exec(i);

        if (r) {
          e = r[1];
          break;
        }
      }

      var o = s.languages[e];

      if (o) {
        var l = n.content.replace(/&lt;/g, "<").replace(/&amp;/g, "&");
        n.content = s.highlight(l, o, e);
      }
    }
  }), s.languages.md = s.languages.markdown;
}(Prism);
!function (a) {
  var e = "(?:[a-zA-Z]\\w*|[|\\\\[\\]])+";
  a.languages.phpdoc = a.languages.extend("javadoclike", {
    parameter: {
      pattern: RegExp("(@(?:global|param|property(?:-read|-write)?|var)\\s+(?:" + e + "\\s+)?)\\$\\w+"),
      lookbehind: !0
    }
  }), a.languages.insertBefore("phpdoc", "keyword", {
    "class-name": [{
      pattern: RegExp("(@(?:global|package|param|property(?:-read|-write)?|return|subpackage|throws|var)\\s+)" + e),
      lookbehind: !0,
      inside: {
        keyword: /\b(?:callback|resource|boolean|integer|double|object|string|array|false|float|mixed|bool|null|self|true|void|int)\b/,
        punctuation: /[|\\[\]()]/
      }
    }]
  }), a.languages.javadoclike.addSupport("php", a.languages.phpdoc);
}(Prism);
Prism.languages.insertBefore("php", "variable", {
  "this": /\$this\b/,
  global: /\$(?:_(?:SERVER|GET|POST|FILES|REQUEST|SESSION|ENV|COOKIE)|GLOBALS|HTTP_RAW_POST_DATA|argc|argv|php_errormsg|http_response_header)\b/,
  scope: {
    pattern: /\b[\w\\]+::/,
    inside: {
      keyword: /static|self|parent/,
      punctuation: /::|\\/
    }
  }
});
Prism.languages.sql = {
  comment: {
    pattern: /(^|[^\\])(?:\/\*[\s\S]*?\*\/|(?:--|\/\/|#).*)/,
    lookbehind: !0
  },
  variable: [{
    pattern: /@(["'`])(?:\\[\s\S]|(?!\1)[^\\])+\1/,
    greedy: !0
  }, /@[\w.$]+/],
  string: {
    pattern: /(^|[^@\\])("|')(?:\\[\s\S]|(?!\2)[^\\]|\2\2)*\2/,
    greedy: !0,
    lookbehind: !0
  },
  "function": /\b(?:AVG|COUNT|FIRST|FORMAT|LAST|LCASE|LEN|MAX|MID|MIN|MOD|NOW|ROUND|SUM|UCASE)(?=\s*\()/i,
  keyword: /\b(?:ACTION|ADD|AFTER|ALGORITHM|ALL|ALTER|ANALYZE|ANY|APPLY|AS|ASC|AUTHORIZATION|AUTO_INCREMENT|BACKUP|BDB|BEGIN|BERKELEYDB|BIGINT|BINARY|BIT|BLOB|BOOL|BOOLEAN|BREAK|BROWSE|BTREE|BULK|BY|CALL|CASCADED?|CASE|CHAIN|CHAR(?:ACTER|SET)?|CHECK(?:POINT)?|CLOSE|CLUSTERED|COALESCE|COLLATE|COLUMNS?|COMMENT|COMMIT(?:TED)?|COMPUTE|CONNECT|CONSISTENT|CONSTRAINT|CONTAINS(?:TABLE)?|CONTINUE|CONVERT|CREATE|CROSS|CURRENT(?:_DATE|_TIME|_TIMESTAMP|_USER)?|CURSOR|CYCLE|DATA(?:BASES?)?|DATE(?:TIME)?|DAY|DBCC|DEALLOCATE|DEC|DECIMAL|DECLARE|DEFAULT|DEFINER|DELAYED|DELETE|DELIMITERS?|DENY|DESC|DESCRIBE|DETERMINISTIC|DISABLE|DISCARD|DISK|DISTINCT|DISTINCTROW|DISTRIBUTED|DO|DOUBLE|DROP|DUMMY|DUMP(?:FILE)?|DUPLICATE|ELSE(?:IF)?|ENABLE|ENCLOSED|END|ENGINE|ENUM|ERRLVL|ERRORS|ESCAPED?|EXCEPT|EXEC(?:UTE)?|EXISTS|EXIT|EXPLAIN|EXTENDED|FETCH|FIELDS|FILE|FILLFACTOR|FIRST|FIXED|FLOAT|FOLLOWING|FOR(?: EACH ROW)?|FORCE|FOREIGN|FREETEXT(?:TABLE)?|FROM|FULL|FUNCTION|GEOMETRY(?:COLLECTION)?|GLOBAL|GOTO|GRANT|GROUP|HANDLER|HASH|HAVING|HOLDLOCK|HOUR|IDENTITY(?:_INSERT|COL)?|IF|IGNORE|IMPORT|INDEX|INFILE|INNER|INNODB|INOUT|INSERT|INT|INTEGER|INTERSECT|INTERVAL|INTO|INVOKER|ISOLATION|ITERATE|JOIN|KEYS?|KILL|LANGUAGE|LAST|LEAVE|LEFT|LEVEL|LIMIT|LINENO|LINES|LINESTRING|LOAD|LOCAL|LOCK|LONG(?:BLOB|TEXT)|LOOP|MATCH(?:ED)?|MEDIUM(?:BLOB|INT|TEXT)|MERGE|MIDDLEINT|MINUTE|MODE|MODIFIES|MODIFY|MONTH|MULTI(?:LINESTRING|POINT|POLYGON)|NATIONAL|NATURAL|NCHAR|NEXT|NO|NONCLUSTERED|NULLIF|NUMERIC|OFF?|OFFSETS?|ON|OPEN(?:DATASOURCE|QUERY|ROWSET)?|OPTIMIZE|OPTION(?:ALLY)?|ORDER|OUT(?:ER|FILE)?|OVER|PARTIAL|PARTITION|PERCENT|PIVOT|PLAN|POINT|POLYGON|PRECEDING|PRECISION|PREPARE|PREV|PRIMARY|PRINT|PRIVILEGES|PROC(?:EDURE)?|PUBLIC|PURGE|QUICK|RAISERROR|READS?|REAL|RECONFIGURE|REFERENCES|RELEASE|RENAME|REPEAT(?:ABLE)?|REPLACE|REPLICATION|REQUIRE|RESIGNAL|RESTORE|RESTRICT|RETURNS?|REVOKE|RIGHT|ROLLBACK|ROUTINE|ROW(?:COUNT|GUIDCOL|S)?|RTREE|RULE|SAVE(?:POINT)?|SCHEMA|SECOND|SELECT|SERIAL(?:IZABLE)?|SESSION(?:_USER)?|SET(?:USER)?|SHARE|SHOW|SHUTDOWN|SIMPLE|SMALLINT|SNAPSHOT|SOME|SONAME|SQL|START(?:ING)?|STATISTICS|STATUS|STRIPED|SYSTEM_USER|TABLES?|TABLESPACE|TEMP(?:ORARY|TABLE)?|TERMINATED|TEXT(?:SIZE)?|THEN|TIME(?:STAMP)?|TINY(?:BLOB|INT|TEXT)|TOP?|TRAN(?:SACTIONS?)?|TRIGGER|TRUNCATE|TSEQUAL|TYPES?|UNBOUNDED|UNCOMMITTED|UNDEFINED|UNION|UNIQUE|UNLOCK|UNPIVOT|UNSIGNED|UPDATE(?:TEXT)?|USAGE|USE|USER|USING|VALUES?|VAR(?:BINARY|CHAR|CHARACTER|YING)|VIEW|WAITFOR|WARNINGS|WHEN|WHERE|WHILE|WITH(?: ROLLUP|IN)?|WORK|WRITE(?:TEXT)?|YEAR)\b/i,
  "boolean": /\b(?:TRUE|FALSE|NULL)\b/i,
  number: /\b0x[\da-f]+\b|\b\d+\.?\d*|\B\.\d+\b/i,
  operator: /[-+*\/=%^~]|&&?|\|\|?|!=?|<(?:=>?|<|>)?|>[>=]?|\b(?:AND|BETWEEN|IN|LIKE|NOT|OR|IS|DIV|REGEXP|RLIKE|SOUNDS LIKE|XOR)\b/i,
  punctuation: /[;[\]()`,.]/
};
Prism.languages.python = {
  comment: {
    pattern: /(^|[^\\])#.*/,
    lookbehind: !0
  },
  "string-interpolation": {
    pattern: /(?:f|rf|fr)(?:("""|''')[\s\S]+?\1|("|')(?:\\.|(?!\2)[^\\\r\n])*\2)/i,
    greedy: !0,
    inside: {
      interpolation: {
        pattern: /((?:^|[^{])(?:{{)*){(?!{)(?:[^{}]|{(?!{)(?:[^{}]|{(?!{)(?:[^{}])+})+})+}/,
        lookbehind: !0,
        inside: {
          "format-spec": {
            pattern: /(:)[^:(){}]+(?=}$)/,
            lookbehind: !0
          },
          "conversion-option": {
            pattern: /![sra](?=[:}]$)/,
            alias: "punctuation"
          },
          rest: null
        }
      },
      string: /[\s\S]+/
    }
  },
  "triple-quoted-string": {
    pattern: /(?:[rub]|rb|br)?("""|''')[\s\S]+?\1/i,
    greedy: !0,
    alias: "string"
  },
  string: {
    pattern: /(?:[rub]|rb|br)?("|')(?:\\.|(?!\1)[^\\\r\n])*\1/i,
    greedy: !0
  },
  "function": {
    pattern: /((?:^|\s)def[ \t]+)[a-zA-Z_]\w*(?=\s*\()/g,
    lookbehind: !0
  },
  "class-name": {
    pattern: /(\bclass\s+)\w+/i,
    lookbehind: !0
  },
  decorator: {
    pattern: /(^\s*)@\w+(?:\.\w+)*/i,
    lookbehind: !0,
    alias: ["annotation", "punctuation"],
    inside: {
      punctuation: /\./
    }
  },
  keyword: /\b(?:and|as|assert|async|await|break|class|continue|def|del|elif|else|except|exec|finally|for|from|global|if|import|in|is|lambda|nonlocal|not|or|pass|print|raise|return|try|while|with|yield)\b/,
  builtin: /\b(?:__import__|abs|all|any|apply|ascii|basestring|bin|bool|buffer|bytearray|bytes|callable|chr|classmethod|cmp|coerce|compile|complex|delattr|dict|dir|divmod|enumerate|eval|execfile|file|filter|float|format|frozenset|getattr|globals|hasattr|hash|help|hex|id|input|int|intern|isinstance|issubclass|iter|len|list|locals|long|map|max|memoryview|min|next|object|oct|open|ord|pow|property|range|raw_input|reduce|reload|repr|reversed|round|set|setattr|slice|sorted|staticmethod|str|sum|super|tuple|type|unichr|unicode|vars|xrange|zip)\b/,
  "boolean": /\b(?:True|False|None)\b/,
  number: /(?:\b(?=\d)|\B(?=\.))(?:0[bo])?(?:(?:\d|0x[\da-f])[\da-f]*\.?\d*|\.\d+)(?:e[+-]?\d+)?j?\b/i,
  operator: /[-+%=]=?|!=|\*\*?=?|\/\/?=?|<[<=>]?|>[=>]?|[&|^~]/,
  punctuation: /[{}[\];(),.:]/
}, Prism.languages.python["string-interpolation"].inside.interpolation.inside.rest = Prism.languages.python, Prism.languages.py = Prism.languages.python;
!function (a) {
  a.languages.insertBefore("javascript", "function-variable", {
    "method-variable": {
      pattern: RegExp("(\\.\\s*)" + a.languages.javascript["function-variable"].pattern.source),
      lookbehind: !0,
      alias: ["function-variable", "method", "function", "property-access"]
    }
  }), a.languages.insertBefore("javascript", "function", {
    method: {
      pattern: RegExp("(\\.\\s*)" + a.languages.javascript["function"].source),
      lookbehind: !0,
      alias: ["function", "property-access"]
    }
  }), a.languages.insertBefore("javascript", "constant", {
    "known-class-name": [{
      pattern: /\b(?:(?:(?:Uint|Int)(?:8|16|32)|Uint8Clamped|Float(?:32|64))?Array|ArrayBuffer|BigInt|Boolean|DataView|Date|Error|Function|Intl|JSON|Math|Number|Object|Promise|Proxy|Reflect|RegExp|String|Symbol|(?:Weak)?(?:Set|Map)|WebAssembly)\b/,
      alias: "class-name"
    }, {
      pattern: /\b(?:[A-Z]\w*)Error\b/,
      alias: "class-name"
    }]
  }), a.languages.javascript.keyword.unshift({
    pattern: /\b(?:as|default|export|from|import)\b/,
    alias: "module"
  }, {
    pattern: /\bnull\b/,
    alias: ["null", "nil"]
  }, {
    pattern: /\bundefined\b/,
    alias: "nil"
  }), a.languages.insertBefore("javascript", "operator", {
    spread: {
      pattern: /\.{3}/,
      alias: "operator"
    },
    arrow: {
      pattern: /=>/,
      alias: "operator"
    }
  }), a.languages.insertBefore("javascript", "punctuation", {
    "property-access": {
      pattern: /(\.\s*)#?[_$a-zA-Z\xA0-\uFFFF][$\w\xA0-\uFFFF]*/,
      lookbehind: !0
    },
    "maybe-class-name": {
      pattern: /(^|[^$\w\xA0-\uFFFF])[A-Z][$\w\xA0-\uFFFF]+/,
      lookbehind: !0
    },
    dom: {
      pattern: /\b(?:document|location|navigator|performance|(?:local|session)Storage|window)\b/,
      alias: "variable"
    },
    console: {
      pattern: /\bconsole(?=\s*\.)/,
      alias: "class-name"
    }
  });

  for (var e = ["function", "function-variable", "method", "method-variable", "property-access"], t = 0; t < e.length; t++) {
    var n = e[t],
        r = a.languages.javascript[n];
    "RegExp" === a.util.type(r) && (r = a.languages.javascript[n] = {
      pattern: r
    });
    var s = r.inside || {};
    (r.inside = s)["maybe-class-name"] = /^[A-Z][\s\S]*/;
  }
}(Prism);
!function (e) {
  e.languages.sass = e.languages.extend("css", {
    comment: {
      pattern: /^([ \t]*)\/[\/*].*(?:(?:\r?\n|\r)\1[ \t]+.+)*/m,
      lookbehind: !0
    }
  }), e.languages.insertBefore("sass", "atrule", {
    "atrule-line": {
      pattern: /^(?:[ \t]*)[@+=].+/m,
      inside: {
        atrule: /(?:@[\w-]+|[+=])/m
      }
    }
  }), delete e.languages.sass.atrule;
  var t = /\$[-\w]+|#\{\$[-\w]+\}/,
      a = [/[+*\/%]|[=!]=|<=?|>=?|\b(?:and|or|not)\b/, {
    pattern: /(\s+)-(?=\s)/,
    lookbehind: !0
  }];
  e.languages.insertBefore("sass", "property", {
    "variable-line": {
      pattern: /^[ \t]*\$.+/m,
      inside: {
        punctuation: /:/,
        variable: t,
        operator: a
      }
    },
    "property-line": {
      pattern: /^[ \t]*(?:[^:\s]+ *:.*|:[^:\s]+.*)/m,
      inside: {
        property: [/[^:\s]+(?=\s*:)/, {
          pattern: /(:)[^:\s]+/,
          lookbehind: !0
        }],
        punctuation: /:/,
        variable: t,
        operator: a,
        important: e.languages.sass.important
      }
    }
  }), delete e.languages.sass.property, delete e.languages.sass.important, e.languages.insertBefore("sass", "punctuation", {
    selector: {
      pattern: /([ \t]*)\S(?:,?[^,\r\n]+)*(?:,(?:\r?\n|\r)\1[ \t]+\S(?:,?[^,\r\n]+)*)*/,
      lookbehind: !0
    }
  });
}(Prism);
!function (n) {
  var t = {
    url: /url\((["']?).*?\1\)/i,
    string: {
      pattern: /("|')(?:(?!\1)[^\\\r\n]|\\(?:\r\n|[\s\S]))*\1/,
      greedy: !0
    },
    interpolation: null,
    func: null,
    important: /\B!(?:important|optional)\b/i,
    keyword: {
      pattern: /(^|\s+)(?:(?:if|else|for|return|unless)(?=\s+|$)|@[\w-]+)/,
      lookbehind: !0
    },
    hexcode: /#[\da-f]{3,6}/i,
    number: /\b\d+(?:\.\d+)?%?/,
    "boolean": /\b(?:true|false)\b/,
    operator: [/~|[+!\/%<>?=]=?|[-:]=|\*[*=]?|\.+|&&|\|\||\B-\B|\b(?:and|in|is(?: a| defined| not|nt)?|not|or)\b/],
    punctuation: /[{}()\[\];:,]/
  };
  t.interpolation = {
    pattern: /\{[^\r\n}:]+\}/,
    alias: "variable",
    inside: {
      delimiter: {
        pattern: /^{|}$/,
        alias: "punctuation"
      },
      rest: t
    }
  }, t.func = {
    pattern: /[\w-]+\([^)]*\).*/,
    inside: {
      "function": /^[^(]+/,
      rest: t
    }
  }, n.languages.stylus = {
    comment: {
      pattern: /(^|[^\\])(\/\*[\s\S]*?\*\/|\/\/.*)/,
      lookbehind: !0
    },
    "atrule-declaration": {
      pattern: /(^\s*)@.+/m,
      lookbehind: !0,
      inside: {
        atrule: /^@[\w-]+/,
        rest: t
      }
    },
    "variable-declaration": {
      pattern: /(^[ \t]*)[\w$-]+\s*.?=[ \t]*(?:(?:\{[^}]*\}|.+)|$)/m,
      lookbehind: !0,
      inside: {
        variable: /^\S+/,
        rest: t
      }
    },
    statement: {
      pattern: /(^[ \t]*)(?:if|else|for|return|unless)[ \t]+.+/m,
      lookbehind: !0,
      inside: {
        keyword: /^\S+/,
        rest: t
      }
    },
    "property-declaration": {
      pattern: /((?:^|\{)([ \t]*))(?:[\w-]|\{[^}\r\n]+\})+(?:\s*:\s*|[ \t]+)[^{\r\n]*(?:;|[^{\r\n,](?=$)(?!(\r?\n|\r)(?:\{|\2[ \t]+)))/m,
      lookbehind: !0,
      inside: {
        property: {
          pattern: /^[^\s:]+/,
          inside: {
            interpolation: t.interpolation
          }
        },
        rest: t
      }
    },
    selector: {
      pattern: /(^[ \t]*)(?:(?=\S)(?:[^{}\r\n:()]|::?[\w-]+(?:\([^)\r\n]*\))?|\{[^}\r\n]+\})+)(?:(?:\r?\n|\r)(?:\1(?:(?=\S)(?:[^{}\r\n:()]|::?[\w-]+(?:\([^)\r\n]*\))?|\{[^}\r\n]+\})+)))*(?:,$|\{|(?=(?:\r?\n|\r)(?:\{|\1[ \t]+)))/m,
      lookbehind: !0,
      inside: {
        interpolation: t.interpolation,
        punctuation: /[{},]/
      }
    },
    func: t.func,
    string: t.string,
    interpolation: t.interpolation,
    punctuation: /[{}()\[\];:.]/
  };
}(Prism);
!function (a) {
  var e = {
    code: {
      pattern: /(^(\s*(?:\*\s*)*)).*[^*\s].+$/m,
      lookbehind: !0,
      inside: a.languages.java,
      alias: "language-java"
    }
  };
  a.languages.javadoc = a.languages.extend("javadoclike", {}), a.languages.insertBefore("javadoc", "keyword", {
    "class-name": [{
      pattern: /(@(?:exception|throws|see|link|linkplain|value)\s+(?:[a-z\d]+\.)*)[A-Z](?:\w*[a-z]\w*)?(?:\.[A-Z](?:\w*[a-z]\w*)?)*/,
      lookbehind: !0,
      inside: {
        punctuation: /\./
      }
    }, {
      pattern: /(@param\s+)<[A-Z]\w*>/,
      lookbehind: !0,
      inside: {
        punctuation: /[.<>]/
      }
    }],
    namespace: {
      pattern: /(@(?:exception|throws|see|link|linkplain)\s+)(?:[a-z\d]+\.)+/,
      lookbehind: !0,
      inside: {
        punctuation: /\./
      }
    },
    "code-section": [{
      pattern: /(\{@code\s+)(?:[^{}]|\{[^{}]*\})+?(?=\s*\})/,
      lookbehind: !0,
      inside: e
    }, {
      pattern: /(<(code|tt)>\s*)[\s\S]+?(?=\s*<\/\2>)/,
      lookbehind: !0,
      inside: e
    }],
    tag: a.languages.markup.tag
  }), a.languages.javadoclike.addSupport("java", a.languages.javadoc);
}(Prism);
!function () {
  if ("undefined" != typeof self && self.Prism && self.document) {
    var r = [],
        i = {},
        a = function a() {};

    Prism.plugins.toolbar = {};

    var t = Prism.plugins.toolbar.registerButton = function (t, a) {
      var e;
      e = "function" == typeof a ? a : function (t) {
        var e;
        return "function" == typeof a.onClick ? ((e = document.createElement("button")).type = "button", e.addEventListener("click", function () {
          a.onClick.call(this, t);
        })) : "string" == typeof a.url ? (e = document.createElement("a")).href = a.url : e = document.createElement("span"), a.className && e.classList.add(a.className), e.textContent = a.text, e;
      }, t in i ? console.warn('There is a button with the key "' + t + '" registered already.') : r.push(i[t] = e);
    },
        e = Prism.plugins.toolbar.hook = function (n) {
      var t = n.element.parentNode;

      if (t && /pre/i.test(t.nodeName) && !t.parentNode.classList.contains("code-toolbar")) {
        var e = document.createElement("div");
        e.classList.add("code-toolbar"), t.parentNode.insertBefore(e, t), e.appendChild(t);
        var o = document.createElement("div");
        o.classList.add("toolbar"), document.body.hasAttribute("data-toolbar-order") && (r = document.body.getAttribute("data-toolbar-order").split(",").map(function (t) {
          return i[t] || a;
        })), r.forEach(function (t) {
          var e = t(n);

          if (e) {
            var a = document.createElement("div");
            a.classList.add("toolbar-item"), a.appendChild(e), o.appendChild(a);
          }
        }), e.appendChild(o);
      }
    };

    t("label", function (t) {
      var e = t.element.parentNode;

      if (e && /pre/i.test(e.nodeName) && e.hasAttribute("data-label")) {
        var a,
            n,
            o = e.getAttribute("data-label");

        try {
          n = document.querySelector("template#" + o);
        } catch (t) {}

        return n ? a = n.content : (e.hasAttribute("data-url") ? (a = document.createElement("a")).href = e.getAttribute("data-url") : a = document.createElement("span"), a.textContent = o), a;
      }
    }), Prism.hooks.add("complete", e);
  }
}();
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../../node_modules/webpack/buildin/global.js */ "./node_modules/webpack/buildin/global.js")))

/***/ }),

/***/ 5:
/*!*************************************!*\
  !*** multi ./resources/js/prism.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /media/seguce92/Code/projects/web/mascodigo/resources/js/prism.js */"./resources/js/prism.js");


/***/ })

},[[5,"/js/manifest"]]]);
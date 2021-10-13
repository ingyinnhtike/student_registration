function calcTotal() {
    var t = 0, e = Number(jQuery("#edit-submitted-constituent-base-total-constituents").val().replace(/,/g, ""));
    t += getBonusDonorPoints(e = e ? parseFloat(e) : 0);
    var i, n = Number(jQuery("#edit-submitted-acquisition-amount-1").val().replace(/,/g, "")),
        o = Number(jQuery("#edit-submitted-acquisition-amount-2").val().replace(/,/g, ""));
    n = n ? parseFloat(n) : 0, o = o ? parseFloat(o) : 0, i = n > 0 && o > 0 ? ((o - n) / n * 100).toFixed(2) : 0, jQuery("#edit-submitted-acquisition-percent-change").val(i + "%"), t += getAcquisitionPoints(i), console.log(t);
    var a, s = Number(jQuery("#edit-submitted-cultivation-amount-1").val().replace(/,/g, "")),
        l = Number(jQuery("#edit-submitted-cultivation-amount-2").val().replace(/,/g, ""));
    s = s ? parseFloat(s) : 0, l = l ? parseFloat(l) : 0, a = s > 0 && l > 0 ? ((l - s) / s * 100).toFixed(2) : 0, jQuery("#edit-submitted-cultivation-percent-change1").val(a + "%"), t += getAcquisitionPoints(a);
    var r = Number(jQuery("#edit-submitted-cultivation-amount-3").val().replace(/,/g, "")),
        u = Number(jQuery("#edit-submitted-cultivation-amount-4").val().replace(/,/g, ""));
    r = r ? parseFloat(r) : 0, u = u ? parseFloat(u) : 0, cultTotal2 = r > 0 && u > 0 ? ((u - r) / r * 100).toFixed(2) : 0, jQuery("#edit-submitted-cultivation-percent-change2").val(cultTotal2 + "%"), t += getAcquisitionPoints(cultTotal2);
    var d, c = Number(jQuery("#edit-submitted-retention-amount-1").val().replace(/,/g, "")),
        m = Number(jQuery("#edit-submitted-retention-amount-2").val().replace(/,/g, ""));
    c = c ? parseFloat(c) : 0, m = m ? parseFloat(m) : 0, d = c > 0 && m > 0 ? (m / c * 100).toFixed(2) : 0, jQuery("#edit-submitted-retention-percent-change").val(d + "%"), t += getAcquisitionPoints(d), jQuery("#edit-submitted-final-grade-grade").val(t + " / 400")
}

function getAcquisitionPoints(t) {
    return t < 1 ? 0 : t >= 1 && t < 6 ? 50 : t >= 6 && t < 11 ? 60 : t >= 11 && t < 16 ? 70 : t >= 16 && t < 21 ? 75 : t >= 21 && t < 26 ? 80 : t >= 26 && t < 31 ? 85 : t >= 31 && t < 36 ? 90 : t >= 36 && t < 41 ? 95 : t >= 41 ? 100 : void 0
}

function getCultivationGiftPoints(t) {
    return t < 1 ? 0 : t >= 1 && t < 4 ? 50 : t >= 4 && t < 7 ? 60 : t >= 7 && t < 10 ? 70 : t >= 10 && t < 13 ? 75 : t >= 13 && t < 16 ? 80 : t >= 16 && t < 21 ? 85 : t >= 21 && t < 26 ? 90 : t >= 26 && t < 51 ? 95 : t >= 51 ? 100 : void 0
}

function getCultivationDonationPoints(t) {
    return t < 1 ? 0 : t >= 1 && t < 6 ? 50 : t >= 6 && t < 11 ? 60 : t >= 11 && t < 16 ? 70 : t >= 16 && t < 21 ? 75 : t >= 21 && t < 26 ? 80 : t >= 26 && t < 31 ? 85 : t >= 31 && t < 36 ? 90 : t >= 36 && t < 41 ? 95 : t >= 41 ? 100 : void 0
}

function getRetentionPoints(t) {
    return t < 1 ? 0 : t >= 1 && t < 51 ? 50 : t >= 51 && t < 56 ? 60 : t >= 56 && t < 61 ? 70 : t >= 61 && t < 66 ? 75 : t >= 66 && t < 71 ? 80 : t >= 71 && t < 76 ? 85 : t >= 76 && t < 81 ? 90 : t >= 81 && t < 91 ? 95 : t >= 91 ? 100 : void 0
}

function getBonusDonorPoints(t) {
    return t < 10001 ? 0 : t >= 10001 && t < 25001 ? 10 : t >= 25001 && t < 5e4 ? 15 : t >= 5e4 ? 20 : void 0
}

$(document).ready(function () {
    var t, e, i, n, o, a, s;
    $(".steps").validate({
        errorClass: "invalid", errorElement: "span", errorPlacement: function (t, e) {
            t.insertAfter(e.next("span").children())
        }, highlight: function (t) {
            $(t).next("span").show()
        }, unhighlight: function (t) {
            $(t).next("span").hide()
        }
    }), $(".next").click(function () {
        return $(".steps").validate({
            errorClass: "invalid", errorElement: "span", errorPlacement: function (t, e) {
                t.insertAfter(e.next("span").children())
            }, highlight: function (t) {
                $(t).next("span").show()
            }, unhighlight: function (t) {
                $(t).next("span").hide()
            }
        }), !$(".steps").valid() || !s && (s = !0, t = $(this).parent(), e = $(this).parent().next(), $("#progressbar li").eq($("fieldset").index(e)).addClass("active"), e.show(), void t.animate({opacity: 0}, {
            step: function (i, s) {
                a = 1 - .2 * (1 - i), n = 50 * i + "%", o = 1 - i, t.css({transform: "scale(" + a + ")"}), e.css({
                    left: n,
                    opacity: o
                })
            }, duration: 800, complete: function () {
                t.hide(), s = !1
            }, easing: "easeInOutExpo"
        }))
    }), $(".submit").click(function () {
        return $(".steps").validate({
            errorClass: "invalid", errorElement: "span", errorPlacement: function (t, e) {
                t.insertAfter(e.next("span").children())
            }, highlight: function (t) {
                $(t).next("span").show()
            }, unhighlight: function (t) {
                $(t).next("span").hide()
            }
        }), !!$(".steps").valid() && !s && (s = !0, t = $(this).parent(), e = $(this).parent().next(), $("#progressbar li").eq($("fieldset").index(e)).addClass("active"), e.show(), void t.animate({opacity: 0}, {
            step: function (i, s) {
                a = 1 - .2 * (1 - i), n = 50 * i + "%", o = 1 - i, t.css({transform: "scale(" + a + ")"}), e.css({
                    left: n,
                    opacity: o
                })
            }, duration: 800, complete: function () {
                t.hide(), s = !1
            }, easing: "easeInOutExpo"
        }))
    }), $(".previous").click(function () {
        if (s) return !1;
        s = !0, t = $(this).parent(), i = $(this).parent().prev(), $("#progressbar li").eq($("fieldset").index(t)).removeClass("active"), i.show(), t.animate({opacity: 0}, {
            step: function (e, s) {
                a = .8 + .2 * (1 - e), n = 50 * (1 - e) + "%", o = 1 - e, t.css({left: n}), i.css({
                    transform: "scale(" + a + ")",
                    opacity: o
                })
            }, duration: 800, complete: function () {
                t.hide(), s = !1
            }, easing: "easeInOutExpo"
        })
    })
}), jQuery(document).ready(function () {
    jQuery("#edit-submitted-acquisition-amount-1,#edit-submitted-acquisition-amount-2,#edit-submitted-cultivation-amount-1,#edit-submitted-cultivation-amount-2,#edit-submitted-cultivation-amount-3,#edit-submitted-cultivation-amount-4,#edit-submitted-retention-amount-1,#edit-submitted-retention-amount-2,#edit-submitted-constituent-base-total-constituents").keyup(function () {
        calcTotal()
    })
});
var modules = {
    $window: $(window), $html: $("html"), $body: $("body"), $container: $(".container"), init: function () {
        $(function () {
            modules.modals.init()
        })
    }, modals: {
        trigger: $(".explanation"), modal: $(".modal"), scrollTopPosition: null, init: function () {
            this.trigger.length > 0 && this.modal.length > 0 && (modules.$body.append('<div class="modal-overlay"></div>'), this.triggers())
        }, triggers: function () {
            var t = this;
            t.trigger.on("click", function (e) {
                e.preventDefault();
                var i = $(this);
                t.openModal(i, i.data("modalId"))
            }), $(".modal-overlay").on("click", function (e) {
                e.preventDefault(), t.closeModal()
            }), modules.$body.on("keydown", function (e) {
                27 === e.keyCode && t.closeModal()
            }), $(".modal-close").on("click", function (e) {
                e.preventDefault(), t.closeModal()
            })
        }, openModal: function (t, e) {
            var i = modules.$window.scrollTop(), n = $("#" + e);
            this.scrollTopPosition = i, modules.$html.addClass("modal-show").attr("data-modal-effect", n.data("modal-effect")), n.addClass("modal-show"), modules.$container.scrollTop(i)
        }, closeModal: function () {
            $(".modal-show").removeClass("modal-show"), modules.$html.removeClass("modal-show").removeAttr("data-modal-effect"), modules.$window.scrollTop(this.scrollTopPosition)
        }
    }
};
modules.init()
//     $(window).on("keydown", function (t) {
//     return 123 != t.keyCode && (!t.ctrlKey || !t.shiftKey || 73 != t.keyCode) && (!t.ctrlKey || 73 != t.keyCode) && void 0
// }), $(document).on("contextmenu", function (t) {
//     t.preventDefault()
// });

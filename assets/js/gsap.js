gsap.registerPlugin(ScrollTrigger);
// REVEAL //
gsap.utils.toArray(".revealUpsolutions").forEach(function (elem) {
  ScrollTrigger.matchMedia({
    // large
    "(min-width: 960px)": function () {
      ScrollTrigger.create({
        trigger: elem,
        start: "top 70%",
        end: "bottom",
        /* markers: true, */
        onEnter: function () {
          gsap.fromTo(
            elem,
            { y: 100, autoAlpha: 0 },
            {
              duration: 1.6,
              y: 0,
              autoAlpha: 1,
              ease: "back",
              overwrite: "auto",
            }
          );
        },
        onLeave: function () {
          gsap.fromTo(
            elem,
            { autoAlpha: 1 },
            { autoAlpha: 0, overwrite: "auto" }
          );
        },
        onEnterBack: function () {
          gsap.fromTo(
            elem,
            { y: -100, autoAlpha: 0 },
            {
              duration: 1.6,
              y: 0,
              autoAlpha: 1,
              ease: "back",
              overwrite: "auto",
            }
          );
        },
        onLeaveBack: function () {
          gsap.fromTo(
            elem,
            { autoAlpha: 1 },
            { autoAlpha: 0, overwrite: "auto" }
          );
        },
      });
    },

    // medium
    "(min-width: 600px) and (max-width: 959px)": function () {
      // The ScrollTriggers created inside these functions are segregated and get
      // reverted/killed when the media query doesn't match anymore.
    },

    // small
    "(max-width: 599px)": function () {
      ScrollTrigger.create({
        trigger: elem,
        start: "top 40%",
        end: "bottom",
        /* markers: true, */
        onEnter: function () {
          gsap.fromTo(
            elem,
            { y: 100, autoAlpha: 0 },
            {
              duration: 1.6,
              y: 0,
              autoAlpha: 1,
              ease: "back",
              overwrite: "auto",
            }
          );
        },
        onLeave: function () {
          gsap.fromTo(
            elem,
            { autoAlpha: 1 },
            { autoAlpha: 0, overwrite: "auto" }
          );
        },
        onEnterBack: function () {
          gsap.fromTo(
            elem,
            { y: -100, autoAlpha: 0 },
            {
              duration: 1.6,
              y: 0,
              autoAlpha: 1,
              ease: "back",
              overwrite: "auto",
            }
          );
        },
        onLeaveBack: function () {
          gsap.fromTo(
            elem,
            { autoAlpha: 1 },
            { autoAlpha: 0, overwrite: "auto" }
          );
        },
      });
    },

    // all
    all: function () {
      // ScrollTriggers created here aren't associated with a particular media query,
      // so they persist.
    },
  });
});
gsap.utils.toArray(".revealDown").forEach(function (elem) {
  ScrollTrigger.matchMedia({
    // large
    "(min-width: 960px)": function () {
      ScrollTrigger.create({
        trigger: elem,
        start: "top 70%",
        end: "bottom",
        /* markers: true, */
        onEnter: function () {
          gsap.fromTo(
            elem,
            { y: -100, autoAlpha: 0 },
            {
              duration: 1.6,
              y: 0,
              autoAlpha: 1,
              ease: "back",
              overwrite: "auto",
            }
          );
        },
        onLeave: function () {
          gsap.fromTo(
            elem,
            { autoAlpha: 1 },
            { autoAlpha: 0, overwrite: "auto" }
          );
        },
        onEnterBack: function () {
          gsap.fromTo(
            elem,
            { y: 100, autoAlpha: 0 },
            {
              duration: 1.6,
              y: 0,
              autoAlpha: 1,
              ease: "back",
              overwrite: "auto",
            }
          );
        },
        onLeaveBack: function () {
          gsap.fromTo(
            elem,
            { autoAlpha: 1 },
            { autoAlpha: 0, overwrite: "auto" }
          );
        },
      });
    },

    // medium
    "(min-width: 600px) and (max-width: 959px)": function () {
      // The ScrollTriggers created inside these functions are segregated and get
      // reverted/killed when the media query doesn't match anymore.
    },

    // small
    "(max-width: 599px)": function () {
      ScrollTrigger.create({
        trigger: elem,
        start: "top 40%",
        end: "bottom",
        /* markers: true, */
        onEnter: function () {
          gsap.fromTo(
            elem,
            { y: -100, autoAlpha: 0 },
            {
              duration: 1.6,
              y: 0,
              autoAlpha: 1,
              ease: "back",
              overwrite: "auto",
            }
          );
        },
        onLeave: function () {
          gsap.fromTo(
            elem,
            { autoAlpha: 1 },
            { autoAlpha: 0, overwrite: "auto" }
          );
        },
        onEnterBack: function () {
          gsap.fromTo(
            elem,
            { y: 100, autoAlpha: 0 },
            {
              duration: 1.6,
              y: 0,
              autoAlpha: 1,
              ease: "back",
              overwrite: "auto",
            }
          );
        },
        onLeaveBack: function () {
          gsap.fromTo(
            elem,
            { autoAlpha: 1 },
            { autoAlpha: 0, overwrite: "auto" }
          );
        },
      });
    },

    // all
    all: function () {
      // ScrollTriggers created here aren't associated with a particular media query,
      // so they persist.
    },
  });
});
gsap.utils.toArray(".revealUp").forEach(function (elem) {
  ScrollTrigger.matchMedia({
    // large
    "(min-width: 960px)": function () {
      ScrollTrigger.create({
        trigger: elem,
        start: "top 80%",
        end: "bottom",
        /* markers: true, */
        onEnter: function () {
          gsap.fromTo(
            elem,
            { y: 100, autoAlpha: 0 },
            {
              duration: 1.6,
              y: 0,
              autoAlpha: 1,
              ease: "back",
              overwrite: "auto",
            }
          );
        },
        onLeave: function () {
          gsap.fromTo(
            elem,
            { autoAlpha: 1 },
            { autoAlpha: 0, overwrite: "auto" }
          );
        },
        onEnterBack: function () {
          gsap.fromTo(
            elem,
            { y: -100, autoAlpha: 0 },
            {
              duration: 1.6,
              y: 0,
              autoAlpha: 1,
              ease: "back",
              overwrite: "auto",
            }
          );
        },
        onLeaveBack: function () {
          gsap.fromTo(
            elem,
            { autoAlpha: 1 },
            { autoAlpha: 0, overwrite: "auto" }
          );
        },
      });
    },

    // medium
    "(min-width: 600px) and (max-width: 959px)": function () {
      // The ScrollTriggers created inside these functions are segregated and get
      // reverted/killed when the media query doesn't match anymore.
    },

    // small
    "(max-width: 599px)": function () {
      ScrollTrigger.create({
        trigger: elem,
        start: "top 60%",
        end: "bottom",
        /* markers: true, */
        onEnter: function () {
          gsap.fromTo(
            elem,
            { y: 100, autoAlpha: 0 },
            {
              duration: 1.6,
              y: 0,
              autoAlpha: 1,
              ease: "back",
              overwrite: "auto",
            }
          );
        },
        onLeave: function () {
          gsap.fromTo(
            elem,
            { autoAlpha: 1 },
            { autoAlpha: 0, overwrite: "auto" }
          );
        },
        onEnterBack: function () {
          gsap.fromTo(
            elem,
            { y: -100, autoAlpha: 0 },
            {
              duration: 1.6,
              y: 0,
              autoAlpha: 1,
              ease: "back",
              overwrite: "auto",
            }
          );
        },
        onLeaveBack: function () {
          gsap.fromTo(
            elem,
            { autoAlpha: 1 },
            { autoAlpha: 0, overwrite: "auto" }
          );
        },
      });
    },

    // all
    all: function () {
      // ScrollTriggers created here aren't associated with a particular media query,
      // so they persist.
    },
  });
});
gsap.utils.toArray(".revealLeft").forEach(function (elem) {
  ScrollTrigger.matchMedia({
    // large
    "(min-width: 960px)": function () {
      ScrollTrigger.create({
        trigger: elem,
        start: "top 80%",
        end: "-150px",
        /* markers: true, */
        onEnter: function () {
          gsap.fromTo(
            elem,
            { x: 100, autoAlpha: 0 },
            {
              duration: 1.6,
              x: 0,
              autoAlpha: 1,
              ease: "back",
              overwrite: "auto",
            }
          );
        },
        onLeave: function () {
          gsap.fromTo(
            elem,
            { autoAlpha: 1 },
            { autoAlpha: 0, overwrite: "auto" }
          );
        },
        onEnterBack: function () {
          gsap.fromTo(
            elem,
            { x: -100, autoAlpha: 0 },
            {
              duration: 1.6,
              x: 0,
              autoAlpha: 1,
              ease: "back",
              overwrite: "auto",
            }
          );
        },
        onLeaveBack: function () {
          gsap.fromTo(
            elem,
            { autoAlpha: 1 },
            { autoAlpha: 0, overwrite: "auto" }
          );
        },
      });
    },

    // medium
    "(min-width: 600px) and (max-width: 959px)": function () {
      // The ScrollTriggers created inside these functions are segregated and get
      // reverted/killed when the media query doesn't match anymore.
    },

    // small
    "(max-width: 599px)": function () {
      ScrollTrigger.create({
        trigger: elem,
        start: "top 60%",
        end: "bottom",
        /* markers: true, */
        onEnter: function () {
          gsap.fromTo(
            elem,
            { x: 100, autoAlpha: 0 },
            {
              duration: 1.6,
              x: 0,
              autoAlpha: 1,
              ease: "back",
              overwrite: "auto",
            }
          );
        },
        onLeave: function () {
          gsap.fromTo(
            elem,
            { autoAlpha: 1 },
            { autoAlpha: 0, overwrite: "auto" }
          );
        },
        onEnterBack: function () {
          gsap.fromTo(
            elem,
            { x: -100, autoAlpha: 0 },
            {
              duration: 1.6,
              x: 0,
              autoAlpha: 1,
              ease: "back",
              overwrite: "auto",
            }
          );
        },
        onLeaveBack: function () {
          gsap.fromTo(
            elem,
            { autoAlpha: 1 },
            { autoAlpha: 0, overwrite: "auto" }
          );
        },
      });
    },

    // all
    all: function () {
      // ScrollTriggers created here aren't associated with a particular media query,
      // so they persist.
    },
  });
});

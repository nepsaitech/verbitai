jQuery(function(jQuery) {
    jQuery('.faq ul li a').on('click', function(e) {
        e.preventDefault();
        jQuery(this).next().toggleClass('hidden');
    });

    jQuery('div[data-slider="audience"]').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      initialSlide: 0,
      variableWidth: true,
    });

    const testimonialSlider = jQuery('.testimonial-slider');
    const testimonialPostTotal = testimonialSlider.data('total');
    let centerMode = false
    let variableWidth = false;

    if (testimonialPostTotal > 3) {
      centerMode = true;
      variableWidth = true;
    }
    
    testimonialSlider.slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      centerMode: centerMode,
      infinite: true,
      pauseOnHover: true,
      autoplay: true,
      loop: true,
      autoplaySpeed: 1000,
      variableWidth: variableWidth,
      arrows: true,
      responsive: [
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            centerMode: true,
            variableWidth: true,
          }
        }
      ]
    });

    jQuery('.question-slider').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      infinite: true,
      autoplay: true,
      fade: true,
      loop: true,
      autoplaySpeed: 1000,
    });

    jQuery('div[data-video="audience"]').on('click', function() {

      var $clickedVideo = jQuery(this).find('video').get(0);
  
      if ($clickedVideo) {
          $clickedVideo.play();
      }

      jQuery(this).find('figure').hide();

      jQuery('div[data-video="audience"] video').each(function() {
        var video = jQuery(this).get(0);
        if (video !== $clickedVideo) {
            video.pause();
            console.log('pause!');
            jQuery(this).siblings('figure').show();
        }
      });
    });

    
  function handleHeaderResize() {
    var windowWidth = jQuery(window).width();
    var logo = jQuery('div[data-section="logo"]');
    var navWrap = jQuery('div[data-section="menu"]');
    var nav = jQuery('.main-navigation');

    if (windowWidth < 600) {
        logo.prepend(nav);
    } else {
        navWrap.prepend(nav);
    }
  }

  handleHeaderResize();

  jQuery(window).resize(handleHeaderResize);

  // Get personas URL parameter
  function getUrlParameter(param) {

    const pageURL      = window.location.search.substring(1);
    const URLVariables = pageURL.split('&');

    for ( let i = 0; i < URLVariables.length; i++ ) {

        const parameter = URLVariables[i].split('=');

        if (parameter[0] === param) {

          return parameter[1];
        }
    }

    return null;
  }

  const personasURLParam = getUrlParameter('personas');
  const personas = jQuery('.personas a[data-tab-menu]');

  personas.on('click', function() {

    const tab_to_show = jQuery(this).data("tab-menu");

    personas.removeClass("active text-blue-800").addClass("text-blue-400 hover:text-blue-800");
    jQuery(this).removeClass("text-blue-400 hover:text-blue-800").addClass("active text-blue-800");
    jQuery('[data-tab-content="persona"]').addClass("hidden");
    jQuery(`#${tab_to_show}`).removeClass("hidden");
  });

  if ( personasURLParam ) {

    const targetTab = jQuery('.personas a[data-tab-menu="' + personasURLParam + '"]');

    if ( targetTab.length ) {

      targetTab.trigger( "click" );
    }
  }


  // Profile toggle
  /* function handleProfileMenu() {
    if (jQuery(window).width() > 600) {
      jQuery('[data-toggle="profile"]').on('click', function() {
        jQuery(this).find('.profile-menu').toggleClass('hidden block');
        jQuery(this).find('svg').toggleClass('rotate-180');
      });
    } else {
      jQuery(this).find('.profile-menu').toggleClass('block hidden');
    }
  }

  jQuery(window).on('resize', function() {
    handleProfileMenu();
  });

  handleProfileMenu(); */
  
  // Header menu
  let $menuBtns = jQuery('[data-toggle="desktop-menu-btn"], [data-toggle="mobile-menu-btn"]');

  if ($menuBtns.length > 0) {
    $menuBtns.on('click', function() {
      const $this = jQuery(this);

      if ($this.is('[data-toggle="desktop-menu-btn"]')) {
        $this.siblings('.mobile-menu').addClass('open');
      } else if ($this.is('[data-toggle="mobile-menu-btn"]')) {
        const $menu = $this.parents('.mobile-menu');
        if ($menu.hasClass('open')) {
          jQuery('.menu-toggle').trigger('click');
        }
      }
    });
  }


  let uploadModal = jQuery('.url-modal');
  let uploadModalOpenBtn = jQuery('[data-modal="upload-open"]');
  let uploadModalcloseBtn = jQuery('[data-modal="upload-close"]');

  uploadModalcloseBtn.on('click', function() {
    uploadModal.addClass('hidden');
  });

  uploadModalOpenBtn.on('click', function() {
    uploadModal.removeClass('hidden');
  });



/*   jQuery('[name="local-upload"]').on('change', function() {
    const item = jQuery(this).parents('li');
    const initial = item.find('[data-upload="initial"]');
    const uploading = item.find('[data-upload="uploading"]');
    const result = item.find('[data-upload="result"]');
    const uploadButton = item.find('label[for="local-upload"]');
    const test = item.find('.js-upload-test');
    const language = item.find('[data-upload="language"]');
    const wrap = item.find('[data-upload="wrap"]');
    const wrapInner = item.find('[data-upload="wrap-inner"]');
    const status = item.find('[data-upload="status"]');

    initial.removeClass('max-md:flex').addClass('hidden');
    uploadButton.addClass('hidden');
    uploading.removeClass('hidden').addClass('max-md:flex');
    test.addClass('max-md:hidden');
    wrap.addClass('max-md:flex max-md:flex-col max-md:justify-between');
    wrapInner.removeClass('max-md:pb-[38px]').addClass('max-md:pb-0');
    test.next('a').removeClass('mt-[26px] max-md:mt-[34px]');

    setTimeout(function() {
      uploading.removeClass('max-md:flex').addClass('hidden');
      result.removeClass('hidden').addClass('max-md:block');
      test.addClass('hidden');
      test.next('a').removeClass('mt-[26px]').addClass('hidden');
      test.next('div').addClass('hidden');
      test.siblings('a').addClass('hidden');
      language.next('a').removeClass('mt-[26px] max-md:mt-[34px] max-w-[303px]').addClass('max-md:mt-[17px] max-md:max-w-[103px]');
      wrap.removeClass('max-md:pb-[38px] max-md:pb-[9px]').addClass('max-md:pt-[30px]');
      status.removeClass('max-md:mb-[22px]');
    }, 1000);
  }); */


  jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() > 50) {
        jQuery('[data-header="upload"]').addClass('backdrop-filter backdrop-blur-[34px] [box-shadow:0px_1px_0px_0px_#FFFFFF1A_inset] bg-gradient-to-t from-[#7D77FB] via-[#807AFB] to-[#7871FA]');
        jQuery('[data-header="wrap"]').removeClass('px-[39px] py-[33px] max-sm:px-2.5 max-md:px-5 max-[880px]:px-[20px]').addClass('p-2.5');
    } else {
        jQuery('[data-header="upload"]').removeClass('backdrop-filter backdrop-blur-[34px] [box-shadow:0px_1px_0px_0px_#FFFFFF1A_inset] bg-gradient-to-t from-[#7D77FB] via-[#807AFB] to-[#7871FA]');
        jQuery('[data-header="wrap"]').addClass('px-[39px] py-[33px] max-sm:px-2.5 max-md:px-5 max-[880px]:px-[20px]').removeClass('p-2.5');
    }
  });


  // Function to adjust the placement of the video element within the transcript section based on window width
  function adjustTranscriptVideoPlacement() {
    const windowWidth = jQuery(window).width();
    const video = jQuery('.js-video');
    const transcript = jQuery('.js-transcript');
    const text = jQuery('.js-transcript-text');
    const time = jQuery('.js-transcript-time');
    const name = jQuery('.js-speaker-name');
    const editText = jQuery('.js-transcript-edit');

    if (windowWidth < 1051) {
      video.insertBefore(text);
      time.insertAfter(name);
    } else {
      video.insertBefore(transcript);
      time.insertBefore(editText);
  }
  }

  jQuery(window).resize(adjustTranscriptVideoPlacement);

  adjustTranscriptVideoPlacement();


  // When the user scrolls the window, execute the following function
  /* const backTopBtn = jQuery('[data-action="back-to-top"]');

  if (backTopBtn.length > 0) {
    jQuery(window).scroll(function() {
      if (jQuery(this).scrollTop()) {
        backTopBtn.fadeIn();
      } else {
        backTopBtn.fadeOut();
      }
    });
  }

  
  // When the back-to-top button is clicked, smoothly scroll the page to the top (with a 500ms animation).
  backTopBtn.click(function () {
    jQuery("html, body").animate({scrollTop: 0}, 500);
  }); */


  // Add or remove 'sticky' class to sidebar based on scroll position
  /* jQuery(window).scroll(function(){
    const sidebar = jQuery('.sidebar'),
        scroll = jQuery(window).scrollTop();

    if (scroll >= 160) sidebar.addClass('sticky');
    else sidebar.removeClass('sticky');
  }); */



  // Select the form element that handles file export based on a data attribute
  /* const exportFileForm = jQuery('[data-action="export-file-selection"]');

  if (exportFileForm.length > 0) {
    const exportdropdown = exportFileForm.find('select');
    const proTag = exportFileForm.find('.js-pro-tag');

    exportdropdown.on('change', function() {
      const filetype = jQuery(this).val();
      
      jQuery('div[data-filetype]').addClass('hidden');
      jQuery('[data-filetype="'+ filetype +'"]').removeClass('hidden');
      
      if ('docx' === filetype) {
        proTag.removeClass('hidden').addClass('flex');
      } else {
        proTag.addClass('flex').removeClass('hidden');
      }
    });
  } */

  // Select the button element that closes the modal based on a data attribute
  const closeModalBtn = jQuery('[data-action="close-modal"]');

  if (closeModalBtn.length > 0) {
    closeModalBtn.on('click', function(e) {
      e.preventDefault();
      jQuery(this).parents('section[data-modal]').addClass('hidden');
    });
  }

  /* jQuery('[data-action="show-export-modal"]').on('click', function(){
    jQuery('[data-modal="export"]').removeClass('hidden').addClass('block');
  });

  jQuery('[data-action="show-export-modal"]').on('click', function(){
    jQuery('[data-modal="export"]').removeClass('hidden').addClass('block');
  }); */

  // Attach an event handler to the label elements within the .options class inside .segment
  /* const segment = jQuery('.segment');
  const options = segment.find('.options label');

  if (segment.length > 0) {
    options.on('click', function() {
      const $this = jQuery(this); 

      $this.parents('.segment').fadeOut('linear');
      
      setTimeout(function() {
        $this.parents('.segment').next().removeClass('hidden').fadeIn('linear');
      }, 500);

      const graphics = $this.parents('.segment').attr('data-graphics');

      jQuery('div[data-content="'+ graphics +'"]').fadeOut('slow');
      jQuery('div[data-content="'+ graphics +'"]').next().removeClass('hidden').fadeIn('slow');

      // Reach the last question
      const currentQuestionCount = $this.parents('.segment').find('.current-question-count').text();
      const totalQuestionCount = $this.parents('.segment').find('.total-questions-count').text();

      if (currentQuestionCount === totalQuestionCount) {
        jQuery('div[data-group="questions"]').addClass('hidden');
        jQuery('div[data-question="complete"]').removeClass('hidden').addClass('flex').fadeIn('slow');
      }
    });
  } */
});

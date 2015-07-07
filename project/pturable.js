    // in order to regex filename from url of an image
    String.prototype.filename = function(extension) {
        var s = this.replace(/\\/g, '/');
        s = s.substring(s.lastIndexOf('/') + 1);
        return extension ? s.replace(/[?#].+$/, '') : s.split('.')[0];
      }
      //Calculate the height of <header>
      //Use outerHeight() instead of height() if have padding
    var aboveHeight = $('nav').outerHeight();

    // when scroll
    $(window).scroll(function() {

      //if scrolled down more than the header's height
      if ($(window).scrollTop() > aboveHeight) {

        // if yes, add "fixed" class to the <nav>
        // add padding top to the #content (value is same as the height of the nav)
        $('nav').addClass('fixed').css('top', '0').next().css('padding-top', '60px');
      } else {

        // when scroll up or less than aboveHeight, remove the "fixed" class, and the padding-top
        $('nav').removeClass('fixed').next().css('padding-top', '0');
      }
    });


    var imgCount = 0;
    //----------------
    // document ready
    //----------------
    $(document).ready(function() {


      // 由網際網路位址加入圖片
      $("#urlSelect").click(function(e) {
          var imgUrl = prompt("Please enter image url:", "http://");
          if (imgUrl != null) {
            myFuncRenderImage(imgUrl, imgUrl.filename(), false);
          }
        })
        // 由client端filesystem加入圖片
      $("#fileSelect").click(function(e) {
        if ($("#fileElem")) {
          $("#fileElem").click();
        }
        e.preventDefault();
      });
      // 由client端filesystem加入圖片
      $("#fileElem").change(function(e) {
          // 檔案(array)
          var fileList = this.files;
          // 檔案個數
          var numFiles = fileList.length;
          for (var i = 0; i < numFiles; i++) {
            // 取得檔案物件
            var file = fileList[i];
            // 轉換成local url
            var objectURL = window.URL.createObjectURL(file);

            myFuncRenderImage(objectURL, file.name, true);
          }
        })
        // 由client端filesystem加入音樂
      $("#audioSelect").click(function(e) {
        if ($("#audioElem")) {
          $("#audioElem").click();

        }
        e.preventDefault();

      });
      // 由client端filesystem加入音樂
      $("#audioElem").change(function() {

          // 移除已load進來的音樂
          $('#audioPlay').remove();

          // 檔案(array)
          var fileList = this.files;

          var objectURL = window.URL.createObjectURL(fileList[0]);

          $('<audio>', {
            id: 'audioPlay',
            src: objectURL,
            // autoplay: true,
            loop: true,
          }).appendTo($('nav'));
          $('#audioSelect img').attr('src', 'images/Document-Music-01-128-contained.png');
        })
        // filter的按鈕click事件
      $("#filterPopup").click(function() {
        if ($("#filter").css("display") == "none") {
          $("#filter").css("display", "block");
          $("#searchText").focus();
        } else {
          $("#filter").css("display", "none");

        }

      });
      // 在filter input text按下enter後，執行filter的作業
      $("#searchText").keypress(function(e) {
        searchTextValue = this.value.toLowerCase();
        if (!e) e = window.event;
        var keyCode = e.keyCode || e.which;
        if (keyCode == '13') {
          // Enter pressed
          var imgList = document.getElementsByClassName("image-frame");
          for (var i = 0; i < imgList.length; i++) {
            var img = imgList[i];
            var descText = $(img).children(".caption").children("a").html().toLowerCase();
            if (descText.indexOf(searchTextValue) == -1) {
              img.style.display = "none";
              // console.log("not found --> "+descText);
            } else {
              img.style.display = "block";
              // console.log("found --> "+descText);
            }
          }
        }
      });

      // 全螢幕播放slide+music
      $('#play').click(function() {
        var imgItemArr = document.getElementsByClassName("image-frame");
        var data = [];
        data.length = 0;

        for (var i = 0; i < imgItemArr.length; i++) {
          if (imgItemArr[i].style.display != 'none') {
            data.push({
              image: imgItemArr[i].children[0].children[0].src,
              title: imgItemArr[i].children[1].children[0].innerHTML
            });
          }
        }
        // 使用遞迴搭配setTimeout的方式來輪播照片
        var fullscreenPlay = function(i, repo) {
            // recursive - break point
            if (i == repo.length) {
              // 不repeat照片
              // return;
              // repeat照片
              i = 0;
            }
            // 當離開fullscreen mode後, 要停止輪播
            // 但第一張照片(i=0)進到迴圈時可能還沒到fullscreen mode, 所以再&i
            if (!document.webkitIsFullScreen && i) {
              return;
            }

            // recursive - do something here
            // 清空#contentEnlarge
            $("#contentEnlarge").empty();
            // 將圖片append到#contentEnlarge
            $('<img>', {
              src: repo[i].image,
              // class: 'enlarge',
              // on: {
              //     click: function() {
              //         $("#contentEnlarge").empty();
              //     }
              // }
            }).appendTo("#contentEnlarge");


            // recursive - continue point
            setTimeout(function() {
              fullscreenPlay(i + 1, repo);

            }, 5000);
          }
          // 搜尋不到image
        if (!data.length) {
          alert("no image loaded!");
          return;
        } else {
          // 將#contentEnlarge於fullscreen mode播放
          var elem = document.getElementById('contentEnlarge');
          if (document.webkitFullscreenElement) {
            document.webkitCancelFullScreen();
          } else {
            elem.webkitRequestFullScreen();
          };
          // 播放音樂
          if (document.getElementById("audioPlay") != null) {
            document.getElementById("audioPlay").play();
          }
          // 使用遞迴搭配setTimeout的方式來輪播照片
          fullscreenPlay(0, data);

          //
          // $('<div>', {
          //     id: 'galleria-div'
          // }).appendTo('#contentEnlarge');
          // Galleria.loadTheme('galleria/themes/azur/galleria.azur.min.js');
          // // Galleria.loadTheme('galleria/themes/classic/galleria.classic.min.js');
          // Galleria.run('#galleria-div', {
          //     transition: 'fade',
          //     height: 500,
          //     autoplay: 7000,
          //     dataSource: data,
          //     idleMode: false
          // });

          // setTimeout(function() {
          //     console.log('enter');
          // }, 3000);
          // console.log('3 sec.');
          // var gallery = Galleria.get(0);
          // gallery.toggleFullscreen();


        }
      });
    });
    // 功能: 創建圖片div, 並置入#content裡
    // url: 圖片位址
    // fileName: 圖片說明
    // isLocal: 是否為local image upload
    function myFuncRenderImage(url, fileName, isLocal) {

      // 建立div物件，並將img物件餵給它
      var imgItem = document.createElement("div");
      imgItem.className = "image-frame";
      $("#content").prepend(imgItem);


      // 建立img物件，並將src設定為local url
      var $img = $("<img>", {
        src: url,
        css: {
          'max-width': 'auto',
          'max-height': '15em',
          'float': 'left',
        },
        on: {
          load: function() {
            // 若不再操作可將之關閉
            // window.URL.revokeObjectURL(this.src);
          },
        }
      });
      // lightbox display
      $('<a>', {
          'href': url,
          'data-lightbox': 'imageSet',
          'data-title': fileName,

        })
        .append($img)
        .appendTo(imgItem);


      // 建立caption
      var $caption = $('<div>', {
        class: 'caption',
        text: fileName
      });
      // // append desc
      // $caption.append($('<a>', {
      //     href: '#',
      //     html: fileName,
      //     on: {
      //         click: function() {
      //             var modifiedDesc = prompt("Modify Description:", this.innerHTML);
      //             if (modifiedDesc != null) {
      //                 this.innerHTML = modifiedDesc;
      //             }
      //         }
      //     }
      // }));
      // append remove icon
      // $caption.append($('<a>', {
      //     'href': '#',
      //     'css': {
      //         'right': 1,
      //         'cssFloat': 'right'
      //     }
      // }).append($('<img>', {
      //     src: "images/Cancel-24.png",
      //     click: function() {
      //         $(this).parent("a").parent().parent(".image-frame").remove();
      //     }
      // })));

      $caption.appendTo(imgItem);

      // 功能列
      // <div>
      //   <a><img src='cancel' onclick='...'></a>
      //   <a><img src='edit' onclick='...'></a>
      // </div>
      $('<div>', {
        class: 'fn',
      }).append(
        $('<a>', {
          href: '#',
        }).append(
          $('<img>', {
            src: "images/Cancel-48.png",
            click: function() {
              var $imgIcon = $(this);
              swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: false
              }, function(isConfirm) {
                if (isConfirm) {
                  $imgIcon.parents('.image-frame').remove();
                  swal({
                    title: 'Deleted!',
                    text: 'Your imaginary file has been deleted.',
                    type: 'success',
                    timer: 2000,
                    showConfirmButton: false
                  });
                } else {
                  swal({
                    title: 'Cancelled',
                    text: 'Your imaginary file is safe :)',
                    type: 'error',
                    timer: 2000,
                    showConfirmButton: false
                  });
                }
              });
            }
          })
        ),
        $('<a>', {
          href: '#',
        }).append(
          $('<img>', {
            src: "images/Text-Editor-48.png",
            click: function() {
              var $imgIcon = $(this);
              swal({
                title: "description",
                type: "input",
                showCancelButton: true,
                closeOnConfirm: false,
                animation: "slide-from-top",
                inputValue: $.trim($imgIcon.parents('.image-frame').children('.caption').text())
              }, function(inputValue) {
                if (inputValue === false) return false;
                if (inputValue === "") {
                  swal.showInputError("You need to write something!");
                  return false
                }
                $imgIcon.parents('.image-frame').children('.caption').text(inputValue);
                swal({
                  title: "Description modified!",
                  text: inputValue,
                  type: 'success',
                  timer: 2000,
                  showConfirmButton: false
                });
              });
            }
          })
        )).appendTo(imgItem);


      //The .hover() method, when passed a single function, will execute that handler for both mouseenter and mouseleave events.
      $(imgItem).hover(function() {
          // $(this).children('a').children('img').animate({
          //     'width': $(this).width() * 1.2,
          //     'height': $(this).height() * 1.2,
          //     'top': -15,
          //     'left': -15
          // }, {
          //     duration: 200
          // });
          // $(this).children('div').stop(false, true).fadeIn(200);
          $(this).children('.fn').fadeIn('normal');
        },
        function() {
          // $(this).children('a').children('img').animate({
          //     'width': $(this).width(),
          //     'height': $(this).height(),
          //     'top': '0',
          //     'left': '0'
          // }, {
          //     duration: 100
          // });
          // $(this).children('div').stop(false, true).fadeOut(200);
          $(this).children('.fn').fadeOut('normal');
        }
      );
    }
    document.onkeyup = function(e) {
      if (!e) e = window.event;
      var keyCode = e.keyCode || e.which;
      if (keyCode == 27) {
        $("#filter").css("display", "none");
        $("#contentEnlarge").empty();
        window.scrollTo(0, 0);
      }
    }
    if (document.addEventListener) {
      document.addEventListener('webkitfullscreenchange', exitHandler, false);
      document.addEventListener('mozfullscreenchange', exitHandler, false);
      document.addEventListener('fullscreenchange', exitHandler, false);
      document.addEventListener('MSFullscreenChange', exitHandler, false);
    }

    function exitHandler() {
      // if (document.webkitIsFullScreen || document.mozFullScreen || document.msFullscreenElement !== null) {
      if (!document.webkitIsFullScreen) {
        /* Run code on exit */
        $("#contentEnlarge").empty();
        if (document.getElementById("audioPlay") != null) {
          document.getElementById("audioPlay").pause();
        }
      }
    }

 FB.init({
  appId  : '269349909751802',
  status : true, // check login status
  cookie : true, // enable cookies to allow the server to access the session
  xfbml  : true, // parse XFBML
  channelURL : 'http://rimage.arn.com/testing/fbogaar/channel.html', // channel.html file
  oauth  : true // enable OAuth 2.0
});

(function(window,$,undefined) {
  function getUrlVars() {
    var vars = [],
        hash,
        hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++) {
      hash = hashes[i].split('=');
      vars.push(hash[0]);
      vars[hash[0]] = hash[1];
    }
    return vars;
  }

  var fbogaar = {
    /**
     * @param response object containing fb json data
     */
    showAlbumInfo : function(response) {
      $('<h1 />').text(response.from.name + '\'s ' + response.name + ' album').appendTo('#info');
      $('<small />').text(response.count + ' photos; last updated ' + response.updated_time).appendTo('#info');
      FB.api(response.cover_photo, function(coverPhoto) {
        var sizes = coverPhoto.images.length;
        $('<img />', {
          src    : coverPhoto.images[sizes - 1].source,
          height : coverPhoto.images[sizes - 1].height,
          width  : coverPhoto.images[sizes - 1].width
        }).appendTo('#album-cover');
      });
    },

    init : function() {
      var albumId = getUrlVars().id || '10150106474643702';
      FB.api(albumId, fbogaar.showAlbumInfo);

      FB.api(albumId + '/photos', function(response) {
        var firstPhoto = response.data[0],
            photos = response.data.length,
            html = '';
        $('<img src="' + firstPhoto.source + '" width="' + firstPhoto.width + '" height="' + firstPhoto.height + '" />').appendTo('#main-photo');
        for (var i = 0; i < photos; ++i) {
          var photo = response.data[i];
          html += '<a href="' + photo.source + '" style="background-image: url(' + photo.picture + ');">' + photo.id + '</a>';
        }
        $(html).appendTo('#photos');
      });

      $('#photos').delegate('a', 'click', function(event) {
        var src = $(this).attr('href');
        event.preventDefault();
        $('#main-photo').html('<img src="' + src + '" />');
      });

      $('#toggle-help, #help').click(function(event) {
        event.preventDefault();
        $('#help').fadeToggle('fast');
      });

    }
  };

  $(fbogaar.init);

})(window, jQuery);

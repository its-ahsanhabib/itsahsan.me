
!function(e){e.fn.socialstream=function(a){var t={socialnetwork:"flickr",username:"pixel-industry",limit:6,overlay:!0,apikey:!1},a=e.extend(t,a);return this.each(function(){function t(t){e.get("https://www.googleapis.com/youtube/v3/playlistItems",{part:"snippet",maxResults:a.limit,playlistId:t,key:a.apikey},function(t){var r='<ul class="youtube-list">';e.each(t.items,function(t,i){var s=i.snippet.thumbnails["default"].url,l="";if(!s)return!1;var n=(e("<div></div>"),"https://www.youtube.com/watch?v="+i.snippet.resourceId.videoId),c=i.snippet.title;if(a.overlay)var l='<div class="img-overlay"></div>';r+='<li><a target="_blank" href="'+n+'" title="'+c+'"><img src="'+s+'"/>'+l+"</a></li>"}),r+="</ul>",e(i).append(r)})}var i=e(this);switch(a.socialnetwork){case"flickr":i.append('<ul class="flickr-list"></ul>'),e.getJSON("https://api.flickr.com/services/rest/?method=flickr.people.findByUsername&username="+a.username+"&format=json&api_key=32ff8e5ef78ef2f44e6a1be3dbcf0617&jsoncallback=?",function(t){var r=t.user.nsid;e.getJSON("https://api.flickr.com/services/rest/?method=flickr.photos.search&user_id="+r+"&format=json&api_key=85145f20ba1864d8ff559a3971a0a033&per_page="+a.limit+"&page=1&extras=url_sq&jsoncallback=?",function(t){e.each(t.photos.photo,function(t,r){var s=r.owner,l=r.title,n=r.url_sq,c=r.id,o="https://www.flickr.com/photos/"+s+"/"+c,p=e("<img/>").attr({src:n,alt:l}),d=e("<a/>").attr({href:o,target:"_blank",title:l}),u=e(d).append(p);if(a.overlay){var v=e("<div/>").addClass("img-overlay");e(d).append(v)}var f=e("<li/>").append(u);e("ul",i).append(f)})})});break;case"pinterest":var r="http://pinterest.com/"+a.username+"/feed.rss",s="http://ajax.googleapis.com/ajax/services/feed/load?v=1.0&callback=?&q="+encodeURIComponent(r)+"&num="+a.limit+"&output=json_xml";e.getJSON(s,function(t){if(200==t.responseStatus){var r=t.responseData.feed,s="";if(!r)return!1;for(var l='<ul class="pinterest-list">',n=0;n<r.entries.length;n++){var c=r.entries[n],o=e("<div></div>");o.append(c.content);var p="http://www.pinterest.com"+o.find("a").attr("href"),d=o.find("img").attr("src"),u=o.find("p:nth-child(2)").html();if(a.overlay)var s='<div class="img-overlay"></div>';l+='<li><a target="_blank" href="'+p+'" title="'+u+'"><img src="'+d+'"/>'+s+"</a></li>"}l+="</ul>",e(i).append(l)}});break;case"instagram":i.append('<ul class="instagram-list"></ul>');var l="200718541.a4734ab.cc050fa16d6141bf8b709c97ab158f57";r="https://api.instagram.com/v1/users/search?q="+a.username+"&access_token="+l+"&count=1&callback=?",e.getJSON(r,function(t){e.each(t.data,function(t,s){var n=s.username;if(n==a.username){var c=s.id;""!=c&&(r="https://api.instagram.com/v1/users/"+c+"/media/recent/?access_token="+l+"&count="+a.limit+"&callback=?",e.getJSON(r,function(t){e.each(t.data,function(t,r){var s=r.images.thumbnail.url,l=r.link,n="";null!=r.caption&&(n=r.caption.text);var c=e("<img/>").attr({src:s,alt:n}),o=e("<a/>").attr({href:l,target:"_blank",title:n}),p=e(o).append(c);if(a.overlay){var d=e("<div/>").addClass("img-overlay");e(o).append(d)}var u=e("<li/>").append(p);e("ul",i).append(u)})}))}})});break;case"dribbble":i.append('<ul class="dribbble-list"></ul>'),e.getJSON("http://dribbble.com/"+a.username+"/shots.json?callback=?",function(t){e.each(t.shots,function(t,r){if(t<a.limit){var s=r.title,l=e("<img/>").attr({src:r.image_teaser_url,alt:s}),n=e("<a/>").attr({href:r.url,target:"_blank",title:s}),c=e(n).append(l);if(a.overlay){var o=e("<div/>").addClass("img-overlay");e(n).append(o)}var p=e("<li/>").append(c);e("ul",i).append(p)}})});break;case"deviantart":var r="http://backend.deviantart.com/rss.xml?type=deviation&q=by%3A"+a.username+"+sort%3Atime+meta%3Aall",s="http://ajax.googleapis.com/ajax/services/feed/load?v=1.0&callback=?&q="+encodeURIComponent(r)+"&num="+a.limit+"&output=json_xml";e.getJSON(s,function(t){if(200==t.responseStatus){var r=t.responseData.feed,s="";if(!r)return!1;for(var l='<ul class="deviantart-list">',n=0;n<r.entries.length;n++){var c=r.entries[n],o=e("<div></div>");o.append(c.content);var p=c.link,d=o.find("img").attr("src");if(!(d.indexOf("smile.gif")>=0)){var u=c.title.replace(/.jpg/g,"").replace(/-/g," ").replace(/_/g," ");if(a.overlay)var s='<div class="img-overlay"></div>';l+='<li><a target="_blank" href="'+p+'" title="'+u+'"><img src="'+d+'"/>'+s+"</a></li>"}}l+="</ul>",e(i).append(l)}});break;case"picasa":var r="https://picasaweb.google.com/data/feed/base/user/"+a.username+"?alt=rss&kind=photo&hl=en_US&imgmax="+a.limit+"&thumbsize=48c",s="http://ajax.googleapis.com/ajax/services/feed/load?v=1.0&callback=?&q="+encodeURIComponent(r)+"&num="+a.limit+"&output=json_xml";e.getJSON(s,function(t){if(200==t.responseStatus){var r=t.responseData.feed,s="";if(!r)return!1;for(var l='<ul class="picasa-list">',n=0;n<r.entries.length;n++){var c=r.entries[n],o=e("<div></div>");o.append(c.content);var p=c.link,d=o.find("img").attr("src"),u=c.title.replace(/.jpg/g,"").replace(/-/g," ").replace(/_/g," ");if(a.overlay)var s='<div class="img-overlay"></div>';l+='<li><a target="_blank" href="'+p+'" title="'+u+'"><img src="'+d+'"/>'+s+"</a></li>"}l+="</ul>",e(i).append(l)}});break;case"youtube":var n;a.apikey&&e.get("https://www.googleapis.com/youtube/v3/channels",{part:"contentDetails",forUsername:a.username,key:a.apikey},function(a){e.each(a.items,function(e,a){n=a.contentDetails.relatedPlaylists.uploads,t(n)})});break;case"newsfeed":var s="http://ajax.googleapis.com/ajax/services/feed/load?v=1.0&callback=?&q="+encodeURIComponent(a.username)+"&num="+a.limit+"&output=json_xml";e.getJSON(s,function(t){if(200==t.responseStatus){var r=t.responseData.feed,s="";if(!r)return!1;for(var l='<ul class="social-feed">',n=0;n<r.entries.length;n++){var c=r.entries[n],o=e("<div></div>");o.append(c.content);var p=c.link,d=o.find("img").attr("src"),u=c.title.replace(/.jpg/g,"").replace(/-/g," ").replace(/_/g," ");if(a.overlay)var s='<div class="img-overlay"></div>';l+='<li><a target="_blank" href="'+p+'" title="'+u+'"><img src="'+d+'"/>'+s+"</a></li>"}l+="</ul>",e(i).append(l)}})}})}}(jQuery);